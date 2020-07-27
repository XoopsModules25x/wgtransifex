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
    Common,
    Transifex
};

require __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op = Request::getCmd('op', 'list');
$resId = Request::getInt('res_id');
$proId = Request::getInt('res_pro_id');
switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'wgtransifex_admin_resources.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('resources.php'));
        if ($proId > 0) {
            $adminObject->addItemButton(\_AM_WGTRANSIFEX_RESOURCES_LIST, 'resources.php?op=list', 'list');
        }
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_READTX_RESOURCES, 'resources.php?op=readtx', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $GLOBALS['xoopsTpl']->assign('wgtransifex_url', WGTRANSIFEX_URL);
        $GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', WGTRANSIFEX_UPLOAD_URL);
        $start_pro = Request::getInt('start_pro', 0);
        $start_res = Request::getInt('start_res', 0);
        $limit = Request::getInt('limit', $helper->getConfig('adminpager'));
        if (0 == $proId) {
            $crProjects = new \CriteriaCompo();
            $crProjects->add(new \Criteria('pro_resources', 0, '>'));
            $projectsCount = $projectsHandler->getCount($crProjects);
            if ($projectsCount > 0) {
                $crProjects->setStart($start_pro);
                $crProjects->setLimit($limit);
                $projectsAll = $projectsHandler->getAll($crProjects);
                // Table view projects
                foreach (\array_keys($projectsAll) as $i) {
                    $project = $projectsAll[$i]->getValuesProjects();
                    $GLOBALS['xoopsTpl']->append('projects_list', $project);
                    unset($project);
                }
                // Display Navigation
                if ($projectsCount > $limit) {
                    require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                    $pagenav = new \XoopsPageNav($projectsCount, $limit, $start_pro, 'start_pro', 'op=list&limit=' . $limit);
                    $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
                }
            } else {
                $GLOBALS['xoopsTpl']->assign('error', \_AM_WGTRANSIFEX_THEREARENT_RESOURCES);
            }
        } else {
            $crResources = new \CriteriaCompo();
            $resourcesTotal = $resourcesHandler->getCount($crResources);
            $GLOBALS['xoopsTpl']->assign('resources_total', $resourcesTotal);
            $crResources->add(new \Criteria('res_pro_id', $proId));
            $resourcesCount = $resourcesHandler->getCount($crResources);
            $crResources->setStart($start_res);
            $crResources->setLimit($limit);
            $resourcesAll = $resourcesHandler->getAll($crResources);
            $GLOBALS['xoopsTpl']->assign('resources_count', $resourcesCount);
            // Table view resources
            if ($resourcesCount > 0) {
                foreach (\array_keys($resourcesAll) as $i) {
                    $resource = $resourcesAll[$i]->getValuesResources();
                    $GLOBALS['xoopsTpl']->append('resources_list', $resource);
                    unset($resource);
                }
                // Display Navigation
                if ($resourcesCount > $limit) {
                    require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                    $pagenav = new \XoopsPageNav($resourcesCount, $limit, $start_res, 'start_res', 'op=list&limit=' . $limit . '&res_pro_id=' . $proId);
                    $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
                }
            } else {
                $GLOBALS['xoopsTpl']->assign('error', \_AM_WGTRANSIFEX_THEREARENT_RESOURCES);
            }
        }
        break;
    case 'readtx':
        $templateMain = 'wgtransifex_admin_resources.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('resources.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_RESOURCES_LIST, 'resources.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $resourcesObj = $resourcesHandler->create();
        $form = $resourcesObj->getFormResourcesTx();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'savetx':
        //read resources
        $transifex = Transifex::getInstance();
        $result = $transifex->readResources($resId, $proId);
        //update table projects
        $crResources = new \CriteriaCompo();
        $crResources->add(new \Criteria('res_pro_id', $proId));
        $resourcesCount = $resourcesHandler->getCount($crResources);
        $projectsObj = $projectsHandler->get($proId);
        $projectsObj->setVar('pro_resources', $resourcesCount);
        $projectsHandler->insert($projectsObj);
        \redirect_header('resources.php?op=list', 3, $result);
        break;
    case 'new':
        $templateMain = 'wgtransifex_admin_resources.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('resources.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_RESOURCES_LIST, 'resources.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $resourcesObj = $resourcesHandler->create();
        $form = $resourcesObj->getFormResources();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('resources.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($resId > 0) {
            $resourcesObj = $resourcesHandler->get($resId);
        } else {
            $resourcesObj = $resourcesHandler->create();
        }
        // Set Vars
        $resourcesObj->setVar('res_source_language_code', Request::getString('res_source_language_code', ''));
        $resourcesObj->setVar('res_name', Request::getString('res_name', ''));
        $resourcesObj->setVar('res_i18n_type', Request::getString('res_i18n_type', ''));
        $resourcesObj->setVar('res_priority', Request::getString('res_priority', ''));
        $resourcesObj->setVar('res_slug', Request::getString('res_slug', ''));
        $resourcesObj->setVar('res_categories', Request::getString('res_categories', ''));
        $resourcesObj->setVar('res_metadata', Request::getString('res_metadata', ''));
        $resourceDate = \date_create_from_format(_SHORTDATESTRING, Request::getString('res_date'));
        $resourcesObj->setVar('res_date', $resourceDate->getTimestamp());
        $resourcesObj->setVar('res_submitter', Request::getInt('res_submitter', 0));
        $resourcesObj->setVar('res_status', Request::getInt('res_status', 0));
        $resourcesObj->setVar('res_pro_id', Request::getInt('res_pro_id', 0));
        // Insert Data
        if ($resourcesHandler->insert($resourcesObj)) {
            \redirect_header('resources.php?op=list', 2, \_AM_WGTRANSIFEX_FORM_OK);
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $resourcesObj->getHtmlErrors());
        $form = $resourcesObj->getFormResources();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        $templateMain = 'wgtransifex_admin_resources.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('resources.php'));
        //$adminObject->addItemButton(\_AM_WGTRANSIFEX_ADD_RESOURCE, 'resources.php?op=new', 'add');
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_RESOURCES_LIST, 'resources.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $resourcesObj = $resourcesHandler->get($resId);
        $form = $resourcesObj->getFormResources();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
    case 'delete_all':
        $templateMain = 'wgtransifex_admin_resources.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('resources.php'));
        $projectsObj = $projectsHandler->get($proId);
        $resourcesObj = $resourcesHandler->get($resId);
        $success = false;
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('resources.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            $crResources = new \CriteriaCompo();
            $crResources->add(new \Criteria('res_pro_id', $proId));
            $crPackages = new \CriteriaCompo();
            $crPackages->add(new \Criteria('pkg_pro_id', $proId));
            if ('delete_all' == $op) {
                $crTranslations = new \CriteriaCompo();
                $crTranslations->add(new \Criteria('tra_pro_id', $proId));
                if ($translationsHandler->deleteAll($crTranslations)) {
                    if ($resourcesHandler->deleteAll($crResources)) {
                        if ($packagesHandler->deleteAll($crPackages)) {
                            $success = true;
                        } else {
                            $GLOBALS['xoopsTpl']->assign('error', $packagesHandler->getHtmlErrors());
                        }
                    } else {
                        $GLOBALS['xoopsTpl']->assign('error', $resourcesHandler->getHtmlErrors());
                    }
                } else {
                    $GLOBALS['xoopsTpl']->assign('error', $translationsHandler->getHtmlErrors());
                }
            } else {
                $crTranslations = new \CriteriaCompo();
                $crTranslations->add(new \Criteria('tra_res_id', $resId));
                if ($translationsHandler->deleteAll($crTranslations)) {
                    if ($resourcesHandler->delete($resourcesObj)) {
                        if ($packagesHandler->deleteAll($crPackages)) {
                            $success = true;
                        } else {
                            $GLOBALS['xoopsTpl']->assign('error', $packagesHandler->getHtmlErrors());
                        }
                    } else {
                        $GLOBALS['xoopsTpl']->assign('error', $resourcesObj->getHtmlErrors());
                    }
                } else {
                    $GLOBALS['xoopsTpl']->assign('error', $translationsHandler->getHtmlErrors());
                }
            }
            if ($success) {
                $resourcesCount = $resourcesHandler->getCount($crResources);
                $translationsCount = $translationsHandler->getCount($crTranslations);
                $projectsObj->setVar('pro_resources', $resourcesCount);
                $projectsObj->setVar('pro_translations', $translationsCount);
                $projectsHandler->insert($projectsObj);
                \redirect_header('resources.php', 3, \_AM_WGTRANSIFEX_FORM_DELETE_OK);
            }
        } else {
            if ('delete_all' == $op) {
                $xoopsconfirm = new Common\XoopsConfirm(
                    ['ok' => 1, 'res_pro_id' => $proId, 'op' => 'delete_all'],
                    $_SERVER['REQUEST_URI'],
                    \sprintf(\_AM_WGTRANSIFEX_RESOURCES_SURE_DELETEALL, $projectsObj->getVar('pro_name'))
                );
            } else {
                $xoopsconfirm = new Common\XoopsConfirm(
                    ['ok' => 1, 'res_id' => $resId, 'op' => 'delete'],
                    $_SERVER['REQUEST_URI'],
                    \sprintf(\_AM_WGTRANSIFEX_FORM_SURE_DELETE, $resourcesObj->getVar('res_slug'))
                );
            }
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
}
require __DIR__ . '/footer.php';
