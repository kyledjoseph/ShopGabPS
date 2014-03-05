<?php

class Service_Email
{
	public static function send($attr)
	{
		// valid $attr['type'] [invite,register,password_reset]

		if (empty($attr['from_name']))
		{
			$attr['from_name'] = $attr['from_addr'];
		}

		if (empty($attr['to_name']))
		{
			$attr['to_name'] = $attr['to_addr'];
		}

		// render the view
		if (get_class($attr['body']) == 'Fuel\Core\View')
		{
			$attr['body'] = $attr['body']->render();
		}


		// * 	- images array an array of embedded images to add to the message
		// *         - images[] struct a single embedded image
		// *             - type string the MIME type of the image - must start with "image/"
		// *             - name string the Content ID of the image - use <img src="cid:THIS_VALUE"> to reference the image in your HTML content
		// *             - content string the content of the image as a base64-encoded string


		$message = array(
			'subject'    => $attr['subject'],
			'from_email' => $attr['from_addr'],
			'from_name'  => $attr['from_name'],
			'to' => array(
				array('email'  => $attr['to_addr'], 'name'   => $attr['to_name'])
			),
			'html'       => $attr['body'],
			'images'     => array(
				array(
					'type'    => 'image/png',
					'name'    => 'SHOPGAB_LOGO',
					'content' => base64_encode(file_get_contents(DOCROOT . 'assets/img/email/logo.png')),
				),
			),
		);

		$mandrill = new Mandrill('TuKwIsrSRAh7nwWiWVXZyQ');
		$mandrill->messages->send($message, true);

		$log = Service_Email_Log::log_event(array(
			'type'      => $attr['type'],
			'to_name'   => $attr['to_name'],
			'to_addr'   => $attr['to_addr'],
			'from_name' => $attr['from_name'],
			'from_addr' => $attr['from_addr'],
			'subject'   => $attr['subject'],
			'body'      => $attr['body'],
		));

	}
}