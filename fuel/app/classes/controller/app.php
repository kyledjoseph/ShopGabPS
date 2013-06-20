<?php

class Controller_App extends Controller_Base
{
	public $auth = null;
	public $user = null;

	public function before()
	{
		parent::before();

		$this->_init_auth();
		$this->_init_user();

		if (! Input::is_ajax())
		{
			$this->_init_notice();
			$this->_init_template();
			$this->_init_assets();
		}
	}



	public function user_logged_in()
	{
		return isset($this->user);
	}

	public function require_auth($location = '/')
	{
		if (! $this->user_logged_in())
		{
			$this->redirect($location, 'info', 'You must be logged in to do that.');
		}
	}

	public function add_modal($content)
	{
		$this->template->modal.= $content;
	}




	private function _init_auth()
	{
		$this->auth = Auth::instance();
	}

	private function _init_user()
	{
		if ($this->auth->check())
		{
			$user_id = $this->auth->get_user_id();
			$this->user = Model_User::get_by_id($user_id);
		}
		else
		{
			$this->user = null;
		}
	}

	private function _init_notice()
	{
		foreach (array('error', 'success', 'info') as $type)
		{
			$notice = Session::get_flash($type);

			if (isset($notice))
			{
				$this->template->notice = (object) array('type' => $type, 'message' => $notice);
				break;
			}
		}
	}

	private function _init_template()
	{
		// set global template variables
		$this->template->set_global('user', $this->user, false);

		
		$this->template->view  = new stdClass;
		$this->template->modal = '';

		// site header
		$this->user_logged_in()
			? $this->template->view->header = View::forge('header/user')
			: $this->template->view->header = View::forge('header/guest');

		// login/signup modals
		if (! $this->user_logged_in())
		{
			$this->add_modal(View::forge('user/modal/login'));
			$this->add_modal(View::forge('user/modal/register'));
		}
		

		// enviroment specific
		switch (Fuel::$env)
		{
			case \Fuel::DEVELOPMENT:
				//Casset::js('itemnation_dev.js');
				break;

			default:
				//Casset::js('itemnation.js');
			
		}
	}

	private function _init_assets()
	{
		Casset::css('style.css');
		Casset::js('jquery-typer.js');
		Casset::js('script.js');
		Casset::js('bootstrap/bootstrap-modal.js');
		Casset::js('bootstrap/bootstrap-tab.js');
		Casset::js('bootstrap/bootstrap-dropdown.js');
		Casset::js('bootstrap/bootstrap-button.js');
	}

}