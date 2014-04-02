<?php

// app/classes/myrules.php
class MyRules
{
  // note this is a static method
  public static function _validation_unique($val, $options) {
    Validation::active()->set_message('unique', 'The field :label must be unique, but :value has already been used');

    list($table, $field) = explode('.', $options);

    $result = DB::select("LOWER (\"$field\")")
      ->where($field, '=', Str::lower($val))
      ->from($table)->execute();

    return ! ($result->count() > 0);
  }

  /**
   * Validate if pro user exists
   * @param $val
   * @return bool
   */
  public static function _validation_pro_user_id_exist($val) {
    Validation::active()->set_message('pro_user_id_exist', "We're sorry the PSID you entered is not valid, please try again or contact your Personal Shopper");

    $result = Model_User::query()->where('id', $val)->where('group', Model_User::PROFESSIONAL_GROUP_ID);
    return ($result->count() > 0);
  } // _validation_pro_user_id_exist

  /**
   * Validate if pro user exists
   * @param $val
   * @return bool
   */
  public static function _validation_pro_user_id_active($val) {
    Validation::active()->set_message('pro_user_id_active', "We're sorry the PSID account you entered is not active, please contact your Personal Shopper");

    $result = Model_Professional::getByUserId($val);
    if ($result) {
      return ($result->pricing_plan_type != Model_Professional::SUSPENDED_PRICING_PLAN);
    } else {
      return true;
    } // if
  } // _validation_pro_user_id_exist

  // note this is a non-static method
  public function _validation_is_upper($val) {
    return $val === strtoupper($val);
  }

}