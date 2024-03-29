<div class='panel-body'>
    <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3 wgt-package-img'>
        <img class='img-responsive img-fluid' src="<{$wgtransifex_upload_url}>/logos/<{$packages.logo}>" alt="<{$packages.name}>" title="<{$packages.name}>">
    </div>
    <div class='col-xs-12 col-sm-8 col-md-8 col-lg-8'>
        <div class="row wgt-package-row">
            <p><{$smarty.const._MA_WGTRANSIFEX_PACKAGE_NAME}>: <{$packages.name}></p>
            <{if $packages.desc|default:''}>
                <p><{$smarty.const._MA_WGTRANSIFEX_PACKAGE_DESC}>: <{$packages.desc}></p>
            <{/if}>
        </div>
        <{foreach item=pkglang from=$packages.langs}>
            <div class="row wgt-package-row">
                <div class="pull-left">
                    <img src="<{$modPathIconFlags}><{$pkglang.lang_flag}>" alt="<{$pkglang.lang_id}>" title="<{$pkglang.lang_id}>"> <{$pkglang.lang_id}>
                    <i class="fa fa-globe" title="<{$smarty.const._MA_WGTRANSIFEX_PACKAGE_TRAPERC}>"></i> <{$pkglang.traperc_text}>
                    <i class="fa fa-calendar" title="<{$smarty.const._MA_WGTRANSIFEX_PACKAGE_DATE}>"></i>&nbsp;<{$pkglang.date}>
                </div>
                <div class="pull-right">
                    <a class='btn btn-primary' href='packages.php?op=show_index&amp;pkg_id=<{$pkglang.pkg_id}>' title='<{$smarty.const._MA_WGTRANSIFEX_DETAILS}>'>
                        <i class="fa fa-search" title="<{$smarty.const._MA_WGTRANSIFEX_DETAILS}>"></i>
                    </a>
                    <a class='btn btn-success' href='download.php?op=package&amp;pkg_id=<{$pkglang.pkg_id}>' title='<{$smarty.const._MA_WGTRANSIFEX_DOWNLOAD_PACKAGE}>'>
                        <i class="fa fa-download" title="<{$smarty.const._MA_WGTRANSIFEX_DOWNLOAD_PACKAGE}>"></i>
                    </a>
                </div>
            </div>
        <{/foreach}>
    </div>
</div>
