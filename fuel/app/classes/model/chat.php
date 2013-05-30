<?php

class Model_Chat extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'name',
		'description',
		'purchase_within',
		'default_image_id',
		'created_at',
		'updated_at',
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

	protected static $_has_many = array(
		'chat_products' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Chat_Product',
			'key_to' => 'chat_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		),
		'messages' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Chat_Message',
			'key_to' => 'chat_id',
			'cascade_save' => true,
			'cascade_delete' => true,
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

	public function name()
	{
		return ! empty($this->name) ? $this->name : 'no name';
	}
	public function description()
	{
		return ! empty($this->description) ? $this->description : 'no description';
	}

	public function url()
	{
		return 'quest/' . $this->id;
	}

	public function belongs_to_user($user_id)
	{
		return $user_id == $this->user_id;
	}

	public function invite_url()
	{
		return 'quest/invite/' . $this->id;
	}
	
	public function date($format = "r")
	{
		return date($format, $this->created_at);
	}

	public function purchase_within()
	{
		return ! empty($this->purchase_within) ? $this->purchase_within : '0';
	}

	public static function purchase_within_fields()
	{
		return array(
			'0' => 'Not Sure',
			'1' => '1 week',
			'2' => '2 weeks',
			'3' => '3 weeks',
			'4' => '1 month',
			'5' => 'more than 1 month',
		);
	}

	public function default_thumb_url()
	{
		if (isset($this->default_image_id))
		{
			$image = Model_Product_Image::get_by_id($this->default_image_id);

			if (isset($image))
			{
				return $image->thumb();
			}
		}

		foreach ($this->chat_products as $chat_product)
		{
			if ($chat_product->product->has_image())
			{
				$this->default_image_id = $chat_product->product->image->id;
				$this->save();
				return $chat_product->product->thumb();
			}
		}

		return '/assets/img/product-default.png';
	}


	/**
	 * 
	 */
	public function get_chat_products()
	{
		return Model_Chat_Product::query()
			->where('chat_id', $this->id)
			->order_by('created_at', 'asc')->get();
	}

	/**
	 * 
	 */
	public function get_chat_product($chat_product_id)
	{
		return Model_Chat_Product::query()
			->where('chat_id', $this->id)
			->where('id', $chat_product_id)
			->order_by('created_at', 'asc')->get_one();
	}

	/**
	 * 
	 */
	public function add_product($product_id, $added_by = 0)
	{

		$product = Model_Chat_Product::forge(array(
			'chat_id' => $this->id,
			'product_id' => $product_id,
			'added_by' => ($added_by == 0) ? $this->user_id : $added_by,
		));
		return $product->save() ? $product : null;
	}

	/**
	 * 
	 */
	public function new_message($user_id, $message)
	{
		return Model_Chat_Message::create_message($this->id, $user_id, $message);
	}

	public function get_messages()
	{
		return Model_Chat_Message::query()->where('chat_id', $this->id)->order_by('created_at', 'asc')->get();
	}

	public function remove()
	{
		// remove associated images

		return $this->delete();
	}


	public static function get_by_id($chat_id)
	{
		return static::query()->where('id', $chat_id)->get_one();
	}

	public static function get_user_chats($user_id)
	{
		return static::query()->where('user_id', $user_id)->order_by('name', 'asc')->get();
	}

	public static function get_user_chat($user_id, $chat_id)
	{
		return static::query()->where('id', $chat_id)->get_one();
	}

	public static function create_chat($user_id, $name, $description, $purchase_within)
	{
		$chat = static::forge(array(
			'user_id'         => $user_id,
			'name'            => $name,
			'description'     => $description,
			'purchase_within' => $purchase_within,
		));
		return $chat->save() ? $chat : null;
	}
}