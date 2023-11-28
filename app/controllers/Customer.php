<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Customer class
 */
class Customer
{
	use MainController;

	public function index()
	{

		$data['title'] = "Customer";

		$data['ses'] = new \Core\Session;

		if(!$data['ses']->is_logged_in())
		{
			redirect('login');
		}

		
		$this->view('customer/home',$data);
	}

	public function account($actions = "", $id = null)
	{

		$data['title'] = "My Account";

		$data['ses'] = new \Core\Session;
		$data['req'] = new \Core\Request;
		$data['user'] = new \Model\User;

		$data['mode'] = 'overview';

		if(!$data['ses']->is_logged_in())
		{
			redirect('login');
		}

		if(empty($id) && $id == "")
		{
			$id = $data['ses']->user('user_id');
		}

		switch ($actions) {
			
			case 'edit':
				# code...
				$data['mode'] = 'edit';
				
				if($data['req']->posted())
				{
					$data['user']->editCustomerProfile($_POST,$id);
				}
				break;

			case 'delete':
				# code...
				$data['mode'] = 'delete';
				if($data['req']->posted())
				{
					$data['user']->deleteCustomerProfile($id);
					redirect('logout');
				}
				break;
			
			default:
				# code...
				break;
		}

		$data['row'] = $data['user']->first(['user_id'=>$id]);
		
		$this->view('customer/account',$data);
	}

	public function wishlists()
	{

		$data['title'] = "My WishLists";

		$data['ses'] = new \Core\Session;

		if(!$data['ses']->is_logged_in())
		{
			redirect('login');
		}

		
		$this->view('customer/wisjlists',$data);
	}

	public function myorders()
	{

		$data['title'] = "My Orders";

		$data['ses'] = new \Core\Session;

		if(!$data['ses']->is_logged_in())
		{
			redirect('login');
		}

		
		$this->view('customer/myorders',$data);
	}

	public function pemdingorders()
	{

		$data['title'] = "My Orders";

		$data['ses'] = new \Core\Session;

		if(!$data['ses']->is_logged_in())
		{
			redirect('login');
		}

		
		$this->view('customer/myorders',$data);
	}

}
