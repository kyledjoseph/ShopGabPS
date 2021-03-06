<?php

class Model_Client extends \Orm\Model {

  const CLIENT_FEMALE = 0;
  const CLIENT_MALE = 1;

  protected static $_properties = array(
    'id',
    'gender',
    'neck',
    'arm',
    'over_arm',
    'chest',
    'waist',
    'glove',
    'hat',
    'shirt_size',
    'age',
    'height',
    'weight',
    'bust',
    'hips',
    'cup_size',
    'dress_size',
    'professional_information',
    'user_id',
    'parent_id',
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
   * Check if parent is active
   * @return bool
   */
  function parentIsActive() {
    $parent = Model_Professional::getByUserId($this->parent_id);
    if ($parent) {
      return ($parent->pricing_plan_type != Model_Professional::SUSPENDED_PRICING_PLAN);
    } else {
      return false;
    } // if
  } // parentIsActive

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
   * Return client model
   * @param $user_id
   * @return Model_Client
   */
  static public function getByUserId($user_id) {
    return self::query()->where('user_id', $user_id)->get_one();
  } // getByUserId

} // Model_Client