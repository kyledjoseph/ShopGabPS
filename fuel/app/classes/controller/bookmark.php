<?php

class Controller_Bookmark extends Controller_App
{
	public function before()
	{
		parent::before();
		//Config::set('profiling', false); // not working
	}

	// public function after($response)
	// {
	// 	return Response::forge(json_encode());
	// }


	/**
	 * 
	 */
	public function get_view()
	{
		return Response::forge(View::forge('bookmark/view'));
	}


	/**
	 * 
	 */
	public function get_install()
	{
		return Response::forge(View::forge('bookmark/install', array(
			'url'  => 'http://itemnation.dev/assets/js/bookmark/parent.js',
			'text' => 'Pull-In',
		)));
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
	public function post_login()
	{
		$post = $this->post_data('email', 'password');
		$success = $this->auth->login($post->email, $post->password);

		return Response::forge(json_encode(array('success' => $success)));
	}


	/**
	 * 
	 */
	public function post_register()
	{
		$post = $this->post_data('email', 'password');

		try
		{
			$this->auth->create_user($post->email, $post->password);
		}
		catch (SiteUserUpdateException $e)
		{
			return Response::forge(json_encode(array('success' => 'false', 'message' => $e->getMessage())));
		}

		$this->auth->login($post->email, $post->password);
		return Response::forge(json_encode(array('success' => $success)));
	}


	/**
	 * 
	 */
	public function post_add()
	{
		if (! $this->user_logged_in())
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'auth',
			)));
		}

		$post = $this->post_data('name', 'description', 'domain', 'url', 'images', 'image', 'type', 'forum_name');

		switch ($post->type)
		{
			case 'wish_list':
				break;
			case 'forum':
				break;
			default:
		}

		$product = Model_Product::add_product(array(
			'user_id'     => $this->user->id,
			'name'        => $post->name,
			'description' => $post->description,
			'domain'      => $post->domain,
			'url'         => $post->url,
		));


		$image_src = $post->image['src'];
		
		if (! empty($image_src))
		{
			$product->add_image($image_src);
		}

		return Response::forge(json_encode(array(
			'success'    => true,
			'user_id'    => $product->user_id,
			'product_id' => $product->id,
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