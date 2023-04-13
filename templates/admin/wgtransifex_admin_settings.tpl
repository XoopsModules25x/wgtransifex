<!-- Header -->
<{include file='db:wgtransifex_admin_header.tpl' }>

<{if $settings_list|default:''}>
    <table class='table table-bordered'>
        <thead>
            <tr class='head'>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_SETTING_ID}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_SETTING_USERNAME}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_SETTING_PRIMARY}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_SETTING_REQUEST}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_SETTING_DATE}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_SETTING_SUBMITTER}></th>
                <th class="center width5"><{$smarty.const._AM_WGTRANSIFEX_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $settings_count|default:''}>
        <tbody>
            <{foreach item=setting from=$settings_list}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$setting.id}></td>
                <td class='center'><{$setting.username}></td>
                <td class='center'><{$setting.primary}></td>
                <td class='center'><{$setting.request}></td>
                <td class='center'><{$setting.date}></td>
                <td class='center'><{$setting.submitter}></td>
                <td class="center  width10">
                    <a href="settings.php?op=edit&amp;set_id=<{$setting.id}>" title="<{$smarty.const._EDIT}>"><img class="wgt-icon24" src="<{$modPathIcon32}>edit.png" alt="<{$smarty.const._EDIT}> settings"></a>
                    <a href="settings.php?op=delete&amp;set_id=<{$setting.id}>" title="<{$smarty.const._DELETE}>"><img class="wgt-icon24" src="<{$modPathIcon32}>delete.png" alt="<{$smarty.const._DELETE}> settings"></a>
                </td>
            </tr>
            <{/foreach}>
        </tbody>
        <{/if}>
    </table>
    <div class="clear">&nbsp;</div>
    <{if !empty($pagenav)}>
        <div class="xo-pagenav floatright"><{$pagenav}></div>
        <div class="clear spacer"></div>
    <{/if}>
<{/if}>
<{if !empty($form)}>
    <{$form}>
<{/if}>
<{if !empty($error)}>
    <div class="errorMsg"><strong><{$error}></strong></div>
<{/if}>

<!-- Footer -->
<{include file='db:wgtransifex_admin_footer.tpl' }>
