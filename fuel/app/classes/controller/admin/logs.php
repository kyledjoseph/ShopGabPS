<?php

class Controller_Admin_Logs extends Controller_Admin
{
	public function before()
	{
		parent::before();

		$this->template->active_nav = 'logs';
		$this->template->page_nav   = View::forge('admin/logs/nav');
	}

	public function get_index()
	{
		$this->template->page_nav->active = 'index';
		$this->template->body = View::forge('admin/logs/index');
	}


	public function action_errors($year = null, $month = null, $day = null)
	{
		$date = date("Y/m/d");
		$input = file(APPPATH . '/logs/' . $date . '.php');

		$this->template->page_nav->active = 'errors';
		$this->template->body = View::forge('admin/logs/errors', array(
			'logs' => array_reverse($input),
		));
	}


	public function get_email()
	{
		$emails = Service_Email_Log::query()->order_by('created_at', 'desc')->get();

		$this->template->page_nav->active = 'email';
		$this->template->body = View::forge('admin/logs/email', array(
			'emails' => $emails,
		));
	}


	public function get_bookmark()
	{
		$errors = Model_Log_Bookmark_Error::query()->order_by('created_at', 'desc')->get();

		$this->template->page_nav->active = 'bookmark';
		$this->template->body = View::forge('admin/logs/bookmark', array(
			'errors' => $errors,
		));
	}

}