<?php
require_once(__DIR__ . '\lib\prolog.php');

$errors = [];
$data  	= [];
$bValidate = true;


$name = false;
$email = false;
$passw = false;
$confirm = false;
$errors['name'] = false;
$errors['email'] = false;
$errors['passw'] = false;
//$errors['confirm'] = false;


if(isset($_POST['auth'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$passw = $_POST['passw'];
	$confirm = $_POST['confirm'];

	if (!$name) {

		$errors['name'] = 'Не заполнено!';
		$bValidate = false;
	}
	if (!$email) {

		$errors['email'] = 'Не заполнено!';
		$bValidate = false;
	}
	if (!$passw) {
		
		$errors['passw']  = 'Не заполнено!';
		$bValidate = false;
	}
	if (!$confirm) {
		
		$errors['confirm']  = 'Не заполнено!';
		$bValidate = false;
	}
	

	$aSearchUser = User::getByEmail($email);


	if ($aSearchUser) {

		$errors['email'] = 'Такой email уже зарегестрирован!';
		$bValidate = false;
	}
	if ($passw !== $confirm) {

		$errors['passw'] = 'Парооль и подтверждение должны совпадать!';
		$errors['confirm'] = 'Парооль и подтверждение должны совпадать!';
		$bValidate = false;
	}
    if($bValidate){

		$userData = [
					'name' => $name,
					'email' => $email,
					'passw' => $passw,
		];
		
		$hash = md5($passw);
		$query = "INSERT INTO `user` (`id`, `name`, `email`, `hash`) VALUES (NULL, '$name', '$email', '$hash')";
		$result = mysql_query($query);
		echo "Вы успешно зарегестрированны!";

	}	


}

$data = [
		'name'    => $name,
		'errors'  => $errors,
		'email'   => $email,
		'passw'   => $passw,
		'confirm' => $confirm,
];


Helpers::render(__DIR__ . '\view\reg-form.php', $data);

require_once(__DIR__ . '\templates\footer.php');



//Helpers::dd($data);

//session_destroy();


?>
