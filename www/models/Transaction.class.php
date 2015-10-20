<?php
//require_once(__DIR__ . '\lib\prolog.php');

/**
 * Model 'User'
 * 
 * @author Dmitriy Shkatov
 * @package User
 */
class Transaction {

	public static function getAll(){

		$query = 'SELECT id, price, incoming_account_id, outcoming_account_id FROM `transaction`';
		$result = mysql_query($query);

		while ($row = mysql_fetch_assoc($result)) {
			
			Helpers::dd($row);
		}
	}

	/**
	 * Get transaction field by ID
	 *
	 * @param $email string
	 * @return array
	 */
	public static function getByID($id){

		if(!$id) return false;

		$query = "SELECT * FROM `transaction` WHERE `id`=" . "'" . $id . "';";
		$result = mysql_query($query);
		
		return mysql_fetch_assoc($result);
	}

}










class Account {

	public static function getAll(){

		$query = 'SELECT id, amount, user_id, currency_id FROM `account`';
		$result = mysql_query($query);

		while ($row = mysql_fetch_assoc($result)) {
			
			Helpers::dd($row);
		}
	}

	/**
	 * Get transaction field by ID
	 *
	 * @param $email string
	 * @return array
	 */
	public static function getByID($id){

		if(!$id) return false;

		$query = "SELECT * FROM `account` WHERE `user_id`=" . "'" . $id . "';";
		$result = mysql_query($query);
		
		return mysql_fetch_assoc($result);
	}

}


