<?php

class Service_Cloudfiles
{
	private static $connection = null;

	public static function get_connection()
	{
		if (isset(static::$connection))
		{
			return static::$connection;
		}
		
		$username = 'itemnation';
		$api_key  = '750116f1c657bddb347b0a747ea5fd1d';

		$auth = new CF_Authentication($username, $api_key);
		$auth->authenticate();
		
		static::$connection = new CF_Connection($auth);
		return static::$connection;
	}
}