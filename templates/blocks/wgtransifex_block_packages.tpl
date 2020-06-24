<table class='table table-<{$table_type}>'>
	<thead>
		<tr class='head'>
			<th class='center'><{$smarty.const._MB_WGTRANSIFEX_PKG_LOGO}></th>
			<th class='center'><{$smarty.const._MB_WGTRANSIFEX_PKG_NAME}></th>
			<th class='center'><{$smarty.const._MB_WGTRANSIFEX_PKG_LANG_ID}></th>
		</tr>
	</thead>
	<{if count($block)}>
	<tbody>
		<{foreach item=package from=$block}>
		<tr class='<{cycle values="odd, even"}>'>
			<td class='center'><img class='img-responsive' src="<{$wgtransifex_upload_url}>/logos/<{$package.logo}>" alt="<{$package.name}>" title="<{$package.name}>"></td>
			<td class='center'><{$package.name}></td>
			<td class='center'><img src="<{$modPathIconFlags}><{$package.lang_flag}>" alt="<{$package.name}>" title="<{$package.name}>" /></td>
		</tr>
		<{/foreach}>
	</tbody>
	<{/if}>
	<tfoot><tr><td>&nbsp;</td></tr></tfoot>
</table>
