<?php

class Controller_Home extends Controller_App
{
	public function get_index()
	{

		$this->template->active_nav = 'activity';
		$this->template->body = View::forge('home/index', array(
			
		));
	}
}