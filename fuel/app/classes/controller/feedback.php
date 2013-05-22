<?php

class Controller_Feedback extends Controller_App
{
	// public function get_index()
	// {
	// 	$this->template->body = View::forge('feedback/index');
	// }

	public function post_index()
	{
		$post = $this->post_data('user_email', 'referral_url', 'feedback');

		if (isset($this->user))
		{
			$user_email = $this->user->email;
		}
		else
		{
			$user_email = $post->user_email;
		}

		$feedback = Model_Feedback::create_feedback(array(
			'user_id'      => isset($this->user) ? $this->user->id : null,
			'user_email'   => $user_email,
			'referral_url' => $post->referral_url,
			'feedback'     => $post->feedback,
		));

		$this->redirect('/', 'success', 'We appreciate your feedback!');
	}
}