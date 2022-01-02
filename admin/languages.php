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
    LanguagesHandler
};

/** @var Helper $helper */
/** @var Admin $adminObject */
/** @var LanguagesHandler $languagesHandler */

require __DIR__ . '/header.php';

$op     = Request::getCmd('op', 'list');
$langId = Request::getInt('lang_id');
$start  = Request::getInt('start');
$limit = Request::getInt('limit', $helper->getConfig('adminpager'));

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $GLOBALS['xoopsTpl']->assign('start', $start);
        $GLOBALS['xoopsTpl']->assign('limit', $limit);
        $templateMain = 'wgtransifex_admin_languages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('languages.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_ADD_LANGUAGE, 'languages.php?op=new');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        /** @var LanguagesHandler $languagesHandler */
        $languagesCount = $languagesHandler->getCountLanguages();
        $languagesAll   = $languagesHandler->getAllLanguages($start, $limit);
        $GLOBALS['xoopsTpl']->assign('languages_count', $languagesCount);
        $GLOBALS['xoopsTpl']->assign('wgtransifex_url', \WGTRANSIFEX_URL);
        $GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', \WGTRANSIFEX_UPLOAD_URL);
        $GLOBALS['xoopsTpl']->assign('modPathIconFlags', \WGTRANSIFEX_IMAGE_URL . '/flags/');
        // Table view languages
        if ($languagesCount > 0) {
            foreach (\array_keys($languagesAll) as $i) {
                $language = $languagesAll[$i]->getValuesLanguages();
                $GLOBALS['xoopsTpl']->append('languages_list', $language);
                unset($language);
            }
            // Display Navigation
            if ($languagesCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($languagesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', \_AM_WGTRANSIFEX_THEREARENT_LANGUAGES);
        }
        break;
    case 'new':
        $templateMain = 'wgtransifex_admin_languages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('languages.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_LANGUAGES_LIST, 'languages.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $languagesObj = $languagesHandler->create();
        $form         = $languagesObj->getFormLanguages();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('languages.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($langId > 0) {
            $languagesObj = $languagesHandler->get($langId);
        } else {
            $languagesObj = $languagesHandler->create();
        }
        // Set Vars
        $languagesObj->setVar('lang_name', Request::getString('lang_name'));
        $languagesObj->setVar('lang_code', Request::getString('lang_code'));
        $languagesObj->setVar('lang_folder', \mb_strtolower(Request::getString('lang_folder')));
        $languagesObj->setVar('lang_iso_639_1', Request::getString('lang_iso_639_1'));
        $languagesObj->setVar('lang_iso_639_2', Request::getString('lang_iso_639_2'));
        $langPrimary = Request::getInt('lang_primary');
        if ($langPrimary > 0) {
            $languagesHandler->resetPrimary();
            $languagesObj->setVar('lang_primary', 1);
        } else {
            $languagesObj->setVar('lang_primary', 0);
        }
        $languagesObj->setVar('lang_online', Request::getInt('lang_online'));
        // Set Var lang_flag
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $uploader = new \XoopsMediaUploader(
            \XOOPS_ROOT_PATH . '/modules/wgtransifex/assets/images/flags', $helper->getConfig('mimetypes_image'), $helper->getConfig('maxsize_image'), null, null
        );
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            //$uploader->setPrefix(lang_flag_);
            //$uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if (!$uploader->upload()) {
                $errors = $uploader->getErrors();
                \redirect_header('javascript:history.go(-1).php', 3, $errors);
            } else {
                $languagesObj->setVar('lang_flag', $uploader->getSavedFileName());
            }
        } else {
            $languagesObj->setVar('lang_flag', Request::getString('lang_flag'));
        }
        $languageDate = \date_create_from_format(\_SHORTDATESTRING, Request::getString('lang_date'));
        $languagesObj->setVar('lang_date', $languageDate->getTimestamp());
        $languagesObj->setVar('lang_submitter', Request::getInt('lang_submitter'));
        // Insert Data
        if ($languagesHandler->insert($languagesObj)) {
            \redirect_header('languages.php?op=list', 2, \_AM_WGTRANSIFEX_FORM_OK);
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $languagesObj->getHtmlErrors());
        $form = $languagesObj->getFormLanguages();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        $templateMain = 'wgtransifex_admin_languages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('languages.php'));
        //$adminObject->addItemButton(\_AM_WGTRANSIFEX_ADD_LANGUAGE, 'languages.php?op=new', 'add');
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_LANGUAGES_LIST, 'languages.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $languagesObj = $languagesHandler->get($langId);
        $form         = $languagesObj->getFormLanguages();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'wgtransifex_admin_languages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('languages.php'));
        $languagesObj = $languagesHandler->get($langId);
        $langName     = $languagesObj->getVar('lang_name');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('languages.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($languagesHandler->delete($languagesObj)) {
                \redirect_header('languages.php', 3, \_AM_WGTRANSIFEX_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $languagesObj->getHtmlErrors());
            }
        } else {
            $customConfirm = new Common\Confirm(
                ['ok' => 1, 'lang_id' => $langId, 'op' => 'delete'], $_SERVER['REQUEST_URI'], \sprintf(\_AM_WGTRANSIFEX_FORM_SURE_DELETE, $languagesObj->getVar('lang_name'))
            );
            $form         = $customConfirm->getFormConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
    case 'setonline':
        if ($langId > 0) {
            $languagesObj = $languagesHandler->get($langId);
        } else {
            \redirect_header('languages.php', 3, \_AM_WGTRANSIFEX_INVALID_PARAM);
        }
        // Set Vars
        $languagesObj->setVar('lang_online', Request::getInt('lang_online'));
        // Insert Data
        if ($languagesHandler->insert($languagesObj)) {
            \redirect_header('languages.php?op=list', 2, \_AM_WGTRANSIFEX_FORM_OK);
        }
        $GLOBALS['xoopsTpl']->assign('error', $languagesObj->getHtmlErrors());
        break;
    case 'setonlineall':
        $langOnline   = Request::getInt('lang_online');
        $languagesAll = $languagesHandler->getAllLanguages($start, $limit);
        foreach (\array_keys($languagesAll) as $i) {
            $languagesObj = $languagesHandler->get($languagesAll[$i]->getVar('lang_id'));
            $languagesObj->setVar('lang_online', $langOnline);
            // Insert Data
            if (!$languagesHandler->insert($languagesObj)) {
                $GLOBALS['xoopsTpl']->assign('error', $languagesObj->getHtmlErrors());
                break;
            }
            unset($languagesObj);
        }
        \redirect_header('languages.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, \_AM_WGTRANSIFEX_FORM_OK);
        break;
    case 'setprimary':
        if ($langId > 0) {
            $languagesObj = $languagesHandler->get($langId);
        } else {
            \redirect_header('languages.php', 3, \_AM_WGTRANSIFEX_INVALID_PARAM);
        }
        $languagesHandler->resetPrimary();
        // Set Vars
        $languagesObj->setVar('lang_primary', 1);
        // Insert Data
        if ($languagesHandler->insert($languagesObj)) {
            \redirect_header('languages.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, \_AM_WGTRANSIFEX_FORM_OK);
        }
        $GLOBALS['xoopsTpl']->assign('error', $languagesObj->getHtmlErrors());
        break;
}
require __DIR__ . '/footer.php';
