<?php 

defined('ROOTPATH') OR exit('Access Denied!');

define("PATH", realpath(dirname(__DIR__)));

if((empty($_SERVER['SERVER_NAME']) && php_sapi_name() == 'cli') || (!empty($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'))
{
	/** database config **/
	define('DBNAME', 'db_eshop');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');
	
	define('ROOT', 'http://localhost/E-shop');

}else
{
	/** database config **/
	define('DBNAME', 'mvc_db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');

	define('ROOT', 'https://www.yourwebsite.com');

}

define('APP_NAME', "| ESHOP");
define('APP_DESC', "Best website on the planet");

/** true means show errors **/
define('DEBUG', true);
