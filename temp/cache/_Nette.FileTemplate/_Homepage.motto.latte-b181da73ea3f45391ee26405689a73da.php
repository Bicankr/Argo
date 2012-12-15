<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.63597100 1358019467";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"C:\Users\zednikp\tmp\Argo\app\templates\Homepage\motto.latte";i:2;i:1359619946;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"b7f6732 released on 2013-01-01";}}}?><?php

// source file: C:\Users\zednikp\tmp\Argo\app\templates\Homepage\motto.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '8fixcrrdta')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block nadpis
//
if (!function_exists($_l->blocks['nadpis'][] = '_lbc04ecf7d2c_nadpis')) { function _lbc04ecf7d2c_nadpis($_l, $_args) { extract($_args)
?>Naše motto
<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb4070383539_content')) { function _lb4070383539_content($_l, $_args) { extract($_args)
?><div class="leftbox">
    <h2>Motto:</h2>
„Díky našemu společnému postupu jsme dostatečně silní, díky odbornosti i mnohaletým praktickým zkušenostem  jsme dostatečně erudovaní a díky Vaší dosavadní spokojenosti jsme dostatečně motivovaní na to, abychom Vám poskytovali servis v prvotřídní kvalitě. Zároveň jsme dostatečně operativní a flexibilní, abychom se Vám mohli věnovat podle Vašich aktuálních požadavků a s maximální péčí.“

<h2>ARGO HANÁ, a.s.</h2>

</div>
<div class="imagebox"><img src="<?php echo htmlSpecialChars($basePath) ?>/images/klas.png" /></div>
<div class="leftbox_noborder">
<div class="imagebox"><img src="<?php echo htmlSpecialChars($basePath) ?>/images/loga.png" /></div>
</div>














<script src="http://jush.sourceforge.net/jush.js"></script>
<script>
	jush.create_links = false;
	jush.highlight_tag('code');
	$('code.jush').each(function(){ $(this).html($(this).html().replace(/\x7B[/$\w].*?\}/g, '<span class="jush-latte">$&</span>')) });

	$('a[href^=#]').click(function(){
		$('html,body').animate({ scrollTop: $($(this).attr('href')).show().offset().top - 5 }, 'fast');
		return false;
	});
</script>
<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb716f259acf_head')) { function _lb716f259acf_head($_l, $_args) { extract($_args)
;
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['nadpis']), $_l, get_defined_vars()) ; call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()) ; 