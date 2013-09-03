<?php

class Model_Admin extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
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
		),
	);

	protected static $_has_many = array(
		'permissions' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model_Admin_Permission',
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


	public function admin_url()
	{
		return 'admin/admins/view/' . $this->user_id;
	}

	public function has_permission($type)
	{
		if (! Model_Admin_Permission::is_valid_type($type))
		{
			throw new Exception("Invalid permission type '$type'");
		}

		$count = Model_Admin_Permission::query()->where('user_id', $this->user_id)->where('type', $type)->count();
		return $count > 0;
	}

	public function grant_permission($type)
	{
		if (! Model_Admin_Permission::is_valid_type($type))
		{
			throw new Exception("Invalid permission type '$type'");
		}

		$permission = Model_Admin_Permission::forge(array(
			'user_id' => $this->user_id,
			'type'    => $type,
		));

		return $permission->save();
	}

	public function revoke_permission($type)
	{
		if (! Model_Admin_Permission::is_valid_type($type))
		{
			throw new Exception("Invalid permission type '$type'");
		}
		
		$permission = Model_Admin_Permission::query()->where('user_id', $this->user_id)->where('type', $type)->get_one();
		return $permission->delete();
	}

	public function grant_all_permissions()
	{
		
	}

	public function revoke_all_permissions()
	{
		
	}


	public static function get_by_user_id($user_id)
	{
		return static::query()->where('user_id', $user_id)->get_one();
	}

	public static function get_all()
	{
		return static::query()->order_by('created_at', 'desc')->get();
	}
}