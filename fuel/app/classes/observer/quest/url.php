<?php

class Observer_Quest_Url extends Orm\Observer
{
	public function before_insert(Model_Quest $quest)
	{
		$random = '';
		$is_unique = false;
		while (! $is_unique)
		{
			$random = $this->_generate_random_string(6);
			$existing_quest = Model_Quest::get_by_url($random);
			$is_unique = ! isset($existing_quest);
		}
		$quest->url = $random;
	}



	private function _generate_random_string($length)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$random = '';
		for ($i = 0; $i < $length; $i++) {
			$random .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $random;
	}

}