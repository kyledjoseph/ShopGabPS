<?php

class Controller_App extends Controller_Base
{

	public function before()
	{
		parent::before();

		$this->_init_notice();
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

}