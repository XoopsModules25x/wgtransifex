<{foreach item=package from=$block}>
    <div class='col-xs-12 col-sm-3 tdmdownloads-blockpanel'>
        <div class='tdmdownloads-card fadeitem'>
            <div class='tdmdownloads-cardinfo tdmdownloads-cardinfo-small'>
                <{if $package.logo}>
                    <p class="tdm-download-logo">
                        <img class='img-responsive' src="<{$wgtransifex_upload_url}>/logos/<{$package.logo}>" alt="<{$package.name}>" title="<{$package.name}>">
                    </p>
                <{/if}>
                <div class="tdmdownloads-blocktitle">
                    <a href="<{$xoops_url}>/modules/wgtransifex/packages.php?pkg_id=<{$package.id}>" title='<{$package.name}>' target='_blank'><{$package.name}></a>
                    <p class="tdmdownloads-blockinfo left">
                        <span class="glyphicon glyphicon-calendar" title="<{$smarty.const._MB_TDMDOWNLOADS_SUBMITDATE}>"></span><{$package.date}>
                    </p>
                </div>
                <{if $package.desc}>
                    <p class="tdmdownloads-blockdesc"><{$package.desc}></p>
                <{/if}>
            </div>
            <div class='clear'></div>
            <div class='tdmdownloads-blockbtns center'>
                <p class="center">
                    <a class="btn btn-primary" href="<{$xoops_url}>/modules/wgtransifex/packages.php?pkg_id=<{$package.id}>" title='<{$package.name}>' target='_blank'><{$smarty.const._MB_WGTRANSIFEX_PKG_SHOWDETAILS}></a>
                </p>
            </div>
        </div>
    </div>
<{/foreach}>