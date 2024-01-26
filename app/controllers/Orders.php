<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Orders class
 */
class Orders
{
	use MainController;

	public function index()
	{

		$data['title'] = "Orders";

		$this->view('admin/orders/home',$data);
	}

}
