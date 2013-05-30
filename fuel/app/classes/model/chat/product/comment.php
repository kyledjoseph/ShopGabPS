<?php

class Model_Chat_Product_Comment extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'chat_product_id',
		'user_id',
		'comment',
		'created_at',
		'updated_at',
	);


	protected static $_belongs_to = array(
		'chat_product' => array(
			'key_from' => 'chat_product_id',
			'model_to' => 'Model_Chat_Product',
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

	public function time_ago()
	{
		$now = time();
		if ($now - $this->created_at < 60)
		{
			return 'just now';
		}
		return Date::time_ago($this->created_at);
	}


	public static function create_comment($chat_product_id, $user_id, $comment)
	{
		$comment = static::forge(array(
			'chat_product_id' => $chat_product_id,
			'user_id' => $user_id,
			'comment' => $comment,
		));
		return $comment->save() ? $comment : null;
	}

}