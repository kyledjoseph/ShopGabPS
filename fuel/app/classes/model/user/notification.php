<?php

class Model_User_Notification extends \Orm\Model
{
	protected static $_table_name = 'users_notifications';
	
	protected static $_properties = array(
		'id',
		'user_id',
		'model_id',
		'model',
		'event',
		'viewed_at',
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
		'user' => array(
			'key_from'       => 'user_id',
			'model_to'       => 'Model_User',
			'key_to'         => 'id',
			'cascade_save'   => true,
			'cascade_delete' => false,
		),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events'             => array('before_insert'),
			'mysql_timestamp'    => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events'             => array('before_save'),
			'mysql_timestamp'    => false,
		),
	);


	public static function forge_from($model, $event, Model_User $user)
	{
		if (! isset($model->id))
		{
			throw new Exception("Cannot create new notification with undefined model id, has the model been saved?");
		}

		$notification = new static;
		$notification->event    = $event;
		$notification->model    = get_class($model);
		$notification->model_id = $model->id;
		$notification->user_id  = $user->id;
		
		return $notification;
	}

}