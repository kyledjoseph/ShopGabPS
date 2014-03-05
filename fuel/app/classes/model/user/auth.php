<?php

class Model_User_Auth extends \Orm\Model
{
	protected static $_table_name = 'user_auths';
	protected static $_properties = array(
		'id',
		'user_id',
		'provider',
		'provider_uid',
		'email',
		'display_name',
		'first_name',
		'last_name',
		'profile_url',
		'website_url',
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
		'user' => array(
			'key_from' => 'user_id',
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



	public static function create_user_auth(Model_User $user, Array $user_info)
	{
		$user_auth = static::forge([
			'user_id'      => $user->id,
			'email'        => $user->email,
			'provider'     => $user_info['provider'],
			'provider_uid' => $user_info['provider_uid'],
			'display_name' => $user_info['display_name'],
			'profile_url'  => $user_info['profile_url'],
			'website_url'  => $user_info['website_url'],
		]);
		//$user_data->photoURL
		return $user_auth->save() ? $user_auth : false;
	}

	public static function get_by_id($id)
	{
		return static::query()->where('id', $id)->get_one();
	}

	public static function get_by_user_id($user_id)
	{
		return static::query()->where('user_id', $user_id)->get_one();
	}

	public static function get_by_user_and_provider($user_id, $provider)
	{
		return static::query()->where('user_id', $user_id)->where('provider', $provider)->get_one();
	}

	public static function get_by_provider_uid($provider, $uid)
	{
		return static::query()->where('provider', $provider)->where('provider_uid', $uid)->get_one();
	}
}