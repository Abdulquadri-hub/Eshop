<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * {CLASSNAME} class
 */
class {CLASSNAME}
{
	
	use Model;

	protected $table = '{table}';
	protected $primaryKey = 'id';
	protected $loginUniqueColumn = 'email';

	protected $allowedColumns = [

		'username',
		'email',
		'password',
	];

	/*****************************
	 * 	rules include:
		required
		alpha
		email
		numeric
		unique
		symbol
		longer_than_8_chars
		alpha_numeric_symbol
		alpha_numeric
		alpha_symbol
	 * 
	 ****************************/
	protected $onInsertValidationRules = [

		'email' => [
			'email',
			'unique',
			'required',
		],

	];

	protected $onUpdateValidationRules = [

		'email' => [
			'email',
			'unique',
			'required',
		],
	];

}