<?php

class Controller_Admin_Products extends Controller_Admin
{

	public function before()
	{
		parent::before();

		$this->template->active_nav = 'products';
	}


	/**
	 *	Admin > Product Index
	 */
	public function get_index()
	{

		$this->template->body = View::forge('admin/products/index', array(
			'products' => Model_Product::get_index(),
		));
	}



	/**
	 *	Admin > Add Product
	 */
	public function get_add()
	{
		$this->template->body = View::forge('admin/products/add');
	}

	public function post_add()
	{
		$post = $this->post_data('name', 'brand', 'model', 'serial', 'warranty', 'type', 'dimensions', 'weight');

		$product = Model_Product::add_product(array(
			'name'       => $post->name,
			'brand'      => $post->brand,
			'model'      => $post->model,
			'serial'     => $post->serial,
			'warranty'   => $post->warranty,
			'type'       => $post->type,
			'dimensions' => $post->dimensions,
			'weight'     => $post->weight,
		));

		! isset($product) and $this->redirect('admin/products/add', 'error', 'An error occured while adding a product');

		$this->redirect('admin/products/add', 'success', 'Product added');
	}
}