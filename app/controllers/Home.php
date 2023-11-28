<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class Home
{
	use MainController;

	public function index()
	{
		$data['title'] = "Home";
		
		$data['image'] = new \Model\Image;
		$data['product'] = new \Model\Product;
		$data['ses'] = new \Core\Session;

		$data['popularproducts'] = $data['product']->getPopularProducts();
		$data['productsWithCategory'] = $data['product']->productsWithCategory();

		
		$data['categorys'] = (new \Model\Category)->getCategorys();
		$data['brands'] = (new \Model\Brand)->getBrands();

		$this->view('home',$data);
	}

}
