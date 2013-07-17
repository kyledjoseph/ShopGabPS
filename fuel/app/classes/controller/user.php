<?php

class Controller_User extends Controller_App
{
	
	/**
	 * User Login
	 */
	public function get_login()
	{
		$this->redirect('/');
		$this->template->body = View::forge('user/login');
	}

	public function post_login()
	{
		if (! Input::is_ajax())
		{
			$this->redirect('/');
		}

		$post     = $this->post_data('email', 'password', 'remember', 'redirect');
		$remember = ($post->remember == 'true');
		$success  = $this->auth->login($post->email, $post->password);

		
		if (! $success)
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'login_invalid',
				'field'    => '#error_login',
				'message' => 'Invalid email address or password',
			)));
		}

		return Response::forge(json_encode(array(
			'success'  => true,
			'type'     => 'login_success',
			'message'  => 'You are now logged in',
			'redirect' => $post->redirect,
		)));

	}



	/**
	 * User authentication with Facebook, Twitter, and Google
	 */
	public function get_auth($provider)
	{
		$provider = strtolower($provider);
		$get      = $this->get_data('r');

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

		
		if (! $this->auth->social_auth($provider))
		{
			throw new Exception("Could not log in social auth user to provider: '{$provider}'", 1);
			$this->redirect('/', 'error', 'An error has occurred');
		}

		

		if (! empty($get->r))
		{
			$this->redirect($get->r);
		}

		$this->redirect('/');

	}

	public function get_process()
	{
		Hybrid_Endpoint::process();
	}



	/**
	 * User Registration
	 */
	public function get_register()
	{
		$this->redirect('/');
		$this->template->body = View::forge('user/register');
	}

	public function post_register()
	{
		if (! Input::is_ajax())
		{
			$this->redirect('/');
		}

		$post = $this->post_data('name', 'email', 'password', 'confirm_password', 'redirect');

		// name missing
		if (empty($post->name))
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'name_missing',
				'field'   => '#error_name',
				'message' => 'Enter your name',
			)));
		}

		// email missing
		if (empty($post->email))
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'email_missing',
				'field'   => '#error_email',
				'message' => 'Enter your email address',
			)));
		}

		// password match
		if (empty($post->password) or empty($post->confirm_password))
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'password_match',
				'field'   => '#error_password',
				'message' => 'Enter and confirm your new password',
			)));
		}

		// password match
		if ($post->password !== $post->confirm_password)
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'password_match',
				'field'   => '#error_password',
				'message' => 'Your password does not match the password confirmation',
			)));
		}

		// register user
		try
		{
			$user = $this->auth->create_user($post->email, $post->password);
		}
		catch (SiteUserUpdateException $e)
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'email_registered',
				'field'   => '#error_email',
				'message' => $e->getMessage(),
			)));
		}
		
		if (! isset($user))
		{
			return Response::forge(json_encode(array(
				'success' => false,
				'type'    => 'register_error',
				'field'   => '#error_password',
				'message' => 'An error has occured',
			)));
		}

		// additional account info
		$user->display_name = $post->name;
		$user->save();

		// log user in
		$this->auth->login($post->email, $post->password);

		// success
		return Response::forge(json_encode(array(
			'success'  => true,
			'type'     => 'login_success',
			'message'  => 'You are now logged in',
			'redirect' => $post->redirect,
		)));
	}



	/**
	 * Forgot password
	 */
	public function get_forgot()
	{
		$this->template->body = View::forge('user/forgot');
	}

	public function post_forgot()
	{
		$post = $this->post_data('email');
		$user = Model_User::get_by_email($post->email);
		
		if (! isset($user))
		{
			$this->redirect('forgot', 'error', 'That email address is not registered');
		}

		$user->generate_reset_code();
		
		Service_Email::send(array(
			'type'      => 'password_reset',
			'to_addr'   => $user->email,
			'from_name' => 'ItemNation',
			'from_addr' => 'info@itemnation.com',
			'subject'   => 'Reset your ItemNation password',
			'body'      => View::forge('emails/reset', array(
				'reset_code' => $user->reset_code,
			)),
		));

		$this->redirect('login', 'success', 'An email with instructions to reset your password has been sent to the address provided');
	}



	/**
	 * Reset password
	 */
	public function get_reset($reset_code)
	{
		$user = Model_User::get_by_rest_code($reset_code);

		if (! isset($user))
		{
			$this->redirect('forgot', 'error', 'Invalid password reset');
		}

		$this->template->body = View::forge('user/reset');
	}
	
	public function post_reset($reset_code)
	{
		$user = Model_User::get_by_rest_code($reset_code);

		if (! isset($user) or ! $user->is_reset_code_valid())
		{
			$this->redirect('forgot', 'error', 'Invalid password reset');
		}

		$post = $this->post_data('password', 'confirm_password');

		// password match
		if ($post->password !== $post->confirm_password)
		{
			$this->redirect('user/register', 'error', 'Your password does not match the password confirmation');
		}

		$this->auth->reset_password($user->email, $post->password);
		$user->empty_reset_code();
		$this->redirect('login', 'success', 'Your password has been changed.');
	}



	/**
	 * Logout
	 */
	public function get_logout()
	{
		$this->auth->logout();
		$this->redirect('/');
	}



	


	/**
	 * Verify email address
	 */
	public function get_verify($user_hash)
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
				'type'      => 'in_invite',
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
		//$this->user->email        = $post->email;
		$this->user->save();

		$this->redirect('user/account', 'success', 'Account information updated');
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
			throw new Exception("Could not change password for user with none set", 1);
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