<?php

class Controller_Bookmark extends Controller_App
{
	public function get_view()
	{
		return Response::forge(View::forge('bookmark/view', array(

		)));
	}

	public function get_add()
	{
		if (! $this->user_logged_in())
		{
			return json_encode(array(
				'success' => false,
				'type'    => 'auth',
			));
		}

		$post = $this->get_data('title', 'description', 'image');

		$product = Model_Product::add_product(array(
			'user_id'     => $this->user->id,
			'name'        => $post->name,
			'description' => $post->description,
		));

		return json_encode(array(
			'success'     => true,
			'user_id'     => $product->user_id,
			'title'       => $product->title,
			'description' => $product->description,
			'image'       => $product->image,
		));
	}
}