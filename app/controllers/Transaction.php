<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Payments class
 */
class Transaction
{
	use MainController;

	public function index()
	{

		$data['title'] = "Transaction";
		
		$data['ses'] = new \Core\Session;
		$order = new \Model\Order;

		if(!($data['ses']->is_logged_in()))
		{
			redirect('login');
		}


		// 

		$this->view('transacton/home',$data);
	}


	public function verify($ref = "")
	{
		$data['title'] = "Verify Transaction";
		$ip = getIPAddress();


		$data['req'] = new \Core\Request;
		$data['cart'] = new \Model\Cart;
		$data['ses'] = new \Core\Session;
		$data['user'] = new \Model\User;
		$data['order'] = new \Model\Order;
		$data['payment'] = new \Model\Payment;

		if($ref !== "")
		{
			
			// create Order
		    (new \Model\Order)->createOrder();

			$curl = curl_init();
  
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer sk_test_ad27863ff941a09158fc101d06a25f3d076a70c3",
				"Cache-Control: no-cache",
			  ),
			));
			
			$response = curl_exec($curl);
			$err = curl_error($curl);
		  
			curl_close($curl);
			
			if ($err) {
			  echo "cURL Error #:" . $err;die;

			} else {
			//   echo $response;
			$res = json_decode($response);

			if($res->data->status === "success")
			{
				//
				$message = $res->message;
				$status = $res->data->status;
				$reference = $res->data->reference;
				$amount = $res->data->amount;
				$paid_at = $res->data->paid_at;
				$created_at = $res->data->created_at;
				$fname = $res->data->customer->first_name;
				$email = $res->data->customer->email;
				$customercode = $res->data->customer->customer_code;
				$lname = $res->data->customer->last_name;
				$name = $fname . " " . $lname;


				// transaction data
				$data['payment']->create_payment(
					$ref,
				    $email,$amount,
				    $reference,$customercode,
				    $status,$paid_at,
				    $created_at
				);

				// update order table status

				$data['order']->updateOrder($status);

				// delete cart
				$data['order']->deleteOrder();

				redirect('customer');


			}else{
				redirect('transaction/error');
			}

			}

		}else{
			redirect('transaction/error');
		}

		$this->view('transaction/verify',$data);
	}

}
