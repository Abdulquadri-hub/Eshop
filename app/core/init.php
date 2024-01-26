<?php 

defined('ROOTPATH') OR exit('Access Denied!');

spl_autoload_register(function($classname){

	$classname = explode("\\", $classname);
	$classname = end($classname);
	require $filename = "app/models/".ucfirst($classname).".php";
});

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';

// checkIfSessionExpired('cart');
// function checkIfSessionExpired($type)
// {

//   switch ($type) {
//     case 'cart':
//       $timeout = 60;
//       $ip = getIPAddress();
    
//       if(isset($_SESSION['cart_items']))
//       {
//         if(time() < $timeout)
//         {
//           //
//           $cart = new \Model\Cart;
//           unset($_SESSION['cart_items']);
//           $cart->query(
//             "delete from carts where ip_address = :ip_address",
//             ['ip_address'=>$ip]
//           );
//         }
//       }
//       break;
    
//     default:
//       # code...
//       break;
//   }
// }