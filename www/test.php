<?php
require_once(__DIR__ . '\lib\prolog.php');



$query = mysql_query("UPDATE `account` SET amount = 1 WHERE `user_id` = 1  ");