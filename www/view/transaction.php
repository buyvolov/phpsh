<?php
		$query = "SELECT * FROM `transaction` WHERE `incoming_account_id`= '1' ";
		$result = mysql_fetch_assoc(mysql_query($query));


	//	Helpers::dd();
		
?>







<p>Здравствуйте <?=($name)?$name:''?> на вашем счету: <?=($amount)?$amount:''?></p>
<p>Список Ваших транзекций:</p>


<?php
$queryIncoming = mysql_query("SELECT * FROM `transaction` WHERE `incoming_account_id` = 1 ORDER by id ");
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
					Кому
				</td>

				<td>
					От кого
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