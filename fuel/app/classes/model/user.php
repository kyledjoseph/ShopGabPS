<?php

class Model_User extends \Orm\Model
{
	protected static $_table_name = 'users';
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'email',
		'first_name',
		'last_name',
		'last_login',
		'login_hash',
		'profile_fields',
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


	public function display_name()
	{
		$name = $this->name();
		return empty($name) ? "Display Name" : $name;
	}

	public function name()
	{
		return (! empty($this->first_name) and ! empty($this->last_name))
			? "{$this->first_name} {$this->last_name}"
			: null;
	}

	public function has_password()
	{
		return count($this->password) > 0;
	}

	public function member_since($format = "d M Y")
	{
		return date($format, $this->created_at);
	}

	public function last_login($format = "d M Y")
	{
		return date($format, $this->created_at);
	}

	public function get_chats()
	{
		return Model_Chat::get_user_chats($this->id);
	}

	public function get_chat($chat_id)
	{
		return Model_Chat::get_user_chat($this->id, $chat_id);
	}

	public function create_chat($name, $description)
	{
		return Model_Chat::create_chat($this->id, $name, $description);
	}

	public function authenticate_with($user_info)
	{
		$user_auth = Model_User_Auth::create_user_auth($this, $user_info);
	}

	public function user_authentications()
	{
		return $this->authentications;
	}



	public static function create_user($email, $password, $first_name = null, $last_name = null)
	{
		$user = static::forge([
			'email'      => $email,
			'password'   => $password,
			'first_name' => $first_name,
			'last_name'  => $last_name,
		]);
		return $user->save() ? $user : false;
	}

	public static function get_by_id($id)
	{
		return static::query()->where('id', $id)->get_one();
	}

	public static function get_by_email($email)
	{
		return static::query()->where('email', $email)->get_one();
	}
}