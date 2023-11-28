<?php

namespace Thunder;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Carts class
 */
class Carts extends Migration
{
	
	public function up()
	{
		/** create a table **/
		// 'cart_id',
		// 'product_id',
		// 'quantity',
		// 'ip_address',
		// 'user_id',
		// 'date_created',
		// 'date_updated',

		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('cart_id varchar(60) NOT NULL');
		$this->addColumn('product_id varchar(60) NOT NULL');
		$this->addColumn('quantity int(11) NULL');
		$this->addColumn('ip_address varchar(10) NOT NULL');
		$this->addColumn('user_id varchar(60) NULL');
		$this->addColumn('date_created datetime NULL');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		/*
		$this->addUniqueKey();
		*/
		$this->createTable('carts');

		/** insert data **/
		// $this->addData('date_created',date("Y-m-d H:i:s"));
		// $this->addData('date_updated',date("Y-m-d H:i:s"));

		// $this->insertData('carts');
	} 

	public function down()
	{
		$this->dropTable('carts');
	}

}