<!-- Header -->
<{include file='db:wgtransifex_admin_header.tpl' }>
<{if $formProject|default:''}>
    <{$formProject}>
<{/if}>

<{if $projects_list|default:''}>
    <table class='table table-bordered'>
        <thead>
        <tr class='head'>
            <th class="center"><{$smarty.const._AM_WGTRANSIFEX_PROJECT_ID}></th>
            <th class="center"><{$smarty.const._AM_WGTRANSIFEX_PROJECT_NAME}></th>
            <th class="center"><{$smarty.const._AM_WGTRANSIFEX_PROJECT_STATUS}></th>
            <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCES_NB}></th>
            <th class="center"><{$smarty.const._AM_WGTRANSIFEX_TRANSLATIONS_NB}></th>
            <th class="center"><{$smarty.const._AM_WGTRANSIFEX_PROJECT_DATE}></th>
            <th class="center"><{$smarty.const._AM_WGTRANSIFEX_FORM_ACTION}></th>
        </tr>
        </thead>
        <tbody>
        <{foreach item=project from=$projects_list}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$project.id}></td>
                <td class='center'><{$project.name}></td>
                <td class='center'><img src="<{$modPathIcon32}>status<{$project.status}>.png" alt="<{$project.status_text}>" title="<{$project.status_text}>"></td>
                <td class='center'><{$project.resources}></td>
                <td class='center'><{$project.translations}></td>
                <td class='center'><{$project.date}></td>
                <td class="center">
                    <a href="resources.php?op=list&amp;res_pro_id=<{$project.id}>" title="<{$smarty.const._AM_WGTRANSIFEX_RESOURCES_SHOW}>"><img class="wgt-icon24" src="<{$modPathIcon32}>resources.png" alt="<{$smarty.const._AM_WGTRANSIFEX_RESOURCES_SHOW}>"></a>
                    <a href="resources.php?op=delete_all&amp;res_pro_id=<{$project.id}>" title="<{$smarty.const._DELETE}>"><img class="wgt-icon24" src="<{$modPathIcon32}>delete.png" alt="<{$smarty.const._DELETE}> resources"></a>
                    <{if $project.status == $statusTxAdmin && $displayTxAdmin}>
                        <a href="resources.php?op=uploadtx&amp;upload_test=1&amp;res_pro_id=<{$project.id}>" title="<{$smarty.const._AM_WGTRANSIFEX_RESOURCES_UPLOADTX_TEST}>"><img class="wgt-icon24" src="<{$modPathIcon32}>uploadtxtest.png" alt="<{$smarty.const._AM_WGTRANSIFEX_RESOURCES_UPLOADTX_TEST}>"></a>
                        <a href="resources.php?op=uploadtx&amp;res_pro_id=<{$project.id}>" title="<{$smarty.const._AM_WGTRANSIFEX_RESOURCES_UPLOADTX}>"><img class="wgt-icon24" src="<{$modPathIcon32}>uploadtx.png" alt="<{$smarty.const._AM_WGTRANSIFEX_RESOURCES_UPLOADTX}>"></a>
                    <{/if}>
                </td>
            </tr>
            <{/foreach}>
        </tbody>
    </table>
    <div class="clear">&nbsp;</div>
    <{if $pagenav|default:''}>
        <div class="xo-pagenav floatright"><{$pagenav}></div>
        <div class="clear spacer"></div>
    <{/if}>
<{/if}>

<{if $resources_list|default:''}>
    <table class='table table-bordered'>
        <thead>
            <tr class='head'>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_ID}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_PRO_ID}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_SOURCE_LANGUAGE_CODE}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_NAME}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_I18N_TYPE}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_SLUG}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_PRIORITY}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_CATEGORIES}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_METADATA}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_STATUS}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_DATE}></th>
                <th class="center"><{$smarty.const._AM_WGTRANSIFEX_RESOURCE_SUBMITTER}></th>
                <th class="center width5"><{$smarty.const._AM_WGTRANSIFEX_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $resources_count|default:''}>
        <tbody>
            <{foreach item=resource from=$resources_list}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$resource.id}></td>
                <td class='center'><{$resource.pro_id}></td>
                <td class='center'><{$resource.source_language_code}></td>
                <td class='center'><{$resource.name}></td>
                <td class='center'><{$resource.i18n_type}></td>
                <td class='center'><{$resource.slug}></td>
                <td class='center'><{$resource.priority}></td>
                <td class='center'><{$resource.categories}></td>
                <td class='center'><{$resource.metadata_short}></td>
                <td class='center'><img src="<{$modPathIcon32}>status<{$resource.status}>.png" alt="<{$resource.status_text}>" title="<{$resource.status_text}>"></td>
                <td class='center'><{$resource.date}></td>
                <td class='center'><{$resource.submitter}></td>
                <td class="center width10">
                    <a href="resources.php?op=savetx&amp;res_id=<{$resource.id}>&amp;res_pro_id=<{$resource.res_pro_id}>" title="<{$smarty.const._AM_WGTRANSIFEX_READTX_RESOURCE}>"><img class="wgt-icon24" src="<{$modPathIcon32}>readtx.png" alt="<{$smarty.const._AM_WGTRANSIFEX_READTX_RESOURCE}>"></a>
                    <a href="resources.php?op=edit&amp;res_id=<{$resource.id}>" title="<{$smarty.const._EDIT}>"><img class="wgt-icon24" src="<{$modPathIcon32}>edit.png" alt="<{$smarty.const._EDIT}> resources"></a>
                    <a href="resources.php?op=delete&amp;res_id=<{$resource.id}>&amp;res_pro_id=<{$resource.res_pro_id}>" title="<{$smarty.const._DELETE}>"><img class="wgt-icon24" src="<{$modPathIcon32}>delete.png" alt="<{$smarty.const._DELETE}> resources"></a>
                </td>
            </tr>
            <{/foreach}>
        </tbody>
        <{/if}>
    </table>
    <div class="clear">&nbsp;</div>
    <{if $pagenav|default:''}>
        <div class="xo-pagenav floatright"><{$pagenav}></div>
        <div class="clear spacer"></div>
    <{/if}>
<{/if}>
<{if $uploadTxShow|default:''}>
    <h4><{$smarty.const._AM_WGTRANSIFEX_UPLOADTX_SUMMARY}></h4>
    <p><{$smarty.const._AM_WGTRANSIFEX_UPLOADTX_SUCCESS}>: <{$uploadTxSuccess}></p>
    <p><{$smarty.const._AM_WGTRANSIFEX_UPLOADTX_ERRORS}>: <{$uploadTxErrors}></p>
    <p><{$smarty.const._AM_WGTRANSIFEX_UPLOADTX_SKIPPED}>: <{$uploadTxSkipped}></p>
    <p><{$smarty.const._AM_WGTRANSIFEX_UPLOADTX_DETAILS}><br>
        <{foreach item=info from=$uploadTxInfos}>
            <img src="<{$modPathIcon16}><{$info.type}>.png" alt="<{$info.type}>"> <{$info.text}><br>
        <{/foreach}>
    </p>
    <{if $uploadTxErrors|default:0 == 0 && $uploadTxTest|default:''}>
        <p><img src="<{$modPathIcon16}>ok.png" alt="<{$info.type}>"> <{$smarty.const._AM_WGTRANSIFEX_UPLOADTX_CHECK_NOERRORS}></p>
        <p><a href="resources.php?op=uploadtx&amp;res_pro_id=<{$proId}>" title="<{$smarty.const._AM_WGTRANSIFEX_RESOURCES_UPLOADTX}>"><img class="wgt-icon24" src="<{$modPathIcon32}>uploadtx.png" alt="<{$smarty.const._AM_WGTRANSIFEX_RESOURCES_UPLOADTX}>"><{$smarty.const._AM_WGTRANSIFEX_RESOURCES_UPLOADTX}></a></p>

    <{/if}>
<{/if}>
<{if $form|default:''}>
    <{$form}>
<{/if}>
<{if $error|default:''}>
    <div class="errorMsg"><strong><{$error}></strong></div>
<{/if}>

<!-- Footer -->
<{include file='db:wgtransifex_admin_footer.tpl' }>
