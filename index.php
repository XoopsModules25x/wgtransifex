<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * wgTransifex module for xoops
 *
 * @copyright      2020 XOOPS Project (https://xooops.org)
 * @license        GPL 2.0 or later
 * @package        wgtransifex
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         Goffy - Email:<webmaster@wedega.com> - Website:<https://wedega.com> / <https://xoops.org>
 */

use Xmf\Request;
use XoopsModules\Wgtransifex;

require __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'wgtransifex_index.tpl';
include_once XOOPS_ROOT_PATH . '/header.php';
// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet($style, null);
$keywords = [];
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('wgtransifex_url', WGTRANSIFEX_URL);
$GLOBALS['xoopsTpl']->assign('modPathIconFlags', WGTRANSIFEX_IMAGE_URL . '/flags/');
$packagesCount = $packagesHandler->getCountPackages();
$GLOBALS['xoopsTpl']->assign('packagesCount', $packagesCount);
$count = 1;
if ($packagesCount > 0) {
    $start       = Request::getInt('start', 0);
    $limit       = Request::getInt('limit', $helper->getConfig('userpager'));
    $packagesAll = $packagesHandler->getAllPackages($start, $limit, 'pkg_date', 'DESC');
    // Get All Packages
    $packages = [];
    foreach (\array_keys($packagesAll) as $i) {
        $package    = $packagesAll[$i]->getValuesPackages();
        $acount     = ['count', $count];
        $packages[] = \array_merge($package, $acount);
        $keywords[] = $packagesAll[$i]->getVar('pkg_name');
        ++$count;
    }
    $GLOBALS['xoopsTpl']->assign('packages', $packages);
    unset($packages);
    // Display Navigation
    if ($packagesCount > $limit) {
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new \XoopsPageNav($packagesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
    $GLOBALS['xoopsTpl']->assign('lang_thereare', \sprintf(\_MA_WGTRANSIFEX_INDEX_THEREARE, $packagesCount));
    $GLOBALS['xoopsTpl']->assign('divideby', $helper->getConfig('divideby'));
    $GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
}
unset($count);
$GLOBALS['xoopsTpl']->assign('table_type', $helper->getConfig('table_type'));
// Breadcrumbs
$xoBreadcrumbs[] = ['title' => \_MA_WGTRANSIFEX_INDEX];
// Keywords
wgtransifexMetaKeywords($helper->getConfig('keywords') . ', ' . implode(',', $keywords));
unset($keywords);
// Description
wgtransifexMetaDescription(\_MA_WGTRANSIFEX_INDEX_DESC);
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', WGTRANSIFEX_URL . '/index.php');
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', WGTRANSIFEX_UPLOAD_URL);
require __DIR__ . '/footer.php';
