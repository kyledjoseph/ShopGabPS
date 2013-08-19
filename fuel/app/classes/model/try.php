<?php

class Model_Try extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'email',
		'created_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
	);

	public function date($format = "r")
	{
		return date($format, $this->created_at);
	}

	public static function get_all()
	{
		return static::query()->where('email', '!=', '')->order_by('created_at', 'desc')->get();
	}

	public static function add_address($email)
	{
		$try = static::forge(array(
			'email' => $email,
		));

		return $try->save() ? $try : null;
	}

}