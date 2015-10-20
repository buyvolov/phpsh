<?php
require_once(__DIR__ . '\lib\prolog.php');

session_start();

$queryIncoming = mysql_query("SELECT * FROM `transaction` WHERE `incoming_account_id`= '$id'  ORDER by id ");
$queryoutgoing = mysql_query("SELECT * FROM `transaction` WHERE `outgoing_account_id` = 1 ORDER by id ");


echo"<table border = 1>";
echo "<tr>
				<td>
					Номер транзакции
				</td>

				<td>
					Сумма
				</td>

				<td>
					От кого
				</td>

				<td>
					Кому
				</td>
			 </tr>";




	while ($result = mysql_fetch_array($queryIncoming)) { 
		echo "<tr>
				<td>
					".$result['id']."
				</td>

				<td bgcolor='green'>
					+".$result['price']."
				</td>

				<td>
					".$result['incoming_account_id']."
				</td>

				<td>
					".$result['outgoing_account_id']."
				</td>
			 </tr>";
	}

		while ($result = mysql_fetch_array($queryoutgoing)) { 
		echo "<tr>
				<td>
					".$result['id']."
				</td>

				<td bgcolor='red'>
					-".$result['price']."
				</td>

				<td>
					".$result['incoming_account_id']."
				</td>

				<td>
					".$result['outgoing_account_id']."
				</td>
			 </tr>";
	}

?>


</table>
