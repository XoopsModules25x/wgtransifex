<{include file='db:wgtransifex_header.tpl' }>

<{if $packagesCount|default:0 > 0}>
	<div class='table-responsive'>
		<table class='table table-<{$table_type}>'>
			<thead>
				<tr class='head'>
					<th colspan='<{$divideby}>'>
						<{if $packagesCount|default:0 > 1}>
							<{$smarty.const._MA_WGTRANSIFEX_PACKAGES_TITLE}>
						<{else}>
							<{$smarty.const._MA_WGTRANSIFEX_PACKAGE_DETAILS}>
						<{/if}>
					</th>
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
					<{if $package|@count is div by $divideby}>
						</tr><tr>
					<{/if}>
					<{/foreach}>
				</tr>
			</tbody>
			<tfoot><tr><td>&nbsp;</td></tr></tfoot>
		</table>
	</div>
	<{if $showRequest|default:''}>
		<div class='row'>
			<div class='cols-xs-12 center'>
				<h5><{$smarty.const._MA_WGTRANSIFEX_REQUEST_NEW_DESC}></h5>
				<a class='btn btn-success center' href='requests.php?op=new' title='<{$smarty.const._MA_WGTRANSIFEX_REQUEST_NEW}>'><{$smarty.const._MA_WGTRANSIFEX_REQUEST_NEW}></a>
			</div>
		</div>
	<{/if}>
<{/if}>
<{if $form|default:''}>
	<{$form}>
<{/if}>
<{if $error|default:''}>
	<{$error}>
<{/if}>

<{include file='db:wgtransifex_footer.tpl' }>
