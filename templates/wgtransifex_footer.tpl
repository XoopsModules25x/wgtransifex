<div class='pull-left'><{$copyright}></div>

<{if $pagenav|default:'' != ''}>
    <div class='pull-right'><{$pagenav}></div>
<{/if}>
<br>
<{if $xoops_isadmin|default:'' != ''}>
    <div class='text-center bold'><a href='<{$admin}>'><{$smarty.const._MA_WGTRANSIFEX_ADMIN}></a></div>
<{/if}>

<{if $comment_mode|default:''}>
    <div class='pad2 marg2'>
        <{if $comment_mode|default:'' == "flat"}>
            <{include file='db:system_comments_flat.tpl' }>
        <{elseif $comment_mode|default:'' == "thread"}>
            <{include file='db:system_comments_thread.tpl' }>
        <{elseif $comment_mode|default:'' == "nest"}>
            <{include file='db:system_comments_nest.tpl' }>
        <{/if}>
    </div>
<{/if}>
<{include file='db:system_notification_select.tpl' }>
