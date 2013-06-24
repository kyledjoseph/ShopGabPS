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
		'reset_code',
		'reset_created_at',
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
		'quest_products' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Quest_Product',
			'key_to' => 'added_by',
			'cascade_save' => true,
			'cascade_delete' => true,
		),
		'quest_product_comments' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Quest_Product_Comment',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		),
		'quest_product_votes' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Quest_Product_Vote',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		),
		'quests' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Quest',
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

		return (isset($this->display_name) and ! empty($this->display_name)) ? $this->display_name : $this->email;
	}

	/**
	 * User's name
	 */
	// public function name()
	// {
	// 	return (! empty($this->first_name) and ! empty($this->last_name))
	// 		? "{$this->first_name} {$this->last_name}"
	// 		: null;
	// }

	/**
	 * Get user profile picture
	 */
	public function profile_pic($width = 32, $height = 32)
	{
		$fb_auth = $this->user_authentication('facebook');

		if (isset($fb_auth->id))
		{
			return "https://graph.facebook.com/{$fb_auth->provider_uid}/picture?width={$width}&height={$height}";
		}

		return '/assets/img/default/user/' . $width . 'x' . $height . '.png';
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
		return date($format, $this->last_login);
	}

	/**
	 * Get all user quests
	 */
	public function get_quests()
	{
		return Model_Quest::get_user_quests($this->id);
	}

	/**
	 * Get a users quest by quest_url
	 */
	public function get_quest($quest_url)
	{
		return Model_Quest::get_user_quest($this->id, $quest_url);
	}

	/**
	 * Create a new quest
	 */
	public function create_quest($name, $description, $purchase_within)
	{
		return Model_Quest::create_quest($this->id, $name, $description, $purchase_within);
	}

	/**
	 * 
	 */
	public function select_quest()
	{
		$options = array();
		foreach ($this->get_quests() as $quest)
		{
			$options[$quest->url] = $quest->name();
		}
		return empty($options) ? array('none' => 'No Quests Available') : $options;
	}

	/**
	 * 
	 */
	public function remove_quest($quest_id)
	{
		$quest = Model_Quest::get_by_id($quest_id);

		if (! $quest->belongs_to_user($this->id))
		{
			return false;
		}

		return $quest->remove();
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



	/**
	 * Generate a new password reset
	 */
	public function generate_reset_code()
	{
		$unique = false;
		while (! $unique)
		{
			$rand   = md5(uniqid(rand(), true));
			$total  = static::query()->where('reset_code', $rand)->count();
			$unique = $total == 0;
		}

		$this->reset_code = $rand;
		$this->reset_created_at = time();
		$this->save();
	}

	/**
	 * Validate a password reset code
	 */
	public function is_reset_code_valid()
	{
		$code    = $this->reset_code;
		$time    = $this->reset_created_at;
		$timeout = $time + (60 * 60 * 24 * 7); // 7 days

		if (! isset($code) or empty($code))
		{
			return false;
		}

		// reset expired
		if (! isset($time) or $timeout < time())
		{
			$this->empty_reset_code();
			return false;
		}

		return true;
	}

	/**
	 * Empty reset code
	 */
	public function empty_reset_code()
	{
		$this->reset_code = null;
		$this->reset_created_at = null;
		$this->save();
	}


	public function remove()
	{
		return $this->delete();
	}





	/**
	 * 
	 */
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

	public static function get_by_rest_code($reset_code)
	{
		return static::query()->where('reset_code', $reset_code)->get_one();
	}

}