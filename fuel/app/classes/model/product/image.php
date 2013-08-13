<?php

class Model_Product_Image extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'product_id',
		'name',
		'src',     // deprecated
		'src_url', // deprecated
		'public_uri',
		'public_ssl_uri',
		'public_streaming_uri',
		'width',
		'height',
		'content_length',
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

	public function src_url()
	{
		return $this->src_url;
	}


	public function image_path()
	{
		return '/assets/img/products/';
	}

	/**
	 * 
	 */
	public function src()
	{
		return $this->image_path(). 'full/' . $this->src;
	}

	/**
	 * 
	 */
	public function thumb()
	{
		return $this->image_path(). '250x220/' . $this->src;
	}

	public function small()
	{
		return $this->image_path(). '50x50/' . $this->src;
	}



	public static function get_by_id($image_id)
	{
		return static::query()->where('id', $image_id)->get_one();
	}

	

	// public static function add_image($product_id, $url)
	// {
	// 	// $path_parts    = pathinfo($url);
	// 	// $ext           = strtolower($path_parts['extension']);
	// 	// $supported_ext = array('jpg', 'jpeg', 'png', 'bmp');

	// 	// file type not supported
	// 	// if (empty($ext) or ! in_array($ext, $supported_ext))
	// 	// {
	// 	// 	return;
	// 	// 	throw new Exception("Unknown or unsupported extension: '$ext' in product image url: '$url'");
	// 	// }
		
	// 	// make request
	// 	$curl = Request::forge($url, 'curl');
	// 	$curl->execute();

	// 	$response   = $curl->response();
	// 	$image_data = $response->body();

	// 	// save paths
	// 	$file_name  = md5(uniqid(rand(), true));

	// 	$tmp_dir    = DOCROOT . '/assets/img/products/tmp/';
	// 	$full_dir   = DOCROOT . '/assets/img/products/full/';
	// 	$thumb_dir  = DOCROOT . '/assets/img/products/250x220/';
	// 	$small_dir  = DOCROOT . '/assets/img/products/50x50/';
		
	// 	$tmp_path   = $tmp_dir . $file_name;
	// 	$full_path  = $full_dir . $file_name;
	// 	$thumb_path = $thumb_dir . $file_name;
	// 	$small_path = $small_dir . $file_name;

	// 	// save tmp
	// 	File::create($tmp_dir, $file_name, $image_data);

	// 	$tmp_type = exif_imagetype($tmp_path);

	// 	switch ($tmp_type)
	// 	{
	// 		case IMAGETYPE_GIF:
	// 			$ext = 'gif';
	// 			break;

	// 		case IMAGETYPE_JPEG:
	// 			$ext = 'jpg';
	// 			break;

	// 		case IMAGETYPE_PNG:
	// 			$ext = 'png';
	// 			break;

	// 		default:
	// 			throw new Exception("Unknown image type: '{$tmp_type}'", 1);
				
	// 	}

	// 	// Image types
	// 	// 1	IMAGETYPE_GIF
	// 	// 2	IMAGETYPE_JPEG
	// 	// 3	IMAGETYPE_PNG
	// 	// 4	IMAGETYPE_SWF
	// 	// 5	IMAGETYPE_PSD
	// 	// 6	IMAGETYPE_BMP
	// 	// 7	IMAGETYPE_TIFF_II (intel byte order)
	// 	// 8	IMAGETYPE_TIFF_MM (motorola byte order)
	// 	// 9	IMAGETYPE_JPC
	// 	// 10	IMAGETYPE_JP2
	// 	// 11	IMAGETYPE_JPX
	// 	// 12	IMAGETYPE_JB2
	// 	// 13	IMAGETYPE_SWC
	// 	// 14	IMAGETYPE_IFF
	// 	// 15	IMAGETYPE_WBMP
	// 	// 16	IMAGETYPE_XBM
	// 	// 17	IMAGETYPE_ICO

	// 	$full_file  = $full_path . '.' . $ext;
	// 	$thumb_file = $thumb_path . '.' . $ext;
	// 	$small_file = $small_path . '.' . $ext;

	// 	// save full size image
	// 	File::copy($tmp_path, $full_file);

	// 	// crop, resize, and save
	// 	$image = Image::forge();

	// 	$image->load($full_file)
	// 		->crop_resize(250, 220)
	// 		->save($thumb_file);

	// 	$image->load($full_file)
	// 		->crop_resize(50, 50)
	// 		->save($small_file);

	// 	// remove temporary file
	// 	File::delete($tmp_path);

	// 	$product_image = static::forge(array(
	// 		'product_id' => $product_id,
	// 		'src_url'    => $url,
	// 		'src'        => $file_name . '.' . $ext,
	// 	));

	// 	return $product_image->save() ? $product_image : null;
	// }
}