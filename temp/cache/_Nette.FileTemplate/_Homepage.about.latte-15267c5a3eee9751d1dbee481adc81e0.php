<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.26517300 1358019467";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"C:\Users\zednikp\tmp\Argo\app\templates\Homepage\about.latte";i:2;i:1359619946;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"b7f6732 released on 2013-01-01";}}}?><?php

// source file: C:\Users\zednikp\tmp\Argo\app\templates\Homepage\about.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '0q4yoq9gy4')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block nadpis
//
if (!function_exists($_l->blocks['nadpis'][] = '_lb372a48267f_nadpis')) { function _lb372a48267f_nadpis($_l, $_args) { extract($_args)
?>About company
<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb9bcb9c9c20_content')) { function _lb9bcb9c9c20_content($_l, $_args) { extract($_args)
?><div class="leftbox">
    Společnost <b>ARGO HANÁ, a.s.</b> byla založena v roce 1996 jako servisní organizace zabezpečující společný nákup přípravků na ochranu rostlin především pro své akcionáře – moravské distributory působící na území téměř celé Moravy. Tuto funkci plní úspěšně do dnešního dne.<br /><br /> 
     V posledních letech jsou jejími akcionáři <b>AG.FINAL s.r.o.</b>, <b>AGROHOW, spol. s r.o.</b>, <b>ZETASPOL, s.r.o.</b> a oblast působení se koncentrovala především v zemědělsky nejproduktivnější moravské oblasti – na Hané a na Severní Moravě, konkrétně na Opavsku.<br /><br />
     Úzce spolupracuje s dalšími sesterskými organizacemi akcionářů. S firmou <b>UK.DITANA s.r.o.</b> v oblasti obchodní i logistické a <b>DITANA s.r.o.</b> v oblasti polního pokusnictví, poradenství a sledování nových trendů v ochraně rostlin. Výše uvedené firmy představují společně team vysoce kvalifikovaných a erudovaných odborníků v oblasti pěstování a ochrany rostlin, poskytujících svoje know how jako přidanou hodnotu k prodávanému zboží.<br /><br />
     Dlouhodobě udržuje a úspěšně rozvíjí obchodní spolupráci s některými významných distributory pesticidů v dalších regionech České republiky, takže buď přímo nebo zprostředkovaně je schopna oslovit převážnou většinu podniků zabývajících se rostlinnou produkcí.<br /><br />
     Naším společným cílem je, aby společnost <b>ARGO HANÁ, a.s.</b> stejně jako bájná loď <b>Argó</b> co nejdéle úspěšně proplouvala rozbouřenými vodami českého trhu s přípravky na ochranu rostlin.
     <h2>Ing. Radomír Běhal</h2>
     <h2>předseda představenstva</h2>
			
</div>
<div class="imagebox"><img src="<?php echo htmlSpecialChars($basePath) ?>/images/About.png" /></div>
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
if (!function_exists($_l->blocks['head'][] = '_lbedf1d9422a_head')) { function _lbedf1d9422a_head($_l, $_args) { extract($_args)
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