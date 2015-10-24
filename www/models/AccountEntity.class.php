<?php
/**
 * Entity 'AccountEntity'
 * 
 * @author Dmitriy Shkatov
 */
class AccountEntity {
	
	private $id;	
	private $amount;	
	private $user_id;	
	private $currency_id;

	public function getID(){

		return $this->id;
	}
	public function getAmount(){

		return $this->amount;
	}
	public function getUserID(){

		return $this->user_id;
	}
	public function getCurrencyID(){

		return $this->currency_id;
	}

	public function setID($id){

		$this->id = $id;
	}
	public function setAmount($amount){

		$this->amount = $amount;
	}
	public function setUserID($user_id){

		$this->user_id = $user_id;
	}
	public function setCurrencyID($currency_id){

		$this->currency_id = $currency_id;
	}
}
