<?php
require_once(__DIR__ . '\lib\prolog.php');

$errors = [];
$data  	= [];

session_start();

if(!$_SESSION['user_id']) {

	header('Location: http://' . BASE_URL . '/auth.php');

} else {

	$user = User::getByID($_SESSION['user_id']);

	$data = [
			'errors' => $errors,
			//'passw' => $_POST['passw'],
			'name' => $user['name'],
			'email' => $user['email'],
			//'passw' => $user['passw'],
	];

	Helpers::render(__DIR__ . '\view\profile.php', $data);
}
require_once(__DIR__ . '\templates\footer.php');