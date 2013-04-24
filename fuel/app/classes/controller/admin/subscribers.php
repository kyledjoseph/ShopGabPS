<?php

class Controller_Admin_Subscribers extends Controller_Admin
{

	public function before()
	{
		parent::before();

		$this->template->active_nav = 'subscribers';
	}

	public function get_index()
	{
		$lists = TinyChimp::lists();

		$this->template->body = View::forge('admin/subscribers/index', array(
			'lists' => $lists->data,
		));
	}

}