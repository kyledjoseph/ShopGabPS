<?php

class Controller_Products extends Controller_App
{
	public function get_index()
	{
		$this->template->body = View::forge('products/index');
	}

	public function get_view()
	{
		
	}
}