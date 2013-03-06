<?php

class Controller_Home extends Controller_App
{
	public function get_view()
	{
		$this->template->body = View::forge('home/view');
	}
}