<?php

// class Controller_Chats extends Controller_App
// {
// 	public function before()
// 	{
// 		parent::before();

// 		// user must be logged in to view chats
// 		$this->require_auth();
		
// 		// template config
// 		$this->template->active_nav = 'activity';
// 		$this->template->mychats_logo = true;
// 	}


// 	/**
// 	 * 
// 	 */
// 	public function redirect_invalid_quest()
// 	{
// 		$this->redirect('/');
// 	}

	
// 	/**
// 	 * Show all chats of the current user
// 	 */
// 	public function get_index()
// 	{
// 		$this->template->body = View::forge('chats/index', array(
// 			'chats' => $this->user->get_chats(),
// 		));
// 	}


// 	/**
// 	 * View chat
// 	 */
// 	public function get_view($chat_id)
// 	{
// 		$chat = $this->user->get_chat($chat_id);
		
// 		if (! isset($chat))
// 		{
// 			$this->redirect_invalid_quest();
// 		}

// 		Casset::js('lib/jquery.tipTip.minified.js');
// 		Casset::js('lib/jquery.expander.min.js');
// 		Casset::js('chats.js');

// 		Casset::css('lib/tipTip.css');
		

// 		$this->template->body = View::forge('chats/view', array(
// 			'chat' => $chat,
// 			'product_i' => 1,
// 		));
// 	}

// 	public function post_comment($chat_id)
// 	{
// 		$chat = $this->user->get_chat($chat_id);
		
// 		if (! isset($chat))
// 		{
// 			$this->redirect_invalid_quest();
// 		}

// 		$post = $this->post_data('comment', 'chat_product_id');

// 		$chat_product = $chat->get_chat_product($post->chat_product_id);

// 		if (! isset($chat_product))
// 		{
// 			$this->redirect_invalid_quest();
// 		}

// 		$chat_product->add_comment($chat_product->id, $this->user->id, $post->comment);
// 		$this->redirect($chat->url());
// 	}


// 	/**
// 	 * Edit chat
// 	 */
// 	public function get_edit($chat_id)
// 	{
// 		$chat = $this->user->get_chat($chat_id);
		
// 		if (! isset($chat))
// 		{
// 			$this->redirect_invalid_quest();
// 		}

// 		if ($chat->user_id !== $this->user->id)
// 		{
// 			$this->redirect_invalid_quest();
// 		}

// 		$this->template->body = View::forge('chats/edit', array(
// 			'chat' => $chat,
// 		));
// 	}

// 	public function post_edit($chat_id)
// 	{
// 		$chat = $this->user->get_chat($chat_id);
		
// 		if (! isset($chat))
// 		{
// 			$this->redirect_invalid_quest();
// 		}

// 		if ($chat->user_id !== $this->user->id)
// 		{
// 			$this->redirect_invalid_quest();
// 		}

// 		$post = $this->post_data('name', 'description');

// 		$chat->name        = $post->name;
// 		$chat->description = $post->description;
// 		$chat->save();

// 		$this->redirect($chat->url());
// 	}


// 	/**
// 	 * 
// 	 */
// 	public function post_within($chat_id)
// 	{
// 		$chat = $this->user->get_chat($chat_id);
		
// 		if (! isset($chat))
// 		{
// 			$this->redirect($chat->url());
// 		}

// 		if ($chat->user_id !== $this->user->id)
// 		{
// 			$this->redirect($chat->url());
// 		}

// 		$post = $this->post_data('purchase_within');

// 		$chat->purchase_within = $post->purchase_within;
// 		$chat->save();

// 		$this->redirect($chat->url());
// 	}



// 	/**
// 	 *
// 	 */
// 	public function post_invite($chat_id)
// 	{
// 		$chat = $this->user->get_chat($chat_id);
		
// 		if (! isset($chat))
// 		{
// 			$this->redirect_invalid_quest();
// 		}

// 		// if ($chat->user_id !== $this->user->id)
// 		// {
// 		// 	$this->redirect($chat->url());
// 		// }

// 		$post = $this->post_data('to', 'subject', 'description');

// 		$body = $post->description;
// 		$body.= '<br><br>';
// 		$body.= '<a href="http://itemnation.com/'.$chat->url().'">http://itemnation.com/'.$chat->url().'</a>';


// 		Service_Email::send(array(
// 			'type'      => 'quest_invite',
// 			'to_addr'   => $post->to,
// 			'from_name' => 'ItemNation',
// 			'from_addr' => 'info@itemnation.com',
// 			'subject'   => $post->subject,
// 			'body'      => $body,
// 		));

// 		$this->redirect($chat->url(), 'info', "Invitation to '{$post->to}' has been sent");
// 	}




// 	/**
// 	 * Delete a chat
// 	 */
// 	public function get_delete($chat_id)
// 	{
// 		$chat = $this->user->get_chat($chat_id);
		
// 		if (! isset($chat))
// 		{
// 			$this->redirect_invalid_quest();
// 		}

// 		if ($chat->user_id !== $this->user->id)
// 		{
// 			$this->redirect_invalid_quest();
// 		}

// 		$chat->delete();
// 		$this->redirect($chat->url());
// 	}




// 	/**
// 	 * Create a new chat
// 	 */
// 	public function get_create()
// 	{
// 		$this->template->body = View::forge('chats/create', array(
			
// 		));
// 	}

// 	public function post_create()
// 	{
// 		$post = $this->post_data('name', 'description', 'purchase_within');
// 		$chat = $this->user->create_chat($post->name, $post->description, $post->purchase_within);
// 		$this->redirect($chat->url());
// 	}


// 	/**
// 	 *
// 	 */
// 	public function post_message($chat_id)
// 	{
// 		$chat = $this->user->get_chat($chat_id);
// 		isset($chat) or $this->redirect_invalid_quest();

// 		$post = $this->post_data('message');

// 		$chat->new_message($this->user->id, $post->message);
// 		$this->redirect($chat->url());
// 		//$message = $this->
// 	}


// 	/**
// 	 * Like a Chat_Product
// 	 */
// 	public function get_like($chat_id, $chat_product_id)
// 	{
// 		$chat = $this->user->get_chat($chat_id);
// 		isset($chat) or $this->redirect_invalid_quest();

// 		$chat_product = $chat->get_chat_product($chat_product_id);
// 		isset($chat_product) or $this->redirect($chat->url(), 'info', 'Invalid product');

// 		// has the user already voted?
// 		if ($chat_product->has_user_voted($this->user->id))
// 		{
// 			$this->redirect($chat->url(), 'info', 'You have already voted');
// 		}
		
// 		// like the hat product
// 		$chat_product->like($this->user->id);
// 		$this->redirect($chat->url());
// 	}


// 	/**
// 	 * Like a Chat_Product
// 	 */
// 	public function get_dislike($chat_id, $chat_product_id)
// 	{
// 		$chat = $this->user->get_chat($chat_id);
// 		isset($chat) or $this->redirect_invalid_quest();

// 		$chat_product = $chat->get_chat_product($chat_product_id);
// 		isset($chat_product) or $this->redirect($chat->url(), 'info', 'Invalid product');

// 		// has the user already voted?
// 		if ($chat_product->has_user_voted($this->user->id))
// 		{
// 			$this->redirect($chat->url());
// 		}
		
// 		// like the hat product
// 		$chat_product->dislike($this->user->id);
// 		$this->redirect($chat->url());
// 	}

// }