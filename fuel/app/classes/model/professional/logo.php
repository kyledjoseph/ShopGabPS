<?php

class Model_Professional_Logo extends \Orm\Model
{
  protected static $_table_name = 'professional_logos';

  protected static $_properties = array(
    'id',
    'professional_id',
    'name',
    'public_uri',
    'public_ssl_uri',
    'public_streaming_uri',
    'width',
    'height',
    'content_length',
    'created_at',
    'updated_at',
  );

  protected static $_belongs_to = array(
    'product' => array(
      'key_from' => 'professional_id',
      'model_to' => 'Model_Professional',
      'key_to' => 'id',
      'cascade_save' => false,
      'cascade_delete' => false,
    ),
  );

  protected static $_observers = array(
    'Orm\Observer_CreatedAt' => array(
      'events' => array('before_insert'),
      'mysql_timestamp' => false,
      'property' => 'created_at'
    ),
    'Orm\Observer_UpdatedAt' => array(
      'events' => array('before_save'),
      'mysql_timestamp' => false,
      'property' => 'updated_at'
    ),
  );

  public static function get_by_id($image_id)
  {
    return static::query()->where('id', $image_id)->get_one();
  }

  public function container_name()
  {
    return "logo_{$this->width}x{$this->height}";
  }


}