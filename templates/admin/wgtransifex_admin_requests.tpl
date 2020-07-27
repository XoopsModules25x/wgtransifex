<!-- Header -->
<{include file='db:wgtransifex_admin_header.tpl' }>

<{if $requests_list}>
	<table class='table table-bordered'>
		<thead>
			<tr class='head'>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_REQUEST_ID}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_REQUEST_PROJECT}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_REQUEST_LANGUAGE}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_REQUEST_INFO}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_REQUEST_DATE}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_REQUEST_SUBMITTER}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_REQUEST_STATUS}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_REQUEST_STATUSDATE}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_REQUEST_STATUSUID}></th>
				<th class="center"><{$smarty.const._AM_WGTRANSIFEX_FORM_ACTION}></th>
			</tr>
		</thead>
		<{if $requests_count}>
		<tbody>
			<{foreach item=request from=$requests_list}>
			<tr class='<{cycle values='odd, even'}>'>
				<td class='center'><{$request.id}></td>
				<td class='center'><{$request.project}></td>
				<td class='center'><{$request.language}></td>
				<td class='center'><{$request.info}></td>
				<td class='center'><{$request.date}></td>
				<td class='center'><{$request.submitter}></td>
				<td class='center'><img src="<{$modPathIcon32}>status<{$request.status}>.png" alt="<{$request.status_text}>" title="<{$request.status_text}>"></td>
				<td class='center'><{$request.statusdate}></td>
				<td class='center'><{$request.statusuid}></td>
				<td class="center">
					<a href="requests.php?op=edit&amp;req_id=<{$request.id}>" title="<{$smarty.const._EDIT}>"><img class="wgt-icon24" src="<{$modPathIcon32}>edit.png" alt="<{$smarty.const._EDIT}> requests"></a>
					<a href="packages.php?op=new&amp;pkg_pro_id=<{$request.req_pro_id}>&amp;pkg_lang_id=<{$request.req_lang_id}>" title="<{$smarty.const._AM_WGTRANSIFEX_PACKAGE_ADD}>"><img class="wgt-icon24" src="<{$modPathIcon32}>packages.png" alt="packages"></a>
					<a href="requests.php?op=delete&amp;req_id=<{$request.id}>" title="<{$smarty.const._DELETE}>"><img class="wgt-icon24" src="<{$modPathIcon32}>delete.png" alt="<{$smarty.const._DELETE}> requests"></a>
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
