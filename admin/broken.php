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
use XoopsModules\Wgtransifex\Constants;

require __DIR__ . '/header.php';
// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet($style, null);
$templateMain = 'wgtransifex_admin_broken.tpl';
$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('broken.php'));
// Check table packages
$start      = Request::getInt('startPackages', 0);
$limit      = Request::getInt('limitPackages', $helper->getConfig('adminpager'));
$crPackages = new \CriteriaCompo();
$crPackages->add(new \Criteria('pkg_status', Constants::STATUS_BROKEN));
$packagesCount = $packagesHandler->getCount($crPackages);
$GLOBALS['xoopsTpl']->assign('packages_count', $packagesCount);
$GLOBALS['xoopsTpl']->assign('packages_result', \sprintf(\_AM_WGTRANSIFEX_BROKEN_RESULT, 'Packages'));
$crPackages->setStart($start);
$crPackages->setLimit($limit);
if ($packagesCount > 0) {
    $packagesAll = $packagesHandler->getAll($crPackages);
    foreach (\array_keys($packagesAll) as $i) {
        $package['table']  = 'Packages';
        $package['key']    = 'pkg_id';
        $package['keyval'] = $packagesAll[$i]->getVar('pkg_id');
        $package['main']   = $packagesAll[$i]->getVar('pkg_name');
        $GLOBALS['xoopsTpl']->append('packages_list', $package);
    }
    // Display Navigation
    if ($packagesCount > $limit) {
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new \XoopsPageNav($packagesCount, $limit, $start, 'startPackages', 'op=list&limitPackages=' . $limit);
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
} else {
    $GLOBALS['xoopsTpl']->assign('nodataPackages', \sprintf(\_AM_WGTRANSIFEX_BROKEN_NODATA, 'Packages'));
}
unset($crPackages);
require __DIR__ . '/footer.php';
