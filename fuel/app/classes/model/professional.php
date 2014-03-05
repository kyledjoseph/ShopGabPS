<?php

class Model_Professional extends \Orm\Model {

  const TRIAL_PRICING_PLAN = 0;
  const PAID_PRICING_PLAN = 1;

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


} // Model_Professional