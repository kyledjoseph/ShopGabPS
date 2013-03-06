<?php

class Controller_Wishlist extends Controller_App
{
	public function get_index()
	{
		$this->template->active_nav = 'wishlist';
		$this->template->body = View::forge('wishlist/index');
	}
}