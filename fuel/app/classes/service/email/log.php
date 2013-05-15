<?php

class Service_Email_Log extends \Orm\Model
{
	protected static $_table_name = 'log_emails';
	protected static $_properties = array(
		'id',
		'to_name',
		'to_addr',
		'from_name',
		'from_addr',
		'subject',
		'body',
		'created_at',
		'updated_at',
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

	public static function log_event($attr)
	{
		$log = static::forge($attr);
		return $log->save() ? $log : null;
	}
}