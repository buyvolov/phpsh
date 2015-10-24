<?php
/**
 * Model 'Account'
 * 
 * @author Dmitriy Shkatov
 * @package Account
 */
class Account extends AbstractModel {
	
	public function __construct($modelName){

		parent::__construct($modelName);
		//$this->modelName = $modelName;
	}

	/**
	 * Get user field by ID
	 *
	 * @param $email string
	 * @return array
	 */
	public function getByID($id){

		if(!$id) return false;

		$query = "SELECT * FROM `user` WHERE `id`=" . "'" . $id . "';";
		$result = mysql_query($query);
		
		return mysql_fetch_assoc($result);
	}
}
