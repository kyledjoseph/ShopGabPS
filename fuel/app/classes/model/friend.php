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

	public function get_friend()
	{
		return Model_User::query()->where('id', $this->friend_id)->get_one();
	}
}