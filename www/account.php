<?php
require_once(__DIR__ . '\lib\prolog.php');

$data =[];

if(!Helpers::isAuth()) return false;

$aAccount 	= AbstractModel::getModel('Account')->get();
$aUser		= AbstractModel::getModel('User')->get();
$aCurrency	= AbstractModel::getModel('Currency')->get();

//Helpers::dd($aCurrency[0][1]);
foreach ($aAccount as $key => $items) {
//Helpers::dd($items['currency_id']);

	$aResult[] = array_merge($items, 
							['user_name' => $aUser[$key]['name']]
							//['currency' => $aCurrency[$items['currency_id']]['name']]
	);
}
//Helpers::dd($aResult);
Helpers::render(__DIR__ . '\view\account.php', ['accounts' => $aResult]);	

