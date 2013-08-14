<?php

class Model_Product_Image extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'product_id',
		'name',
		'src',     // deprecated
		'src_url',
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
			'key_from' => 'product_id',
			'model_to' => 'Model_Product',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);	



	public static function get_by_id($image_id)
	{
		return static::query()->where('id', $image_id)->get_one();
	}


}