<?php

class Model_Product extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'category_id',
		'name',
		'description',
		'domain',
		'url',

		'brand',
		'model',
		'serial',
		'warranty',
		'type',
		'dimensions',
		'weight',
		
		'created_at',
		'updated_at',
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



	public static function get_index()
	{
		return static::find()->order_by('name', 'asc')->get();
	}
	
	public static function add_product($attr)
	{
		$product = static::forge($attr);
		return $product->save() ? $product : null;
	}

}