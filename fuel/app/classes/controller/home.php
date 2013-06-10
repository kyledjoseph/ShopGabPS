<?php

class Controller_Home extends Controller_App
{
	public function get_index()
	{
		if (! $this->user_logged_in())
		{
			$this->add_modal(View::forge('user/modal/login'));
			$this->add_modal(View::forge('user/modal/register'));

			$this->template->body = View::forge('landing/view', array());
		}

		else
		{
			$this->add_modal(View::forge('user/modal/start_quest'));

			$this->template->body = View::forge('user/dashboard', array(
				'quests' => $this->user->get_quests(),
			));
		}

		
	}
}