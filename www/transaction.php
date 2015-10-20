<?php
require_once(__DIR__ . '\lib\prolog.php');



$errors 		= [];
$data1  		= [];
$data2  		= [];



session_start();

if(!$_SESSION['user_id']) {

	header('Location: http://' . BASE_URL . '/auth.php');

} else {

	$account = Account::getByID($_SESSION['user_id']);

	$data1 = [

				'amount' => $account['amount'],
	
	];


	$user = User::getByID($_SESSION['user_id']);

	$data2 = [
			'errors' => $errors,
			'name' => $user['name'],
			'email' => $user['email'],
	];

$data = $data1 + $data2;

	Helpers::render(__DIR__ . '\view\transaction.php', $data);
}
require_once(__DIR__ . '\templates\footer.php');