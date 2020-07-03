<{include file='db:wgtransifex_header.tpl' }>

<{if $projectsCount > 0}>
<div class='table-responsive'>
	<table class='table table-<{$table_type}>'>
		<thead>
			<tr class='head'>
				<th colspan='<{$divideby}>'><{$smarty.const._MA_WGTRANSIFEX_PROJECTS_TITLE}></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<{foreach item=project from=$projects}>
				<td>
					<div class='panel panel-<{$panel_type}>'>
						<{include file='db:wgtransifex_projects_item.tpl' }>
					</div>
				</td>
				<{if $project.count is div by $divideby}>
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
