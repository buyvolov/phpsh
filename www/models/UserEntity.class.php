<?php
/**
 * Entity 'AccountEntity'
 * 
 * @author Dmitriy Shkatov
 */
class UserEntity {
	
	private $id;	
	private $name;	
	private $email;	
	private $hash;

	public function getID(){

		return $this->id;
	}
	public function getName(){

		return $this->name;
	}
	public function getEmail(){

		return $this->email;
	}
	public function getHash(){

		return $this->hash;
	}

	public function setID($id){

		$this->id = $id;
	}
	public function setName($name){

		$this->name = $name;
	}
	public function setEmail($email){

		$this->email = $email;
	}
	public function setHash($hash){

		$this->hash = $hash;
	}
}
