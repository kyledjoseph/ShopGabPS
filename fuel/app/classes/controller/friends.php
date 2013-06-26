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


	public function post_add()
	{
		$email = Input::post('email');

		$user = Model_User::get_by_email($email);

		if (! isset($user))
		{
			$this->redirect('friends', 'info', 'user does not exist');
		}

		if ($this->user->is_friend($user->id))
		{
			$this->redirect('friends', 'info', 'already friends');
		}

		$this->user->add_friend($user);
		$this->redirect('friends', 'success', 'friend added');
	}

}