<?php

class Controller_Home extends Controller_App
{
	public function get_index()
	{

		$this->template->active_nav = 'activity';
		$this->template->body = View::forge('home/index', array(
			
		));
	}


	public function post_subscribe()
	{
		$post = $this->post_data('email');
		empty($post->email) and $this->redirect('', 'info', 'Enter you email address');

		TinyChimp::listSubscribe(array(
			'id'            => '046b807986',
			'email_address' => $post->email,
			'double_optin'  => true,
			'send_welcome'  => true
		));
	}
}