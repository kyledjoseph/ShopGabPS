<?php

class Controller_Legal extends Controller_App
{
	public function get_privacy()
	{
		$this->template->body = View::forge('legal/privacy', array());
	}

	public function get_terms()
	{
		$this->template->body = View::forge('legal/terms', array());
	}
}