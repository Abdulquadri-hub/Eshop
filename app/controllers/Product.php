<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Product class
 */
class Product
{
	use MainController;

	public function index($product_slug,$product_id)
	{
		$data['title'] = "Product";


		$data['image'] = new \Model\Image();
		$data['product'] = new \Model\Product;
		$data['ses'] = new \Core\Session();
		$data['req'] = new \Core\Request;

		$cart = new \Model\Cart;

		if($data['req']->posted())
		{
			$cart->createCart($product_slug,$product_id);
		}
		
		
		$data['row'] = $data['product']->getProductBySlug($product_slug,$product_id);
		$this->view('product',$data);
	}

}
