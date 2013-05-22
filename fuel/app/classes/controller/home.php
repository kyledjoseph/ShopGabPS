<?php

class Controller_Home extends Controller_App
{
	public function get_index()
	{
		if (! $this->user_logged_in())
		{
			return Response::forge(View::forge('landing/view'));
		}

		$this->template->active_nav = 'activity';
		$this->template->body = View::forge('dashboard/view', array(
			'chats' => $this->user->get_chats(),
		));
	}
}