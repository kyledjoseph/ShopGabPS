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
		$hybridauth = $this->auth->hybridauth_instance();
		$adapter    = $hybridauth->authenticate('facebook');
		$friends    = $adapter->getUserContacts();

		$this->template->body = View::forge('friends/index', array(
			'facebook_friends' => $friends,
		));
	}

}