<?php

class Model_Chat_Message extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'chat_id',
		'user_id',
		'body',
		'created_at',
		'updated_at',
	);


	protected static $_belongs_to = array(
		'chat' => array(
			'key_from' => 'chat_id',
			'model_to' => 'Model_Chat',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'user' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model_User',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);

	// protected static $_ = array(
	// 	'user' => array(
	// 		'key_from' => 'user_id',
	// 		'model_to' => 'Model_User',
	// 		'key_to' => 'id',
	// 		'cascade_save' => true,
	// 		'cascade_delete' => false,
	// 	)
	// );

	protected static $_has_many = array(
		'votes' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Chat_Product_Vote',
			'key_to' => 'chat_product_id',
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


	public function user_is_owner($user_id)
	{
		return ($this->user_id == $user_id);
	}


	public function time_ago()
	{
		$now = time();
		if ($now - $this->created_at < 60)
		{
			return 'just now';
		}
		return Date::time_ago($this->created_at);
	}


	public static function create_message($chat_id, $user_id, $body)
	{
		$message = static::forge(array(
			'chat_id' => $chat_id,
			'user_id' => $user_id,
			'body'    => $body,
		));
		return $message->save() ? $message : null;
	}

}