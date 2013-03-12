<?php

class Controller_User extends Controller_App
{

	/**
	 * User Login
	 */
	public function get_login()
	{
		$this->template->body = View::forge('user/login');
	}

	public function post_login()
	{
		$post = $this->post_data('email', 'password', 'remember');
		$remember_user = ($post->remember == 'true');

		// attempt login
		$login_success = $this->auth->login($post->email, $post->password);

		if (! $login_success)
		{
			$this->redirect('user/login', 'error', 'Invalid login.');
		}

		$this->redirect('/', 'success', 'You are now logged in.');
	}


	/**
	 * User Registration
	 */
	public function get_register()
	{
		$this->template->body = View::forge('user/register');
	}

	public function post_register()
	{
		$post = $this->post_data('email', 'password');

		// register user
		$registration_success = $this->auth->create_user($post->email, $post->password);

		if (! $registration_success)
		{
			$this->redirect('user/register', 'error', 'Invalid email or password.');
		}

		// log user in
		$this->auth->login($post->email, $post->password);

		$this->redirect('/', 'success', 'You are now registered.');
	}



	/**
	 *
	 */
	public function get_logout()
	{
		$this->auth->logout();
	}



	/**
	 * 
	 */
	public function get_forgot()
	{
		
	}


	/**
	 *
	 */
	public function get_activate($user_hash)
	{

	}

	
}