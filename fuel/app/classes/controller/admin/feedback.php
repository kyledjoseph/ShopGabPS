<?php

class Controller_Admin_Feedback extends Controller_Admin
{
	public function before()
	{
		parent::before();

		$this->template->active_nav = 'feedback';
	}

	public function get_index()
	{
		$feedbacks = Model_Feedback::query()->order_by('created_at', 'desc')->get();

		$this->template->body = View::forge('admin/feedback/index', [
			'feedbacks' => $feedbacks,
		]);
	}
}