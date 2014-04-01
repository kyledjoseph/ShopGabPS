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
    print('Frequently task started at: '.date('Y-m-d H:i:s'));

    // try to renew professional subscriptions and suspend expired trial plans
    $professionals = Model_Professional::query()->where('pricing_plan_type' ,'!=', Model_Professional::SUSPENDED_PRICING_PLAN)->get();
    foreach($professionals as $professional) {
      /**
       * @var Model_Professional $professional
       */
      if ($professional->getSubscriptionDaysLeft() < 0) {
        if ($professional->pricing_plan_type == Model_Professional::PAID_PRICING_PLAN) {
          $paypal = Model_Paypal::getByUserId($professional->user_id);
          $payment_info = $paypal->makePayment();
          if ($payment_info === true) {
            $professional->set([
              'pricing_plan_type' => Model_Professional::PAID_PRICING_PLAN,
              'pricing_plan_started_on' => time()
            ]);
            $professional->save();
            continue;
          } else {
            // @TODO notify pro user about renewal failing
          } // if
        } // if

        $professional->set([
          'pricing_plan_type' => Model_Professional::SUSPENDED_PRICING_PLAN,
          'pricing_plan_started_on' => time()
        ]);
        $professional->save();
      } // if
    } // foreach


    print("Frequently task finished at: ".date('Y-m-d H:i:s'));
    die();
  } // get_frequently
}