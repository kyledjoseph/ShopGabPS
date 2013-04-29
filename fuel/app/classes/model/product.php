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

	protected static $_belongs_to = array(
		'chat' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Chat_Product',
			'key_to' => 'product_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

	protected static $_has_one = array(
		'image' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Product_Image',
			'key_to' => 'product_id',
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


	public function name()
	{
		return $this->name;
	}

	public function description()
	{
		return $this->description;
	}

	public function url()
	{
		return '#';
	}

	public function product_url()
	{
		return $this->url;
	}

	public function image()
	{
		return is_object($this->image) ? $this->image->src() : null;
	}

	public function image_html()
	{
		return Html::img($this->image(), array('alt' => $this->name()));
	}

	public function add_image($src)
	{
		$product_image = Model_Product_Image::add_image($this->id, $src);
		return $product_image;
	}

	public static function get_index()
	{
		return static::query()->order_by('name', 'asc')->get();
	}
	
	public static function add_product($attr)
	{
		$product = static::forge($attr);
		return $product->save() ? $product : null;
	}

	public static function get_users_products($user_id)
	{
		return static::query()->where('user_id', $user_id)->get();
	}

}