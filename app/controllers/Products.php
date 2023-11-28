<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Products class
 */
class Products
{
	use MainController;

	public function index()
	{
		$data['title'] = "All Products";


		$data['image'] = new \Model\Image();
		$data['ses'] = new \Core\Session();
		$data['product'] = new \Model\Product;

		$data['products'] = $data['product']->getProducts();
		$data['categorys'] = (new \Model\Category)->getCategorys();
		$data['brands'] = (new \Model\Brand)->getBrands();
		$this->view('products',$data);
	}

}
