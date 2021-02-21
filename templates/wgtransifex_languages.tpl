<{include file='db:wgtransifex_header.tpl' }>

<{if $languagesCount|default:0 > 0}>
<h2><{$smarty.const._MA_WGTRANSIFEX_LANGUAGES_TITLE}></h2>
<div class='table-responsive'>
	<table class='table table-<{$table_type}>'>
		<thead>
			<tr class='head'>
				<th>
					<span class='col-sm-2 justify'><{$smarty.const._MA_WGTRANSIFEX_LANGUAGE_FLAG}></span>
					<span class='col-sm-3 justify'><{$smarty.const._MA_WGTRANSIFEX_LANGUAGE_NAME}></span>
					<span class='col-sm-2 justify'><{$smarty.const._MA_WGTRANSIFEX_LANGUAGE_CODE}></span>
					<span class='col-sm-2 justify'><{$smarty.const._MA_WGTRANSIFEX_LANGUAGE_ISO_639_1}></span>
					<span class='col-sm-3 justify'><{$smarty.const._MA_WGTRANSIFEX_LANGUAGE_FOLDER}></span>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<{foreach item=language from=$languages}>
				<td>
					<div class='panel panel-<{$panel_type}>'>
						<{include file='db:wgtransifex_languages_item.tpl' }>
					</div>
				</td>
				<{if $language|@count is div by $divideby}>
					</tr><tr>
				<{/if}>
				<{/foreach}>
			</tr>
		</tbody>
		<tfoot><tr><td>&nbsp;</td></tr></tfoot>
	</table>
</div>
<{/if}>
<{if $form|default:''}>
	<{$form}>
<{/if}>
<{if $error|default:''}>
	<{$error}>
<{/if}>

<{include file='db:wgtransifex_footer.tpl' }>
