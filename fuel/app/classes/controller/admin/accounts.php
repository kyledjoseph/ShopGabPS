<?php

class Controller_Admin_Accounts extends Controller_Admin
{
	public function before()
	{
		parent::before();

		$this->template->active_nav = 'accounts';
	}

	public function get_index()
	{
		$this->template->body = View::forge('admin/accounts/index');
	}
}