<?php

namespace Thunder;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Products class
 */
class Products extends Migration
{
	
	public function up()
	{

		/** create a table 
		 * 
		 * **/
		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('product varchar(100) NOT NULL');
		$this->addColumn('product_id varchar(60) NOT NULL');
		$this->addColumn('user_id varchar(60) NOT NULL');
		$this->addColumn('category_id varchar(60) NOT NULL');
		$this->addColumn('brand_id varchar(60) NOT NULL');
		$this->addColumn('quantity int(100) NOT NULL');
		$this->addColumn('price int(100) NOT NULL');
		$this->addColumn('status varchar(60) NOT NULL');
		$this->addColumn('description text NOT NULL');
		$this->addColumn('image varchar(200) NOT NULL');
		$this->addColumn('slug varchar(200) NOT NULL');
		$this->addColumn('date_created datetime NULL');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		/*
		$this->addUniqueKey();
		*/
		$this->createTable('products');



		// /** insert data **/
		// $this->addData('date_created',date("Y-m-d H:i:s"));
		// $this->addData('date_updated',date("Y-m-d H:i:s"));

		// $this->insertData('products');
	} 

	public function down()
	{
		$this->dropTable('products');
	}

}