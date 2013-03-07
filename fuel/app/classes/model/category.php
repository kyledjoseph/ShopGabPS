<?php

class Model_Category extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'url',
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

	public function public_url()
	{
		return 'category/' . $this->url;
	}


	public static function get_index()
	{
		return static::find()->get();
	}
}