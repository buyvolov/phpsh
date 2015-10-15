<?php
require_once(__DIR__ . '\lib\prolog.php');
require_once(__DIR__ . '\templates\header.php');

$user = "shkatov.dmitry@gmail.com";
$sHash = "46f94c8de14fb36680850768ff1b7f2a"; //123qwe


$bValidate = true;
$aErrors['email'] = false;
$aErrors['passw'] = false;

if(isset($_POST['auth'])){
	
	$sEmail = $_POST['email'];
	$sPassw = $_POST['passw'];
//	$aErrors = [''];

	if (!$sEmail) {

		$aErrors['email'] = 'Не заполнено!';
		$bValidate = false;
	}
	if (!$sPassw) {
		
		$aErrors['passw']  = 'Не заполнено!';
		$bValidate = false;
	}
	//Helpers::dd($aErrors);

	if($bValidate && $user === $sEmail && Helpers::checkPassw($sPassw, $sHash)) {

		echo "Вы прошли авторизацию";
	}
}
?>

<div class="fields">
	<form method="post">
		<input type="hidden" name="auth" value="Y">
		<div class="fieldset">
			<div class="field-caption">Ваш email:</div>
			<span class="notice <?=($aErrors['email'])?'':'block-none'?>"><?=$aErrors['email']?></span>
			<input class="field" type="text" value="" id="email" name="email"/>
		</div>
		<div class="fieldset">
			<div class="field-caption">Пароль:</div>
			<span class="notice <?=($aErrors['passw'])?'':'block-none'?>"><?=$aErrors['passw']?></span>
			<input class="field" type="password" value="" id="passw" name="passw"/>
		</div>
		<div class="fieldset">
			<input class="" type="submit" value="Отправить"/>
		</div>
	</form>
</div>

<?php require_once(__DIR__ . '\templates\footer.php');?>