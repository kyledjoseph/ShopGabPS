<?php

class Model_Chat_Product_Comment extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'chat_product_id',
		'user_id',
		'body',
		'created_at',
		'updated_at',
	);


	protected static $_belongs_to = array(
		'chat_product' => array(
			'key_from' => 'chat_id',
			'model_to' => 'Model_Chat_Product',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);

}