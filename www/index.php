<?php
require_once(__DIR__ . '\lib\prolog.php');
require_once(__DIR__ . '\templates\header.php');?>

<div class="inner-block">
	<div class="clear"></div>
	<div class="main-content">
		<div class="left-block">
			<img src="/img/image.jpg" class="main_image"/>
		</div>
		<div class="right-block">
			<p>Элемент <!DOCTYPE> предназначен для указания типа текущего документа — DTD (document type definition, описание типа документа). Это необходимо, чтобы браузер понимал, как следует интерпретировать текущую веб-страницу, поскольку HTML существует в нескольких версиях, кроме того, имеется XHTML (EXtensible HyperText Markup Language, расширенный язык разметки гипертекста), похожий на HTML, но различающийся с ним по синтаксису. Чтобы браузер «не путался» и понимал, согласно какому стандарту отображать веб-страницу и необходимо в первой строке кода задавать <!DOCTYPE>.</p>
		</div>
	</div>
	<div class="content">
		<a href="#" id="first">Отзыв</a>
	    <article class="first-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos ducimus dolor aliquid expedita ad error, magnam, itaque vero unde dolorem quam dicta exercitationem, minus sed.</article>

	</div>
	<a href="#" class="showPopup">Обратная связь</a>
</div>

<?php require_once(__DIR__ . '\templates\footer.php');?>


<?php phpinfo(); ?>