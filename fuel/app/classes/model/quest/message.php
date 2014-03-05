<?php

class Model_Quest_Message extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'quest_id',
		'user_id',
		'body',
		'created_at',
		'updated_at',
	);


	protected static $_belongs_to = array(
		'quest' => array(
			'key_from' => 'quest_id',
			'model_to' => 'Model_Quest',
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
			'model_to' => 'Model_Quest_Product_Vote',
			'key_to' => 'quest_product_id',
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


	public function get_quest()
	{
		return $this->quest;
	}

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


	public static function create_message($quest_id, $user_id, $body)
	{
		$message = static::forge(array(
			'quest_id' => $quest_id,
			'user_id' => $user_id,
			'body'    => $body,
		));
		return $message->save() ? $message : null;
	}

	public static function get_by_id($id)
	{
		return static::query()->where('id', $id)->get_one();
	}
}