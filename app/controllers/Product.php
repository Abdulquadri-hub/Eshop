<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Product class
 */
class Product
{
	use MainController;

	public function index($product_slug = "",$product_id = "")
	{
		$data['title'] = "Product";


		$data['image'] = new \Model\Image();
		$data['product'] = new \Model\Product;
		$data['ses'] = new \Core\Session();
		$data['req'] = new \Core\Request;

	
		$this->view('product',$data);
	}

	public function single()
	{
		$image = new \Model\Image();
		$product = new \Model\Product;
		$ses = new \Core\Session();
		$req = new \Core\Request;


		$raw_data = file_get_contents("php://input");
		$OBJ = (object)json_decode($raw_data, true);
		$info = (object)[];
		
		if(is_object($OBJ))
		{
			if($OBJ->data_type == "read")
			{
				$info->data_type = $OBJ->data_type;
				$product->limit = 1;
				$row = $product->getProductBySlug($OBJ->urlparams[2],$OBJ->urlparams[3]);

				if($row)
				{
					$info->data = $row;
					

					http_response_code(200);
					$info->extra = [
						"data" => $info->data,
						"message" => "request was successful"
					];

				} else {

					http_response_code(200);
					$info->extra = [
						"message" => "empty data",
					];
				}

			}else
			if($OBJ->data_type == "add_to_cart")
			{
				$info->data_type = $OBJ->data_type;
				$info->text = $OBJ->text;

				$arr = [];

				foreach($OBJ->text as $row)
				{
					$cart = new \Model\Cart;
					if($cart->createCart($OBJ->urlparams[2],$OBJ->urlparams[3])){
						$info->item_count = $cart->showCartItemsInBag();
						$info->status = "Bag Added!";
					}
					
				}
			}

			echo json_encode($info);
		}
	}

}
