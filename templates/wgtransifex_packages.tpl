<{include file='db:wgtransifex_header.tpl' }>

<{if $packagesCount > 0}>
	<div class='table-responsive'>
		<table class='table table-<{$table_type}>'>
			<thead>
				<tr class='head'>
					<th colspan='<{$divideby}>'><{$smarty.const._MA_WGTRANSIFEX_PACKAGES_TITLE}></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<{foreach item=package from=$packages}>
					<td>
						<div class='panel panel-<{$panel_type}>'>
							<{include file='db:wgtransifex_packages_item.tpl' }>
						</div>
					</td>
					<{if $package.count is div by $divideby}>
						</tr><tr>
					<{/if}>
					<{/foreach}>
				</tr>
			</tbody>
			<tfoot><tr><td>&nbsp;</td></tr></tfoot>
		</table>
	</div>
	<{if $showRequest}>
		<div class='row'>
			<div class='cols-xs-12 center'>
				<a class='btn btn-success center' href='requests.php?op=new' title='<{$smarty.const._MA_WGTRANSIFEX_REQUEST_NEW}>'><{$smarty.const._MA_WGTRANSIFEX_REQUEST_NEW}></a>
			</div>
		</div>
	<{/if}>
<{/if}>
<{if $form}>
	<{$form}>
<{/if}>
<{if $error}>
	<{$error}>
<{/if}>

<{include file='db:wgtransifex_footer.tpl' }>
