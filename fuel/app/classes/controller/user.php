<?php

class Controller_User extends Controller_App
{

	/**
	 * Forgot password
	 */
	public function get_forgot() {
		$this->template->body = View::forge('user/forgot');
	}

	/**
	 * undefined_method
	 */
	public function post_forgot()
	{
		$post = $this->post_data('email');
		$user = Model_User::get_by_email($post->email);
		
		if (! isset($user)) {
			$this->redirect('forgot', 'error', 'That email address is not registered');
		} // if

		$user->generate_reset_code();
		
		Service_Email::send(array(
			'type'      => 'password_reset',
			'to_addr'   => $user->email,
			'from_name' => 'ShopGab',
			'from_addr' => 'info@shopgab.com',
			'subject'   => 'Reset your ShopGab password',
			'body'      => View::forge('emails/reset', array(
				'reset_code' => $user->reset_code,
			)),
		));

		$this->redirect('login', 'success', 'An email with instructions to reset your password has been sent to the address provided');
	}

	/**
	 * Reset password
	 */
	public function get_reset($reset_code) {
		$user = Model_User::get_by_reset_code($reset_code);

		if (! isset($user)) {
			$this->redirect('forgot', 'error', 'Invalid password reset code');
		} // if

    // reset password
    $new_password = \Str::random('alnum', 8);
    $password_hash = $this->auth->hash_password($new_password);

    $affected_rows = \DB::update(\Config::get('simpleauth.table_name'))
      ->set(array('password' => $password_hash))
      ->where('email', '=', $user->email)
      ->execute(\Config::get('simpleauth.db_connection'));

    if ( ! $affected_rows) {
      throw new \SimpleUserUpdateException('Failed to reset password, user was invalid.', 8);
    } // if

    // send new password

    Service_Email::send(array(
      'type'      => 'password_reset',
      'to_addr'   => $user->email,
      'from_name' => 'ShopGab',
      'from_addr' => 'info@shopgab.com',
      'subject'   => 'Your new ShopGab password',
      'body'      => View::forge('emails/reset_send', array(
          'new_password' => $new_password,
        )),
    ));

    $user->empty_reset_code();
    $this->redirect('login', 'success', 'Your new password has been emailed to you.');
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
				'from_name' => 'ShopGab Invite',
				'from_addr' => 'invite@shopgab.com',
				'subject'   => 'You have been invited to ShopGab',
				'body'      => View::forge('emails/invite'),
			));
		}
		
		return Response::forge(json_encode($emails));
	}

	/**
	 * User Feedback
	 */
	public function post_feedback()
	{
		$name     = Input::post('name');
		$email    = Input::post('email');
		$referral = Input::post('referral');
		$content  = Input::post('content');

		Model_Feedback::create_feedback(array(
			'user_id'      => ($this->user_logged_in() ? $this->user->id : null),
			'user_email'   => $email,
			'referral_url' => $referral,
			'feedback'     => $content,
		));

		$this->redirect($referral, 'success', 'Thank you for your feedback!');
	}

	/**
	 * Edit account settings
	 */
	public function get_account()	{
		$this->require_auth();
    $paypal = Model_Paypal::getByUserId($this->user->id);
    $client = $this->user->getClientModel();

		$this->template->body = View::forge('user/account',[
      'paypal' => $paypal ? $paypal : new Model_Paypal(),
      'client' => $client ? $client : new Model_Client(),
      'professional' => $this->user->group == Model_User::PROFESSIONAL_GROUP_ID ? Model_Professional::getByUserId($this->user->id) : null
    ]);
	} // get_account

	/**
	 * undefined_method
	 */
	public function post_account()
	{
		$this->require_auth();

		$post = $this->post_data('name', 'email');

		$this->user->fullname = $post->name;
		$this->user->email = $post->email;
		$this->user->save();

		$this->redirect('user/account', 'success', 'Account information updated');
	}

	/**
	 * undefined_method
	 */
	public function post_avatar() {
		$this->require_auth();

		Upload::process(array(
			'path' => APPPATH . 'tmp',
			'randomize' => true,
			'ext_whitelist' => array('jpg', 'jpeg', 'gif', 'png', 'bmp'),
		));

		if (Upload::is_valid()) {
			Upload::save();

			if ($this->user->has_avatars()) {
				$this->user->delete_avatars();
			} // if

			foreach (Upload::get_files() as $file) {
				// return Response::forge(var_export($file));
				// $file = array ( 'name' => 'computech.jpg', 'type' => 'image/jpeg', 'error' => false, 'size' => 550696, 'field' => 'avatar', 'file' => '/Applications/MAMP/tmp/php/phpum5qaT', 'errors' => array ( ), 'extension' => 'jpg', 'filename' => 'computech', 'mimetype' => 'image/jpeg', 'saved_to' => '/Users/tmatthews/Sites/shopgab/fuel/app/tmp/', 'saved_as' => 'b30b61736b21b15b59a78fe16742c0c4.jpg', )

				$this->user->add_avatar($file);
				break;
			} // foreach
		} // if

		foreach (Upload::get_errors() as $file) {
			// $file is an array with all file information,
			// $file['errors'] contains an array of all error occurred
			// each array element is an an array containing 'error' and 'message'
		} // foreach

		$this->redirect('user/account', 'success', 'Avatar Uploaded');
	} // post_avatar

  /**
   * undefined_method
   */
  public function post_logo() {
    $this->require_auth();
    $professional = $this->user->getProfessionalModel();

    Upload::process(array(
      'path' => APPPATH . 'tmp',
      'randomize' => true,
      'ext_whitelist' => array('jpg', 'jpeg', 'gif', 'png', 'bmp'),
    ));

    if (Upload::is_valid()) {
      Upload::save();

      if ($professional->has_logos()) {
        $professional->delete_logos();
      } // if

      foreach (Upload::get_files() as $file) {
        $professional->add_logo($file);
        break;
      } // foreach
    } // if

    foreach (Upload::get_errors() as $file) {
      // $file is an array with all file information,
      // $file['errors'] contains an array of all error occurred
      // each array element is an an array containing 'error' and 'message'
    } // foreach

    $this->redirect('user/account', 'success', 'Logo Uploaded');
  } // post_logo

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


		$post = $this->post_data('current', 'new', 'confirm');

		if ($post->new !== $post->confirm) {
			$this->redirect('user/password', 'error', 'Your new password did not match the password confirmation');
		} // if

		if (! $this->auth->change_password($post->current, $post->new)) {
			$this->redirect('user/password', 'error', 'Your current password is incorrect');
		} // if

		$this->redirect('user/account', 'success', 'Password changed');
	}

  public function get_register() {
    if ($this->user_logged_in()) {
      $this->redirect('/');
    } // if

    $this->template->body = View::forge('user/register', array(
      'client' => false,
      'data' => [
        'email' => '',
        'password' => '',
        'confirm' => '',
        'psid' => '',
      ]
    ));
  } //get_register

  /**
   * Post to register
   */
  public function post_register() {
    $val = \Fuel\Core\Validation::forge();
    $val->add_callable('MyRules');

    $val->add_field('email', 'Email address', 'required|valid_email|unique[users.email]');
    $val->add_field('password', 'Password', 'required|min_length[6]|max_length[10]');
    $val->add_field('confirm', 'Confirm password', 'match_field[password]');

    $group_id = \Fuel\Core\Input::post('login_type') == 'professional' ? Model_User::PROFESSIONAL_GROUP_ID : Model_User::CLIENT_GROUP_ID;
    if ($group_id == Model_User::CLIENT_GROUP_ID) {
      // if client register check parent existence
      $val->add_field('psid', "We're sorry the PSID you entered is not valid, please try again or contact your Personal Shopper", 'required|pro_user_id_exist|pro_user_id_active');
    } // if

    if ($val->run()) {
      // validation passed - create user
      $email = \Fuel\Core\Input::post('email');
      $username = substr($email, 0, strpos($email, '@'));
      $new_username = $username;
      $i = 0;

      // if username exists just add number to it
      while (Model_User::query()->where('username', $new_username)->get_one()) {
        $new_username = $username . $i;
        $i++;
      } // while

      $user_id = Auth::create_user($new_username,\Fuel\Core\Input::post('password'),$email,$group_id);

      if ($group_id == Model_User::PROFESSIONAL_GROUP_ID) {
        // create professional user model
        $professional = new Model_Professional([
          'user_id' => $user_id,
          'pricing_plan_type' => Model_Professional::TRIAL_PRICING_PLAN,
          'pricing_plan_started_on' => time(),
          'automatic_plan_renewal' => true,
          'automatic_plan_notification_sent' => false
        ]);

        $professional->save();
      } else {

        // create client user model
        $client = new Model_Client([
          'user_id' => $user_id,
          'parent_id' => \Fuel\Core\Input::post('psid'),
          'gender' => 0
        ]);

        $client->save();
      } // if

      $user = Model_User::get_by_id($user_id);
      $user->send_confirmation_code();

      Auth::force_login($user->id);
      $this->redirect('/', 'success', 'You have successfully registered to ShopGap');
    } else {

      $this->template->body = View::forge('user/register', array(
        'errors' => $val->error_message(),
        'client' => $group_id == Model_User::CLIENT_GROUP_ID,
        'data' => $_POST
      ));
    } // if
  } // post_register

  /**
   * Resend confirmation code for email
   */
  public function get_confirm_resend() {
    if ($this->user_logged_in()) {
      $this->user->send_confirmation_code();
      $this->redirect('/', 'success', 'Email confirmation code successfully sent');
    } else {
      $this->redirect('/');
    } // if
  } // confirm_resend

  public function get_confirm($confirmation_code) {
    $user = Model_User::get_by_confirmation_code($confirmation_code);
    if ($user) {
      $user->status = Model_User::STATUS_EMAIL_CONFIRMED;
      $user->save();
      if (!$this->user_logged_in()) {
        $this->auth->force_login($user->id);
      } // if
      $this->redirect('/', 'success', 'Email successfully confirmed');
    } else {
      $this->redirect('/', 'error', 'Email confirmation code not correct. Please resend and try again');
    } // if
  }

  /**
   * Submit paypal information
   */
  public function post_paypal() {
    $paypal_account = Model_Paypal::getByUserId($this->user->id);

    if (!$paypal_account) {
      $_POST['paypal']['parent_id'] = $this->user->id;
      $paypal_account = new Model_Paypal();
    } // if

    $paypal_account->set($_POST['paypal']);
    $paypal_account->save();


    $professional = Model_Professional::getByUserId($this->user->id);

    // check if renewal if needed
    if ($professional->getSubscriptionDaysLeft() < 0 || $professional->pricing_plan_type != Model_Professional::PAID_PRICING_PLAN) {
      try {
        $paypal_account->makePayment();

        $professional->set([
          'pricing_plan_type' => Model_Professional::PAID_PRICING_PLAN,
          'pricing_plan_started_on' => time(),
          'automatic_plan_notification_sent' => false
        ]);
        $professional->save();
        $this->redirect('/account', 'success', 'Payment successful, subscription renewed');
      } catch (Exception $e) {
        // payment failed
        $professional->notifyPaypalFailed();
        $this->redirect('/account', 'danger', "Payment failed. Please check your payment credentials or contact administrator");
      } // try
    } // if

    $this->redirect('/account', 'info', "Paypal info updated, renewal not needed");
  } // post_paypal

  public function post_renewal() {
    $professional = Model_Professional::getByUserId($this->user->id);
    $professional->automatic_plan_renewal = $_POST['checked'];
    $professional->save();
    die();
  } // post_renewal

  public function post_notifications() {
    $user = Model_User::get_by_id($this->user->id);
    $user->receive_notifications = $_POST['checked'];
    $user->save();
    die();
  } // post_renewal
}