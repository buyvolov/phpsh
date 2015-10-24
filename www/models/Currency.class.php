<?php
/**
 * Model 'Currency'
 * 
 * @author Dmitriy Shkatov
 * @package Currency
 */
class Currency extends AbstractModel {
	
	public function __construct($modelName){

		parent::__construct($modelName);
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
