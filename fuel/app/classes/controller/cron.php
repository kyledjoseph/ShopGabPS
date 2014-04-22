<?php

class Controller_Cron extends Controller_App {

  function before() {
    // check cron password
      if (!isset($_GET['password']) || $_GET['password'] !== 'sifrazakron') {
      die('Wrong password');
    } // if
  } // before

  /**
   * Actions to be performed once per day
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
}