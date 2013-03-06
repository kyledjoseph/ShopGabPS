<?php

class Controller_My extends Controller_App
{
	public function get_items()
	{
		$this->template->active_nav = 'myitems';
		$this->template->body = View::forge('my/items');
	}
}