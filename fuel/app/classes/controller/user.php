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



	public function get_process()
	{
		Hybrid_Endpoint::process();
	}



	/**
	 * User authentication with Facebook, Twitter, and Google
	 */
	public function get_auth($provider)
	{
		$provider = strtolower($provider);

		if (! in_array($provider, ['facebook', 'twitter', 'google']))
		{
			$this->redirect('user/login', 'info', 'Invalid service provider');
		}

		// try
		// {
		// 	$login_success = $this->auth->social_auth($provider);
		// }
		// catch (Exception $e)
		// {
		// 	switch ($e->getCode())
		// 	{
		// 		case 0 : $error = "Unspecified error."; break;
		// 		case 1 : $error = "Hybriauth configuration error."; break;
		// 		case 2 : $error = "Provider not properly configured."; break;
		// 		case 3 : $error = "Unknown or disabled provider."; break;
		// 		case 4 : $error = "Missing provider application credentials."; break;
		// 		case 5 : $error = "Authentication failed. The user has canceled the authentication or the provider refused the connection."; break;
		// 		case 6 : $error = "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again."; 
		// 			     $adapter->logout(); 
		// 			     break;
		// 		case 7 : $error = "User not connected to the provider."; 
		// 			     $adapter->logout(); 
		// 			     break;
		// 	}

		// 	// well, basically your should not display this to the end user, just give him a hint and move on..
		// 	$error = "<br /><br /><b>Original error message:</b> " . $e->getMessage(); 
		// 	$error.= "<hr /><pre>Trace:<br />" . $e->getTraceAsString() . "</pre>"; 
		// 	return $error;
		// }

		$login_success = $this->auth->social_auth($provider);

		if (! $login_success)
		{
			$this->redirect('/', 'error', 'An error has occurred');
		}

		$this->redirect('/', 'info', 'You are now logged in');

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

		$this->redirect('/', 'info', 'You are now registered.');
	}



	/**
	 * Forgot password
	 */
	public function get_forgot()
	{
		
	}





	/**
	 *
	 */
	public function get_logout()
	{
		$this->auth->logout();
		$this->redirect('/', 'info', 'You are now logged out');
	}



	


	/**
	 *
	 */
	public function get_activate($user_hash)
	{

	}


	/**
	 * 
	 */
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


	/**
	 * 
	 */
	public function post_invite()
	{
		$post = $this->post_data('emails');
		empty($post->emails) and $this->redirect('', 'info', 'Enter you email address');

		$emails = explode(',', $post->emails);
		foreach ($emails as $email)
		{
			$email = trim($email);

			Service_Email::send(array(
				'type'      => 'invite',
				'to_addr'   => $email,
				'from_name' => 'ItemNation Invite',
				'from_addr' => 'invite@itemnation.com',
				'subject'   => 'You have been invited to ItemNation',
				'body'      => View::forge('emails/invite'),
			));
		}
		
		return Response::forge(json_encode($emails));
	}



	/**
	 * Edit account settings
	 */
	public function get_account()
	{
		$this->require_auth();

		$this->template->body = View::forge('user/account');
	}

	public function post_account()
	{
		$this->require_auth();

		$post = $this->post_data('name', 'email');

		$this->user->display_name = $post->name;
		$this->user->email        = $post->email;
		$this->user->save();

		$this->redirect('user/account', 'success', 'Account info updated');
	}



	/**
	 * Change Password
	 */
	public function get_password()
	{
		$this->require_auth();

		$this->template->body = View::forge('user/password');
	}

	public function post_password()
	{
		$this->require_auth();

		// tmp
		if (empty($this->user->password))
		{
			$this->redirect('user/account', 'error', 'Password empty');
		}

		$post = $this->post_data('current', 'new', 'confirm');

		if ($post->new !== $post->confirm)
		{
			$this->redirect('user/password', 'error', 'Your new password did not match the password confirmation');
		}

		if (! $this->auth->validate_user($this->user->email, $post->current))
		{
			$this->redirect('user/password', 'error', 'Your current password is incorrect');
		}

		if (! $this->auth->change_password($post->current, $post->new))
		{
			$this->redirect('user/password', 'error', 'Your current password is incorrect');
		}

		$this->redirect('user/account', 'success', 'Password changed');
	}
	
}