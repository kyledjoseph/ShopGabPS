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
      if ($professional->getSubscriptionDaysLeft() < 0) {

        if (($professional->pricing_plan_type == Model_Professional::PAID_PRICING_PLAN) && ($professional->automatic_plan_renewal)) {
          $paypal = Model_Paypal::getByUserId($professional->user_id);

          try {
            $paypal->makePayment();

            $professional->set([
              'pricing_plan_type' => Model_Professional::PAID_PRICING_PLAN,
              'pricing_plan_started_on' => time()
            ]);
            $professional->save();
            continue;
          } catch (Exception $e) {
            echo 'Payment failed for user with id: '. $professional->user_id.'<br />';
            // @TODO notify pro user about renewal failing
          } // try
        } // if

        $professional->set([
          'pricing_plan_type' => Model_Professional::SUSPENDED_PRICING_PLAN,
          'pricing_plan_started_on' => time()
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
            $email_messages[$client->id] .= $notification->$method();
            $notification->sent_by_email = true;
            $notification->save();
          } // foreach
          $email_messages[$client->id] .= '</ul></div>';
        } // if
      } // foreach

      // send the email
      if ($email_messages) {
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

    echo("Hourly task finished at: ".date('Y-m-d H:i:s'));
    die();
  } // get_hourly
}