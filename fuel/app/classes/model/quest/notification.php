<?php

class Model_Quest_Notification extends \Orm\Model
{
	protected static $_table_name = 'quest_notifications';
	
	protected static $_properties = array(
		'id',
		'user_id',
    'model_id',
		'quest_id',
		'event_type',
		'created_at',
		'seen_at',
    'sent_by_email'
	);

	protected static $_belongs_to = array(
		'user' => array(
			'key_from'       => 'user_id',
			'model_to'       => 'Model_User',
			'key_to'         => 'id',
			'cascade_save'   => true,
			'cascade_delete' => false,
		),
		'quest' => array(
			'key_from'       => 'quest_id',
			'model_to'       => 'Model_Quest',
			'key_to'         => 'id',
			'cascade_save'   => true,
			'cascade_delete' => false,
		),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events'             => array('before_insert'),
			'mysql_timestamp'    => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events'             => array('before_save'),
			'mysql_timestamp'    => false,
		),
	);

	protected static $_event_types = array(
    'quest_created' => 'Model_Quest',
    'product_created' => 'Model_Quest_Product',    //
    'product_deleted' => 'Model_Quest_Product', //
    'product_like' => 'Model_Quest_Product_Vote',       //
    'product_dislike' => 'Model_Quest_Product_Vote',    //
    'product_comment' => 'Model_Quest_Product_Comment',    //
    'quest_message' => 'Model_Quest_Message'
	);



	public function mark_viewed()
	{
		$this->seen_at = time();
		$this->save();
	}

	public static function new_notification(\Orm\Model $model, \Fuel\Event\Listener $event)	{
		$notification = static::forge();

		if ($method = "on_{$event->name()}" and ! method_exists($notification, $method))
		{
			throw new Exception("Model_Quest_Notification handler method '{$method}' is not defined");
		}

		$notification->quest_id = ($model instanceof Model_Quest) ? $model->id : $model->get_quest()->id;
		$notification->user_id  = ($model instanceof Model_Quest) ? $model->created_by : $model->user->id;
    $notification->model_id = $model->id;
		$notification->event_type = $event->name();
    $notification->sent_by_email = false;
		$notification->save();

    return $notification;
	} // new_notification

  public function on_quest_created() {
    // code for quest created
    $quest_url = $this->quest->full_url();
    $quest_name = $this->quest->name;
    return "<li>Created a new quest: <a href='$quest_url'>$quest_name</a></li>";
  } // on_quest_created

  public function on_product_created() {
    $quest_product = Model_Quest_Product::get_by_id($this->model_id);
    if ($quest_product) {
      $quest_url = $quest_product->quest->full_url();
      $quest_name = $quest_product->quest->name;
      $product_name = $quest_product->product->name;

      return "<li>Added product $product_name in <a href='$quest_url'>$quest_name</a> quest</li>";
    } else {
      return false;
    } // if
  } // on_product_created

  public function on_product_deleted(Model_Quest_Product $product) {

  } // on_product_deleted

	public function on_product_like()	{
    $vote = Model_Quest_Product_Vote::get_by_id($this->model_id);
    $quest_url = $vote->quest_product->quest->full_url();
    $quest_name = $vote->quest_product->quest->name;
    $product_name = $vote->quest_product->product->name;

    return "<li>Liked a product $product_name in <a href='$quest_url'>$quest_name</a> quest</li>";
	} // on_product_like

	public function on_product_dislike() {
    $vote = Model_Quest_Product_Vote::get_by_id($this->model_id);
    $quest_url = $vote->quest_product->quest->full_url();
    $quest_name = $vote->quest_product->quest->name;
    $product_name = $vote->quest_product->product->name;

    return "<li>Disliked a product $product_name in <a href='$quest_url'>$quest_name</a> quest</li>";
	} // on_product_dislike

	public function on_product_comment() {
    $comment = Model_Quest_Product_Comment::get_by_id($this->model_id);
    $quest_url = $comment->quest_product->quest->full_url();
    $quest_name = $comment->quest_product->quest->name;
    $product_name = $comment->quest_product->product->name;

    return "<li>Commented on a product $product_name in <a href='$quest_url'>$quest_name</a> quest</li>";
	} // on_product_comment

	public function on_quest_message() {
		$message = Model_Quest_Message::get_by_id($this->model_id);
    $quest_url = $message->quest->full_url();
    $quest_name = $message->quest->name;

    return "<li>Wrote a message in <a href='$quest_url'>$quest_name</a> quest</li>";
	} // on_quest_message

	public function on_participant(Model_Quest_Participant $participant)
	{
		$quest = $participant->quest;

		if (! $participant->user_id == $quest->user_id)
		{
			Service_Email::send(array(
				'type'      => 'quest_dislike',
				'to_addr'   => $quest->user->email,
				'from_name' => 'ShopGab',
				'from_addr' => 'notification@shopgab.com',
				'subject'   => "{$participant->user->display_name()} recommended a participant on your quest '{$quest->name()}'",
				'body'      => View::forge('emails/template', array(
					'content' => View::forge('emails/notifications/quest/participant', array(
						'quest'       => $quest,
						'participant' => $participant,
					)),
				), false),
			));
		}

		return $this;
	}

	// public function on_expired(Model_Quest $quest)
	// {
		
	// }

}