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
    Constants,
    Common,
    Helper,
    PackagesHandler,
    ProjectsHandler,
    ResourcesHandler,
    TranslationsHandler,
    SettingsHandler,
    LanguagesHandler,
    RequestsHandler,
    Transifex
};

/** @var Admin $adminObject */
/** @var Helper $helper */
/** @var PackagesHandler $packagesHandler */
/** @var ProjectsHandler $projectsHandler */
/** @var ResourcesHandler $resourcesHandler */
/** @var TranslationsHandler $translationsHandler */
/** @var SettingsHandler $settingsHandler */
/** @var LanguagesHandler $languagesHandler */
/** @var RequestsHandler $requestsHandler */


require __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op = Request::getCmd('op', 'list');
$resId = Request::getInt('res_id');
$proId = Request::getInt('res_pro_id');
switch ($op) {
    case 'read_res':
        $dirStart = '';
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'wgtransifex_admin_resources.tpl';
        $moduleUpload = Request::getString('module_upload');
        $projectsObj = $projectsHandler->get($proId);
        $proType = (int)$projectsObj->getVar('pro_type');
        if (Constants::PROTYPE_NONE === $proType) {
            \redirect_header('resources.php?op=list', 3, \_AM_WGTRANSIFEX_UPLOADTX_ERR_PROTYPE);
        }
        if (Constants::PROTYPE_MODULE === $proType) {
            if ('' === $moduleUpload) {
                $form = $resourcesHandler->getFormResourcesModules('read_res');
                $GLOBALS['xoopsTpl']->assign('form', $form->render());
            } else {
                $dirStart = $moduleUpload . 'language/english/';
            }
        }
        if ('' !== $dirStart) {
            if (\is_dir($dirStart)) {
                $directory = new \RecursiveDirectoryIterator($dirStart, \FilesystemIterator::FOLLOW_SYMLINKS);
                $filter = new \RecursiveCallbackFilterIterator($directory, function ($current, $key, $iterator) {
                    // Skip hidden files and directories.
                    if ($current->getFilename()[0] === '.') {
                        return FALSE;
                    }
                    if ($current->getFilename() === 'index.html') {
                        return FALSE;
                    }
                    return $current->getFilename();
                });
                $iterator = new \RecursiveIteratorIterator($filter);
                $files = array();
                $len = strlen($dirStart);
                foreach ($iterator as $info) {
                    $file = $info->getPathname();
                    $name = substr($info->getPathname(), $len, 255);
                    if (strpos($name, '\\') > 0) {
                        $subfolders = str_replace('\\', '-', substr($name, 0, strpos($name, '\\')));
                        $res_name = '[' . $subfolders . ']' . $info->getFilename();
                    } else {
                        $res_name = $name;
                    }
                    if ('common.php' == $name || 'feedback.php' == $name) {
                        $i18n_type = 'TXT';
                    } else {
                        switch (pathinfo($file, PATHINFO_EXTENSION)) {
                            case 'php':
                                $i18n_type = 'PHP_DEFINE';
                                break;
                            case 'html':
                                $i18n_type = 'HTML';
                                break;
                            case 'tpl':
                            default:
                                $i18n_type = 'TXT';
                                break;
                        }
                    }
                    // replace non letter or digits by -
                    $slug = preg_replace('~[^\pL\d]+~u', '', $res_name);
                    // transliterate
                    $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
                    // remove unwanted characters
                    $slug = preg_replace('~[^-\w]+~', '', $slug);
                    // lowercase
                    $slug = strtolower($slug);
                    $files[] = ['file' => $file, 'name' => $name,'res_name' => $res_name,  'i18n_type' => $i18n_type, 'slug' => $slug];
                    $resourcesObj = $resourcesHandler->create();
                    // Set Vars
                    $resourcesObj->setVar('res_source_language_code', 'en_GB');
                    $resourcesObj->setVar('res_name', $res_name);
                    $resourcesObj->setVar('res_i18n_type', $i18n_type);
                    $resourcesObj->setVar('res_slug', $slug);
                    $resourcesObj->setVar('res_metadata', '');
                    $resourcesObj->setVar('res_date', time());
                    $resourcesObj->setVar('res_submitter', $GLOBALS['xoopsUser']->getVar('uid'));
                    $resourcesObj->setVar('res_status', Constants::STATUS_LOCAL);
                    $resourcesObj->setVar('res_pro_id', $proId);
                    // Insert Data
                    $resourcesHandler->insert($resourcesObj);
                }
                $crResources = new \CriteriaCompo();
                $crResources->add(new \Criteria('res_pro_id', $proId));
                $resourcesCount = $resourcesHandler->getCount($crResources);
                $projectsObj = $projectsHandler->get($proId);
                $projectsObj->setVar('pro_resources', $resourcesCount);
                $projectsHandler->insert($projectsObj);
                \redirect_header('resources.php?op=list&amp;res_pro_id=' . $proId, 2, \_AM_WGTRANSIFEX_FORM_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', \_AM_WGTRANSIFEX_UPLOADTX_ERR_DIR . $dirStart);
            }
        }
        break;
    case 'uploadtx':
        $dirStart = '';
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'wgtransifex_admin_resources.tpl';
        $moduleUpload = Request::getString('module_upload');
        $uploadTest = Request::getBool('upload_test');
        $projectsObj = $projectsHandler->get($proId);
        $proType = (int)$projectsObj->getVar('pro_type');
        if (Constants::PROTYPE_NONE === $proType) {
            \redirect_header('resources.php?op=list', 3, \_AM_WGTRANSIFEX_UPLOADTX_ERR_PROTYPE);
        }
        if (Constants::PROTYPE_MODULE === $proType) {
            if ('' === $moduleUpload) {
                $form = $resourcesHandler->getFormResourcesModules('uploadtx');
                $GLOBALS['xoopsTpl']->assign('form', $form->render());
            } else {
                $dirStart = $moduleUpload . 'language/english/';
            }
        }
        if (Constants::PROTYPE_CORE === $proType) {
            $dirStart = XOOPS_ROOT_PATH . '/';
        }
        if ('' !== $dirStart) {
            if (\is_dir($dirStart)) {
                $transifex = Transifex::getInstance();
                $result = $transifex->uploadResources($proId, $dirStart, true, $uploadTest);

                $GLOBALS['xoTheme']->addStylesheet($style, null);
                $templateMain = 'wgtransifex_admin_resources.tpl';
                $GLOBALS['xoopsTpl']->assign('uploadTxShow', true);
                $GLOBALS['xoopsTpl']->assign('uploadTxErrors', $result['errors']);
                $GLOBALS['xoopsTpl']->assign('uploadTxSuccess', $result['success']);
                $GLOBALS['xoopsTpl']->assign('uploadTxSkipped', $result['skipped']);
                $GLOBALS['xoopsTpl']->assign('uploadTxInfos', $result['infos']);
                $GLOBALS['xoopsTpl']->assign('proId', $proId);
                $GLOBALS['xoopsTpl']->assign('uploadTxTest', $uploadTest);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', \_AM_WGTRANSIFEX_UPLOADTX_ERR_DIR . $dirStart);
            }
        }
        break;
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'wgtransifex_admin_resources.tpl';
        $displayTxAdmin = $helper->getConfig('displayTxAdmin');
        $GLOBALS['xoopsTpl']->assign('displayTxAdmin', $displayTxAdmin);
        $GLOBALS['xoopsTpl']->assign('statusTxAdmin', Constants::STATUS_LOCAL);
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('resources.php'));
        if ($proId > 0) {
            $adminObject->addItemButton(\_AM_WGTRANSIFEX_RESOURCES_LIST, 'resources.php?op=list', 'list');
        }
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_READTX_RESOURCES, 'resources.php?op=readtx', 'add');
        if ($displayTxAdmin) {
            $adminObject->addItemButton(\_AM_WGTRANSIFEX_RESOURCE_ADD, 'resources.php?op=new', 'add');
        }
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
        $resourcesObj->setVar('res_date', \DateTime::createFromFormat(_SHORTDATESTRING, Request::getString('res_date')));
        $resourcesObj->setVar('res_submitter', Request::getInt('res_submitter', 0));
        $resourcesObj->setVar('res_status', Request::getInt('res_status', 0));
        $resProId = Request::getInt('res_pro_id', 0);
        $resourcesObj->setVar('res_pro_id', $resProId);
        // Insert Data
        if ($resourcesHandler->insert($resourcesObj)) {
            $crResources = new \CriteriaCompo();
            $crResources->add(new \Criteria('res_pro_id', $resProId));
            $resourcesCount = $resourcesHandler->getCount($crResources);
            $projectsObj = $projectsHandler->get($resProId);
            $projectsObj->setVar('pro_resources', $resourcesCount);
            $projectsHandler->insert($projectsObj);
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
                $translationsHandler->deleteAll($crTranslations);
                $packagesHandler->deleteAll($crPackages);
                if ($resourcesHandler->deleteAll($crResources)) {
                    $success = true;
                } else {
                    $GLOBALS['xoopsTpl']->assign('error', $resourcesHandler->getHtmlErrors());
                }
            } else {
                $crTranslations = new \CriteriaCompo();
                $crTranslations->add(new \Criteria('tra_res_id', $resId));
                if ($translationsHandler->deleteAll($crTranslations)) {
                    $success = true;
                } else {
                    $GLOBALS['xoopsTpl']->assign('error', $translationsHandler->getHtmlErrors());
                    $success = false;
                }
                if ($resourcesHandler->delete($resourcesObj)) {
                    $success = true;
                } else {
                    $GLOBALS['xoopsTpl']->assign('error', $resourcesObj->getHtmlErrors());
                    $success = false;
                }
            }
            if ($success) {
                $resourcesCount = $resourcesHandler->getCount($crResources);
                $translationsCount = $translationsHandler->getCount($crTranslations);
                $projectsObj->setVar('pro_resources', $resourcesCount);
                $projectsObj->setVar('pro_translations', $translationsCount);
                if ($projectsHandler->insert($projectsObj, true)){
                    \redirect_header('resources.php', 3, \_AM_WGTRANSIFEX_FORM_DELETE_OK);
                } else {
                    $GLOBALS['xoopsTpl']->assign('error', $projectsHandler->getHtmlErrors());
                }
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
                    ['ok' => 1, 'res_id' => $resId, 'res_pro_id' => $proId, 'op' => 'delete'],
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
