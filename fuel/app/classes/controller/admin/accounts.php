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
		$users = Model_User::query()->order_by('created_at', 'desc')->get();

		$this->template->body = View::forge('admin/accounts/index', [
			'users' => $users,
		]);
	}

	public function get_view($user_id)
	{
		$user = Model_User::get_by_id($user_id);

		if (! $user)
		{
			$this->redirect('admin/accounts', 'error', "invalid user id '{$user_id}'");
		}

		$this->template->body = View::forge('admin/accounts/view', [
			'user' => $user,
		]);
	}
}