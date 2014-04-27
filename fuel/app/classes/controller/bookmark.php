<?php

class Controller_Bookmark extends Controller_App
{
	public $template = 'bookmark/template';

	public function before()
	{
		parent::before();

		if (! Input::is_ajax())
		{
			$child_js = File::file_info(DOCROOT . 'assets/js/bookmark/child.js');
			$this->template->last_modified = $child_js['time_modified'];
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

	/**
	 * 
	 */
	public function get_test()
	{
		return View::forge('bookmark/test');
	}

	/**
	 * 
	 */
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

		$post = $this->post_data(
			'name', 'description', 'price', 'domain', 'url', 'images',
			'add_to', 'client_id', 'client_quest_url', 'new_quest_name', 'my_quest_url');


		if (! in_array($post->add_to, array('my', 'client', 'new'))) {
			return array('success' => true, 'message' => 'invalid_product_destination');
		} // if

		// create product
		$product = Model_Product::add_product(array(
			'user_id'     => $this->user->id,
			'name'        => $post->name,
			'description' => $post->description,
			'price'       => $post->price,
			'domain'      => $post->domain,
			'url'         => $post->url,
		));

		// product images
		if (! empty($post->images))
		{
			$product->add_image($post->images);
		}

		// 
		switch ($post->add_to) {
			case 'my':
				
				$quest = $this->user->get_quest($post->my_quest_url);
				if (! isset($quest)) {
					return array('success' => true, 'message' => 'invalid_quest_id');
				}

				$quest->add_product($product);
				break;

			case 'client':

				$client = Model_Client::getByUserId($post->client_id);
				if (!($client instanceof Model_Client)) {
					return array('success' => true, 'message' => 'invalid_client_id');
				} // if

				$quest = $client->getUser()->get_quest($post->client_quest_url);
				if (! isset($quest)) {
					return array('success' => true, 'message' => 'invalid_client_quest_id');
				}
        $quest->add_product($product, $this->user->id);
				break;

			case 'new':

				$quest = $this->user->create_quest($post->new_quest_name, '', '0');
				$quest->add_product($product);
				break;
				
			default:
				return array('success' => true, 'message' => 'invalid_product_destination');
		} // switch

		return array(
			'success'    => true,
			'user_id'    => $product->user_id,
			'product_id' => $product->id,
		);
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

	/**
	 * 
	 */
	public function get_auth()
	{
		$opauth = Auth_Social::forge([
			'provider'     => 'Facebook',
			'callback_url' => Uri::create('bookmark/callback'),
			'path'         => '/bookmark/auth/',
		]);
	}

	public function get_callback()
	{
		$opauth = Auth_Social::forge(false);

		if (! $user = $opauth->login())
		{
			throw new Exception("Error Processing Request", 1);
		}

		$this->redirect('bookmark/view');
	}

	/**
	 * 
	 */
	public function get_login_check()
	{
		return array('logged_in' => $this->user_logged_in());
	}

	/**
	 * 
	 */
	public function post_log()
	{
		$post = $this->post_data('url', 'error');
		$success = Model_Log_Bookmark_Error::log_error($post->url, $post->error);
		return Response::forge(array('success' => $success));
	}

	/**
	 * 
	 */
	public function get_client_quests($client_id)
	{
		if (! $this->user_logged_in()) {
			return array('success' => false, 'type' => 'invalid_client_id');
		} // if

		$client = Model_Client::getByUserId($client_id);

		if (!($client instanceof Model_Client)) {
			return array('success' => false, 'type' => 'invalid_client_id');
		} // if

		return array('success' => true, 'quests' => $client->getUser()->select_quest());
	} // get_client_quests
	
	/**
	 * 
	 */
	public function get_forums()
	{
		if (! $this->user_logged_in())
		{
			return array('success' => false, 'type' => 'auth',);
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

		return array(
			'success' => true,
			'forums'  => $output,
		);
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

		return array('id' => $forum->id, 'name' => $forum->name);
	}

}