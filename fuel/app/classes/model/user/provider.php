<?php

class Model_User_Provider extends \Orm\Model
{
	protected static $_table_name = 'users_providers';
	protected static $_properties = array(
		'id',
		'parent_id',
		'provider',
		'uid',
		'secret',
		'access_token',
		'expires',
		'refresh_token',
		'user_id',
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
		'user' => array(
			'key_from' => 'parent_id',
			'model_to' => 'Model_User',
			'key_to' => 'id',
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

	public static function get_by_id($id)
	{
		return static::query()->where('id', $id)->get_one();
	}

	public static function get_by_user_id($user_id)
	{
		return static::query()->where('parent_id', $user_id)->get_one();
	}

	public static function get_by_user_and_provider($user_id, $provider)
	{
		return static::query()->where('parent_id', $user_id)->where('provider', $provider)->get_one();
	}

	public static function get_by_provider_uid($provider, $uid)
	{
		return static::query()->where('provider', $provider)->where('provider_uid', $uid)->get_one();
	}
}