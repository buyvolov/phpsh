<?php

define('BASE_URL', $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT']);

require_once(__DIR__ . '\helpers.class.php');
require_once(__DIR__ . '\db.php');
require_once('\models\User.class.php');
require_once('\models\Transaction.class.php');
