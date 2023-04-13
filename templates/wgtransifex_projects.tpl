<{include file='db:wgtransifex_header.tpl' }>

<{if $projectsCount|default:0 > 0}>
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
                    <{if $project|@count is div by $divideby}>
                        </tr><tr>
                    <{/if}>
                    <{/foreach}>
                </tr>
            </tbody>
            <tfoot><tr><td>&nbsp;</td></tr></tfoot>
        </table>
    </div>
    <{if $showRefresh|default:''}>
        <div class='row'>
            <div class='cols-xs-12 center'>
                <a class='btn btn-success center' href='projects.php?op=refresh' title='<{$smarty.const._MA_WGTRANSIFEX_PROJECTS_REFRESH}>'><{$smarty.const._MA_WGTRANSIFEX_PROJECTS_REFRESH}></a>
            </div>
        </div>
    <{/if}>
<{/if}>
<{if !empty($form)}>
    <{$form}>
<{/if}>
<{if !empty($error)}>
    <{$error}>
<{/if}>

<{include file='db:wgtransifex_footer.tpl' }>
