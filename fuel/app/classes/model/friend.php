<?php

class Model_Friend extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'friend_id',
		'friend_name',
		'friend_email',
		'friend_registered',
		'created_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
			'property' => 'created_at',
		),
	);

	protected static $_belongs_to = array(
		'user' => array(
			'key_from'       => 'user_id',
			'model_to'       => 'Model_User',
			'key_to'         => 'id',
			'cascade_save'   => true,
			'cascade_delete' => false,
		),
		'friend' => array(
			'key_from'       => 'friend_id',
			'model_to'       => 'Model_User',
			'key_to'         => 'id',
			'cascade_save'   => true,
			'cascade_delete' => false,
		),
	);

	public function get_friend()
	{
		return $this->friend;
	}
}