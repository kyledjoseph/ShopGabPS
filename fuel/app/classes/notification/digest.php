<?php

class Notification_Digest
{
	protected $quests_with_notifications;

	public function __construct($user, $date)
	{
		$this->user = $user;
		$this->date = $date;
		$this->quests_with_notifications = array();


		foreach ($user->get_quests() as $quest)
		{
			$notifications       = $quest->get_notifications_on_date($this->date);
			$total_notifications = count($notifications);

			if ($total_notifications > 0)
			{
				array_push($this->quests_with_notifications, $quest);
			}
		}
	}

	public function has_notifications()
	{
		return ! empty($this->quests_with_notifications);
	}

	public function send()
	{
		if (! $this->has_notifications())
		{
			return;
		}

		// if (! $this->user->) receive daily digest return;
		$content = View::forge('emails/digest', array(
				'quests_with_notifications' => $this->quests_with_notifications,
				'date' => $this->date,
			));

		Service_Email::send(array(
			'type'      => 'daily_digest',
			'to_addr'   => $this->user->email,
			'from_name' => 'ShopGab',
			'from_addr' => 'info@shopgab.com',
			'subject'   => 'ShopGab Daily Digest',
			'body'      => View::forge('emails/template', array(
				'content' => $content,
			)),
		));

			
	}

}