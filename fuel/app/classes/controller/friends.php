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
		$this->add_modal(View::forge('user/modal/start_quest'));
		
		$this->template->body = View::forge('friends/index', array(
			'friends_quests' => $this->user->get_friends_quests(),
		));
	}

	public function get_view($friend_id)
	{
		$friendship = $this->user->get_friendship_by_id($friend_id);

		if (! isset($friendship))
		{
			$this->redirect('friends', 'error', 'You are not friends with this user');
		}

		$this->template->body = View::forge('friends/index', array(
			'friends_quests' => $friendship->friend->get_public_quests(),
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


	/**
	 * Hide friend
	 */
	public function get_hide($friend_id)
	{
		$friendship = $this->user->get_friendship_by_id($friend_id);

		if (! isset($friendship))
		{
			$this->redirect('friends', 'error', 'You are not friends with this user');
		}

		$friendship->hide();

		$this->redirect('friends', 'info', 'Friend removed');
	}

}