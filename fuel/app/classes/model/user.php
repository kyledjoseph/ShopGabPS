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
		'display_name',
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
		),
		'added_chat_products' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Chat_Product',
			'key_to' => 'added_by',
			'cascade_save' => true,
			'cascade_delete' => true,
		),
		'chats' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Chat',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => true,
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
	);


	/**
	 * User's display name
	 */
	public function display_name()
	{
		return empty($this->display_name) ? "Display Name" : $this->display_name;
	}

	/**
	 * User's name
	 */
	public function name()
	{
		return (! empty($this->first_name) and ! empty($this->last_name))
			? "{$this->first_name} {$this->last_name}"
			: null;
	}

	/**
	 * Get user profile picture
	 */
	public function profile_pic($width = 30, $height = 30)
	{
		$fb_auth = $this->user_authentication('facebook');

		if (isset($fb_auth))
		{
			return "https://graph.facebook.com/{$fb_auth->provider_uid}/picture?width={$width}&height={$height}";
		}

		return 'http://placehold.it/24x24'; //default
	}

	/**
	 * Does the user have a password set
	 */
	public function has_password()
	{
		return count($this->password) > 0;
	}

	/**
	 * User registration date
	 */
	public function member_since($format = "d M Y")
	{
		return date($format, $this->created_at);
	}

	/**
	 * Users last login
	 */
	public function last_login($format = "d M Y")
	{
		return date($format, $this->created_at);
	}

	/**
	 * Get all user chats
	 */
	public function get_chats()
	{
		return Model_Chat::get_user_chats($this->id);
	}

	/**
	 * Get a users chat by chat_id
	 */
	public function get_chat($chat_id)
	{
		return Model_Chat::get_user_chat($this->id, $chat_id);
	}

	/**
	 * 
	 */
	public function select_chat()
	{
		$options = array();
		foreach ($this->get_chats() as $chat)
		{
			$options[$chat->id] = $chat->name();
		}
		return empty($options) ? array('none' => 'No Chats Available') : $options;
	}

	/**
	 * Create a new chat
	 */
	public function create_chat($name, $description, $purchase_within)
	{
		return Model_Chat::create_chat($this->id, $name, $description, $purchase_within);
	}

	/**
	 * undocumented class variable
	 */
	public function get_friends()
	{
		return Model_User::query()->order_by('display_name', 'asc')->get();
	}

	/**
	 * undocumented class variable
	 */
	public function select_friends()
	{
		$options = array();
		$options['select'] = 'Select';
		foreach ($this->get_friends() as $friend)
		{
			$options[$friend->id] = $friend->display_name();
		}
		return empty($options) ? array('none' => 'No Friends Available') : $options;
	}

	/**
	 * undocumented class variable
	 */
	public function get_friend_by_id($friend_id)
	{
		return Model_User::query()->where('id', $friend_id)->get_one();
	}


	/**
	 * Authenticate a user with a provider
	 */
	public function authenticate_with($user_info)
	{
		$user_auth = Model_User_Auth::create_user_auth($this, $user_info);
	}

	/**
	 * Get all user authentications
	 */
	public function user_authentications()
	{
		return $this->authentications;
	}

	/**
	 * Get the user authentication for a specific provider
	 */
	public function user_authentication($provider)
	{
		return Model_User_Auth::get_by_user_and_provider($this->id, $provider);
	}

	/**
	 * Is user authenticated with auth provider
	 */
	public function is_authenticated_with($provider)
	{
		$auth = Model_User_Auth::get_by_user_and_provider($this->id, $provider);
		return isset($auth->id);
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