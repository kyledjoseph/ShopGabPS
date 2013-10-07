<?php

class Deployment_Payload extends \Orm\Model
{
	protected static $_table_name = 'deployment_payloads';
	protected static $_properties = array(
		'id',
		'data',
		'ip',
		'created_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
	);



	public function request_ip()
	{
		return Input::ip();
	}

	public function valid_github_ip()
	{
		// https://help.github.com/articles/what-ip-addresses-does-github-use-that-i-should-whitelist
		$valid_github_ips = array('204.232.175.64', '204.232.175.27', '192.30.252.0', '192.30.252.22');
		return in_array($this->request_ip(), $valid_github_ips);
	}
}