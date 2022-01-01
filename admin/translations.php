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
    Constants,
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
$op        = Request::getCmd('op', 'list');
$traId     = Request::getInt('tra_id');
$proId     = Request::getInt('tra_pro_id');
$listProId = Request::getInt('list_pro_id');
$langId    = Request::getInt('tra_lang_id');

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        if ($listProId > 0) {
            $GLOBALS['xoopsTpl']->assign('maxList', 99);
        } else {
            $GLOBALS['xoopsTpl']->assign('maxList', 4);
        }
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $resourcesCount = (int)$resourcesHandler->getCountResources();
        $start_pro = Request::getInt('start_pro');
        $start_tra = Request::getInt('start_tra');
        $limit = Request::getInt('limit', $helper->getConfig('adminpager'));
        if (0 == $proId) {
            $crTranslations = new \CriteriaCompo();
            if ($listProId > 0) {
                $crTranslations->add(new \Criteria('tra_pro_id', $listProId));
            }
            $translationsCount = $translationsHandler->getCount($crTranslations);
            if ($translationsCount > 0) {
                $crTranslations->setGroupBy('`tra_pro_id`');
                $crTranslations->setStart($start_pro);
                $crTranslations->setLimit($limit);
                $translationsCount = $translationsHandler->getCount($crTranslations); //recount for pagenav              
                $sql = 'SELECT `tra_pro_id` FROM ' . $xoopsDB->prefix('wgtransifex_translations');
                if ($listProId > 0) {
                    $sql .= ' WHERE `tra_pro_id`=' . $listProId;
                }
                $sql .= ' GROUP BY `tra_pro_id`';
                $result1 = $xoopsDB->query($sql);
                while (list($traProId) = $xoopsDB->fetchRow($result1)) {
                    $projectObj = $projectsHandler->get($traProId);
                    if (\is_object($projectObj)) {
                        $project = $projectObj->getValuesProjects();
                        $languages = [];
                        $result2 = $xoopsDB->query('SELECT `tra_pro_id`, `tra_lang_id`, `tra_status` FROM ' . $xoopsDB->prefix('wgtransifex_translations') . ' WHERE `tra_pro_id`=' . $traProId . ' GROUP BY `tra_pro_id`, `tra_lang_id`, `tra_status`');
                        while (list($traProId, $traLangId, $traStatus) = $xoopsDB->fetchRow($result2)) {
                            $languages[$traLangId]['id'] = $traLangId;
                            $languages[$traLangId]['name'] = $languagesHandler->get($traLangId)->getVar('lang_name');
                            if (Constants::STATUS_OUTDATED == (int)$traStatus) {
                                $languages[$traLangId]['outdated'] = Constants::STATUS_OUTDATED;
                                $languages[$traLangId]['outdatedtext'] = \_AM_WGTRANSIFEX_STATUS_OUTDATED;
                            }
                        }
                        $project['languages'] = $languages;
                        $GLOBALS['xoopsTpl']->append('projects_list', $project);
                        unset($project);
                    }
                }
                // Display Navigation
                if ($translationsCount > $limit) {
                    require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                    $pagenav = new \XoopsPageNav($translationsCount, $limit, $start_pro, 'start_pro', 'op=list&limit=' . $limit);
                    $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
                }
            } else {
                $GLOBALS['xoopsTpl']->assign('error', \_AM_WGTRANSIFEX_THEREARENT_TRANSLATIONS);
            }
        } else {
            $crTranslations = new \CriteriaCompo();
            $crTranslations->add(new \Criteria('tra_pro_id', $proId));
            $crTranslations->add(new \Criteria('tra_lang_id', $langId));
            $crTranslations->setStart($start_tra);
            $crTranslations->setLimit($limit);
            $translationsCount = $translationsHandler->getCount($crTranslations);
            $translationsAll = $translationsHandler->getAll($crTranslations);
            $GLOBALS['xoopsTpl']->assign('translations_count', $translationsCount);
            $GLOBALS['xoopsTpl']->assign('wgtransifex_url', \WGTRANSIFEX_URL);
            $GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', \WGTRANSIFEX_UPLOAD_URL);
            // Table view translations
            if ($translationsCount > 0) {
                foreach (\array_keys($translationsAll) as $i) {
                    $translation = $translationsAll[$i]->getValuesTranslations();
                    $GLOBALS['xoopsTpl']->append('translations_list', $translation);
                    unset($translation);
                }
                // Display Navigation
                if ($translationsCount > $limit) {
                    require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                    $pagenav = new \XoopsPageNav($translationsCount, $limit, $start_tra, 'start_tra', 'op=list&limit=' . $limit . '&tra_pro_id=' . $proId . '&tra_lang_id=' . $langId);
                    $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
                }
            } else {
                $GLOBALS['xoopsTpl']->assign('error', \_AM_WGTRANSIFEX_THEREARENT_TRANSLATIONS);
            }
        }
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        //$adminObject->addItemButton(\_AM_WGTRANSIFEX_ADD_TRANSLATION, 'translations.php?op=new', 'add');
        if ($proId > 0 || $listProId > 0) {
            $adminObject->addItemButton(\_AM_WGTRANSIFEX_TRANSLATIONS_LIST, 'translations.php', 'list');
        }
        if (0 == $proId && $resourcesCount > 0) {
            $adminObject->addItemButton(\_AM_WGTRANSIFEX_READTX_TRANSLATIONS, 'translations.php?op=readtx');
        }
        //$adminObject->addItemButton(\_AM_WGTRANSIFEX_READTX_TRANSLATIONS_ALL, 'translations.php?op=readtxall', 'add');
        if ($translationsCount > 0) {
            $adminObject->addItemButton(\_AM_WGTRANSIFEX_CHECKTX_TRANSLATIONS, 'translations.php?op=checktx', 'addlink');
        }
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        break;
    case 'readtx':
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_TRANSLATIONS_LIST, 'translations.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $translationsObj = $translationsHandler->create();
        $form = $translationsObj->getFormTranslationsTx();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'readtxall':
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_TRANSLATIONS_LIST, 'translations.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $translationsObj = $translationsHandler->create();
        $form = $translationsObj->getFormTranslationsTxAll();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'savetx':
        //read translations
        $transifex = Transifex::getInstance();
        $result = $transifex->readTranslations($traId, $proId, $langId);
        //update table projects
        $projectsHandler->updateProjectTranslations($proId);
        $resourcesHandler->updateResourceTranslations($proId);
        \redirect_header('translations.php?op=list', 3, $result);
        break;
    case 'savetxall':
        // list of projects should be up to date
        // list of resources should be up to date
        //most important languages after checking transifex.com
        $traLangIds = Request::getArray('traLangIds');

        $errors = 0;
        $transifex = Transifex::getInstance();
        $setting = $transifex->getSetting();

        $readType = Request::getInt('read_type');
        $crProjects = new \CriteriaCompo();
        $crProjects->add(new \Criteria('pro_status', Constants::STATUS_READTX));
        $crProjects->add(new \Criteria('pro_status', Constants::STATUS_READTXNEW), 'OR');
        $crProjects->add(new \Criteria('pro_status', Constants::STATUS_OUTDATED), 'OR');
        $crProjects->setSort('pro_name');
        $projectsAll = $projectsHandler->getAll($crProjects);
        foreach (\array_keys($projectsAll) as $i) {
            $proId = $projectsAll[$i]->getVar('pro_id');
            //download all translations
            $crResources = new \CriteriaCompo();
            $crResources->add(new \Criteria('res_pro_id', $proId));
            $resourcesCount = $resourcesHandler->getCount($crResources);
            if ($resourcesCount > 0) {
                $resourcesAll = $resourcesHandler->getAll($crResources);
                foreach (\array_keys($resourcesAll) as $r) {
                    $resId   = $resourcesAll[$r]->getVar('res_id');
                    $resSlug = $resourcesAll[$r]->getVar('res_slug');
                    foreach ($traLangIds as $langId) {
                        $crTranslations = new \CriteriaCompo();
                        $crTranslations->add(new \Criteria('tra_pro_id', $proId));
                        $crTranslations->add(new \Criteria('tra_res_id', $resId));
                        $crTranslations->add(new \Criteria('tra_lang_id', $langId));
                        $translationsCount = $translationsHandler->getCount($crTranslations);
                        if (Constants::READTYPE_ALL == $readType || 0 == $translationsCount) {
                            $result = $transifex->readTranslations(0, $proId, $langId, false, true, $resId);
                            if (\_AM_WGTRANSIFEX_READTX_OK == $result) {
                                //update table projects
                                if (!$projectsHandler->updateProjectTranslations($proId)) {
                                    $errors++;
                                }
                                //update table resources
                                if (!$resourcesHandler->updateResourceTranslations($proId)) {
                                    $errors++;
                                }
                            }
                        }
                        unset($crTranslations);
                    }
                }
            }
        }
        if ($errors > 0) {
            \redirect_header('translations.php?op=list', 3, \_AM_WGTRANSIFEX_READTX_ERROR);
        } else  {
            \redirect_header('translations.php?op=list', 3, \_AM_WGTRANSIFEX_READTX_OK);
        }
        break;
    case 'checktx':
        $transifex = Transifex::getInstance();
        $result = $transifex->checkTranslations();
        \redirect_header('translations.php?op=list', 3, $ret['info']);
        break;
    case 'new':
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_TRANSLATIONS_LIST, 'translations.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $translationsObj = $translationsHandler->create();
        $form = $translationsObj->getFormTranslations();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('translations.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($traId > 0) {
            $translationsObj = $translationsHandler->get($traId);
        } else {
            $translationsObj = $translationsHandler->create();
        }
        // Set Vars
        $proId = Request::getInt('tra_pro_id');
        $translationsObj->setVar('tra_pro_id', $proId);
        $translationsObj->setVar('tra_res_id', Request::getInt('tra_res_id'));
        $translationsObj->setVar('tra_lang_id', Request::getInt('tra_lang_id'));
        $translationsObj->setVar('tra_content', Request::getString('tra_content'));
        $translationsObj->setVar('tra_mimetype', Request::getString('tra_mimetype'));
        $translationsObj->setVar('tra_status', Request::getInt('tra_status'));
        $translationsObj->setVar('tra_local', Request::getString('tra_local'));
        $translationsObj->setVar('tra_proofread', Request::getInt('tra_proofread'));
        $translationsObj->setVar('tra_proofread_percentage', Request::getInt('tra_proofread_percentage'));
        $translationsObj->setVar('tra_reviewed_percentage', Request::getInt('tra_reviewed_percentage'));
        $translationsObj->setVar('tra_completed', Request::getInt('tra_completed'));
        $translationsObj->setVar('tra_untranslated_words', Request::getInt('tra_untranslated_words'));
        $translationsObj->setVar('tra_last_commiter', Request::getString('tra_last_commiter'));
        $translationsObj->setVar('tra_reviewed', Request::getInt('tra_reviewed'));
        $translationsObj->setVar('tra_translated_entities', Request::getInt('tra_translated_entities'));
        $translationsObj->setVar('tra_translated_words', Request::getInt('tra_translated_words'));
        $translationsObj->setVar('tra_untranslated_entities', Request::getInt('tra_untranslated_entities'));
        $translationsObj->setVar('tra_last_update', Request::getInt('tra_last_update'));
        $translationDateArr = Request::getArray('tra_date');
        $translationDateObj = \DateTime::createFromFormat(_SHORTDATESTRING, $translationDateArr['date']);
        $translationDateObj->setTime(0, 0);
        $translationDate = $translationDateObj->getTimestamp() + (int)$translationDateArr['time'];
        $translationsObj->setVar('tra_date', $translationDate);
        $translationsObj->setVar('tra_submitter', Request::getInt('tra_submitter'));
        // Insert Data
        if ($translationsHandler->insert($translationsObj)) {
            $projectsHandler->updateProjectTranslations($proId);
            $resourcesHandler->updateResourceTranslations($proId);
            \redirect_header('translations.php?op=list', 2, \_AM_WGTRANSIFEX_FORM_OK);
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $translationsObj->getHtmlErrors());
        $form = $translationsObj->getFormTranslations();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        //$adminObject->addItemButton(\_AM_WGTRANSIFEX_ADD_TRANSLATION, 'translations.php?op=new', 'add');
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_TRANSLATIONS_LIST, 'translations.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $translationsObj = $translationsHandler->get($traId);
        $form = $translationsObj->getFormTranslations();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        $translationsObj = $translationsHandler->get($traId);
        $traPro_id = $translationsObj->getVar('tra_pro_id');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('translations.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($translationsHandler->delete($translationsObj)) {
                //update table projects
                $projectsHandler->updateProjectTranslations($traPro_id);
                $resourcesHandler->updateResourceTranslations($traPro_id);
                \redirect_header('translations.php', 3, \_AM_WGTRANSIFEX_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $translationsObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new Common\XoopsConfirm(
                ['ok' => 1, 'tra_id' => $traId, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_AM_WGTRANSIFEX_FORM_SURE_DELETE, $translationsObj->getVar('tra_pro_id'))
            );
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
    case 'deleteall':
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        $projectsObj = $projectsHandler->get($proId);
        $proName = $projectsObj->getVar('pro_name');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('translations.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            $crTranslations = new \CriteriaCompo();
            $crTranslations->add(new \Criteria('tra_pro_id', $proId));
            if ($translationsHandler->deleteAll($crTranslations)) {
                //update table projects
                $projectsHandler->updateProjectTranslations($proId);
                $resourcesHandler->updateResourceTranslations($proId);
                \redirect_header('translations.php', 3, \_AM_WGTRANSIFEX_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $translationsObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new Common\XoopsConfirm(
                ['ok' => 1, 'tra_pro_id' => $proId, 'op' => 'deleteall'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_AM_WGTRANSIFEX_TRANSLATIONS_DELETE_SURE, $proName)
            );
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
}
require __DIR__ . '/footer.php';
