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

	public function mark_seen()
	{
		$this->seen_at = time();
		return $this->save();
	}

	public function get_event()
	{
		switch ($this->event)
		{
			case 'like':
				return Model_Quest_Product_Vote::get_by_id($this->event_id);

			case 'dislike':
				return Model_Quest_Product_Vote::get_by_id($this->event_id);

			case 'comment':
				return Model_Quest_Product_Comment::get_by_id($this->event_id);

			case 'message':
				return Model_Quest_Message::get_by_id($this->event_id);

			case 'product':
				return Model_Quest_Product::get_by_id($this->event_id);

			default:
				throw new Exception("unknown event type '{$this->event}'");
				break;

		}
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