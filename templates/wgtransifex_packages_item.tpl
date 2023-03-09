<i id='pkgId_<{$package.pkg_id}>'></i>
<div class='panel-heading'>
</div>
<div class='panel-body'>
    <div class='col-sm-3'>
        <img class='img-responsive img-fluid' src="<{$wgtransifex_upload_url}>/logos/<{$package.logo}>" alt="<{$package.name}>" title="<{$package.name}>">
    </div>
    <div class='col-sm-9'>
        <p class='package-line col-sm-9 justify'><{$smarty.const._MA_WGTRANSIFEX_PACKAGE_NAME}>: <{$package.name}></p>
        <{if $package.desc|default:''}>
            <p class='package-line col-sm-9 justify'><{$smarty.const._MA_WGTRANSIFEX_PACKAGE_DESC}>: <{$package.desc}></p>
        <{/if}>
        <p class='package-line col-sm-9 justify'><{$smarty.const._MA_WGTRANSIFEX_PACKAGE_LANG_ID}>: <img src="<{$modPathIconFlags}><{$package.lang_flag}>" alt="<{$package.lang_id|default:''}>" title="<{$package.lang_id|default:''}>"></p>
        <p class='package-line col-sm-9 justify'><{$smarty.const._MA_WGTRANSIFEX_PACKAGE_DATE}>: <{$package.date}></p>
    </div>
</div>
<div class='panel-foot'>
    <div class='col-sm-12 right'>
        <{if $showItem|default:''}>
            <a class='btn btn-success right' href='<{$link_list}>?op=list<{if $lang_id|default:false}>&amp;lang_id=<{$lang_id}>#pkgId_<{$package.pkg_id}><{/if}>' title='<{$smarty.const._MA_WGTRANSIFEX_PACKAGES_LIST}>'><{$smarty.const._MA_WGTRANSIFEX_PACKAGES_LIST}></a>
        <{else}>
            <a class='btn btn-success right' href='packages.php?op=show&amp;pkg_id=<{$package.pkg_id}><{if $lang_id|default:false}>&amp;lang_id=<{$lang_id}><{/if}>' title='<{$smarty.const._MA_WGTRANSIFEX_DETAILS}>'><{$smarty.const._MA_WGTRANSIFEX_DETAILS}></a>
        <{/if}>
        <a class='btn btn-primary right' href='download.php?op=package&amp;pkg_id=<{$package.pkg_id}>' title='<{$smarty.const._MA_WGTRANSIFEX_DOWNLOAD_PACKAGE}>'><{$smarty.const._MA_WGTRANSIFEX_DOWNLOAD_PACKAGE}></a>
        <a class='btn btn-warning right' href='packages.php?op=broken&amp;pkg_id=<{$package.pkg_id}>' title='<{$smarty.const._MA_WGTRANSIFEX_BROKEN}>'><{$smarty.const._MA_WGTRANSIFEX_BROKEN}></a>
        <{if $isAdmin|default:''}>
            <a class='btn btn-default right' href='admin/packages.php?op=edit&amp;pkg_id=<{$package.pkg_id}>' title='<{$smarty.const._EDIT}>'><{$smarty.const._EDIT}></a>
        <{/if}>
    </div>
</div>
