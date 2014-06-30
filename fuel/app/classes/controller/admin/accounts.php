<?php

class Controller_Admin_Accounts extends Controller_Admin
{
	public function before()
	{
		parent::before();

		$this->template->active_nav = 'accounts';
	}

	public function _get_account($user_id)
	{
		$user = Model_User::get_by_id($user_id);

		if (! $user)
		{
			$this->redirect('admin/accounts', 'error', "invalid user id '{$user_id}'");
		}

		return $user;
	}


	/**
	 * Account index
	 */
	public function get_index()
	{
		$accounts = Model_User::query()->order_by('created_at', 'desc')->get();

		$this->template->body = View::forge('admin/accounts/index', [
			'accounts' => $accounts,
		]);
	}


	/**
	 * View an account
	 */
	public function get_view($user_id)
	{
		$account = $this->_get_account($user_id);

		$this->template->body = View::forge('admin/accounts/view', [
			'account' => $account,
		]);
	}


	/**
	 * Edit an account
	 */
	public function get_edit($user_id)
	{
		$account = $this->_get_account($user_id);

		$this->template->body = View::forge('admin/accounts/edit', [
			'account' => $account,
		]);
	}

	public function post_edit($user_id)
	{
		$account = $this->_get_account($user_id);

		$fullname = Input::post('display_name');		
		$account->fullname = $fullname;
		$account->save();
		$this->redirect("admin/accounts/view/{$account->id}", 'success', 'account information updated');
	}

  /**
   * Edit an professional account
   */
  public function get_professional($user_id) {
    $account = $this->_get_account($user_id);
    $paypal = Model_Paypal::getByUserId($account->id);

    $this->template->body = View::forge('admin/accounts/professional', [
      'account' => $account,
      'professional' => $account->getProfessionalModel(),
      'paypal' => $paypal ? $paypal : new Model_Paypal()
    ]);
  } // get_professional

  public function post_professional($user_id) {
    $account = $this->_get_account($user_id);

    $paypal_account = Model_Paypal::getByUserId($account->id);
    if (!$paypal_account) {
      $_POST['paypal']['parent_id'] = $account->id;
      $paypal_account = new Model_Paypal();
    } // if

    $paypal_account->set($_POST['paypal']);
    $paypal_account->save();

    $this->redirect("admin/accounts/professional/{$account->id}", 'success', 'professional pricing data updated');
  } // post_professional

  public function get_pricing($user_id) {
    $account = $this->_get_account($user_id);

    $this->template->body = View::forge('admin/accounts/pricing', [
      'account' => $account,
      'professional' => $account->getProfessionalModel(),
    ]);
  } // get_pricing

  public function post_pricing($user_id) {
    $account = $this->_get_account($user_id);

    $professional = Model_Professional::getByUserId($account->id);
    $professional->set('price', round($_POST['price'], 3));
    $professional->save();

    $this->redirect("admin/accounts/view/{$account->id}", 'success', 'pricing data updated');
  } // post_pricing

  /**
   * Edit an client account
   */
  public function get_client($user_id) {
    $account = $this->_get_account($user_id);

    $this->template->body = View::forge('admin/accounts/client', [
      'account' => $account,
      'client' => $account->getClientModel(),
    ]);
  } // get_professional

  public function post_client($user_id) {
    $account = $this->_get_account($user_id);

    $client = $account->getClientModel();

    $client->set($_POST['client_data']);
    $client->save();

    $this->redirect("admin/accounts/client/{$account->id}", 'success', 'client personal data updated');
  } // post_professional


	/**
	 * Delete an account
	 */
	public function get_delete($user_id)
	{
		$account = $this->_get_account($user_id);

		$account->remove();
		$this->redirect('admin/accounts', 'success', "account deleted");
	}



	public function get_delete_quest($user_id, $quest_id)
	{
		$account = $this->_get_account($user_id);
		
		if (! $account->remove_quest($quest_id))
		{
			$this->redirect("admin/accounts/view/{$account->id}", 'error', 'could not remove quest');
		}

		$this->redirect("admin/accounts/view/{$account->id}", 'success', 'user quest removed');
	}
}