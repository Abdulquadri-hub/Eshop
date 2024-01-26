<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Admin class
 */
class Admin
{
	use MainController;
	

	public function index()
	{

		$data['title'] = "Admin";

		$data['ses'] = new \Core\Session;
		$data['image'] = new \Model\Image;


		if(!$data['ses']->is_logged_in())
		{
			redirect('login');
		}		
		
		$this->view('admin/a-home',$data);
	}

	public  function products($type = "", $id = null)
	{
		//
		$data['ses'] = new \Core\Session;
		$data['req'] = new \Core\Request;
		$data['pager'] = new \Core\Pager();
		$data['image'] = new \Model\Image;

		if(!$data['ses']->is_logged_in())
		{
			redirect('login');
		}

		$product = new \Model\product;

		switch ($type) {

			case 'add':

				$data['title'] = "Add Product";

				$data['product'] = $product;

				$data['categorys'] = (new \Model\Category())->getCategorys();
				$data['brands'] = (new \Model\brand())->getBrands();

				if($data['req']->posted())
				{
					$product->createProduct($_POST);
					redirect('admin/products');
				}

				$this->view('admin/products/add',$data);
				break;
				
			case 'edit':

				$data['title'] = "Edit Product";

				$data['product'] = $product;

				if($data['req']->posted())
				{
					$product->editProduct($_POST,$id);
					// redirect('admin/products');
				}

				$data['categorys'] = (new \Model\Category())->getCategorys();
				$data['brands'] = (new \Model\brand())->getBrands();

				$data['row'] = $data['product']->getProduct($id);
				$this->view('admin/products/edit',$data);
				break;


			case 'delete':

				$data['title'] = "Delete Product";

				$data['product'] = $product;
				$this->view('admin/products/delete',$data);
				break;

			
			default:

				$data['title'] = "Products";

				$data['product'] = $product;

				$data['products'] = $data['product']->getProducts();
				$this->view('admin/products/product',$data);
				break;
		}
	}

	public  function brands($type = "", $id = null)
	{
		//
		$image = new \Model\Image;
		$user = new \Model\User;
		$ses   = new \Core\Session;
		$req   =  new \Core\Request;
		$pager = new \Core\Pager();

		$brand = new \Model\Brand();

		if(!$ses->is_logged_in())
		{
			redirect('login');
		}

		switch ($type) {

			case 'add':

				$data['title'] = "Add Brand";

				if($req->posted())
				{
					$brand->create_brand($_POST);
				}

				$data['brand'] = $brand;
				$data['image'] = $image;
				$data['ses'] = $ses;
				$this->view('admin/brands/add',$data);
				break;

			case 'edit':

				$data['title'] = "Edit Brand";

				$data['brand'] = $brand;
				$data['image'] = $image;
				$data['ses'] = $ses;

				if($req->posted())
				{
					$brand->editBrand($_POST,$id);
				}

				$data['row'] = $brand->getBrand($id);
				$this->view('admin/brands/edit',$data);
				break;


			case 'delete':

				$data['title'] = "Delete Brand";
				
				$data['brand'] = $brand;
				$data['image'] = $image;
				$data['ses'] = $ses;

				if($req->posted())
				{
					$brand->deleteBrand($id);
					redirect('admin/brands');
				}

				$data['row'] = $brand->getBrand($id);
				$this->view('admin/brands/delete',$data);
				break;

			
			default:

				$data['title'] = "Brands";

				$data['brand'] = $brand;
				$data['image'] = $image;
				$data['ses'] = $ses;

				$data['brands'] = $brand->getBrands();
				
				$this->view('admin/brands/brand',$data);
				break;
		}
	}

	public  function category($type = "", $id = null)
	{
		//
		$data['ses'] = new \Core\Session;
		$data['req'] = new \Core\Request;
		$data['pager'] = new \Core\Pager();
		$data['image'] = new \Model\Image;

		if(!$data['ses']->is_logged_in())
		{
			redirect('login');
		}

		$category = new \Model\Category();
		
		switch ($type) {

			case 'add':

				$data['title'] = "Add Category";

				if($data['req']->posted())
				{
					$category->createCategory($_POST);
				}

				$data['category'] = $category;
				$this->view('admin/categories/add',$data);
				break;

			case 'edit':

				$data['title'] = "Edit Category";

				$data['category'] = $category;

				if($data['req']->posted())
				{
					$data['category']->editCategory($_POST,$id);
				}

				$data['row'] = $data['category']->getCategory($id);
				$this->view('admin/categories/edit',$data);
				break;


			case 'delete':

				$data['title'] = "Delete Category";
				
				$data['category'] = $category;

				if($data['req']->posted())
				{
					$data['category']->deleteCategory($id);
					redirect('admin/category');
				}

				$data['row'] = $data['category']->getCategory($id);
				$this->view('admin/categories/delete',$data);
				break;

			
			default:

				$data['title'] = "Category";

				$data['category'] = $category;

				$data['categorys'] = $category->getCategorys();

				$this->view('admin/categories/category',$data);
				break;
		}
	}


	public  function orders($type = "", $id = null)
	{
		//
		$data['ses'] = new \Core\Session;
		$data['req'] = new \Core\Request;
		$data['pager'] = new \Core\Pager();
		$data['image'] = new \Model\Image;

		if(!$data['ses']->is_logged_in())
		{
			redirect('login');
		}

		$order = new \Model\Order();
		
		switch ($type) {

			case 'edit':

				$data['title'] = "Edit Order";

				$this->view('admin/orders/edit',$data);
				break;


			case 'delete':

				$data['title'] = "Delete Order";

				if($data['req']->posted())
				{
					$data['category']->deleteOrder($id);
					redirect('admin/orders');
				}
				
				$this->view('admin/orders/delete',$data);
				break;

			
			default:

				$data['title'] = "Orders";

				$query = "select * from orders 
				join users on orders.user_id = users.user_id 
				where status = :status";

				$data['completedOrders'] = $order->query($query,['status'=>'success']);

				$this->view('admin/orders/home',$data);
				break;
		}
	}


}
