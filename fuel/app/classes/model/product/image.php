<?php

class Model_Product_Image extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'product_id',
		'src_url',
		'src',
		'thumb',
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
		'product' => array(
			'key_from' => 'product_id',
			'model_to' => 'Model_Product',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
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

	public function src()
	{
		return $this->src_url;
	}



	public static function add_image($product_id, $url)
	{
		$path_parts    = pathinfo($url);
		$ext           = strtolower($path_parts['extension']);
		$supported_ext = array('jpg', 'jpeg', 'png', 'bmp');

		// file type not supported
		if (empty($ext) or ! in_array($ext, $supported_ext))
		{
			throw new Exception("Unknown or unsupported extension: '$ext' in product image url: '$url'");
		}
		
		// make request
		$curl = Request::forge($url, 'curl');
		$curl->execute();
		$image_data = $curl->response();

		// save paths
		$save_dir  = DOCROOT . '/assets/img/products/';
		$rand      = md5(uniqid(rand(), true));
		$orig_file = $rand . '.' . $ext;
		$orig_path = $save_dir . $orig_file;

		// save original
		File::create($save_dir, $orig_file, $image_data);

		// crop, resize, and save thumbnail
		$image = Image::forge();
		$image->load($orig_path)
			->crop_resize(200, 200)
			->save_pa(null, '_thumb');

		// db
		$product_image = static::forge(array(
			'product_id' => $product_id,
			'src_url'    => $url,
		));

		return $product_image->save() ? $product_image : null;
	}
}