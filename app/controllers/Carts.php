<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Carts class
 */
class Carts
{
	use MainController;

	public function index($type = "", $id = "")
	{

		$data['title'] = "Carts";
		$data['req'] = new \Core\Request;
		$data['cart'] = new \Model\Cart;
		$data['ses'] = new \Core\Session;
		$data['user'] = new \Model\User;
		$data['order'] = new \Model\Order;

		$data['mode'] = "";

		$data['carts'] = $data['cart']->displayCartItems();

		$data['totalprice'] = $data['cart']->totalCartItemsPrice();


		$data['subtotalprice'] = $data['cart']->getSubtotalPrice();


		// update
		$data['cart']->updateCart();

		// delete
		if(isset($_POST['delete']))
		{
			//
			$ip = getIPAddress();
			unset($_POST['delete'], $_POST['update']);

			$cart_id = $_POST['cart_id'];

			if(!empty($cart_id ))
			{
				$query = "delete from carts 
				where ip_address = :ip_address 
				and cart_id = :cart_id limit 1";
				
				$item = $data['cart']->query($query,[
					'ip_address'=>$ip,
					'cart_id'=>$cart_id
				]);

				// if(!$item)
				// {
				// 	$quantity = $data['cart']->increaseTotalPrice();
				// 	$data['totalprice'] = (($data['totalprice']) * $quantity);
				// }
			}
		}

		switch ($type) {

			case 'place-order':
				# code...
				if(!$data['ses']->is_logged_in())
				{
					redirect('login');
				}
				$data['mode'] = "place-order";

				$data['order']->createOrder();
				break;
			
			default:
				# code...
				break;
		}

		$data['categorys'] = (new \Model\Category)->getCategorys();

		$this->view('carts/cart',$data);	
	}


	// public function Transaction_cancelled($id= null)
	// {
	// 	$data['title'] = "Transaction";

	// 	$data['title'] = "Carts";
	// 	$data['req'] = new \Core\Request;
	// 	$data['cart'] = new \Model\Cart;
	// 	$data['ses'] = new \Core\Session;
	// 	$data['user'] = new \Model\User;

	// 	$data['carts'] = $data['cart']->displayCartItems();

	// 	$data['totalprice'] = $data['cart']->totalCartItemsPrice() ?? 0;

	// 	// update
	// 	$data['subtotalprice'] = $data['cart']->updateCart();

	// 	// delete
	// 	if(isset($_POST['delete']))
	// 	{
	// 		//
	// 		$ip = getIPAddress();
	// 		unset($_POST['delete'], $_POST['update']);

	// 		$cart_id = $_POST['cart_id'];

	// 		if(!empty($cart_id ))
	// 		{
	// 			$query = "delete from carts 
	// 			where ip_address = :ip_address 
	// 			and cart_id = :cart_id limit 1";
				
	// 			$item = $data['cart']->query($query,[
	// 				'ip_address'=>$ip,
	// 				'cart_id'=>$cart_id
	// 			]);

	// 			// if(!$item)
	// 			// {
	// 			// 	$quantity = $data['cart']->increaseTotalPrice();
	// 			// 	$data['totalprice'] = (($data['totalprice']) * $quantity);
	// 			// }
	// 		}
	// 	}


	// 	$data['categorys'] = (new \Model\Category)->getCategorys();

	// 	$this->view('carts/cart',$data);
	// }

}
