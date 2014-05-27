<?php

class Model_Professional extends \Orm\Model {

  const SUSPENDED_PRICING_PLAN = 0;
  const TRIAL_PRICING_PLAN = 1;
  const PAID_PRICING_PLAN = 2;

  protected static $_properties = array(
    'id',
    'user_id',
    'pricing_plan_type',
    'pricing_plan_started_on',
    'automatic_plan_renewal',
    'automatic_plan_notification_sent',
    'price'
  );

  protected static $_belongs_to = array(
    'user' => array(
      'key_from' => 'user_id',
      'model_to' => 'Model_User',
      'key_to' => 'id',
      'cascade_save' => true,
      'cascade_delete' => false,
    ),
  );

  /**
   * Return verbose name of the pricing plan
   * @return string
   */
  public function getVerbosePricingPlanType() {
    switch ($this->pricing_plan_type) {
      case self::SUSPENDED_PRICING_PLAN:
        return 'Suspended';
        break;
      case self::TRIAL_PRICING_PLAN:
        return 'Trial' . ' ' . $this->getSubscriptionDaysLeft() . ' day(s) left';
        break;
      case self::PAID_PRICING_PLAN:
        return 'Active' . ' ' . $this->getSubscriptionDaysLeft() . ' day(s) left';
        break;
      default:
        return 'Unknown';
    } // switch
  } // getVerboseAccountType

  function getSubscriptionDaysLeft() {
    $expire_time = (int)$this->pricing_plan_started_on + (30 * 24 * 60 * 60);
    $time_left = $expire_time - time();

    return ceil($time_left / (60 * 60 * 24));
  } // getSubscriptionDaysLeft

  /**
   * Get all professional clients
   * @return Model_Client[]
   */
  function getClients() {
    return Model_Client::query()->where('parent_id', $this->user_id)->get();
  } // getClients

  /**
   * Cached value for model user
   * @var Model_User|null
   */
  private $user_model = null;
  function getUser() {
    if (!($this->user_model instanceof Model_User)) {
      $this->user_model = Model_User::get_by_id($this->user_id);
    } // if

    return $this->user_model;
  } // getUser

  /**
   * Notify professional user that his paypal could not get through and that his subscription is not renewed
   */
  public function notifyPaypalFailed() {
    Service_Email::send(array(
      'type'      => 'client_notifications',
      'to_addr'   => $this->getUser()->email,
      'from_name' => 'ShopGab',
      'from_addr' => 'notification@shopgab.com',
      'subject'   => "ShopGab Notifications",
      'body'      => View::forge('emails/template', array(
          'content' => View::forge('emails/paypal_failed', array(

            )),
        ), false),
    ));
  } // notifyPaypalFailed

  /**
   * Notify professional user hia subscription is going to be renewed in 2 days
   */
  public function notifyPaypalRenew() {
    if (!$this->automatic_plan_notification_sent) {
      Service_Email::send(array(
        'type'      => 'client_notifications',
        'to_addr'   => $this->getUser()->email,
        'from_name' => 'ShopGab',
        'from_addr' => 'notification@shopgab.com',
        'subject'   => "ShopGab Notifications",
        'body'      => View::forge('emails/template', array(
            'content' => View::forge('emails/paypal_soon_renew', array(

              )),
          ), false),
      ));
      $this->set('automatic_plan_notification_sent', true);
      $this->save();
    } // if
  } // notifyPaypalFailed

  /**
   * Get price for this professional
   * @return float
   */
  public function getPrice() {
    if (is_null($this->price)) {
      return Model_Paypal::getDefaultPrice();
    } else {
      return round($this->price, 2);
    } // if
  } // getPrice

  /**
   * Return professional model
   * @param $user_id
   * @return Model_Professional
   */
  static public function getByUserId($user_id) {
    return self::query()->where('user_id', $user_id)->get_one();
  } // getByUserId

} // Model_Professional