<?php
require_once(__DIR__ . '\lib\prolog.php');

$errors = [];
$data  	= [];
$bValidate = true;

if(!Helpers::isAuth()) return false;

$aUser = User::getCurrentUser();

if(isset($_POST['profile'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];

	if (!$name) {
		
		$errors['name']  = 'Не заполнено!';
		$bValidate = false;
	}

	if (!$email) {

		$errors['email'] = 'Не заполнено!';
		$bValidate = false;
	}

	$aSearchUser = User::getByEmail($email);

	if ($aSearchUser && $aSearchUser['id'] != $aUser['id']) {

		$errors['email'] = 'Такой email уже зарегестрирован!';
		$bValidate = false;
	}

	if($bValidate){

		$userData = [
					'name' => $name,
					'email' => $email,
		];
		
		User::update($aUser['id'], $userData);
	}	

	$data['name'] 	= $name;
	$data['email'] 	= $email;
	$data['errors'] = $errors;

} else {

	$data = [
		'name' 	 => $aUser['name'],
		'email'  => $aUser['email'],
	];
}


Helpers::render(__DIR__ . '\view\profile.php', $data);

require_once(__DIR__ . '\templates\footer.php');