<?php

class Model_Product extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'brand_id',
		'model',
		'serial',
		'warranty',
		'type',
		'dimensions',
		'weight',
		'created_at',
		'updated_at',
	);


}