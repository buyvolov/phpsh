<?php
require_once(__DIR__ . '\lib\prolog.php');
require_once(__DIR__ . '\templates\header.php');

$user  = "shkatov.dmitry@gmail.com";
$sHash =  "46f94c8de14fb36680850768ff1b7f2a";
$data  = [];

$bValidate = true;
$errors['email'] = false;
$errors['passw'] = false;

if(isset($_POST['auth'])){
	
	$sEmail = $_POST['email'];
	$sPassw = $_POST['passw'];
	$errors = [];

	if (!$sEmail) {

		$errors['email'] = 'Не заполнено!';
		$bValidate = false;
	}
	if (!$sPassw) {
		
		$errors['passw']  = 'Не заполнено!';
		$bValidate = false;
	}

	if($bValidate && $user === $sEmail && Helpers::checkPassw($sPassw, $sHash)) {

		echo "Вы прошли авторизацию";
	}
}

$data = [
		'errors' => $errors
];

Helpers::render(__DIR__ . '\view\auth-form.php', $data);

require_once(__DIR__ . '\templates\footer.php');