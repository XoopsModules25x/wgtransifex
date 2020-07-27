<!-- Header -->
<{include file='db:wgtransifex_admin_header.tpl' }>

<h3><{$packages_result}></h3>
<{if $packages_count}>
	<table class='table table-bordered'>
		<thead>
			<tr class='head'>
				<th class='center'><{$smarty.const._AM_WGTRANSIFEX_BROKEN_TABLE}></th>
				<th class='center'><{$smarty.const._AM_WGTRANSIFEX_BROKEN_MAIN}></th>
				<th class='center'><{$smarty.const._AM_WGTRANSIFEX_FORM_ACTION}></th>
			</tr>
		</thead>
		<tbody>
			<{foreach item=package from=$packages_list}>
			<tr class='<{cycle values='odd, even'}>'>
				<td class='center'><{$package.table}></td>
				<td class='center'><{$package.main}></td>
				<td class='center'>
					<a href='packages.php?op=edit&amp;<{$package.key}>=<{$package.keyval}>' title='<{$smarty.const._EDIT}>'><img class="wgt-icon24" src='<{$modPathIcon32}>edit.png' alt='packages'></a>
					<a href='packages.php?op=delete&amp;<{$package.key}>=<{$package.keyval}>' title='<{$smarty.const._DELETE}>'><img class="wgt-icon24" src='<{$modPathIcon32}>delete.png' alt='packages'></a>
				</td>
			</tr>
			<{/foreach}>
		</tbody>
	</table>
	<div class='clear'>&nbsp;</div>
	<{if $pagenav}>
		<div class='xo-pagenav floatright'><{$pagenav}></div>
		<div class='clear spacer'></div>
	<{/if}>
<{else}>
	<{if $nodataPackages}>
		<div>
			<{$nodataPackages}><img src='<{xoModuleIcons32 button_ok.png}>' alt='packages'>
		</div>
		<div class='clear spacer'></div>
		<br>
		<br>
	<{/if}>
<{/if}>
<br>
<br>
<br>
<{if $error}>
	<div class='errorMsg'>
<strong><{$error}></strong>	</div>
<{/if}>

<!-- Footer -->
<{include file='db:wgtransifex_admin_footer.tpl' }>
