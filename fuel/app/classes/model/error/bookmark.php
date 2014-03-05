<?php

class Model_Error_Bookmark extends \Orm\Model
{
	protected static $_table_name = 'users';
	protected static $_properties = array(
		'id',
		'url',
		'error',
		'created_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
	);

	public static function log_error($url, $error)
	{
		$error = static::forge(array(
			'url'   => $url,
			'error' => $error,
		));
		return $error->save();
	}
}