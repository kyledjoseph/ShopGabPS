<?php

class Model_Feedback extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'user_email',
		'referral_url',
		'feedback',
		'created_at',
		'updated_at',
	);

	protected static $_has_many = array(
		'authentications' => array(
			'key_from' => 'id',
			'model_to' => 'Model_User_Auth',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => true,
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


	public static function create_feedback($attr)
	{
		$feedback = static::forge($attr);
		return $feedback->save() ? $feedback : null;
	}
}