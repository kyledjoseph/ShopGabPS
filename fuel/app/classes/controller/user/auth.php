<?php

class Controller_User_Auth extends Controller_App
{

	/**
	 * undefined_method
	 */
	public function get_login($provider = null)
	{
		$this->opauth = Auth_Opauth::forge([
			//'path'         => '',
			'callback_url' => 'http://shopgab.dev/authenticate',
			'provider'     => $provider,
		]);
	}

	/**
	 * undefined_method
	 */
	public function get_authenticate()
	{
		try
		{
			// get the Opauth object
			$opauth = \Auth_Opauth::forge(false);

			// and process the callback
			$status = $opauth->login_or_register();

			// fetch the provider name from the opauth response so we can display a message
			$provider = $opauth->get('auth.provider', '?');

			// deal with the result of the callback process
			switch ($status)
			{
				// a local user was logged-in, the provider has been linked to this user
				case 'linked':
					// inform the user the link was succesfully made
					//\Messages::success(sprintf(__('login.provider-linked'), ucfirst($provider)));
					// and set the redirect url for this status
					$url = 'dashboard';
				break;

				// the provider was known and linked, the linked account as logged-in
				case 'logged_in':
					// inform the user the login using the provider was succesful
					//\Messages::success(sprintf(__('login.logged_in_using_provider'), ucfirst($provider)));
					// and set the redirect url for this status
					$url = 'dashboard';
				break;

				// we don't know this provider login, ask the user to create a local account first
				case 'register':
					// inform the user the login using the provider was succesful, but we need a local account to continue
					//\Messages::info(sprintf(__('login.register-first'), ucfirst($provider)));
					// and set the redirect url for this status
					$url = 'users/register';
				break;

				// we didn't know this provider login, but enough info was returned to auto-register the user
				case 'registered':
					// inform the user the login using the provider was succesful, and we created a local account
					//\Messages::success(__('login.auto-registered'));
					// and set the redirect url for this status
					$url = 'dashboard';
				break;

				default:
					throw new \FuelException("Auth_Opauth::login_or_register() has come up with a result that we dont know how to handle. status: '{$status}'");
			}

			$this->_init_user();

			$this->user->add_invitations_as_friends();

			// redirect to the url set
			\Response::redirect(''); // $url);
		}

		// deal with Opauth exceptions
		catch (\OpauthException $e)
		{
			// \Messages::error($e->getMessage());
			\Response::redirect_back();
		}

		// catch a user cancelling the authentication attempt (some providers allow that)
		catch (\OpauthCancelException $e)
		{
			// you should probably do something a bit more clean here...
			$this->redirect('user/auth/login/facebook', 'error', '');

			// exit('It looks like you canceled your authorisation.'.\Html::anchor('users/oath/'.$provider, 'Click here').' to try again.');
		}
	}

	/**
	 * Logout
	 */
	public function get_logout()
	{
		$this->auth->logout() and $this->redirect('/');
	}

	/**
	 * undefined_method
	 */
	// public function get_info($status)
	// {
	// 	 // do we have an auth strategy to match?
	// 	if ($authentication = \Session::get('auth-strategy.authentication', array()))
	// 	{
	// 		// don't forget to pass false, we need an object instance, not a strategy call
	// 		$opauth = \Auth_Opauth::forge(false);

	// 		// call Opauth to link the provider login with the local user
	// 		$insert_id = $opauth->link_provider(array(
	// 			'parent_id' => $userid,
	// 			'provider' => $authentication['provider'],
	// 			'uid' => $authentication['uid'],
	// 			'access_token' => $authentication['access_token'],
	// 			'secret' => $authentication['secret'],
	// 			'refresh_token' => $authentication['refresh_token'],
	// 			'expires' => $authentication['expires'],
	// 			'created_at' => time(),
	// 		));

	// 		$authentication['provider']
	// 		$authentication['uid']
	// 		$authentication['access_token']
	// 		$authentication['secret']
	// 		$authentication['refresh_token']
	// 		$authentication['expires']
	// 	}
	// }
}