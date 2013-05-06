<?php

class Controller_Admin extends Controller_App
{
	public $template = 'admin/template';

	public function before()
	{
		parent::before();

		$this->admin_auth();
		$this->template->active_nav = 'dashboard';
	}

	public function get_index()
	{
		$this->template->body = View::forge('admin/dashboard/index');
	}


	/**
	 * Require admin privileges to access 
	 */
	protected function admin_auth($auth_users = array())
	{
		$this->require_auth();
		
		$super_admins = array('4');
		if (in_array($this->user->id, $super_admins))
		{
			return true;
		}

		if (empty($auth_users) or ! in_array($this->user->id, $auth_users))
		{
			$this->redirect('user/login', 'info', 'You must be logged in to do that.');
		}
	}

}