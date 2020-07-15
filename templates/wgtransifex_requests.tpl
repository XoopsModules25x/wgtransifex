<{include file='db:wgtransifex_header.tpl' }>

<{if $requestsCount > 0}>
<div class='table-responsive'>
	<table class='table table-<{$table_type}>'>
		<thead>
			<tr class='head'>
				<th colspan='<{$divideby}>'><{$smarty.const._MA_WGTRANSIFEX_REQUESTS_TITLE}></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<{foreach item=request from=$requests}>
				<td>
					<div class='panel panel-<{$panel_type}>'>
						<{include file='db:wgtransifex_requests_item.tpl' }>
					</div>
				</td>
				<{if $request.count is div by $divideby}>
					</tr><tr>
				<{/if}>
				<{/foreach}>
			</tr>
		</tbody>
		<tfoot><tr><td>&nbsp;</td></tr></tfoot>
	</table>
</div>
<{/if}>
<{if $form}>
	<{$form}>
<{/if}>
<{if $error}>
	<{$error}>
<{/if}>

<{include file='db:wgtransifex_footer.tpl' }>
