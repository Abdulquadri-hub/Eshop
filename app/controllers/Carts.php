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


	public function carts_ajax($id = null) 
	{
		
		//ajax code for cart goes  here
		$data['title'] = "Carts";
		$data['req'] = new \Core\Request;
		$data['cart'] = new \Model\Cart;
		$data['ses'] = new \Core\Session;
		$data['user'] = new \Model\User;
		$data['order'] = new \Model\Order;


		$raw_data = file_get_contents("php://input");
		$OBJ = (object)json_decode($raw_data, true);
		$info = (object)[];

		if(is_object($OBJ))
		{
			if($OBJ->data_type == "read")
			{
				$info->data_type = $OBJ->data_type;
				$rows = $data['cart']->displayCartItems();

				if($rows) 
				{
					$info->status = http_response_code(200);
					$info->data = $rows;
				}
			}

			echo json_encode($info);
		}

	}

}
