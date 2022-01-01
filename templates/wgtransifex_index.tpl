<{include file='db:wgtransifex_header.tpl' }>

<script>
    $(document).ready(function(){
        $("#toggleFormFilter").click(function(){
            $("#formFilter").toggle(1000);
            if (document.getElementById("toggleFormFilter").innerText === "<{$smarty.const._MA_WGTRANSIFEX_FILTER_HIDE}>") {
                document.getElementById("toggleFormFilter").innerText = "<{$smarty.const._MA_WGTRANSIFEX_FILTER_SHOW}>";
            } else {
                document.getElementById("toggleFormFilter").innerText = "<{$smarty.const._MA_WGTRANSIFEX_FILTER_HIDE}>";
            }
        });
    });
</script>

<!-- Start index list -->
<table>
    <thead>
        <tr class='center'>
            <th><{$smarty.const._MA_WGTRANSIFEX_TITLE}>  -  <{$smarty.const._MA_WGTRANSIFEX_DESC}></th>
        </tr>
    </thead>
    <tbody>
        <tr class='center'>
            <td class='bold pad5'>
                <ul class='menu text-center'>
                    <li><a class="text-secondary" href='<{$wgtransifex_url}>'><{$smarty.const._MA_WGTRANSIFEX_INDEX}></a></li>
                    <li><a class="text-secondary" href='<{$wgtransifex_url}>/packages.php'><{$smarty.const._MA_WGTRANSIFEX_PACKAGES}></a></li>
                </ul>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr class='center'>
            <td class='bold pad5'>
                <{if $adv|default:''}><{$adv}><{/if}>
            </td>
        </tr>
    </tfoot>
</table>
<!-- End index list -->

<div class="row wgt-filter-row">
    <div class="col-sm-12">
        <a id="toggleFormFilter" class='btn btn-default pull-right' href='#' title='<{$btnFormFilterLabel}>'><{$btnFormFilterLabel}></a>
    </div>
    <{if $formFilter|default:''}>
    <div id="formFilter" class="wgt-formFilter" style="display:<{$displayFormFilter}>">
        <div class="col-sm-12"><{$formFilter}></div>
    </div>
    <{/if}>
</div>

<div class='wgtransifex-linetitle'>
    <{if $pkgFilterText|default:''}>
        <{$smarty.const._MA_WGTRANSIFEX_FILTER_RESULT}>:  <{$pkgFilterText}>
    <{else}>
        <{$smarty.const._MA_WGTRANSIFEX_INDEX_LATEST_LIST}>
    <{/if}>
</div>

<{if $displaySingle|default:''}>
    <{if $packagesCount|default:0 > 0}>
        <!-- Start show new packages in index -->
        <table class='table table-<{$table_type}>'>
            <tr>
                <!-- Start new link loop -->
                <{section name=i loop=$packages}>
                    <td class='col_width<{$numb_col}> top center'>
                        <{include file='db:wgtransifex_packages_list.tpl' package=$packages[i]}>
                    </td>
                    <{if $packages[i]|@count is div by $divideby}>
                        </tr><tr>
                    <{/if}>
                <{/section}>
                <!-- End new link loop -->
            </tr>
        </table>
    <{/if}>
<{/if}>

<{if $displayCollection|default:''}>
    <{if $projectsCount|default:0 > 0}>
        <table class='table table-<{$table_type}>'>
            <tr>
                <!-- Start new link loop -->
                <{foreach item=packages from=$packagesList}>
                <td class='col_width<{$numb_col}> top'>
                    <{include file='db:wgtransifex_packages_prolist.tpl' packages=$packages}>
                </td>
                <{if $packages|@count is div by $divideby}>
            </tr><tr>
                <{/if}>
                <{/foreach}>
                <!-- End new link loop -->
            </tr>
        </table>
    <{/if}>
<{/if}>
<{include file='db:wgtransifex_footer.tpl' }>
