<?php

class Controller_Friends extends Controller_App
{
	public function before()
	{
		parent::before();

		//$this->require_auth();
	}


	public function get_index()
	{
		

		$this->template->body = View::forge('friends/index', array(
			
		));
	}

}