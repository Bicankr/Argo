<?php //netteCache[01]000375a:2:{s:4:"time";s:21:"0.39556900 1358019460";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:53:"C:\Users\zednikp\tmp\Argo\app\templates\@layout.latte";i:2;i:1359619948;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"b7f6732 released on 2013-01-01";}}}?><?php

// source file: C:\Users\zednikp\tmp\Argo\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ro1yt45agj')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb1a16c28f32_title')) { function _lb1a16c28f32_title($_l, $_args) { extract($_args)
?>Argo Haná, a.s.<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb87d535cdbd_head')) { function _lb87d535cdbd_head($_l, $_args) { extract($_args)
;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbbf954ee369_scripts')) { function _lbbf954ee369_scripts($_l, $_args) { extract($_args)
?>    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/main.js"></script>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8" />
	<meta name="description" content="" />
<?php if (isset($robots)): ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>

	<title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->upper($template->striptags(ob_get_clean()))  ?></title>

	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" type="text/css" />
	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" />
	<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($basePath) ?>/css/print.css" />
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" />
	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

    </head>

    <body>
	<script>document.body.className+=' js' </script>

<?php $iterations = 0; foreach ($flashes as $flash): ?>	<div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>
	<div id="banner">    
	    <img src="<?php echo htmlSpecialChars($basePath) ?>/images/logo.jpg" />
	    <div id="rightbox">
		<div id="mail">783 53 Velká Bystřice</div>
		<div id="tel">+420 585 110 323</div>
		<div id="fax">+420 585 110 334</div>
		<div id="email">argohana@argohana.cz</div>
	    </div>
	</div>
	<div id="main_menu">
	    <a href="<?php echo htmlSpecialChars($_control->link("default")) ?>">
		<div class="left_menu_item">O společnosti</div></a>
	    <a href="<?php echo htmlSpecialChars($_control->link("about")) ?>">
		<div class="menu_item">About company</div>
	    </a>
	    <a href="<?php echo htmlSpecialChars($_control->link("motto")) ?>">
		<div class="menu_item">Naše motto</div>
	    </a>
	    <a href="<?php echo htmlSpecialChars($_control->link("dokumenty")) ?>">
		<div class="menu_item">Dokumenty</div>
	    </a>
	    <a href="<?php echo htmlSpecialChars($_control->link("kontakty")) ?>">
		<div class="right_menu_item">Kontakty</div>
	    </a>
	</div>
	<div id="top">
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'nadpis', $template->getParameters()) ?>
	</div>
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>

	<footer>Agro Haná, Velká Bystřice, e-mail: argohana@argohana.cz</footer>
    </div>

<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
</body>
</html>
