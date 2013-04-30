<?php

class Service_Email
{
	public static function send($email)
	{
		// valid $email['type'] [invite,register,password_reset]

		if (empty($email['from_name']))
		{
			$email['from_name'] = $email['from_addr'];
		}

		if (empty($email['to_name']))
		{
			$email['to_name'] = $email['to_addr'];
		}


		$email = Email::forge();

		$email->from($email['from_addr'], $email['from_name']);
		$email->to($email['to_addr'], $email['to_name']);

		$email->subject($email['subject']);
		$email->body($email['body']);

		$email->send();

		$log = Service_Email_Log::log_event(array(
			'to_name'   => $email['to_name'],
			'to_addr'   => $email['to_addr'],
			'from_name' => $email['from_name'],
			'from_addr' => $email['from_addr'],
			'subject'   => $email['subject'],
			'body'      => $email['body'],
		));



	}
}