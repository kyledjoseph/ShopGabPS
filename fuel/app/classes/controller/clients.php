<?php

class Controller_Clients extends Controller_App {
  public function before() {
    parent::before();
  } // before

  function get_view($client_id) {
    $client = Model_Client::query()->where('id', $client_id)->get_one();
    if ($client instanceof Model_Client) {
      // check if logged client is this client
      if ($client->user_id == $this->user->id) {
        $this->redirect('/account');
      } // if

      // check if logged user is clients parent
      if ($client->parent_id == $this->user->id) {
        Casset::js('site/dashboard/tour.js');
        Casset::js('site/dashboard.js');
        $this->add_modal(View::forge('user/modal/start_quest',array('for_user_id' => $client->user_id)));
        $this->template->body = View::forge('clients/view', array(
          'quests' => $client->getUser()->get_quests(),
          'client' => $client
        ));
      } else {
        $this->redirect('/', 'danger', 'This client is not in your network');
      } // if
    } else {
      $this->redirect('/', 'danger', 'Client not found');
    } // if
  } // get_view


  function post_edit($client_id) {
    $client = Model_Client::query()->where('id', $client_id)->get_one();
    $client_data = $_POST['client_data'];

    $client->set($client_data);
    $client->save();
    $this->redirect('/client/'. $client->id, 'success', 'Client data updated');
  } // function

  function get_remove($client_id) {
    $client = Model_Client::query()->where('id', $client_id)->get_one();
    if ($client instanceof Model_Client) {

      // check if logged user is clients parent
      if ($client->parent_id == $this->user->id) {
        $client->set('parent_id', 0);
        $client->save();
        $this->redirect('/', 'success', 'Client successfully removed');
      } else {
        $this->redirect('/', 'danger', 'This client is not in your network');
      } // if
    } else {
      $this->redirect('/', 'danger', 'Client not found');
    } // if
  } // get_remove

} // Controller_Clients