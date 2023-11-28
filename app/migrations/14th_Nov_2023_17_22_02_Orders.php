<?php

namespace Thunder;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Orders class
 */
class Orders extends Migration
{
	
	public function up()
	{

		/** create a table **/
		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('order_id varchar(60) NOT NULL');
		$this->addColumn('user_id varchar(60) NOT NULL');
		$this->addColumn('ip_address varchar(60) NOT NULL');
		$this->addColumn('subtotalprice int(11) NOT NULL');
		$this->addColumn('totalquantity int(11) NOT NULL');
		$this->addColumn('status varchar(60) NOT NULL');
		$this->addColumn('date_created datetime NULL');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		/*
		$this->addUniqueKey();
		*/
		$this->createTable('orders');

		// /** insert data **/
		// $this->addData('date_created',date("Y-m-d H:i:s"));
		// $this->addData('date_updated',date("Y-m-d H:i:s"));

		// $this->insertData('orders');
	} 

	public function down()
	{
		$this->dropTable('orders');
	}

}