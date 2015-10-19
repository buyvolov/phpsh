<?php
//require_once(__DIR__ . '\lib\prolog.php');

/**
 * Model 'User'
 * 
 * @author Dmitriy Shkatov
 * @package User
 */
class User {

	public static function getAll(){

		$query = 'SELECT id, name,email FROM `user`';
		$result = mysql_query($query);

		while ($row = mysql_fetch_assoc($result)) {
			
			Helpers::dd($row);
		}
	}

	/**
	 * Get user field by ID
	 *
	 * @param $email string
	 * @return array
	 */
	public static function getByID($id){

		if(!$id) return false;

		$query = "SELECT * FROM `user` WHERE `id`=" . "'" . $id . "';";
		$result = mysql_query($query);
		
		return mysql_fetch_assoc($result);
	}

	/**
	 * Get user field by email
	 *
	 * @param $email string
	 * @return array
	 */
	public static function getByEmail($email){

		if(!$email) return false;

		$query = "SELECT * FROM `user` WHERE `email`=" . "'" . $email . "';";
		$result = mysql_query($query);
		
		return mysql_fetch_assoc($result);
	}
}



