<?php

class Controller_Bookmark extends Controller_App
{
	public function get_view()
	{
		return Response::forge(View::forge('bookmark/view', array(

		)));
	}

	public function post_add()
	{
		$post = $this->post_data('title', 'description', 'image');

		return $post;
	}
}