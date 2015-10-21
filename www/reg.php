<?php
require_once(__DIR__ . '\lib\prolog.php');

$errors = [];
$data  	= [];
$bValidate = true;

$sEmail = false;
$sPassw = false;
$errors['email'] = false;
$errors['passw'] = false;

if(isset($_POST['auth'])){
	
	$sEmail = $_POST['email'];
	$sPassw = $_POST['passw'];

	if (!$sEmail) {

		$errors['email'] = 'Не заполнено!';
		$bValidate = false;
	}
	if (!$sPassw) {
		
		$errors['passw']  = 'Не заполнено!';
		$bValidate = false;
	}
	
	$user = User::getByEmail($sEmail);

	if (!$user) {
		
		$errors['email']  = 'Пользователеь с таким email не найден!';
		$bValidate = false;
	} 

	if($bValidate && $user['email'] === $sEmail && Helpers::checkPassw($sPassw, $user['hash'])) {

		echo "Вы прошли авторизацию";
		$_SESSION['user_id'] = $user['id'];
	
	} else {

		$errors['passw']  = 'Не верный пароль';
	}
}

$data = [
		'errors' => $errors,
		'email' => $sEmail,
		'passw' => $sPassw,
];

Helpers::render(__DIR__ . '\view\reg-form.php', $data);

require_once(__DIR__ . '\templates\footer.php');