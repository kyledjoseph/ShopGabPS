<?php

// app/classes/myrules.php
class MyRules
{
  // note this is a static method
  public static function _validation_unique($val, $options)
  {
    Validation::active()->set_message('unique', 'The field :label must be unique, but :value has already been used');

    list($table, $field) = explode('.', $options);

    $result = DB::select("LOWER (\"$field\")")
      ->where($field, '=', Str::lower($val))
      ->from($table)->execute();

    return ! ($result->count() > 0);
  }

  // note this is a non-static method
  public function _validation_is_upper($val)
  {
    return $val === strtoupper($val);
  }

}