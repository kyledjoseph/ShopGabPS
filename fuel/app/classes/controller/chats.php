<?php

class Controller_Chats extends Controller_App
{
	public function before()
	{
		parent::before();

		// user must be logged in to view chats
		$this->require_auth();
		
		// template config
		$this->template->active_nav = 'activity';
	}
	
	/**
	 * Show all chats of the current user
	 */
	public function get_index()
	{
		$this->template->body = View::forge('chats/index', array(
			'chats' => $this->user->get_chats(),
		));
	}


	/**
	 * View chat
	 */
	public function get_view($chat_id)
	{
		$chat = $this->user->get_chat($chat_id);
		
		if (! isset($chat))
		{
			$this->redirect('chats', 'info', 'Invlaid chat');
		}

		Casset::js('lib/jquery.tipTip.minified.js');
		Casset::css('lib/tipTip.css');
		Casset::js('chats.js');

		$this->template->body = View::forge('chats/view', array(
			'chat' => $chat,
			'product_i' => 1,
		));
	}


	/**
	 * Create a new chat
	 */
	public function get_create()
	{
		$this->template->body = View::forge('chats/create', array(
			
		));
	}

	public function post_create()
	{
		$post = $this->post_data('name', 'description');
		$chat = $this->user->create_chat($post->name, $post->description);
		$this->redirect($chat->url(), 'success', 'Chat created.');
	}


	/**
	 *
	 */
	public function post_message()
	{
		$post = $this->post_data('message');

		//$message = $this->
	}


	/**
	 * Like a Chat_Product
	 */
	public function get_like($chat_id, $chat_product_id)
	{
		$chat = $this->user->get_chat($chat_id);
		isset($chat) or $this->redirect('chats', 'info', 'Invlaid chat');

		$chat_product = $chat->get_chat_product($chat_product_id);
		isset($chat_product) or $this->redirect($chat->url(), 'info', 'Invlaid product');

		// has the user already voted?
		if ($chat_product->has_user_voted($this->user->id))
		{
			$this->redirect($chat->url(), 'info', 'You have already voted');
		}
		
		// like the hat product
		$chat_product->like($this->user->id);
		$this->redirect($chat->url());
	}


	/**
	 * Like a Chat_Product
	 */
	public function get_dislike($chat_id, $chat_product_id)
	{
		$chat = $this->user->get_chat($chat_id);
		isset($chat) or $this->redirect('chats', 'info', 'Invlaid chat');

		$chat_product = $chat->get_chat_product($chat_product_id);
		isset($chat_product) or $this->redirect($chat->url(), 'info', 'Invlaid product');

		// has the user already voted?
		if ($chat_product->has_user_voted($this->user->id))
		{
			$this->redirect($chat->url(), 'info', 'You have already voted');
		}
		
		// like the hat product
		$chat_product->dislike($this->user->id);
		$this->redirect($chat->url());
	}

}