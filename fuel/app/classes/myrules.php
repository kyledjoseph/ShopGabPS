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

  public static function _validation_user_id_exist($val) {
    Validation::active()->set_message('user_id_exist', 'There is no professional with :value PSID');

    $result = Model_User::query()->where('id', $val)->where('group', Model_User::PROFESSIONAL_GROUP_ID);
    return ($result->count() > 0);
  } // _validation_user_id_exist

  // note this is a non-static method
  public function _validation_is_upper($val)
  {
    return $val === strtoupper($val);
  }

}