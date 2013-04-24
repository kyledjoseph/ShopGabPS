<?php

class Model_Chat_Message extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'chat_id',
		'user_id',
		'body',
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

	// protected static $_ = array(
	// 	'user' => array(
	// 		'key_from' => 'user_id',
	// 		'model_to' => 'Model_User',
	// 		'key_to' => 'id',
	// 		'cascade_save' => true,
	// 		'cascade_delete' => false,
	// 	)
	// );

	protected static $_has_many = array(
		'votes' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Chat_Product_Vote',
			'key_to' => 'chat_product_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

}