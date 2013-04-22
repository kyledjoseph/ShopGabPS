<?php

class Model_Product_Image extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'product_id',
		'src_url',
		'src',
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
		)
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

	public function src()
	{
		return $this->src_url;
	}



	public static function add_image($product_id, $src)
	{
		$product_image = static::forge(array(
			'product_id' => $product_id,
			'src_url'    => $src,
		));
		return $product_image->save() ? $product_image : null;
	}
}