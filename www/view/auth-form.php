<div class="fields">
	<form method="post">
		<input type="hidden" name="auth" value="Y">
		<div class="fieldset">
			<div class="field-caption">Ваш email:</div>
			<span class="notice <?=($errors['email'])?'':'block-none'?>"><?=$errors['email']?></span>
			<input class="field" type="text" value="" id="email" name="email"/>
		</div>
		<div class="fieldset">
			<div class="field-caption">Пароль:</div>
			<span class="notice <?=($errors['passw'])?'':'block-none'?>"><?=$errors['passw']?></span>
			<input class="field" type="password" value="" id="passw" name="passw"/>
		</div>
		<div class="fieldset">
			<input class="" type="submit" value="Отправить"/>
		</div>
	</form>
</div>