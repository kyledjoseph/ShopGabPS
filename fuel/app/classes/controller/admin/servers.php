<?php

class Controller_Admin_Servers extends Controller_Admin
{

	public function before()
	{
		parent::before();

		$this->template->active_nav = 'servers';
	}
	
	public function get_index()
	{
		$this->template->body = View::forge('admin/servers/index');
	}
}