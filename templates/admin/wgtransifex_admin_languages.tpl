<!-- Header -->
<{include file='db:wgtransifex_admin_header.tpl' }>

<{if $languages_list}>
	<table class='table table-bordered'>
		<thead>
			<tr class='head'>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_LANGUAGE_ID}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_LANGUAGE_NAME}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_LANGUAGE_CODE}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_LANGUAGE_ISO_639_1}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_LANGUAGE_FOLDER}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_LANGUAGE_FLAG}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_LANGUAGE_DATE}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_LANGUAGE_SUBMITTER}></th>
				<th class="center width5"><{$smarty.const._AM_WGTRANSIFEX_FORM_ACTION}></th>
			</tr>
		</thead>
		<{if $languages_count}>
		<tbody>
			<{foreach item=language from=$languages_list}>
			<tr class='<{cycle values='odd, even'}>'>
				<td class='center'><{$language.id}></td>
				<td class='center'><{$language.name}></td>
				<td class='center'><{$language.code}></td>
				<td class='center'><{$language.iso_639_1}></td>
				<td class='center'><{$language.folder}></td>
				<td class='center'>
				<img src="<{$modPathIconFlags}><{$language.flag}>" alt="<{$language.name}>" title="<{$language.name}>" />
				</td>
				<td class='center'><{$language.date}></td>
				<td class='center'><{$language.submitter}></td>
				<td class="center  width5">
					<a href="languages.php?op=edit&amp;lang_id=<{$language.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}> languages" /></a>
					<a href="languages.php?op=delete&amp;lang_id=<{$language.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}> languages" /></a>
				</td>
			</tr>
			<{/foreach}>
		</tbody>
		<{/if}>
	</table>
	<div class="clear">&nbsp;</div>
	<{if $pagenav}>
		<div class="xo-pagenav floatright"><{$pagenav}></div>
		<div class="clear spacer"></div>
	<{/if}>
<{/if}>
<{if $form}>
	<{$form}>
<{/if}>
<{if $error}>
	<div class="errorMsg"><strong><{$error}></strong></div>
<{/if}>

<!-- Footer -->
<{include file='db:wgtransifex_admin_footer.tpl' }>
