<?php

class Controller_Admin extends Controller_App
{
	public $template = 'admin/template';

	public function before()
	{
		parent::before();

		$this->template->active_nav = 'dashboard';
	}

	public function get_index()
	{
		$this->template->body = View::forge('admin/dashboard/index');
	}
}