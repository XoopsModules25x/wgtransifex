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
use Xmf\Module\Admin;
use XoopsModules\Wgtransifex\{
    Common,
    Helper,
    ProjectsHandler,
    Transifex
};

/** @var Admin $adminObject */
/** @var Helper $helper */
/** @var ProjectsHandler $projectsHandler */

require __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op = Request::getCmd('op', 'list');
$proId = Request::getInt('pro_id');

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $start = Request::getInt('start', 0);
        $limit = Request::getInt('limit', $helper->getConfig('adminpager'));
        $templateMain = 'wgtransifex_admin_projects.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('projects.php'));
        //$adminObject->addItemButton(\_AM_WGTRANSIFEX_ADD_PROJECT, 'projects.php?op=new', 'add');
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_READTX_PROJECTS, 'projects.php?op=savetx', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $projectsCount = $projectsHandler->getCountProjects();
        $projectsAll = $projectsHandler->getAllProjects($start, $limit, 'pro_id', 'DESC');
        $GLOBALS['xoopsTpl']->assign('projects_count', $projectsCount);
        $GLOBALS['xoopsTpl']->assign('wgtransifex_url', WGTRANSIFEX_URL);
        $GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', WGTRANSIFEX_UPLOAD_URL);
        // Table view projects
        if ($projectsCount > 0) {
            foreach (\array_keys($projectsAll) as $i) {
                $project = $projectsAll[$i]->getValuesProjects();
                $GLOBALS['xoopsTpl']->append('projects_list', $project);
                unset($project);
            }
            // Display Navigation
            if ($projectsCount > $limit) {
                require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($projectsCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', \_AM_WGTRANSIFEX_THEREARENT_PROJECTS);
        }
        break;
    case 'savetx':
        $transifex = Transifex::getInstance();
        $result = $transifex->readProjects($proId);
        \redirect_header('projects.php?op=list', 3, $result);
        break;
    case 'new':
        $templateMain = 'wgtransifex_admin_projects.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('projects.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_PROJECTS_LIST, 'projects.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $projectsObj = $projectsHandler->create();
        $form = $projectsObj->getFormProjects();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('projects.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($proId > 0) {
            $projectsObj = $projectsHandler->get($proId);
        } else {
            $projectsObj = $projectsHandler->create();
        }
        // Set Vars
        $projectsObj->setVar('pro_description', Request::getString('pro_description', ''));
        $projectsObj->setVar('pro_source_language_code', Request::getString('pro_source_language_code', ''));
        $projectsObj->setVar('pro_slug', Request::getString('pro_slug', ''));
        $projectsObj->setVar('pro_name', Request::getString('pro_name', ''));
        $projectsObj->setVar('pro_txresources', Request::getInt('pro_txresources', 0));
        $projectLastupdatedArr = Request::getArray('pro_date');
        $projectLastupdatedObj = \DateTime::createFromFormat(_SHORTDATESTRING, $projectLastupdatedArr['date']);
        $projectLastupdatedObj->setTime(0, 0, 0);
        $projectLastupdated = $projectLastupdatedObj->getTimestamp() + (int)$projectLastupdatedArr['time'];
        $projectsObj->setVar('pro_date', $projectLastupdated);
        $projectsObj->setVar('pro_teams', Request::getString('pro_teams', ''));
        $projectsObj->setVar('pro_archived', Request::getInt('pro_archived', 0));
        $projectDateArr = Request::getArray('pro_date');
        $projectDateObj = \DateTime::createFromFormat(_SHORTDATESTRING, $projectDateArr['date']);
        $projectDateObj->setTime(0, 0, 0);
        $projectDate = $projectDateObj->getTimestamp() + (int)$projectDateArr['time'];
        $projectsObj->setVar('pro_date', $projectDate);
        $projectsObj->setVar('pro_submitter', Request::getInt('pro_submitter', 0));
        $projectsObj->setVar('pro_status', Request::getInt('pro_status', 0));
        // Insert Data
        if ($projectsHandler->insert($projectsObj)) {
            \redirect_header('projects.php?op=list', 2, \_AM_WGTRANSIFEX_FORM_OK);
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $projectsObj->getHtmlErrors());
        $form = $projectsObj->getFormProjects();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        $templateMain = 'wgtransifex_admin_projects.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('projects.php'));
        //$adminObject->addItemButton(\_AM_WGTRANSIFEX_ADD_PROJECT, 'projects.php?op=new', 'add');
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_PROJECTS_LIST, 'projects.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $projectsObj = $projectsHandler->get($proId);
        $form = $projectsObj->getFormProjects();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'wgtransifex_admin_projects.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('projects.php'));
        $projectsObj = $projectsHandler->get($proId);
        $proSlug = $projectsObj->getVar('pro_slug');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('projects.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($projectsHandler->delete($projectsObj)) {
                \redirect_header('projects.php', 3, \_AM_WGTRANSIFEX_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $projectsObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new Common\XoopsConfirm(
                ['ok' => 1, 'pro_id' => $proId, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_AM_WGTRANSIFEX_FORM_SURE_DELETE, $projectsObj->getVar('pro_slug'))
            );
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
/*
    case 'createpkg':
        $templateMain = 'wgtransifex_admin_packages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('packages.php'));
        $projectsObj = $projectsHandler->get($proId);
        $langId      = Request::getInt('lang_id');
        $pkgLogo     = Request::getString('pkg_logo');
        if ($langId > 0) {
            $transifex = \XoopsModules\Wgtransifex\Transifex::getInstance();
            //read resources
            $result = $transifex->readResources(0, $proId);
            //update table projects
            $crResources = new \CriteriaCompo();
            $crResources->add(new \Criteria('res_pro_id', $proId));
            $resourcesCount = $resourcesHandler->getCount($crResources);
            $projectsObj    = $projectsHandler->get($proId);
            $projectsObj->setVar('pro_resources', $resourcesCount);
            $projectsHandler->insert($projectsObj);

            //read translations
            $result = $transifex->readTranslations(0, $proId, $langId);
            //update table projects
            $crTranslations = new \CriteriaCompo();
            $crTranslations->add(new \Criteria('tra_pro_id', $proId));
            $translationsCount = $translationsHandler->getCount($crTranslations);
            $projectsObj       = $projectsHandler->get($proId);
            $projectsObj->setVar('pro_translations', $translationsCount);
            $projectsHandler->insert($projectsObj);

        } else {
            $form = $projectsObj->getFormCreatePkg();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
*/
}
require __DIR__ . '/footer.php';
