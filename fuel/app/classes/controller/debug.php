<?php

class Controller_Debug extends Controller_App
{
	public function get_email()
	{
		$message = array(
			'html'       => 'hello world!',
			'subject'    => 'test message',
			'from_email' => 'test@itemnation.com',
			'from_name'  => 'itemnation.com',
			'to' => array(
				array('email'  => 'tmatthewsdev@gmail.com', 'name'   => 'Tyler Matthews',)
			),
		);

		$mandrill = new Mandrill('TuKwIsrSRAh7nwWiWVXZyQ');
		$mandrill->messages->send($message, true);

		return Response::forge('sent');
	}

	public function get_fb()
	{
		$friends = $this->user->get_registered_facebook_friends();
		echo '<pre>';
		echo var_dump($friends[1]['data']);
		echo '</pre>';
	}

	public function get_friends()
	{
		$hybridauth = $this->auth->hybridauth_instance();
		$adapter    = $hybridauth->authenticate('facebook');
		$friends    = $adapter->getUserContacts();

		echo '<pre>';
		echo var_dump($friends);
		echo '</pre>';

		return Response::forge();
	}

	public function get_curl()
	{
		$url           = 'http://img87.imageshack.us/img87/5673/rotatetrans.png';
		$path_parts    = pathinfo($url);
		$ext           = $path_parts['extension'];
		$supported_ext = array('jpg', 'jpeg', 'png', 'bmp');

		if (empty($ext) or ! in_array($ext, $supported_ext))
		{
			throw new Exception("Unknown or unsupported extension: '$ext' in product image url: '$url'");
		}
		
		// make request
		$curl = Request::forge($url, 'curl');
		$curl->execute();
		$image_data = $curl->response();

		$save_dir  = DOCROOT . '/assets/tmp/';
		$rand      = md5(uniqid(rand(), true));
		$orig_file = $rand . '.' . $ext;

		// 
		File::create($save_dir, $orig_file, $image_data);

		// 
		$image = Image::forge();
		$image->load("{$save_dir}{$orig_file}")
			->crop_resize(200, 200)
			->save(null, '_thumb');

		return Response::forge('done');
	}
}