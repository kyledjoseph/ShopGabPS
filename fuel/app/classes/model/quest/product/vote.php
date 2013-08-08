<?php

class Model_Quest_Product_Vote extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'quest_product_id',
		'user_id',
		'vote', // 1 => 'like', 0 => 'dislike'
		'created_at',
		'updated_at',
	);


	protected static $_belongs_to = array(
		'quest_product' => array(
			'key_from' => 'quest_product_id',
			'model_to' => 'Model_Quest_Product',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'user' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model_User',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);


	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);


	public function is_like()
	{
		return ($this->vote == 1);
	}

	public function is_dislike()
	{
		return ($this->vote == 0);
	}

	public function change_to_like()
	{
		$this->vote = '1';
		return $this->save() and $this->quest_product->cache_votes();
	}

	public function change_to_dislike()
	{
		$this->vote = '0';
		return $this->save() and $this->quest_product->cache_votes();
	}


	public static function create_like($quest_product_id, $user_id)
	{
		$vote = static::forge(array(
			'quest_product_id' => $quest_product_id,
			'user_id' => $user_id,
			'vote' => 1,
		));
		return $vote->save();
	}


	public static function create_dislike($quest_product_id, $user_id)
	{
		$vote = static::forge(array(
			'quest_product_id' => $quest_product_id,
			'user_id' => $user_id,
			'vote' => 0,
		));
		return $vote->save();
	}
}