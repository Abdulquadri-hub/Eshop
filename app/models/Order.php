<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Order class
 */
class Order
{
	
	use Model;

	protected $table = 'orders';
	protected $primaryKey = 'id';
	protected $loginUniqueColumn = 'email';

	protected $allowedColumns = [
		'order_id',
		'user_id',
		'ip_address',
		'subtotalprice',
		'totalquantity',
		'status',
		'date_created',
		'date_updated',
	];

	protected $onInsertValidationRules = [
	];

	protected $onUpdateValidationRules = [
	];

	public function createOrder()
	{
		$cart = new \Model\Cart;
		$ses = new \Core\Session;

		if(!$this->checkOrder())
		{
			
			$data['order_id'] = randomString(10);
			$data['user_id'] = $ses->user('user_id');
			$data['ip_address'] = getIPAddress();
			$data['subtotalprice'] = $cart->totalCartItemsPrice();
			$data['totalquantity'] = $cart->getSubtotalPrice();
			$data['status'] = "pending";
			$data['date_created'] = date("Y-m-d H:i:s");
			$data['date_updated'] = date("Y-m-d H:i:s");

			$this->insert($data);

		}

		return false;

	}

	public  function checkOrder()
	{
		//
		$ses = new \Core\Session;
		$ip = getIPAddress();
		
		$this->limit = 1;

			$row = $this->where(['ip_address'=>$ip]);
			if(is_array($row) && count($row) == 1)
			{
				return true;
			}
	}

	public  function updateOrder($status)
	{
		//
		$order = new \Model\Order;
		$ses = new \Core\Session;

		$user_id = $ses->user('user_id');
		$ip = getIPAddress();

		if($this->checkOrder())
		{
			$data['date_updated'] = date("Y-m-d H:i:s");

			$query = "update orders set
			status = :status 
			where 
			user_id = :user_id && ip_address = :ip_address";

			$this->query($query,['user_id'=>$user_id, 'ip_address'=>$ip, 'status'=>$status]);

		}
	}

	public  function deleteOrder()
	{
		//
		$ses = new \Core\Session;
		$ip = getIPAddress();

		$query = "delete from carts where 
		ip_address = :ip_address
		";
		(new \Model\Cart)->query($query,[
			'ip_address' => $ip,
		]);


	}

	public function getOrderTotalPrice()
	{
		//
		$ses = new \Core\Session;
		$cart = new \Model\Cart;

		$totalPrice = $cart->totalCartItemsPrice();
		if($totalPrice)
		{
			$quantity = $cart->SumQuantity();
			if($quantity == 0)
			{
				$quantity = 1;
				$subTotalprice = (($totalPrice) * $quantity);

			}else{
                $quantity = $quantity;
				$subTotalprice = (($totalPrice) * $quantity);
			}
			
			return $subTotalprice;
		}

		return 0;
	}

	public function getFinalQuantity()
	{
		//
		$ses = new \Core\Session;
		$cart = new \Model\Cart;

		$data = $cart->displayCartItems();
		if($data)
		{
			return count($data) ?? 0;
		}

		return 0;

	}	
	


}