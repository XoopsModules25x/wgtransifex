<i id='proId_<{$project.pro_id}>'></i>
<div class='panel-heading'><{$project.name}></div>
<div class='panel-body'>
    <span class='col-sm-12 justify'><{$project.description}></span>
    <span class='col-sm-12 justify'>
        <{$smarty.const._MA_WGTRANSIFEX_PROJECT_LAST_UPDATED}>: <{$project.last_updated}>
    </span>
    <{if $showItem|default:''}>
        <span class='col-sm-12 justify'>
            <{$smarty.const._MA_WGTRANSIFEX_PROJECT_SOURCE_LANGUAGE_CODE}>: <{$project.source_language_code}>
        </span>
        <span class='col-sm-12 justify'>
            <{$smarty.const._MA_WGTRANSIFEX_PROJECT_TXRESOURCES}>: <{$project.txresources}>
        </span>
        <span class='col-sm-12 justify'>
            <{$smarty.const._MA_WGTRANSIFEX_PROJECT_TEAMS}>: <{$project.teams}>
        </span>
    
    <{/if}>
</div>
<div class='panel-foot'>
    <div class='col-sm-12 right'>
        <{if $showItem|default:''}>
            <a class='btn btn-success right' href='projects.php?op=list&amp;#proId_<{$project.pro_id}>' title='<{$smarty.const._MA_WGTRANSIFEX_PROJECTS_LIST}>'><{$smarty.const._MA_WGTRANSIFEX_PROJECTS_LIST}></a>
        <{else}>
            <a class='btn btn-success right' href='projects.php?op=show&amp;pro_id=<{$project.pro_id}>' title='<{$smarty.const._MA_WGTRANSIFEX_DETAILS}>'><{$smarty.const._MA_WGTRANSIFEX_DETAILS}></a>
        <{/if}>
    </div>
</div>
