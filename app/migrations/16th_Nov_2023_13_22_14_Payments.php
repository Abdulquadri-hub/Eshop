<?php

namespace Thunder;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Payments class
 */
class Payments extends Migration
{
	
	public function up()
	{

		/** create a table **/
		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('email varchar(200) NOT NULL');
		$this->addColumn('payment_id varchar(60) NOT NULL');
		$this->addColumn('order_id varchar(60) NOT NULL');
		$this->addColumn('user_id varchar(60) NOT NULL');
		$this->addColumn('reference varchar(200) NOT NULL');
		$this->addColumn('customer_code varchar(200) NOT NULL');
		$this->addColumn('status varchar(200) NOT NULL');
		$this->addColumn('amountpaid int(11) NOT NULL');
		$this->addColumn('paid_at datetime NULL');
		$this->addColumn('created_at datetime NULL');
		$this->addPrimaryKey('id');
		/*
		$this->addUniqueKey();
		*/
		$this->createTable('payments');

		// /** insert data **/
		// $this->addData('date_created',date("Y-m-d H:i:s"));
		// $this->addData('date_updated',date("Y-m-d H:i:s"));

		// $this->insertData('payments');
	} 

	public function down()
	{
		$this->dropTable('payments');
	}

}