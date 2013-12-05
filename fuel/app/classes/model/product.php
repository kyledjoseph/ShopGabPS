<?php

class Model_Product extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'category_id',
		'name',
		'description',
		'price',
		'domain',
		'url',

		'brand',
		'model',
		'serial',
		'warranty',
		'type',
		'dimensions',
		'weight',
		
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
		'quest' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Quest_Product',
			'key_to' => 'product_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

	protected static $_has_one = array(
		'image' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Product_Image',
			'key_to' => 'product_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'quest_product' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Quest_Product',
			'key_to' => 'product_id',
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


	public function get_quest()
	{
		return $this->quest;
	}

	public function name()
	{
		return $this->name;
	}



	public function description()
	{
		return $this->description;
	}

	public function price()
	{
		return $this->price;
	}

	public function url()
	{
		return '#';
	}

	public function product_url()
	{
		return $this->url;
	}






	/**
	 * Product Image
	 */
	protected $image_sizes = array('250' => '220', '50' => '50');

	public function is_image_size($width, $height)
	{
		return isset($this->image_sizes[$width]) and $this->image_sizes[$width] == $height;
	}

	public function image($width = 50, $height = 50)
	{
		if (! $this->is_image_size($width, $height))
		{
			throw new Exception("Invalid Product_Image size {$width}x{$height}");
		}

		$image = Model_Product_Image::query()->where('product_id', $this->id)->where('width', $width)->where('height', $height)->get_one();

		if (! isset($image))
		{
			throw new Exception("Product_Image {$width}x{$height} not found for product_id #{$this->id}");
		}
		
		return $image;
	}

	public function image_url($width = 50, $height = 50)
	{
		$image = $this->image($width, $height);
		
		return $image->public_uri;
	}

	public function add_image($src_url)
	{
		ini_set('memory_limit', '128M');

		$connection = Service_Cloudfiles::get_connection();

		// make request
		$curl = Request::forge($src_url, 'curl');
		$curl->execute();
		$response   = $curl->response();

		// save paths
		$file_name = md5(uniqid(rand(), true));
		$tmp_dir   = APPPATH . 'tmp/';
		$tmp_path  = $tmp_dir . $file_name;

		// save tmp
		File::create($tmp_dir, $file_name, $response->body());

		// add file extension
		$tmp_type = exif_imagetype($tmp_path);

		switch ($tmp_type)
		{
			case IMAGETYPE_GIF:
				$ext = '.gif';
				break;

			case IMAGETYPE_JPEG:
				$ext = '.jpg';
				break;

			case IMAGETYPE_PNG:
				$ext = '.png';
				break;

			default:
				throw new Exception("Unknown image type: '{$tmp_type}'", 1);
		}

		// rename file with proper extension
		File::rename($tmp_path, $tmp_path . $ext);
		$file_name = $file_name . $ext;
		$tmp_path  = $tmp_path . $ext;

		// resize thumbs
		foreach ($this->image_sizes as $width => $height)
		{
			$tmp_resize_path = $tmp_dir . "{$width}x{$height}_{$file_name}";

			$i = Image::load($tmp_path)
				->crop_resize($width, $height)
				->save($tmp_resize_path);

			$container = $connection->get_container("products_{$width}x{$height}");
			$image     = $container->create_object($file_name);

			$image->load_from_filename($tmp_resize_path);

			$product_image = new Model_Product_Image;
			$product_image->product_id           = $this->id;
			$product_image->name                 = $image->name;
			$product_image->src_url              = $src_url;
			$product_image->public_uri           = $image->public_uri();
			$product_image->public_ssl_uri       = $image->public_ssl_uri();
			$product_image->public_streaming_uri = $image->public_streaming_uri();
			$product_image->width                = $width;
			$product_image->height               = $height;
			$product_image->content_length       = $image->content_length;
			$product_image->save();

			File::delete($tmp_resize_path);

			$i = null;
		}

		File::delete($tmp_path);

	}



	public static function get_index()
	{
		return static::query()->order_by('name', 'asc')->get();
	}
	
	public static function add_product($attr)
	{
		$product = static::forge($attr);
		return $product->save() ? $product : null;
	}

	public static function get_users_products($user_id)
	{
		return static::query()->where('user_id', $user_id)->get();
	}

}