<h1>Счета пользователя</h1>
<table border=1 class="account">
	<tr>
		<td>id</td>
		<td>Сумма</td>
		<td>Пользователь</td>
		<td>Валюта</td>
	</tr>	
	<?php foreach ($accounts as $account):?>
	<tr>
		<td><?=$account['id']?></td>
		<td><?=$account['amount']?></td>
		<td><?=$account['user_name']?></td>
		<td><??></td>
	</tr>
	<?php endforeach?>
</table>
