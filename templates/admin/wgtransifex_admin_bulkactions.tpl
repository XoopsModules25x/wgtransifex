<!-- Header -->
<{include file='db:wgtransifex_admin_header.tpl' }>

<h5><{$smarty.const._AM_WGTRANSIFEX_BULKACTION_INFO1}></h5>
<h5><{$smarty.const._AM_WGTRANSIFEX_BULKACTION_INFO2}></h5>
<br><br>
<table class='table table-bordered'>
    <thead>
        <tr class='head'>
            <th class="center"><{$smarty.const._AM_WGTRANSIFEX_BULKACTION_DESC}></th>
            <th class="center"><{$smarty.const._AM_WGTRANSIFEX_FORM_ACTION}></th>
        </tr>
    </thead>
    <tbody>
        <tr class='odd'>
            <td class='left'><{$smarty.const._AM_WGTRANSIFEX_BULKACTION_DESC_RES}></td>
            <td class='center'>
                <a class="btn btn-default" href="resources.php?op=savetxall" title="<{$smarty.const._AM_WGTRANSIFEX_READTX_RESOURCES_ALL}>">
                    <img src="<{$modPathIcon16}>resources.png" title="<{$smarty.const._AM_WGTRANSIFEX_READTX_RESOURCES_ALL}>" alt="<{$smarty.const._AM_WGTRANSIFEX_READTX_RESOURCES_ALL}>">&nbsp;<{$smarty.const._AM_WGTRANSIFEX_READTX_RESOURCES_ALL}></a>
            </td>
        </tr>
        <tr class='even'>
            <td class='left'><{$smarty.const._AM_WGTRANSIFEX_BULKACTION_DESC_TRA}></td>
            <td class='center'>
                <a class="btn btn-default" href="translations.php?op=readtxall" title="<{$smarty.const._AM_WGTRANSIFEX_READTX_TRANSLATIONS_ALL}>">
                    <img src="<{$modPathIcon16}>translations.png" title="<{$smarty.const._AM_WGTRANSIFEX_READTX_TRANSLATIONS_ALL}>" alt="<{$smarty.const._AM_WGTRANSIFEX_READTX_TRANSLATIONS_ALL}>">&nbsp;<{$smarty.const._AM_WGTRANSIFEX_READTX_TRANSLATIONS_ALL}></a>
            </td>
        </tr>
        <tr class='odd'>
            <td class='left'><{$smarty.const._AM_WGTRANSIFEX_BULKACTION_DESC_PKG}></td>
            <td class='center'>
                <a class="btn btn-default" href="packages.php?op=auto_create" title="<{$smarty.const._AM_WGTRANSIFEX_PACKAGES_AUTOCREATE}>">
                    <img src="<{$modPathIcon16}>packages.png" title="<{$smarty.const._AM_WGTRANSIFEX_PACKAGES_AUTOCREATE}>" alt="<{$smarty.const._AM_WGTRANSIFEX_PACKAGES_AUTOCREATE}>">&nbsp;<{$smarty.const._AM_WGTRANSIFEX_PACKAGES_AUTOCREATE}></a>
            </td>
        </tr>
    </tbody>
</table>
<div class="clear">&nbsp;</div>

<{if $form|default:''}>
    <{$form}>
<{/if}>
<{if $error|default:''}>
    <div class="errorMsg"><strong><{$error}></strong></div>
<{/if}>

<!-- Footer -->
<{include file='db:wgtransifex_admin_footer.tpl' }>
