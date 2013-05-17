<?php

class Controller_Bookmark extends Controller_App
{
	public $template = 'bookmark/template';

	public function before()
	{
		parent::before();
		
		if (Fuel::$env == 'production')
		{
			$this->domain = 'http://beta.itemnation.com/';
		}
		else
		{
			$this->domain = 'http://itemnation.dev/';
		}

		if (! Input::is_ajax())
		{
			$this->template->domain = $this->domain;
		}

		//Config::set('profiling', false); // not working
	}


	/**
	 * Bookmark
	 */
	public function get_view()
	{
		if (! $this->user_logged_in())
		{
			$this->redirect('bookmark/login');
		}

		$this->template->body = View::forge('bookmark/view', array());
	}

	public function get_test()
	{
		return View::forge('bookmark/test');
	}

	public function get_iframe()
	{
		return View::forge('bookmark/iframe');
	}

	/**
	 * Bookmark Submit
	 */
	public function post_add()
	{
		if (! $this->user_logged_in())
		{
			$this->redirect('bookmark/login');
		}

		$post = $this->post_data('name', 'description', 'domain', 'url', 'images', 'add_to', 'chat_id');

		if (! in_array($post->add_to, array('chat', 'wishlist', 'my_items')))
		{
			throw new Exception("Unknown product destination '{$post->add_to}'");
		}

		// create product
		$product = Model_Product::add_product(array(
			'user_id'     => $this->user->id,
			'name'        => $post->name,
			'description' => $post->description,
			'domain'      => $post->domain,
			'url'         => $post->url,
		));

		// product images
		if (! empty($post->images))
		{
			$product->add_image($post->images);
		}

		// 
		switch ($post->add_to)
		{
			case 'chat':
				
				$chat = $this->user->get_chat($post->chat_id);
				! isset($chat) and $this->redirect('bookmark/view', 'error', 'Not a valid chat');
				$chat->add_product($product->id);

				break;

			case 'wishlist':

				break;

			case 'my_items':

				break;
				
			default:
				throw new Exception("Unknown product destination '{$post->add_to}'");
				
		}

		return Response::forge(json_encode(array(
			'success'    => true,
			'user_id'    => $product->user_id,
			'product_id' => $product->id,
		)));
	}


	/**
	 * Bookmark Install
	 */
	public function get_install()
	{
		return Response::forge(View::forge('bookmark/install'));
	}


	/**
	 * Bookmark User Login
	 */
	public function get_login()
	{
		if ($this->user_logged_in())
		{
			$this->redirect('bookmark/view');
		}

		$this->template->body = View::forge('bookmark/login');
	}

	public function post_login()
	{
		$post    = $this->post_data('email', 'password');
		$success = $this->auth->login($post->email, $post->password);

		if (! $success)
		{
			$this->redirect('bookmark/login', 'error', 'Invalid login.');
		}

		$this->redirect('bookmark/view');
	}

	public function get_auth($provider)
	{
		$provider = strtolower($provider);

		if (! in_array($provider, ['facebook', 'twitter', 'google']))
		{
			$this->redirect('bookmark/login', 'info', 'Invalid service provider');
		}

		$login_success = $this->auth->social_auth($provider);

		if (! $login_success)
		{
			$this->redirect('bookmark/login', 'error', 'An error has occurred');
		}

		$this->redirect('bookmark/view');

	}


	/**
	 * Bookmark User Register
	 */
	public function get_register()
	{
		if ($this->user_logged_in())
		{
			$this->redirect('bookmark/view');
		}
		
		$this->template->body = View::forge('bookmark/register');
	}

	public function post_register()
	{
		$post    = $this->post_data('email', 'password');
		$success = $this->auth->create_user($post->email, $post->password);

		if (! $success)
		{
			$this->redirect('user/register', 'error', 'Invalid email or password.');
		}

		$this->auth->login($post->email, $post->password);
		$this->redirect('/', 'info', 'You are now registered.');
	}

















	/**
	 * 
	 */
	public function get_login_check()
	{
		return Response::forge(json_encode(array('logged_in' => $this->user_logged_in())));
	}


	/**
	 * 
	 */
	public function get_friend_quests($friend_id)
	{
		if (! $this->user_logged_in())
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'auth',
			)));
		}

		$friend = $this->user->get_friend($friend_id);

		if (! isset($friend))
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'invalid_friend_id',
			)));
		}



		return Response::forge(json_encode(array(
			'success' => true,
			'friends'  => $friend->select_chat(),
		)));
	}
	


	/**
	 * 
	 */
	public function get_forums()
	{
		if (! $this->user_logged_in())
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'auth',
			)));
		}

		$forums = Model_Forum::get_by_user_id($this->user->id);
		$output = array();

		foreach ($forums as $forum)
		{
			array_push($output, array(
				'id'   => $forum->id,
				'name' => $forum->name,
			));
		}

		return Response::forge(json_encode(array(
			'success' => true,
			'forums'  => $output,
		)));
	}


	/**
	 *
	 */
	public function post_create_forum()
	{
		$post = $this->post_data('name');

		$forum = Model_Forum::create_forum(array(
			'name' => $post->name,
		));

		return Response::forge(json_encode(array(
			'id'   => $forum->id,
			'name' => $forum->name,
		)));
	}

}