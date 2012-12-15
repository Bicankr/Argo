<?php //netteCache[01]000386a:2:{s:4:"time";s:21:"0.79421500 1355496581";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:64:"C:\Users\zednikp\tmp\Argo\app\templates\Homepage\dokumenty.latte";i:2;i:1358017756;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"b7f6732 released on 2013-01-01";}}}?><?php

// source file: C:\Users\zednikp\tmp\Argo\app\templates\Homepage\dokumenty.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'jeavfq7co3')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block nadpis
//
if (!function_exists($_l->blocks['nadpis'][] = '_lb0a73d2472a_nadpis')) { function _lb0a73d2472a_nadpis($_l, $_args) { extract($_args)
?>Dokumenty ke stažení
<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb3f905e9c49_content')) { function _lb3f905e9c49_content($_l, $_args) { extract($_args)
?><div class="leftbox">
    <table id="dokumenty_table">
	<thead>
	    <tr>
		<th>Logistika</th>
		<th>Rostlinolékařská praxe</th>
		<th>SRS</th>
		<th>Obchod</th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<td>Bezpečnostní listy</td>
                <td><a href="http://eagri.cz/public/web/srs/portal/pripravky-na-or/etikety-pripravku-na-or.html" target="_blank">Etikety</a></td>
		<td></td>
		<td></td>
	    </tr>
	    <tr>
                <td><a href="http://www.mdcr.cz/cs/Silnicni_doprava/Nakladni_doprava/adr/ADR+2011+-+ke+sta%C5%BEen%C3%AD/ADR+2011.htm" target="_blank">ADR 2011</a></td>
                <td><a href="http://eagri.cz/public/web/srs/portal/pripravky-na-or/sdeleni-novinky/pripravky-pro-profes-pouz.html" target="_blank">Přípravky povole-né pro profesio-nální použití </a></td>
		<td></td>
		<td></td>
	    </tr>
	</tbody>
    </table>

			
</div>
<div class="imagebox"><img src="<?php echo htmlSpecialChars($basePath) ?>/images/dokumenty.png" /></div>
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
if (!function_exists($_l->blocks['head'][] = '_lb2b8d8ade50_head')) { function _lb2b8d8ade50_head($_l, $_args) { extract($_args)
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