<?php

class Model_Chat_Product extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'chat_id',
		'product_id',
		'description',
		'created_at',
		'updated_at',
	);


	protected static $_belongs_to = array(
		'chat' => array(
			'key_from' => 'chat_id',
			'model_to' => 'Model_Chat',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

	protected static $_has_one = array(
		'product' => array(
			'key_from' => 'product_id',
			'model_to' => 'Model_Product',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

	protected static $_has_many = array(
		'votes' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Chat_Product_Vote',
			'key_to' => 'chat_product_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);


	public function total_upvotes()
	{
		//return Model_Chat_Product_Vote;
	}

	public function total_downvotes()
	{
		//return Model_Chat_Product_Vote;
	}

	public function upvote()
	{
		$this->upvotes = $this->upvotes + 1;
		$this->save();
	}

	public function downvote()
	{
		$this->downvotes = $this->downvotes + 1;
		$this->save();
	}

}