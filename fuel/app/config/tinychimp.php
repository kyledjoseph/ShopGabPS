<?php
/**
 * TinyChimp config file
 */
 
return array(
	// required
	// your secret MailChimp API key
	'api_key' => '2e006e79fba77e85b33c35e9e4bcb608-us5',
	
	// whether or not to use a secure connection
	// note: setting this to true might slow down your application
	'secure'  => false,
	
	// connection timeout in seconds
	'timeout' => 300,
	
	// optional
	// note: fill out only if you want to use a custom url
	'api_url' => ''
);