<?php

class Controller_Bookmark extends Controller_App
{
	public function before()
	{
		parent::before();
		//Config::set('profiling', false); // not working
	}

	public function get_view()
	{
		return Response::forge(View::forge('bookmark/view'));
	}

	public function get_install()
	{
		return Response::forge(View::forge('bookmark/install', array(
			'url'  => 'http://beta.itemnation.com/assets/js/bookmark/parent.js',
			'text' => 'ItemNation',
		)));
	}

	public function get_add()
	{
		if (! $this->user_logged_in())
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'auth',
			)));
		}

		$post = $this->get_data('name', 'description', 'domain', 'url', 'images');

		$product = Model_Product::add_product(array(
			'user_id'     => $this->user->id,
			'name'        => $post->name,
			'description' => $post->description,
			'domain'      => $post->domain,
			'url'         => $post->url,
		));

		return Response::forge(json_encode(array(
			'success'    => true,
			'user_id'    => $product->user_id,
			'product_id' => $product->id,
		)));
	}
}