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
		$subscribers = Model_Try::get_all();

		$this->template->body = View::forge('admin/subscribers/index', array(
			'subscribers' => $subscribers,
		));
	}


	public function get_mailchimp()
	{
		$lists = TinyChimp::lists();

		$this->template->body = View::forge('admin/subscribers/mailchimp', array(
			'lists' => $lists->data,
		));
	}

}