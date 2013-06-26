<?php

class Model_Facebook_Friend extends Model
{
	public $identifier  = null;
	public $displayName = null;
	public $profileURL  = null;
	public $photoURL    = null;

	public function __construct($info)
	{
		$this->identifier  = (array_key_exists("id", $info)) ? $info["id"] : null;
		$this->displayName = (array_key_exists("name", $info)) ? $info["name"] : null;
		$this->profileURL  = "https://www.facebook.com/profile.php?id=" . $this->identifier;
		$this->photoURL    = "https://graph.facebook.com/" . $this->identifier . "/picture?width=150&height=150";
	}
}