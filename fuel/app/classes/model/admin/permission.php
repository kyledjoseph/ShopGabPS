<?php

class Model_Admin_Permission extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'type',
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
		'admin' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model_Admin',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => false,
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

	public static function get_permission_types()
	{
		return array(
			'view_accounts'    => 'View Accounts',
			'edit_accounts'    => 'Edit Accounts',
			'delete_accounts'  => 'Delete Accounts',
			'delete_quests'    => 'Delete Quests',

			'view_subscribers' => 'View Subscribers',
			'view_feedback'    => 'View Feedback',
			'view_logs'        => 'View Logs',
			'view_analytics'   => 'View Analytics',

			'manage_admins'    => 'Manage Admins',
			'manage_servers'   => 'Manage Servers',
			

		);
	}

	public static function get_permission_name($type)
	{
		return static::get_permission_types()[$type];
	}

	public static function is_valid_type($type)
	{
		return in_array($type, array_keys(static::get_permission_types()));
	}

	public static function is_valid_action($action)
	{
		return in_array($action, array('grant', 'revoke'));
	}
}