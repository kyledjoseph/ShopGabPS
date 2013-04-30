<?php

class Controller_Home extends Controller_App
{
	public function get_index()
	{

		$this->template->active_nav = 'activity';
		
		if ($this->user_logged_in())
		{
			$this->template->body = View::forge('home/index', array(
				'chats' => $this->user->get_chats(),
			));
		}
		else
		{
			$this->template->body = View::forge('home/public', array());
		}
	}
}