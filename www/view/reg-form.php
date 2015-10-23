<h1>Регистрация</h1>
<div class="fields">
	<form method="post">
		<input type="hidden" name="auth" value="Y">
		<div class="fieldset">
			<div class="field-caption">ФИО:</div>
			<span class="notice <?=($errors['name'])?'':'block-none'?>"><?=$errors['name']?></span>
			<input class="field" type="text" value="<?=($name)?$name:''?>" id="name" name="name"/>
		</div>
		<div class="fieldset">
			<div class="field-caption">Ваш email:</div>
			<span class="notice <?=($errors['email'])?'':'block-none'?>"><?=$errors['email']?></span>
			<input class="field" type="text" value="<?=($email)?$email:''?>" id="email" name="email"/>
		</div>
		<div class="fieldset">
			<div class="field-caption">Пароль:</div>
			<span class="notice <?=($errors['passw'])?'':'block-none'?>"><?=$errors['passw']?></span>
			<input class="field" type="password" value="" id="passw" name="passw"/>
		</div>
		<div class="fieldset">
			<div class="field-caption">Подтверждение пароля:</div>
			<span class="notice <?=($errors['confirm'])?'':'block-none'?>"><?=$errors['confirm']?></span>
			<input class="field" type="password" value="" id="confirm" name="confirm"/>
		</div>
		<div class="fieldset">
			<input class="" type="submit" value="Отправить"/>
		</div>
	</form>
</div>