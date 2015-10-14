<?php
require_once(__DIR__ . '\lib\prolog.php');
 
$sFile = 'feedback.txt';
$rCurrent = file_get_contents($sFile);
$rCurrent .=    $_REQUEST['name'] . " " .
                $_REQUEST['email'] . " " . 
                $_REQUEST['phone'] . " " . 
                $_REQUEST['message'] . "\n";
file_put_contents($sFile, $rCurrent);
echo "true";
?>