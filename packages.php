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
use XoopsModules\Wgtransifex\Common;
use XoopsModules\Wgtransifex\Constants;

require __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'wgtransifex_packages.tpl';
include_once XOOPS_ROOT_PATH . '/header.php';

$op     = Request::getCmd('op', 'list');
$start  = Request::getInt('start', 0);
$limit  = Request::getInt('limit', $helper->getConfig('userpager'));
$pkgId  = Request::getInt('pkg_id', 0);
$langId = Request::getInt('lang_id', 0);

// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet($style, null);

$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('wgtransifex_url', WGTRANSIFEX_URL);
$GLOBALS['xoopsTpl']->assign('modPathIconFlags', WGTRANSIFEX_IMAGE_URL . '/flags/');
$GLOBALS['xoopsTpl']->assign('showItem', $pkgId > 0);

$keywords = [];

switch ($op) {
    case 'show':
    case 'show_index':
    case 'list':
    default:
        if ('show_index' == $op) {
            $GLOBALS['xoopsTpl']->assign('link_list', 'index.php');
        } else {
            $GLOBALS['xoopsTpl']->assign('link_list', 'packages.php');
        }

        // Checking permissions
        $request_allowed = false;
        $groups = (isset($GLOBALS['xoopsUser']) && \is_object($GLOBALS['xoopsUser'])) ? $GLOBALS['xoopsUser']->getGroups() : XOOPS_GROUP_ANONYMOUS;
        foreach ($groups as $group) {
            if (XOOPS_GROUP_ADMIN == $group || \in_array($group, $helper->getConfig('groups_request'))) {
                $request_allowed = true;
                break;
            }
        }
        $GLOBALS['xoopsTpl']->assign('showRequest', $request_allowed);

        $crPackages = new \CriteriaCompo();
        if ($pkgId > 0) {
            $crPackages->add(new \Criteria('pkg_id', $pkgId));
        }
        if ($langId > 0) {
            $crPackages->add(new \Criteria('pkg_lang_id', $langId));
            $GLOBALS['xoopsTpl']->assign('lang_id', $langId);
        }
        $packagesCount = $packagesHandler->getCount($crPackages);
        $GLOBALS['xoopsTpl']->assign('packagesCount', $packagesCount);
        $crPackages->setStart($start);
        $crPackages->setLimit($limit);
        $packagesAll = $packagesHandler->getAll($crPackages);
        if ($packagesCount > 0) {
            $packages = [];
            // Get All Packages
            foreach (\array_keys($packagesAll) as $i) {
                $packages[$i] = $packagesAll[$i]->getValuesPackages();
                $keywords[$i] = $packagesAll[$i]->getVar('pkg_name');
            }
            $GLOBALS['xoopsTpl']->assign('packages', $packages);
            unset($packages);
            // Display Navigation
            if ($packagesCount > $limit) {
                include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($packagesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
            $GLOBALS['xoopsTpl']->assign('type', $helper->getConfig('table_type'));
            $GLOBALS['xoopsTpl']->assign('divideby', $helper->getConfig('divideby'));
            $GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
        }
        break;
    case 'broken':
        // Check params
        if (0 == $pkgId) {
            \redirect_header('packages.php?op=list', 3, \_MA_WGTRANSIFEX_INVALID_PARAM);
        }
        $packagesObj = $packagesHandler->get($pkgId);
        $pkgName     = $packagesObj->getVar('pkg_name');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('packages.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            $packagesObj->setVar('pkg_status', Constants::STATUS_BROKEN);
            if ($packagesHandler->insert($packagesObj)) {
                // Event broken notification
                $tags = [];
                $tags['ITEM_NAME'] = $pkgName;
                $tags['ITEM_URL']  = XOOPS_URL . '/modules/wgtransifex/admin/packages.php?op=show&pkg_id=' . $pkgId;
                $notificationHandler = \xoops_getHandler('notification');
                $notificationHandler->triggerEvent('packages', $pkgId, 'package_broken', $tags);
                \redirect_header('packages.php', 3, \_MA_WGTRANSIFEX_FORM_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $packagesObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new Common\XoopsConfirm(
                ['ok' => 1, 'pkg_id' => $pkgId, 'op' => 'broken'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_MA_WGTRANSIFEX_FORM_SURE_BROKEN, $packagesObj->getVar('pkg_name'))
            );
            $form         = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
}
// Breadcrumbs
$xoBreadcrumbs[] = ['title' => \_MA_WGTRANSIFEX_PACKAGES];
// Keywords
wgtransifexMetaKeywords($helper->getConfig('keywords') . ', ' . \implode(',', $keywords));
unset($keywords);
// Description
wgtransifexMetaDescription(\_MA_WGTRANSIFEX_PACKAGES_DESC);
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', WGTRANSIFEX_URL . '/packages.php');
$GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', WGTRANSIFEX_UPLOAD_URL);
require __DIR__ . '/footer.php';
