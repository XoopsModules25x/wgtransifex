<!-- Header -->
<{include file='db:wgtransifex_admin_header.tpl' }>

<{if $packages_list|default:''}>
    <table class='table table-bordered'>
        <thead>
            <tr class='head'>
                <th class="center">
                    <{$smarty.const._AM_WGTRANSIFEX_PACKAGE_ID}>
                    <{if $sortby_curr|default:'' == 'pkg_id_desc'}>
                        <img class="wgt-icon16" src="<{$modPathIcon16}>desc_inactive.png" alt="<{$smarty.const._DESCENDING}>">
                    <{else}>
                        <a href="packages.php?op=list&amp;sortby=pkg_id&amp;order=desc" title="<{$smarty.const._DESCENDING}>">
                            <img class="wgt-icon16" src="<{$modPathIcon16}>desc.png" alt="<{$smarty.const._DESCENDING}>"></a>
                    <{/if}>
                    <{if $sortby_curr|default:'' == 'pkg_id_asc'}>
                        <img class="wgt-icon16" src="<{$modPathIcon16}>asc_inactive.png" alt="<{$smarty.const._DESCENDING}>">
                    <{else}>
                        <a href="packages.php?op=list&amp;sortby=pkg_id&amp;order=asc" title="<{$smarty.const._ASCENDING}>">
                            <img class="wgt-icon16" src="<{$modPathIcon16}>asc.png" alt="<{$smarty.const._ASCENDING}>"></a>
                    <{/if}>
                </th>
                <th class="center">
                    <{if $sortby_curr|default:'' == 'pkg_name_desc'}>
                        <img class="wgt-icon16" src="<{$modPathIcon16}>desc_inactive.png" alt="<{$smarty.const._DESCENDING}>">
                    <{else}>
                        <a href="packages.php?op=list&amp;sortby=pkg_name&amp;order=desc" title="<{$smarty.const._DESCENDING}>">
                            <img class="wgt-icon16" src="<{$modPathIcon16}>desc.png" alt="<{$smarty.const._DESCENDING}>"></a>
                    <{/if}>
                    <{if $sortby_curr|default:'' == 'pkg_name_asc'}>
                        <img class="wgt-icon16" src="<{$modPathIcon16}>asc_inactive.png" alt="<{$smarty.const._DESCENDING}>">
                    <{else}>
                        <a href="packages.php?op=list&amp;sortby=pkg_name&amp;order=asc" title="<{$smarty.const._ASCENDING}>">
                            <img class="wgt-icon16" src="<{$modPathIcon16}>asc.png" alt="<{$smarty.const._ASCENDING}>"></a>
                    <{/if}>    
                </th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_PACKAGE_PRO_ID}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_PACKAGE_LANG_ID}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_PACKAGE_LOGO}></th>
                <th class="center"><{$smarty.const._MA_WGTRANSIFEX_PACKAGE_TRAPERC}></th>
                <th class="center">
                    <{$smarty.const._AM_WGTRANSIFEX_PACKAGE_DATE}>
                    <{if $sortby_curr|default:'' == 'pkg_date_desc'}>
                        <img class="wgt-icon16" src="<{$modPathIcon16}>desc_inactive.png" alt="<{$smarty.const._DESCENDING}>">
                    <{else}>
                        <a href="packages.php?op=list&amp;sortby=pkg_date&amp;order=desc" title="<{$smarty.const._DESCENDING}>">
                            <img class="wgt-icon16" src="<{$modPathIcon16}>desc.png" alt="<{$smarty.const._DESCENDING}>"></a>
                    <{/if}>
                    <{if $sortby_curr|default:'' == 'pkg_date_asc'}>
                        <img class="wgt-icon16" src="<{$modPathIcon16}>asc_inactive.png" alt="<{$smarty.const._DESCENDING}>">
                    <{else}>
                        <a href="packages.php?op=list&amp;sortby=pkg_date&amp;order=asc" title="<{$smarty.const._ASCENDING}>">
                            <img class="wgt-icon16" src="<{$modPathIcon16}>asc.png" alt="<{$smarty.const._ASCENDING}>"></a>
                    <{/if}>
                </th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_PACKAGE_SUBMITTER}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_PACKAGE_STATUS}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_PACKAGE_VERSION}></th>
                <th class="center width5"><{$smarty.const._AM_WGTRANSIFEX_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $packages_count|default:''}>
        <tbody>
            <{foreach item=package from=$packages_list}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$package.id}></td>
                <td class='center'><{$package.name}></td>
                <td class='center'><{$package.pro_id}></td>
                <td class='center'><{$package.lang_id}></td>
                <td class='center'><img style="max-width:100px" src="<{$wgtransifex_upload_url}>/logos/<{$package.logo}>" alt="<{$smarty.const._AM_WGTRANSIFEX_PACKAGE_LOGO}> <{$package.name}>" title="<{$smarty.const._AM_WGTRANSIFEX_PACKAGE_LOGO}> <{$package.name}>"></td>
                <td class='center'><{$package.traperc_text}></td>
                <td class='center'><{$package.date}></td>
                <td class='center'><{$package.submitter}></td>
                <td class='center'><img src="<{$modPathIcon32}>status<{$package.status}>.png" alt="<{$package.status_text}>" title="<{$package.status_text}>"></td>
                <td class='center'>
                    <{if $package.outdated}>
                        <img src="<{$modPathIcon32}>warning.png" alt="<{$smarty.const._AM_WGTRANSIFEX_PACKAGE_VERSION_OUTDATED}>" title="<{$smarty.const._AM_WGTRANSIFEX_PACKAGE_VERSION_OUTDATED}>">
                        <{$smarty.const._AM_WGTRANSIFEX_PACKAGE_VERSION_OUTDATED}>
                    <{else}>
                        <img src="<{$modPathIcon16}>ok.png" alt="<{$smarty.const._AM_WGTRANSIFEX_PACKAGE_VERSION_LAST}>" title="<{$smarty.const._AM_WGTRANSIFEX_PACKAGE_VERSION_LAST}>">
                        <{$smarty.const._AM_WGTRANSIFEX_PACKAGE_VERSION_LAST}>
                    <{/if}>
                </td>
                <td class="center  width5">
                    <a href="packages.php?op=edit&amp;pkg_id=<{$package.id}>" title="<{$smarty.const._EDIT}>"><img class="wgt-icon24" src="<{$modPathIcon32}>edit.png" alt="<{$smarty.const._EDIT}> packages"></a>
                    <a href="packages.php?op=delete&amp;pkg_id=<{$package.id}>" title="<{$smarty.const._DELETE}>"><img class="wgt-icon24" src="<{$modPathIcon32}>delete.png" alt="<{$smarty.const._DELETE}> packages"></a>
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
