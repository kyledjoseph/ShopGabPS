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

  public function get_config($config_name)
  {
    $this->template->body = View::forge('admin/dashboard/config', [
      'config_name' => $config_name,
      'config_value' => configOption($config_name)
    ]);
  } // get_config

  public function post_config($config_name)
  {
    configOption($config_name, $_POST['config_value']);

    $this->redirect('/admin', 'success', 'Config option updated');
  }


	/**
	 * Require admin privileges to access 
	 */
	protected function admin_auth($auth_users = array())
	{
		$this->require_auth();

		$this->admin = Model_Admin::get_by_user_id($this->user->id);

		if (! isset($this->admin))
		{
			$this->redirect('/');
		}
	}

	/**
	 * Require admin permission to perform task
	 */
	public function require_permission($type)
	{
		if (! $this->admin->has_permission($type))
		{
			$this->redirect('admin', 'error', 'You do not have access to do that');
		}
	}

}