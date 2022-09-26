<?php

declare(strict_types=1);

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
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         Goffy - Email:<webmaster@wedega.com> - Website:<https://wedega.com> / <https://xoops.org>
 */

use Xmf\Request;
use XoopsModules\Wgtransifex\{
    Helper,
    PackagesHandler,
    Utility,
    Constants
};

/** @var Helper $helper */
/** @var PackagesHandler $packagesHandler */

require __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'wgtransifex_index.tpl';
require_once \XOOPS_ROOT_PATH . '/header.php';
// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet($style, null);
$keywords = [];
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('wgtransifex_url', \WGTRANSIFEX_URL);
$GLOBALS['xoopsTpl']->assign('modPathIconFlags', \WGTRANSIFEX_IMAGE_URL . '/flags/');

$indexDisplay = $helper->getConfig('index_display');
$start = Request::getInt('start');
$limit = Request::getInt('limit', $helper->getConfig('userpager'));

//handle filter
if (Request::hasVar('cancel', '')) {
    $pkgFilterText = '';
} else {
    $pkgFilterText = Request::getString('pkgFilterText');
}
$form = $packagesHandler->getFormFilterPackages(false, $pkgFilterText);
$GLOBALS['xoopsTpl']->assign('formFilter', $form->render());
$GLOBALS['xoopsTpl']->assign('pkgFilterText', $pkgFilterText);
if ('' === $pkgFilterText) {
    $GLOBALS['xoopsTpl']->assign('displayFormFilter', 'none');
    $GLOBALS['xoopsTpl']->assign('btnFormFilterLabel', \_MA_WGTRANSIFEX_FILTER_SHOW);
} else {
    $GLOBALS['xoopsTpl']->assign('displayFormFilter', 'block');
    $GLOBALS['xoopsTpl']->assign('btnFormFilterLabel', \_MA_WGTRANSIFEX_FILTER_HIDE);
}

switch ($indexDisplay) {
    case 'single':
    default:
        $GLOBALS['xoopsTpl']->assign('isAdmin', \is_object($xoopsUser) && $xoopsUser->isAdmin());
        $count = 1;
        $crPackages = new \CriteriaCompo();
        if ('' !== $pkgFilterText) {
            $crPkgFilter = new \CriteriaCompo();
            $crPkgFilter->add(new \Criteria('pkg_name', '%' . $pkgFilterText . '%', 'LIKE'));
            $crPkgFilter->add(new \Criteria('pkg_desc', '%' . $pkgFilterText . '%', 'LIKE'), 'OR');
            $crPackages->add($crPkgFilter);
        }
        $packagesCount = $packagesHandler->getCount($crPackages);
        $GLOBALS['xoopsTpl']->assign('packagesCount', $packagesCount);
        if ($packagesCount > 0) {
            $GLOBALS['xoopsTpl']->assign('displaySingle', true);
            $crPackages->setStart($start);
            $crPackages->setLimit($limit);
            $crPackages->setSort('pkg_date');
            $crPackages->setOrder('DESC');
            $packagesAll = $packagesHandler->getAll($crPackages);
            // Get All Packages
            $packages = [];
            foreach (\array_keys($packagesAll) as $i) {
                $package = $packagesAll[$i]->getValuesPackages();
                $acount = ['count', $count];
                $packages[] = \array_merge($package, $acount);
                $keywords[] = $packagesAll[$i]->getVar('pkg_name');
                ++$count;
            }
            $GLOBALS['xoopsTpl']->assign('packages', $packages);
            unset($packages);
            // Display Navigation
            if ($packagesCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($packagesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
            }
            $GLOBALS['xoopsTpl']->assign('lang_thereare', \sprintf(\_MA_WGTRANSIFEX_INDEX_THEREARE, $packagesCount));
        }
        unset($count);
        break;
    case 'collection':
        $GLOBALS['xoopsTpl']->assign('displayCollection', true);
        $langPrimary = $languagesHandler->getPrimaryLang();
        //get all projects with translations
        $crProjects = new \CriteriaCompo();
        $crProjects->add(new \Criteria('pro_translations', '0', '>'));
        $crProjects->add(new \Criteria('pro_status', Constants::STATUS_READTX, '>='));
        $projectsCount = $projectsHandler->getCount($crProjects);
        if ($projectsCount > 0) {
            $projectsCount = 0;
            $projectsAll = $projectsHandler->getAll($crProjects);
            $packagesList = [];
            if ('' !== $pkgFilterText) {
                $crPkgFilter = new \CriteriaCompo();
                $crPkgFilter->add(new \Criteria('pkg_name', '%' . $pkgFilterText . '%', 'LIKE'));
                $crPkgFilter->add(new \Criteria('pkg_desc', '%' . $pkgFilterText . '%', 'LIKE'), 'OR');
            }
            // Get All Project
            foreach (\array_keys($projectsAll) as $i) {
                $pkgCounter = 0;
                $languagesList = [];
                //$projects[$i] = $projectsAll[$i]->getValuesProjects();
                $proId = $projectsAll[$i]->getVar('pro_id');
                //get list of packages of primary language
                $crPackages = new \CriteriaCompo();
                $crPackages->add(new \Criteria('pkg_pro_id', $proId));
                $crPackages->add(new \Criteria('pkg_lang_id', $langPrimary));
                if ('' !== $pkgFilterText) {
                    $crPackages->add($crPkgFilter);
                }
                $packagesCount = $packagesHandler->getCount($crPackages);
                $GLOBALS['xoopsTpl']->assign('packagesCount', $packagesCount);
                $crPackages->setStart();
                $crPackages->setLimit(1);
                $pkgName = '';
                $pkgLogo = '';
                $pkgDesc = '';
                $packagesAll = $packagesHandler->getAll($crPackages);
                foreach (\array_keys($packagesAll) as $j) {
                    $package = $packagesAll[$j]->getValuesPackages();
                    $pkgName = $package['name'];
                    $pkgLogo = $package['logo'];
                    $pkgDesc = $package['desc'];
                    $languagesList[$package['lang_id']] = [
                        'traperc' => $package['traperc'],
                        'pkg_id' => $package['id'],
                        'lang_id' => $package['lang_id'],
                        'lang_primary' => 1,
                        'lang_flag' => $package['lang_flag'],
                        'traperc_text' => $package['traperc_text'],
                        'date' => $package['date'],
                    ];
                    $pkgCounter++;
                }
                unset($crPackages);

                //get list of packages of other languages
                $crPackages = new \CriteriaCompo();
                $crPackages->add(new \Criteria('pkg_pro_id', $proId));
                $crPackages->add(new \Criteria('pkg_lang_id', $langPrimary, '<>'));
                if ('' !== $pkgFilterText) {
                    $crPackages->add($crPkgFilter);
                }
                $packagesCount = $packagesHandler->getCount($crPackages);
                $GLOBALS['xoopsTpl']->assign('packagesCount', $packagesCount);
                $packagesAll = $packagesHandler->getAll($crPackages);
                foreach (\array_keys($packagesAll) as $j) {
                    $package = $packagesAll[$j]->getValuesPackages();
                    $languagesList[$package['lang_id']] = [
                        'traperc' => $package['traperc'],
                        'pkg_id' => $package['id'],
                        'lang_id' => $package['lang_id'],
                        'lang_primary' => 0,
                        'lang_flag' => $package['lang_flag'],
                        'traperc_text' => $package['traperc_text'],
                        'date' => $package['date'],
                    ];
                    $pkgCounter++;
                }
                if($pkgCounter > 0) {
                    //sort array
                    $primary = array_column($languagesList, 'lang_primary');
                    $percentage = array_column($languagesList, 'traperc');
                    array_multisort($primary, SORT_DESC, $percentage, SORT_DESC, $languagesList);

                    $packagesList[$proId] = [
                        'name' => $pkgName,
                        'logo' => $pkgLogo,
                        'desc' => $pkgDesc,
                        'langs' => $languagesList
                    ];
                    //reduce to start/limit
                    $i = 0;
                    $projectsList = [];
                    foreach ($packagesList as $key => $value) {
                        $i++;
                        if ($i > $start && $i <= ($start + $limit)) {
                            $projectsList[$key] = $value;
                        }
                    }

                }
            }
            $projectsCount = \count($packagesList);
            $GLOBALS['xoopsTpl']->assign('projectsCount', $projectsCount);
            // Display Navigation
            if ($projectsCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($projectsCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
            }
            $GLOBALS['xoopsTpl']->assign('lang_thereare', \sprintf(\_MA_WGTRANSIFEX_INDEX_THEREARE, $packagesCount));
        }
        $GLOBALS['xoopsTpl']->assign('packagesList', $projectsList);
        break;
}

$GLOBALS['xoopsTpl']->assign('table_type', $helper->getConfig('table_type'));
$GLOBALS['xoopsTpl']->assign('divideby', $helper->getConfig('divideby'));
$GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
// Breadcrumbs
$xoBreadcrumbs[] = ['title' => \_MA_WGTRANSIFEX_INDEX];
// Keywords
wgtransifexMetaKeywords($helper->getConfig('keywords') . ', ' . \implode(',', $keywords));
unset($keywords);
// Description
wgtransifexMetaDescription(\_MA_WGTRANSIFEX_INDEX_DESC);
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', \WGTRANSIFEX_URL . '/index.php');
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', \WGTRANSIFEX_UPLOAD_URL);
require __DIR__ . '/footer.php';
