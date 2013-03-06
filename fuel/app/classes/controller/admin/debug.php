<?php

class Controller_Admin_Debug extends Controller_Admin
{
	

	public function action_logs($year = null, $month = null, $day = null)
	{
		$date = date("Y/m/d");
		$input = file(APPPATH . '/logs/' . $date . '.php');

		return Response::forge(View::forge('admin/debug/logs', array(
			'logs' => array_reverse($input),
		)));
		
	}

}