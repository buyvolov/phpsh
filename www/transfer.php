<?php
require_once(__DIR__ . '\lib\prolog.php');

session_start();


		$price = $_POST['summ'];
		$outgoing_user_id = $_SESSION['user_id'];
		$incoming_user_id = $_POST['name'];

$query = mysql_fetch_assoc(mysql_query("SELECT amount FROM `account` WHERE `user_id` = $outgoing_user_id"));
$sss = $query['amount'];

if(!$_SESSION['user_id']) {header('Location: http://' . BASE_URL . '/auth.php');}

	elseif ($_POST['summ'] < .01) {
				echo "Сумма перевода не может быть меньше 1 копейки. <a href='/transaction.php'>вернуться</a>";
				
	}

	elseif (!$_POST['name'] || !$_POST['summ']) {
	 	echo "не все поля заполнены";
	}

	elseif ($_POST['name'] == $_SESSION['user_id']) {
	 	echo "нельзя переводить самому себе";
	}

	elseif ($price > $sss) {
	 	echo "на вашем счету недостаточно средств";
	}

	else{


		$query = mysql_query("INSERT INTO `transaction` (`id`, `price`, `incoming_user_id`, `outgoing_user_id`) 
											 VALUES (NULL, $price, $incoming_user_id, $outgoing_user_id)"); //transaction log

		$query = mysql_fetch_assoc(mysql_query("SELECT amount FROM `account` WHERE `user_id` = $incoming_user_id")); // prihod
		$prihod = $query['amount'] + $price;
		$query = mysql_query("UPDATE `account` SET `amount` = $prihod WHERE `user_id` = $incoming_user_id");


		$query = mysql_fetch_assoc(mysql_query("SELECT amount FROM `account` WHERE `user_id` = $outgoing_user_id")); // rashod
		$prihod = $query['amount'] - $price;
		$query = mysql_query("UPDATE `account` SET `amount` = $prihod WHERE `user_id` = $outgoing_user_id");


		
		header('Location: http://' . BASE_URL . '/transaction.php');
		

	}



//echo $_POST['name'];
//echo $_POST['summ'];


