<?php

class Controller_Admin_Admins extends Controller_Admin
{
	public function before()
	{
		parent::before();

		$this->require_permission('manage_admins');


		$this->template->active_nav = 'admins';
	}

	public function _get_admin($user_id)
	{
		$user = Model_Admin::get_by_user_id($user_id);

		if (! $user)
		{
			$this->redirect('admin/admins', 'error', "invalid admin user id '{$user_id}'");
		}

		return $user;
	}


	/**
	 * Admin index
	 */
	public function get_index()
	{
		$admins = Model_Admin::get_all();

		$this->template->body = View::forge('admin/admins/index', [
			'admins' => $admins,
		]);
	}


	/**
	 * View an admin
	 */
	public function get_view($user_id)
	{
		$admin = $this->_get_admin($user_id);

		$this->template->body = View::forge('admin/admins/view', [
			'admin' => $admin,
		]);
	}


	/**
	 * Grant or revoke admin permissions
	 */
	public function get_permission($action, $user_id, $type)
	{
		$admin = $this->_get_admin($user_id);

		if (! Model_Admin_Permission::is_valid_action($action))
		{
			$this->redirect('admin/admins', 'error', 'invalid permission action');
		}

		if (! Model_Admin_Permission::is_valid_type($type))
		{
			$this->redirect('admin/admins', 'error', 'invalid permission type');
		}

		$permission_name = Model_Admin_Permission::get_permission_name($type);

		if ($action == 'grant')
		{
			if ($admin->has_permission($type))
			{
				$this->redirect($admin->admin_url(), "{$admin->user->display_name()} already has permission to '{$permission_name}'");
			}
			else
			{
				$admin->grant_permission($type);
				$this->redirect($admin->admin_url(), "{$admin->user->display_name()} now has permission to '{$permission_name}'");
			}
		}

		if ($action == 'revoke')
		{
			if (! $admin->has_permission($type))
			{
				$this->redirect($admin->admin_url(), "{$admin->user->display_name()} did not have permission to '{$permission_name}'");
			}
			else
			{
				$admin->revoke_permission($type);
				$this->redirect($admin->admin_url(), "{$admin->user->display_name()} permission to '{$permission_name}' is revoked");
			}
		}
	}


	/**
	 * Add an admin
	 */
	public function post_add()
	{
		$email = Input::post('email');
		$user  = Model_User::get_by_email($email);

		if (! isset($user))
		{
			$this->redirect('admin/admins', 'error', "'$email' is not a registered user");
		}

		if ($user->is_admin())
		{
			$this->redirect('admin/admins', 'error', "'$email' is already an admin");
		}

		$admin = Model_Admin::forge(array(
			'user_id' => $user->id,
		));

		$admin->save();

		$this->redirect($admin->admin_url(), 'success', "'$email' added as admin");
	}


	/**
	 *
	 */
	public function get_remove($user_id)
	{
		$admin = $this->_get_admin($user_id);

		$admin->delete();
		$this->redirect('admin/admins', 'success', 'Admin removed');
	}



}