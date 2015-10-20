<?php

$mysqlHost 		= 'localhost';
$mysqlUser 		= 'root';
$mysqlPassword 	= '';
$dataBase 		= 'mydb';

$dbConnect = mysql_connect($mysqlHost, $mysqlUser, $mysqlPassword);

if(!$dbConnect){

	echo "Не удалось подключиться к серверу баз данных!";
	Helpers::dd(mysql_error());
	die;
}

mysql_query("SET CHARACTER SET utf8 ");
if(!mysql_select_db($dataBase)){
  
	echo 'Не удалось выбрать базу данных!';
	die;
}

