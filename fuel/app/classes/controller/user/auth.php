<?php

class Controller_User_Auth extends Controller_App
{

	/**
	 * undefined_method
	 */
	public function post_login() {
    // try logging in
    $login = true;
    if (Auth::login()) {
      //successful login
      $auth = \Auth\Auth::instance();

      // check if remember me turned on
      if (isset($_POST['remember_me']) && $_POST['remember_me']) {
        $auth->remember_me();
      } else {
        $auth->dont_remember_me();
      } // if

      $user = Model_User::get_by_id($auth->get_user_id()[1]);

      // check if parent is correct for clients
      if ($user->group == Model_User::CLIENT_GROUP_ID) {
        $client = Model_Client::getByUserId($user->id);
        // check if client has parent
        if ($client->parent_id == 0) {
          $login = false;
          $auth->dont_remember_me();
          $auth->logout();
          $message = "You do not have a personal shopper, your account is suspended.";
        } else if (!$client->parentIsActive()) {
          $login = false;
          $auth->dont_remember_me();
          $auth->logout();
          $message = "Your personal shopper's account is inactive. Please contact your personal shopper";
        } // if
      } // if
    } else {
      $message = 'Wrong email/password combination, please try again';
    } // if

    if ($login) {
      $redirectUrl = (string)Session::get('redirectUrl');
      $this->redirect("/$redirectUrl");
    } else {
      $this->template->notice = (object) array(
        'type' => 'danger',
        'message' => $message
      );

      $this->template->body = View::forge('user/login', array(
        'data' => $_POST
      ));
    } // if
	} // post_login

  public function get_login() {
    if ($this->user_logged_in()) {
      $this->redirect('/');
    } // if

    $this->template->body = View::forge('user/login', array(
      'client' => false,
      'data' => [
        'email' => '',
        'password' => '',
      ]
    ));
  } // get_login

	/**
	 * undefined_method
	 */
	public function get_authenticate($action = null)
	{
		// try
		// {
		// get the Opauth object
		$opauth = Auth_Social::forge(false);

		if (! $user = $opauth->login())
		{
			// check session for registration
			// Session::get('auth-strategy')
		}

		if (! Auth::check())
		{
			// throw new Exception("Error Processing Request", 1);
		}

		Response::redirect('');

		//$user->add_invitations_as_friends();


		if ($action and $action == 'bookmark')
		{
			Response::redirect('bookmark');
		}
		else
		{
			
		}
			
		// }

		// deal with Opauth exceptions
		// catch (OpauthException $e)
		// {
		// 	Response::redirect_back();
		// }

		// catch a user cancelling the authentication attempt
		// catch (OpauthCancelException $e)
		// {
		// 	$this->redirect('user/auth/login/facebook', 'error', '');
		// }
	}

	/**
	 * Logout
	 */
	public function get_logout()
	{
    $this->auth->dont_remember_me();
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