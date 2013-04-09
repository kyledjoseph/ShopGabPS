<?php

class Controller_My extends Controller_App
{
	public function before()
	{
		parent::before();
		$this->require_auth();
	}

	public function get_items()
	{
		$products = Model_Product::get_users_products($this->user->id);

		$this->template->active_nav = 'myitems';
		$this->template->body = View::forge('my/items', array(
			'products' => $products,
		));
	}
}