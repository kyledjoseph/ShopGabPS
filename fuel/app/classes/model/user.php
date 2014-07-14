<?php

class Model_User extends Auth\Model\Auth_User {

  const CLIENT_GROUP_ID = 1;
  const PROFESSIONAL_GROUP_ID = 50;

  const STATUS_BANNED = 0;
  const STATUS_PENDING_EMAIL_CONFIRM = 1;
  const STATUS_EMAIL_CONFIRMED = 2;

  /**
   * Cached professional model
   * @var Model_Professional|null
   */
  private $professional_model = null;

  /**
   * Cached client model
   * @var Model_Client|null
   */
  private $client_model = null;


	protected static $_table_name = 'users';
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'email',
    'confirmation_code',
		'status',
    'display_name',
		'last_login',
		'login_hash',
		'profile_fields',
		'reset_code',
    'reset_created_at',
		'welcome_message',
    'receive_notifications',
		'created_at',
		'updated_at'
	);

	protected static $_has_many = array(
		'providers' => array(
			'key_from' => 'id',
			'model_to' => 'Model_User_Provider',
			'key_to' => 'parent_id',
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
		'quest_participations' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Quest_Participant',
			'key_to' => 'user_id',
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
		'friends' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Friend',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		),
		'friends_of' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Friend',
			'key_to' => 'friend_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		),
		'invites' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Invite_Email',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		),
		'notices' => array(
			'key_from' => 'id',
			'model_to' => 'Model_User_Notice',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		),
		'metadata' => array(
			'model_to' => 'Model_User_Metadata',
			'key_from' => 'id',
			'key_to'   => 'user_id',
			'cascade_delete' => true,
		),
    'admins' => array(
      'key_from' => 'id',
      'model_to' => 'Model_Admin',
      'key_to' => 'user_id',
      'cascade_save' => true,
      'cascade_delete' => true,
    ),
    'clients' => array(
      'key_from' => 'id',
      'model_to' => 'Model_Client',
      'key_to' => 'user_id',
      'cascade_save' => true,
      'cascade_delete' => true,
    ),
    'professionals' => array(
      'key_from' => 'id',
      'model_to' => 'Model_Professional',
      'key_to' => 'user_id',
      'cascade_save' => true,
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
			'events' => array('before_save', 'after_insert')
		),
	);

	public static function _init()
	{
		// throw new Exception("Error Processing Request", 1);
	}

	public function _event_after_insert()
	{
	}

	public function _event_before_save()
	{
	}

	/**
	 * User's display name
	 */
	public function display_name()
	{
		// user metadata
		if (isset($this->fullname) and ! empty($this->fullname))
		{
			return $this->fullname;
		}

		// username
		if ($username = $this->username and ! empty($username))
		{
			return $username;
		}
		
		// fallback to email
		return $this->email;
	}

	/**
	 * undefined_method
	 */
	public function is_admin()
	{
    $admin = Model_Admin::query()->where('user_id', $this->id)->get_one();

    if ($admin) {
      return $admin;
    } else {
      return false;
    } // if
	}

	/**
	 * undefined_method
	 */
	public function admin_url($action = 'view')
	{
		return "admin/accounts/{$action}/{$this->id}";
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

	// /**
	//  * undefined_method
	//  */
	// public function metadata($key, $value = null)
	// {
	// 	if (! $key or empty($key))
	// 	{
	// 		throw new Exception("undefined metadata key '{$key}'");
	// 	}

	// 	if (! $value)
	// 	{
	// 		return $this->$key ?: false;
	// 	}

	// 	if (isset($this->$key))
	// 	{
	// 		return $this->$key = $value and $this->save();
	// 	}

	// 	$this->metadata[] = \Auth\Model\Auth_Metadata::forge([
	// 		'parent_id' => $this->get_provider('facebook')->id,
	// 		'key'       => $key,
	// 		'value'     => $value,
	// 		'user_id'   => $this->id,
	// 	])->save();
	// }



	/**
	 * Avatars
	 */
	protected $avatar_sizes = array('200' => '200', '32' => '32');

	public function add_avatar($file)
	{
		$connection = Service_Cloudfiles::get_connection();

		foreach ($this->avatar_sizes as $width => $height)
		{
			$tmp_path        = $file['saved_to'] . $file['saved_as'];
			$file_name       = pathinfo($tmp_path, PATHINFO_FILENAME);
			$new_file_name   = "{$file_name}.png";
			$tmp_resize_path = APPPATH . "tmp/{$width}x{$height}_{$new_file_name}";

			Image::load($file['saved_to'] . $file['saved_as'])
				->crop_resize($width, $height)
				->save($tmp_resize_path);

			$container = $connection->get_container("avatar_{$width}x{$height}");
			$image     = $container->create_object($new_file_name);
			$image->load_from_filename($tmp_resize_path);

			$avatar = new Model_User_Avatar;
			$avatar->user_id              = $this->id;
			$avatar->name                 = $image->name;
			$avatar->public_uri           = $image->public_uri();
			$avatar->public_ssl_uri       = $image->public_ssl_uri();
			$avatar->public_streaming_uri = $image->public_streaming_uri();
			$avatar->width                = $width;
			$avatar->height               = $height;
			$avatar->content_length       = $image->content_length;
			$avatar->save();

			File::delete($tmp_resize_path);
		}

		File::delete($tmp_path);
	}

	/**
	 * undefined_method
	 */
	public function delete_avatars()
	{
		$connection = Service_Cloudfiles::get_connection();

		foreach ($this->get_avatars() as $avatar)
		{
			$container = $connection->get_container($avatar->container_name());
			$container->delete_object($avatar->name);
			$avatar->delete();
		}
	}

	/**
	 * undefined_method
	 */
	public function has_avatars()
	{
		return Model_User_Avatar::query()->where('user_id', $this->id)->count() > 0;
	}

	/**
	 * undefined_method
	 */
	public function get_avatar($width = 32, $height = 32)
	{
		return Model_User_Avatar::query()
			->where('user_id', $this->id)
			->where('width', $width)
			->where('height', $height)
			->get_one();
	}

	/**
	 * undefined_method
	 */
	public function get_avatars()
	{
		return Model_User_Avatar::query()->where('user_id', $this->id)->get();
	}

	/**
	 * undefined_method
	 */
	public function get_avatar_uri($width = 32, $height = 32)
	{
		if ($avatar = $this->get_avatar($width, $height)) {
			return $avatar->public_uri;
		}

		return $this->default_avatar_uri($width, $height);
	}

	/**
	 * undefined_method
	 */
	public function default_avatar_uri($width = 32, $height = 32)
	{
		return Uri::create("assets/img/avatar/default_{$width}x{$height}.png");
	}



	/**
	 * Notices
	 */
	public function has_seen_notice($type)
	{
		return Model_User_Notice::query()->where('user_id', $this->id)->where('type', $type)->count() > 0;
	}

	public function mark_notice_seen($type)
	{
		if ($this->has_seen_notice($type))
		{
			return true;
		}

		$notice = new Model_User_Notice;
		$notice->user_id = $this->id;
		$notice->type    = $type;
		return $notice->save();
	}



	/**
	 * Notifications
	 */
	public function set_notification($type, $send)
	{
		if (! $notification = $this->get_notification($type))
		{
			$notification = new Model_User_Notification;
			$notification->user_id = $this->id;
			$notification->type    = $type;
		}

		$notification->send = ($send ? '1' : '0');
		return $notification->save();
	}

	public function get_notification($type)
	{
		return Model_User_Notification::query()->where('user_id', $this->id)->where('type', $type)->get_one();
	}

	public function receives_notification($type)
	{
		$notification = Model_User_Notification::query()->where('user_id', $this->id)->get_one();

		return (! isset($notification) or $notification->send !== '0');
	}



	/**
	 * Get all user quests
	 */
	public function get_quests()
	{
        if ($this->group == self::PROFESSIONAL_GROUP_ID) {
          $user_ids = array($this->id);
          foreach ($this->getProfessionalModel()->getClients() as $client) {
            $user_ids[] = $client->user_id;
          } // foreach

        } else {
          $user_ids = $this->id;
        } // if
		return Model_Quest::get_user_quests($user_ids);
	}

	/**
	 *
	 */
	public function get_public_quests()
	{
		return Model_Quest::query()->where('user_id', $this->id)->where('is_public', 1)->order_by('name', 'asc')->get();
	}

	/**
	 * Get a users quest by quest_url
   * @return Model_Quest
	 */
	public function get_quest($quest_url)	{
		return Model_Quest::get_user_quest($this->id, $quest_url);
	}

	/**
	 * Create a new quest
	 */
	public function create_quest($name, $description, $purchase_within, $created_by = 0)
	{
		return Model_Quest::create_quest($this->id, $name, $description, $purchase_within, $created_by);
	}

	/**
	 *
	 */
	public function select_quest()
	{
		$options = array();
		foreach ($this->get_quests() as $quest)
		{
			$options[$quest->url] = htmlspecialchars_decode($quest->name, ENT_QUOTES);
		}
		return empty($options) ? array('none' => 'No Quests Available') : $options;
	}

  public function select_clients() {
    $options = array();
    $professional = Model_Professional::getByUserId($this->id);
    foreach ($professional->getClients() as $client) {
      $options[$client->user_id] = $client->getUser()->display_name();
    } // foreach

    return empty($options) ? array('none' => 'No Clients Found') : $options;
  } // select_clients

	/**
	 *
	 */
	public function remove_quest($quest_id)
	{
		$quest = Model_Quest::get_by_id($quest_id);

		if (! $quest->belongs_to_user($this))
		{
			return false;
		}

		return $quest->remove();
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

	/**
	 * undefined_method
	 */
	public function remove()
	{
    $this->delete();
	}


	/**
	 *
	 */
	public static function create_user($info)
	{
		$user = static::forge($info);
		return $user->save() ? $user : false;
	}

  /**
   * Get user object by id
   * @param $id
   * @return Model_user
   */
  public static function get_by_id($id)
	{
		return static::query()->where('id', $id)->get_one();
	}

  /**
   * Get user object by email
   * @param $email
   * @return Model_user
   */
	public static function get_by_email($email)
	{
		return static::query()->where('email', $email)->get_one();
	}

  /**
   * Get user object by reset_code
   * @param $reset_code
   * @return Model_user
   */
	public static function get_by_reset_code($reset_code)
	{
		return static::query()->where('reset_code', $reset_code)->get_one();
	}

  /**
   * Get user object by confirmation_code
   * @param $confirmation_code
   * @return Model_user
   */
  public static function get_by_confirmation_code($confirmation_code)
  {
    return static::query()->where('confirmation_code', $confirmation_code)->get_one();
  }

  /**
   * Send confirmation code by email
   */
  public function send_confirmation_code() {
    $unique = false;
    while (! $unique) {
      $rand   = md5(uniqid(rand(), true));
      $total  = static::query()->where('confirmation_code', $rand)->count();
      $unique = $total == 0;
    } // while

    $this->confirmation_code = $rand;
    $this->save();

    Service_Email::send(array(
      'type'      => 'confirmation_code',
      'to_addr'   => $this->email,
      'from_name' => 'ShopGab',
      'from_addr' => 'info@shopgab.com',
      'subject'   => 'Confirm your ShopGab email',
      'body'      => View::forge('emails/confirm_email', array(
          'confirmation_url' => Uri::create('confirm/'.$this->confirmation_code),
        )),
    ));
  } // send_confirmation_code

  /**
   * Return verbose name of the account
   * @return string
   */
  public function getVerboseAccountType() {
    switch ($this->group) {
      case self::CLIENT_GROUP_ID:
        return 'Client';
        break;
      case self::PROFESSIONAL_GROUP_ID:
        return 'Professional';
        break;
      default:
        return 'Unknown';
    } // switch
  } // getVerboseAccountType

  /**
   * Return parent professional of client
   * @return Model_User|bool
   */
  public function getParentUser() {
    if ($this->group == Model_User::CLIENT_GROUP_ID) {
      $client = Model_Client::getByUserId($this->id);
      return Model_User::get_by_id($client->parent_id);
    } else {
      return false;
    } // if
  } // getParentUser

  /**
   * Return professional model
   * @return Model_Professional
   */
  public function getProfessionalModel() {
    if (!($this->professional_model instanceof Model_Professional)) {
      $this->professional_model = Model_Professional::getByUserId($this->id);
    } // if

    return $this->professional_model;
  } // getProfessionalModel

  /**
   * Return client model
   * @return Model_Professional
   */
  public function getClientModel() {
    if (!($this->client_model instanceof Model_Client)) {
      $this->client_model = Model_Client::getByUserId($this->id);
    } // if

    return $this->client_model;
  } // getClientModel

  public function get_logo_uri($width = 120, $height = 60) {
    if ($this->group == self::CLIENT_GROUP_ID) {
      $professional = Model_Professional::getByUserId($this->getClientModel()->parent_id);
    } else {
      $professional = Model_Professional::getByUserId($this->id);
    } // if

    return $professional->get_logo_uri();
  } // get_logo_uri

}
