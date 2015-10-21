<?php

$id = $_SESSION['user_id'];

		$query = "SELECT * FROM `transaction` WHERE `incoming_user_id`= $id ";
		$result = mysql_fetch_assoc(mysql_query($query));


	//	Helpers::dd();
		
?>




<div class="fields">


<p>Здравствуйте <?=($name)?$name:''?> на вашем счету: <?=($amount)?$amount:''?></p>
<p>Список Ваших транзакций:</p>


<?php
$queryIncoming = mysql_query("SELECT * FROM `transaction` WHERE `incoming_user_id` = $id ORDER by id ");
$queryoutgoing = mysql_query("SELECT * FROM `transaction` WHERE `outgoing_user_id` = $id ORDER by id ");


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
					".User::getByID($result['incoming_user_id'])['name']."
				</td>

				<td>
					".User::getByID($result['outgoing_user_id'])['name']."
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
					".User::getByID($result['incoming_user_id'])['name']."
				</td>

				<td>
					".User::getByID($result['outgoing_user_id'])['name']."
				</td>
			 </tr>";
	}



//Helpers::dd(User::getByID(2)['name']);


//session_destroy();
?>


</table>
</div>