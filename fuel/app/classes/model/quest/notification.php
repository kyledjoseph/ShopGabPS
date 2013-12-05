<?php

class Model_Quest_Notification extends \Orm\Model
{
	protected static $_table_name = 'quest_notifications';
	
	protected static $_properties = array(
		'id',
		'quest_id',
		'user_id',
		'model_id',
		'model',
		'type',
		'viewed_at',
		'created_at',
		'updated_at',
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
		'like',       // Model_Quest_Product_Vote
		'dislike',    // Model_Quest_Product_Vote
		'comment',    // Model_Quest_Product_Comment
		'message',    // Model_Quest_Message
		'product',    // Model_Quest_Product
		'participnt', // Model_Quest_Participant
	);



	public function mark_viewed()
	{
		$this->viewed_at = time();
		$this->save();
	}




	public static function new_notification(\Orm\Model $model, $event)
	{
		$notification = static::forge();

		if ($method = "on_{$event->name()}" and ! method_exists($notification, $method))
		{
			throw new Exception("Model_Quest_Notification handler method '{$method}' is not defined");
		}

		$notification->quest_id = $model->get_quest()->id;
		$notification->user_id  = $model->user->id;
		$notification->model_id = $model->id;
		$notification->model    = get_class($model);
		$notification->type     = $event->name();
		$notification->save();

		return $notification->$method($model);

	}

	public function on_like(Model_Quest_Product_Vote $vote)
	{
		$quest = $vote->quest_product->quest;

		if (! $vote->user_id == $quest->user_id)
		{
			Service_Email::send(array(
				'type'      => 'quest_like',
				'to_addr'   => $quest->user->email,
				'from_name' => 'ShopGab',
				'from_addr' => 'notification@shopgab.com',
				'subject'   => "{$vote->user->display_name()} liked a product on your quest '{$quest->name()}'",
				'body'      => View::forge('emails/template', array(
					'content' => View::forge('emails/notifications/quest/like', array(
						'quest' => $quest,
						'vote'  => $vote,
					)),
				), false),
			));
		}

		return $this;
	}

	public function on_dislike(Model_Quest_Product_Vote $vote)
	{
		$quest = $vote->quest_product->quest;

		if (! $vote->user_id == $quest->user_id)
		{
			Service_Email::send(array(
				'type'      => 'quest_dislike',
				'to_addr'   => $quest->user->email,
				'from_name' => 'ShopGab',
				'from_addr' => 'notification@shopgab.com',
				'subject'   => "{$vote->user->display_name()} disliked a product on your quest '{$quest->name()}'",
				'body'      => View::forge('emails/template', array(
					'content' => View::forge('emails/notifications/quest/dislike', array(
						'quest' => $quest,
						'vote'  => $vote,
					)),
				), false),
			));
		}

		return $this;
	}

	public function on_comment(Model_Quest_Product_Comment $comment)
	{
		$quest = $comment->quest_product->quest;

		if (! $comment->user_id == $quest->user_id)
		{
			Service_Email::send(array(
				'type'      => 'quest_dislike',
				'to_addr'   => $quest->user->email,
				'from_name' => 'ShopGab',
				'from_addr' => 'notification@shopgab.com',
				'subject'   => "{$comment->user->display_name()} commented on a product on your quest '{$quest->name()}'",
				'body'      => View::forge('emails/template', array(
					'content' => View::forge('emails/notifications/quest/comment', array(
						'quest'   => $quest,
						'comment' => $comment,
					)),
				), false),
			));
		}

		return $this;
	}

	public function on_message(Model_Quest_Message $message)
	{
		$quest = $message->quest;

		if (! $message->user_id == $quest->user_id)
		{
			Service_Email::send(array(
				'type'      => 'quest_dislike',
				'to_addr'   => $quest->user->email,
				'from_name' => 'ShopGab',
				'from_addr' => 'notification@shopgab.com',
				'subject'   => "{$message->user->display_name()} posted a message on your quest '{$quest->name()}'",
				'body'      => View::forge('emails/template', array(
					'content' => View::forge('emails/notifications/quest/message', array(
						'quest'   => $quest,
						'message' => $message,
					)),
				), false),
			));
		}

		return $this;
	}

	public function on_product(Model_Quest_Product $product)
	{
		$quest = $product->quest;

		if (! $product->user_id == $quest->user_id)
		{
			Service_Email::send(array(
				'type'      => 'quest_dislike',
				'to_addr'   => $quest->user->email,
				'from_name' => 'ShopGab',
				'from_addr' => 'notification@shopgab.com',
				'subject'   => "{$product->user->display_name()} recommended a product on your quest '{$quest->name()}'",
				'body'      => View::forge('emails/template', array(
					'content' => View::forge('emails/notifications/quest/product', array(
						'quest'   => $quest,
						'message' => $message,
					)),
				), false),
			));
		}

		return $this;
	}


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