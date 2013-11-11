<?php

class Model_User_Provider extends \Orm\Model // implements \Auth\UserProviderInterface
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

	protected static $_has_many = array(
		'metadata' => array(
			'model_to' => 'Model_User_Metadata',
			'key_from' => 'id',
			'key_to'   => 'parent_id',
			'cascade_delete' => true,
		),
	);

	protected static $_eav = array(
		'metadata' => array(
			'attribute' => 'key',
			'value' => 'value',
		),
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
		'Orm\\Observer_Self' => array(
			'events' => array('before_save'),
			'property' => 'user_id',
		),
	);

	public function _event_before_save()
	{

		foreach ($this->metadata as $metadata)
		{
			if ($metadata->user_id !== $this->user_id)
			{
				$metadata->user_id = $this->user_id;
			}
		}
	}


	public function update_access_token($access_token, $expires)
	{
		$this->access_token = $access_token;
		$this->expires      = $expires;

		return $this->save();
	}

	public function access_token_set()
	{
		return isset($this->access_token) and ! empty($this->access_token);
	}

	public function access_token_expired()
	{
		return empty($this->expires) or $this->expires < time();
	}

	public function access_token_valid()
	{
		return $this->access_token_set() and ! $this->access_token_expired();
	}




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
		return static::query()->where('provider', $provider)->where('uid', $uid)->get_one();
	}
}