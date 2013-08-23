<?php

class Model_Invite_Email extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',  // sender user_id
		'quest_id', // quest invited to
		'email',    // recipient email
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
		'Orm\\Observer_Self' => array(
			'events' => array('before_save', 'after_insert')
		),
	);

	public static function send_invite(Model_User $user, Model_Quest $quest, $recipient, $subject, $description)
	{
		// create invitation record
		$invite = static::forge(array(
			'user_id'  => $user->id,
			'quest_id' => $quest->id,
			'email'    => $recipient,
		));

		// if recipient is registered, add as friend
		$account = Model_User::get_by_email($recipient);
		if (isset($account) and ! $user->is_friend($account->id))
		{
			$user->add_friend($account);
		}

		Service_Email::send(array(
			'type'      => 'quest_invite',
			'to_addr'   => $recipient,
			'from_name' => 'ShopGab',
			'from_addr' => 'info@shopgab.com',
			'subject'   => $subject,
			'body'      => View::forge('emails/template', array(
				'content' => View::forge('emails/invite', array(
					'quest'       => $quest,
					'description' => $description,
				))
			), false),
		));


	}
}