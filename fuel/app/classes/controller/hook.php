<?php

class Controller_Hook extends Controller_App
{
	// public function after($response)
	// {
	// 	return $response;
	// }

	public function post_deploy()
	{
		$payload = new Deployment_Payload;
		$payload_data = Input::post('payload');

		if (! $payload->valid_github_ip())
		{
			//throw new Exception("Invalid github hook ip address '{$payload->request_ip()}'", 1);
		}

		$payload->set_data(html_entity_decode($payload_data));
		$payload->log();
		
		if ($payload->branch() == 'test')
		{
			$repo = new PHPGit_Repository('/var/www/shopgab');

			if (! $repo->hasBranch('test'))
			{
				throw new Deployment_Exception("Branch 'test' does not exist on repository ");
			}

			$repo->git('pull origin test');
		}

		if ($payload->branch() == 'master')
		{
			
		}

		return true;
	}
}