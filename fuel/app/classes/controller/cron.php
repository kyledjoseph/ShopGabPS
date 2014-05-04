<?php

class Controller_Cron extends Controller_App {

  function before() {
    // check cron password
      if (!isset($_GET['password']) || $_GET['password'] !== 'sifrazakron') {
      die('Wrong password');
    } // if
  } // before

  /**
   * Actions to be performed once every ten minutes
   */
  function get_frequently() {
    echo('Frequently task started at: '.date('Y-m-d H:i:s').'<br />');

    // try to renew professional subscriptions and suspend expired trial plans
    $professionals = Model_Professional::query()->where('pricing_plan_type' ,'!=', Model_Professional::SUSPENDED_PRICING_PLAN)->get();
    foreach($professionals as $professional) {
      /**
       * @var Model_Professional $professional
       */
      $days_left = $professional->getSubscriptionDaysLeft();

      if ($days_left == 2) {
        if (($professional->pricing_plan_type == Model_Professional::PAID_PRICING_PLAN) && ($professional->automatic_plan_renewal)) {
          $professional->notifyPaypalRenew();
        } // if
      } // if

      if ($days_left < 0) {
        if (($professional->pricing_plan_type == Model_Professional::PAID_PRICING_PLAN) && ($professional->automatic_plan_renewal)) {
          $paypal = Model_Paypal::getByUserId($professional->user_id);

          try {
            $paypal->makePayment();

            $professional->set([
              'pricing_plan_type' => Model_Professional::PAID_PRICING_PLAN,
              'pricing_plan_started_on' => time(),
              'automatic_plan_notification_sent' => false
            ]);
            $professional->save();
            continue;
          } catch (Exception $e) {
            echo 'Payment failed for user with id: '. $professional->user_id.'<br />';
            $professional->notifyPaypalFailed();
          } // try
        } // if

        $professional->set([
          'pricing_plan_type' => Model_Professional::SUSPENDED_PRICING_PLAN,
          'pricing_plan_started_on' => time(),
          'automatic_plan_notification_sent' => false
        ]);
        $professional->save();
      } // if
    } // foreach


    echo("Frequently task finished at: ".date('Y-m-d H:i:s'));
    die();
  } // get_frequently

  /**
   * Actions to be performed once every hour
   */
  public function get_hourly() {
    echo('Hourly task started at: '.date('Y-m-d H:i:s').'<br />');

    /********************
     * send notifications
     ********************/

    // send to professionals
    $professionals = Model_Professional::query()->get();
    foreach ($professionals as $professional) {
      $email_messages = [];
      /**
       * @var Model_Professional $professional
       */
      // get his clients activity
      foreach ($professional->getClients() as $client) {
        $notifications = Model_Quest_Notification::query()->where('user_id', $client->user_id)->where('sent_by_email', false)->order_by('created_at')->get();

        if ($notifications) {
          $display_name = $client->getUser()->display_name();
          $email_messages[$client->id] = "<div><p>Your client $display_name has updated following information on ShopGab:</p><ul>";
          foreach ($notifications as $notification) {
            /**
             * @var Model_Quest_Notification $notification
             */
            $method = 'on_'.$notification->event_type;
            $message = $notification->$method();
            if ($message) {
              $email_messages[$client->id] .= $message;
              $notification->sent_by_email = true;
              $notification->save();
            } // if
          } // foreach
          $email_messages[$client->id] .= '</ul></div>';
        } // if
      } // foreach

      // send the email
      if ($email_messages && $professional->getUser()->receive_notifications) {
        Service_Email::send(array(
          'type'      => 'professional_notifications',
          'to_addr'   => $professional->getUser()->email,
          'from_name' => 'ShopGab',
          'from_addr' => 'notification@shopgab.com',
          'subject'   => "ShopGab Notifications",
          'body'      => View::forge('emails/template', array(
              'content' => View::forge('emails/notifications/quest/professional', array(
                  'display_name' => $professional->getUser()->display_name(),
                  'notifications' => implode('', $email_messages)
                )),
            ), false),
        ));
      } // if
    } // foreach



    // send to clients
    $clients = Model_Client::query()->get();
    foreach ($clients as $client) {
      /**
       * @var Model_Client $client
       */

      // get his professional user activity

      $professional = Model_Professional::getByUserId($client->parent_id);
      $notifications = Model_Quest_Notification::query()->where('user_id', $professional->user_id)->where('sent_by_email', false)->order_by('created_at')->get();
      if ($notifications) {
        $display_name = $professional->getUser()->display_name();
        $email_message = '';
        foreach ($notifications as $notification) {
          /**
           * @var Model_Quest_Notification $notification
           */
          $quest = Model_Quest::get_by_id($notification->quest_id);
          if ($quest && ($quest->user_id == $client->user_id)) {
            $method = 'on_'.$notification->event_type;
            $message = $notification->$method();
            if ($message) {
              $email_message .= $message;
              $notification->sent_by_email = true;
              $notification->save();
            } // if
          } // if
        } // foreach
        if ($email_message) {
          $email_message = "<div><p>$display_name has updated the following information on your ShopGab account:</p><ul>" . $email_message . '</ul></div>';

          if ($client->getUser()->receive_notifications) {
            Service_Email::send(array(
              'type'      => 'client_notifications',
              'to_addr'   => $client->getUser()->email,
              'from_name' => 'ShopGab',
              'from_addr' => 'notification@shopgab.com',
              'subject'   => "ShopGab Notifications",
              'body'      => View::forge('emails/template', array(
                  'content' => View::forge('emails/notifications/quest/client', array(
                      'display_name' => $client->getUser()->display_name(),
                      'notifications' => $email_message
                    )),
                ), false),
            ));
          } // if
        } // if

      } // if
    } // foreach

    echo("Hourly task finished at: ".date('Y-m-d H:i:s'));
    die();
  } // get_hourly
}