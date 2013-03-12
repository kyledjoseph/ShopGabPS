<?php

class Controller_App extends Controller_Base
{

	public function before()
	{
		parent::before();

		$this->_init_auth();
		$this->_init_user();
		$this->_init_notice();

		if (! Input::is_ajax())
		{
			$this->_init_template();
		}
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

}