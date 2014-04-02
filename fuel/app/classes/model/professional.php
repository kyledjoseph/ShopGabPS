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
   * Return professional model
   * @param $user_id
   * @return Model_Professional
   */
  static public function getByUserId($user_id) {
    return self::query()->where('user_id', $user_id)->get_one();
  } // getByUserId

} // Model_Professional