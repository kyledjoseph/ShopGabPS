<?php

class Model_Facebook_Friend extends Model
{
	public $identifier   = null;
	public $display_name = null;

	public function __construct($info)
	{
		$this->identifier   = (array_key_exists("id", $info)) ? $info["id"] : null;
		$this->display_name = (array_key_exists("name", $info)) ? $info["name"] : null;
	}


	public function profile_url()
	{
		return "https://www.facebook.com/profile.php?id=" . $this->identifier;
	}

	public function photo_url($width = 32, $height = 32)
	{
		return "https://graph.facebook.com/" . $this->identifier . "/picture?width={$width}&height={$height}";
	}
}