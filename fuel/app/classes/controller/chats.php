<?php

class Controller_Chats extends Controller_App
{
	public function before()
	{
		parent::before();

		$this->require_auth();
		
		$this->template->active_nav = 'activity';
	}
	
	public function get_index()
	{
		$this->template->body = View::forge('chats/index', array(
			'chats' => $this->user->get_chats(),
		));
	}


	public function get_view($chat_id)
	{
		$chat = $this->user->get_chat($chat_id);
		
		if (! isset($chat))
		{
			$this->redirect('chats', 'info', 'Invlaid chat');
		}

		$this->template->body = View::forge('chats/view', array(
			'chat' => $chat,
		));
	}

}