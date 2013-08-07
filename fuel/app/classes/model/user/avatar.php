<?php

class Model_User_Avatar extends \Orm\Model
{
	protected static $_table_name = 'user_avatars';

	protected static $_properties = array(
		'id',
		'user_id',
		'name',
		'public_uri',
		'public_ssl_uri',
		'public_streaming_uri',
		'width',
		'height',
		'content_length',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
			'property' => 'created_at',
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
			'property' => 'updated_at',
		),
	);

	public function container_name()
	{
		return "avatar_{$this->width}x{$this->height}";
	}
}