<?php

namespace Thunder;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Users class
 */
class Users extends Migration
{
	
	public function up()
	{

		/** create a table **/
		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('name varchar(500) NOT  NULL');
		$this->addColumn('email varchar(1024) NOT  NULL');
		$this->addColumn('username varchar(500) NOT  NULL');
		$this->addColumn('password varchar(200) NOT  NULL');
		$this->addColumn('user_id varchar(60) NOT  NULL');
		$this->addColumn('role varchar(60) NOT  NULL');
		$this->addColumn('date_created datetime NULL');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		/*
		$this->addUniqueKey();
		*/
		$this->createTable('users');
	} 

	public function down()
	{
		$this->dropTable('users');
	}

}