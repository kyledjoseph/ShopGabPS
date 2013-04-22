<?php

class Model_Chat extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'name',
		'description',
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
		)
	);

	protected static $_has_many = array(
		'products' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Chat_Product',
			'key_to' => 'chat_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		)
	);

	// has many users 

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
		return 'chats/' . $this->id;
	}

	public function get_chat_products()
	{
		return Model_Chat_Product::query()->where('chat_id', $this->id)->order_by('created_at', 'asc')->get();
	}




	public static function get_user_chats($user_id)
	{
		return static::query()->where('user_id', $user_id)->order_by('name', 'asc')->get();
	}

	public static function get_user_chat($user_id, $chat_id)
	{
		return static::query()->where('user_id', $user_id)->where('id', $chat_id)->order_by('name', 'asc')->get_one();
	}

	public static function create_chat($user_id, $name, $description)
	{
		$chat = static::forge(array(
			'user_id'     => $user_id,
			'name'        => $name,
			'description' => $description,
		));
		return $chat->save() ? $chat : null;
	}
}