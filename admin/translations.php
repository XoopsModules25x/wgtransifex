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

require __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op     = Request::getCmd('op', 'list');
$traId  = Request::getInt('tra_id');
$proId  = Request::getInt('tra_pro_id');
$langId = Request::getInt('tra_lang_id');
switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        //$adminObject->addItemButton(_AM_WGTRANSIFEX_ADD_TRANSLATION, 'translations.php?op=new', 'add');
        if ($proId > 0) {
            $adminObject->addItemButton(_AM_WGTRANSIFEX_TRANSLATIONS_LIST, 'translations.php', 'list');
        }
        $adminObject->addItemButton(_AM_WGTRANSIFEX_READTX_TRANSLATIONS, 'translations.php?op=readtx', 'add');
        $adminObject->addItemButton(_AM_WGTRANSIFEX_CHECKTX_TRANSLATIONS, 'translations.php?op=checktx', 'addlink');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $start_pro = Request::getInt('start_pro', 0);
        $start_tra = Request::getInt('start_tra', 0);
        $limit     = Request::getInt('limit', $helper->getConfig('adminpager'));
        if (0 == $proId) {
            $crTranslations    = new \CriteriaCompo();
            $translationsCount = $translationsHandler->getCount($crTranslations);
            if ($translationsCount > 0) {
                $crTranslations->setGroupBy('`tra_pro_id`');
                $crTranslations->setStart($start_pro);
                $crTranslations->setLimit($limit);
                $translationsCount = $translationsHandler->getCount($crTranslations);
                $translationsAll   = $translationsHandler->getAll($crTranslations);
                // Table view projects
                foreach (array_keys($translationsAll) as $i) {
                    $proId           = $translationsAll[$i]->getVar('tra_pro_id');
                    $project         = $projectsHandler->get($proId)->getValuesProjects();
                    $languages       = [];
                    $crTranslations2 = new \CriteriaCompo();
                    $crTranslations2->add(new \Criteria('tra_pro_id', $proId));
                    $crTranslations2->setGroupBy('`tra_pro_id`, `tra_lang_id`');
                    $translationsAll2 = $translationsHandler->getAll($crTranslations2);
                    foreach (array_keys($translationsAll2) as $l) {
                        $langId                = $translationsAll2[$l]->getVar('tra_lang_id');
                        $languages[$l]['id']   = $langId;
                        $languages[$l]['name'] = $languagesHandler->get($langId)->getVar('lang_name');
                    }
                    $project['languages'] = $languages;
                    $GLOBALS['xoopsTpl']->append('projects_list', $project);
                    unset($project, $crTranslations2);
                }
                // Display Navigation
                if ($translationsCount > $limit) {
                    include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                    $pagenav = new \XoopsPageNav($translationsCount, $limit, $start_pro, 'start_pro', 'op=list&limit=' . $limit);
                    $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
                }
            } else {
                $GLOBALS['xoopsTpl']->assign('error', _AM_WGTRANSIFEX_THEREARENT_TRANSLATIONS);
            }
        } else {
            $crTranslations = new \CriteriaCompo();
            $crTranslations->add(new \Criteria('tra_pro_id', $proId));
            $crTranslations->add(new \Criteria('tra_lang_id', $langId));
            $crTranslations->setStart($start_tra);
            $crTranslations->setLimit($limit);
            $translationsCount = $translationsHandler->getCount($crTranslations);
            $translationsAll   = $translationsHandler->getAll($crTranslations);
            $GLOBALS['xoopsTpl']->assign('translations_count', $translationsCount);
            $GLOBALS['xoopsTpl']->assign('wgtransifex_url', WGTRANSIFEX_URL);
            $GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', WGTRANSIFEX_UPLOAD_URL);
            // Table view translations
            if ($translationsCount > 0) {
                foreach (array_keys($translationsAll) as $i) {
                    $translation = $translationsAll[$i]->getValuesTranslations();
                    $GLOBALS['xoopsTpl']->append('translations_list', $translation);
                    unset($translation);
                }
                // Display Navigation
                if ($translationsCount > $limit) {
                    include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                    $pagenav = new \XoopsPageNav($translationsCount, $limit, $start_tra, 'start_tra', 'op=list&limit=' . $limit . '&tra_pro_id=' . $proId . '&tra_lang_id=' . $langId);
                    $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
                }
            } else {
                $GLOBALS['xoopsTpl']->assign('error', _AM_WGTRANSIFEX_THEREARENT_TRANSLATIONS);
            }
        }
        break;
    case 'readtx':
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        $adminObject->addItemButton(_AM_WGTRANSIFEX_TRANSLATIONS_LIST, 'translations.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $translationsObj = $translationsHandler->create();
        $form            = $translationsObj->getFormTranslationsTx();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'savetx':
        //read translations
        $transifex = \XoopsModules\Wgtransifex\Transifex::getInstance();
        $result    = $transifex->readTranslations($traId, $proId, $langId);
        //update table projects
        $crTranslations = new \CriteriaCompo();
        $crTranslations->add(new \Criteria('tra_pro_id', $proId));
        $translationsCount = $translationsHandler->getCount($crTranslations);
        $projectsObj       = $projectsHandler->get($proId);
        $projectsObj->setVar('pro_translations', $translationsCount);
        $projectsHandler->insert($projectsObj);
        redirect_header('translations.php?op=list', 3, $result);
        break;
    case 'checktx':
        $transifex = \XoopsModules\Wgtransifex\Transifex::getInstance();
        $result    = $transifex->checkTranslations();
        redirect_header('translations.php?op=list', 3, $result);
        break;
    case 'new':
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        $adminObject->addItemButton(_AM_WGTRANSIFEX_TRANSLATIONS_LIST, 'translations.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $translationsObj = $translationsHandler->create();
        $form            = $translationsObj->getFormTranslations();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('translations.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($traId > 0) {
            $translationsObj = $translationsHandler->get($traId);
        } else {
            $translationsObj = $translationsHandler->create();
        }
        // Set Vars
        $translationsObj->setVar('tra_pro_id', Request::getInt('tra_pro_id', 0));
        $translationsObj->setVar('tra_res_id', Request::getInt('tra_res_id', 0));
        $translationsObj->setVar('tra_lang_id', Request::getInt('tra_lang_id', 0));
        $translationsObj->setVar('tra_content', Request::getString('tra_content', ''));
        $translationsObj->setVar('tra_mimetype', Request::getString('tra_mimetype', ''));
        $translationsObj->setVar('tra_status', Request::getInt('tra_status', 0));
        $translationsObj->setVar('tra_local', Request::getString('tra_local', ''));
        $translationsObj->setVar('tra_proofread', Request::getInt('tra_proofread', 0));
        $translationsObj->setVar('tra_proofread_percentage', Request::getInt('tra_proofread_percentage', 0));
        $translationsObj->setVar('tra_reviewed_percentage', Request::getInt('tra_reviewed_percentage', 0));
        $translationsObj->setVar('tra_completed', Request::getInt('tra_completed', 0));
        $translationsObj->setVar('tra_untranslated_words', Request::getInt('tra_untranslated_words', 0));
        $translationsObj->setVar('tra_last_commiter', Request::getString('tra_last_commiter'));
        $translationsObj->setVar('tra_reviewed', Request::getInt('tra_reviewed', 0));
        $translationsObj->setVar('tra_translated_entities', Request::getInt('tra_translated_entities', 0));
        $translationsObj->setVar('tra_translated_words', Request::getInt('tra_translated_words', 0));
        $translationsObj->setVar('tra_untranslated_entities', Request::getInt('tra_untranslated_entities', 0));
        $translationsObj->setVar('tra_last_update', Request::getInt('tra_last_update', 0));
        $translationDateArr = Request::getArray('tra_date');
        $traDate            = strtotime($translationDateArr['date']) + (int)$translationDateArr['time'];
        $translationsObj->setVar('tra_date', $traDate);
        $translationsObj->setVar('tra_submitter', Request::getInt('tra_submitter', 0));
        // Insert Data
        if ($translationsHandler->insert($translationsObj)) {
            redirect_header('translations.php?op=list', 2, _AM_WGTRANSIFEX_FORM_OK);
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $translationsObj->getHtmlErrors());
        $form = $translationsObj->getFormTranslations();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        //$adminObject->addItemButton(_AM_WGTRANSIFEX_ADD_TRANSLATION, 'translations.php?op=new', 'add');
        $adminObject->addItemButton(_AM_WGTRANSIFEX_TRANSLATIONS_LIST, 'translations.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $translationsObj = $translationsHandler->get($traId);
        $form            = $translationsObj->getFormTranslations();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'wgtransifex_admin_translations.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('translations.php'));
        $translationsObj = $translationsHandler->get($traId);
        $traPro_id       = $translationsObj->getVar('tra_pro_id');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('translations.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($translationsHandler->delete($translationsObj)) {
                redirect_header('translations.php', 3, _AM_WGTRANSIFEX_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $translationsObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new Common\XoopsConfirm(
                ['ok' => 1, 'tra_id' => $traId, 'op' => 'delete'], $_SERVER['REQUEST_URI'], sprintf(_AM_WGTRANSIFEX_FORM_SURE_DELETE, $translationsObj->getVar('tra_pro_id'))
            );
            $form         = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
}
require __DIR__ . '/footer.php';
