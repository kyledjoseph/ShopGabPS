<?php

class Model_Notification extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		//'friend_id',
		'quest_id',
		'event_id', // Model_Quest_Message, Model_Quest_Product_Vote, Model_Quest_Product_Comment, Model_Quest_Product
		'event',
		'seen_at',
		'created_at',
	);

	protected static $_valid_events = array(
		'like',    // Model_Quest_Product_Vote
		'dislike', // Model_Quest_Product_Vote
		'comment', // Model_Quest_Product_Comment
		'message', // Model_Quest_Message
		'product', // Model_Quest_Product
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
	);


	public function text()
	{
		return $this->sender_name() . ' ' . $this->action();
	}

	public function sender_name()
	{
		return $this->get_event()->user->display_name();
	}

	public function mark_seen()
	{
		$this->seen_at = time();
		return $this->save();
	}

	public function action()
	{
		switch ($this->event)
		{
			case 'like':
				return 'liked a product';

			case 'dislike':
				return 'disliked a product';

			case 'comment':
				return 'commented on a product';

			case 'message':
				return 'wrote a message';

			case 'product':
				return 'recommended a product';

			default:
				throw new Exception("unknown event type '{$this->event}'");
				break;

		}
	}


	protected $event_instance;

	public function get_event()
	{
		if (isset($this->event_instance))
		{
			return $event_instance;
		}

		switch ($this->event)
		{
			case 'like':
				$event_instance = Model_Quest_Product_Vote::get_by_id($this->event_id);
				break;

			case 'dislike':
				$event_instance = Model_Quest_Product_Vote::get_by_id($this->event_id);
				break;

			case 'comment':
				$event_instance = Model_Quest_Product_Comment::get_by_id($this->event_id);
				break;

			case 'message':
				$event_instance = Model_Quest_Message::get_by_id($this->event_id);
				break;

			case 'product':
				$event_instance = Model_Quest_Product::get_by_id($this->event_id);
				break;

			default:
				throw new Exception("unknown event type '{$this->event}'");
				break;

		}

		return $event_instance;
	}





	public static function new_notice($event, $user_id, $quest, $event_id)
	{
		$notice = new static;
		$notice->event    = $event;
		$notice->user_id  = $user_id;
		$notice->quest_id = $quest->id;
		$notice->event_id = $event_id;

		return $notice->save() ? $notice : null;
	}


	public static function new_message($user_id, $quest, $message_id)
	{
		if ($user_id == $quest->user_id)
		{
			return;
		}
		return static::new_notice('message', $user_id, $quest, $message_id);
	}

	public static function new_like($user_id, $quest, $vote_id)
	{
		if ($user_id == $quest->user_id)
		{
			return;
		}
		return static::new_notice('like', $user_id, $quest, $vote_id);
	}

	public static function new_dislike($user_id, $quest, $vote_id)
	{
		if ($user_id == $quest->user_id)
		{
			return;
		}
		return static::new_notice('dislike', $user_id, $quest, $vote_id);
	}

	public static function new_comment($user_id, $quest, $comment_id)
	{
		if ($user_id == $quest->user_id)
		{
			return;
		}
		return static::new_notice('comment', $user_id, $quest, $comment_id);
	}

	public static function new_product($user_id, $quest, $product_id)
	{
		if ($user_id == $quest->user_id)
		{
			return;
		}
		return static::new_notice('product', $user_id, $quest, $product_id);
	}

}