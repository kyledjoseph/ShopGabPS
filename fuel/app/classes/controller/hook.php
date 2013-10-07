<?php

class Controller_Hook extends Controller_App
{
	public function post_deploy()
	{
		$payload = new Deployment_Payload;
		$payload_data = Input::post('payload');

		if (! $payload->valid_github_ip())
		{
			//throw new Exception("Invalid github hook ip address '{$payload->request_ip()}'", 1);
		}


		$payload->data = html_entity_decode($payload_data);
		$payload->ip   = $payload->request_ip();
		$payload->save();

		// deploy to test and master


		return true;
	}
}