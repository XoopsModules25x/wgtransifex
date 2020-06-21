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
 * @copyright     2020 XOOPS Project (https://xooops.org)
 * @license        GPL 2.0 or later
 * @package        wgtransifex
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         TDM XOOPS - Email:<info@email.com> - Website:<http://xoops.org>
 */

use Xmf\Request;
use XoopsModules\Wgtransifex;
use XoopsModules\Wgtransifex\Constants;
use XoopsModules\Wgtransifex\Common;

require __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op = Request::getCmd('op', 'list');
// Request set_id
$setId = Request::getInt('set_id');
switch($op) {
	case 'list':
	default:
		// Define Stylesheet
		$GLOBALS['xoTheme']->addStylesheet( $style, null );
		$start = Request::getInt('start', 0);
		$limit = Request::getInt('limit', $helper->getConfig('adminpager'));
		$templateMain = 'wgtransifex_admin_settings.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('settings.php'));
		$adminObject->addItemButton(_AM_WGTRANSIFEX_ADD_SETTING, 'settings.php?op=new', 'add');
		$GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
		$settingsCount = $settingsHandler->getCountSettings();
		$settingsAll = $settingsHandler->getAllSettings($start, $limit);
		$GLOBALS['xoopsTpl']->assign('settings_count', $settingsCount);
		$GLOBALS['xoopsTpl']->assign('wgtransifex_url', WGTRANSIFEX_URL);
		$GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', WGTRANSIFEX_UPLOAD_URL);
		// Table view settings
		if ($settingsCount > 0) {
			foreach(array_keys($settingsAll) as $i) {
				$setting = $settingsAll[$i]->getValuesSettings();
				$GLOBALS['xoopsTpl']->append('settings_list', $setting);
				unset($setting);
			}
			// Display Navigation
			if ($settingsCount > $limit) {
				include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
				$pagenav = new \XoopsPageNav($settingsCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
				$GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
			}
		} else {
			$GLOBALS['xoopsTpl']->assign('error', _AM_WGTRANSIFEX_THEREARENT_SETTINGS);
		}
	break;
	case 'new':
		$templateMain = 'wgtransifex_admin_settings.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('settings.php'));
		$adminObject->addItemButton(_AM_WGTRANSIFEX_SETTINGS_LIST, 'settings.php', 'list');
		$GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
		// Form Create
		$settingsObj = $settingsHandler->create();
		$form = $settingsObj->getFormSettings();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());
	break;
	case 'save':
		// Security Check
		if (!$GLOBALS['xoopsSecurity']->check()) {
			redirect_header('settings.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
		}
		if ($setId > 0) {
			$settingsObj = $settingsHandler->get($setId);
		} else {
			$settingsObj = $settingsHandler->create();
		}
		// Set Vars
		$settingsObj->setVar('set_username', Request::getString('set_username', ''));
		$settingsObj->setVar('set_password', Request::getString('set_password', ''));
		$settingsObj->setVar('set_options', Request::getString('set_options', ''));
		$settingDate = date_create_from_format(_SHORTDATESTRING, Request::getString('set_date'));
		$settingsObj->setVar('set_date', $settingDate->getTimestamp());
		$settingsObj->setVar('set_submitter', Request::getInt('set_submitter', 0));
		$settingsObj->setVar('set_primary', Request::getInt('set_primary', 0));
		// Insert Data
		if ($settingsHandler->insert($settingsObj)) {
			redirect_header('settings.php?op=list', 2, _AM_WGTRANSIFEX_FORM_OK);
		}
		// Get Form
		$GLOBALS['xoopsTpl']->assign('error', $settingsObj->getHtmlErrors());
		$form = $settingsObj->getFormSettings();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());
	break;
	case 'edit':
		$templateMain = 'wgtransifex_admin_settings.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('settings.php'));
		$adminObject->addItemButton(_AM_WGTRANSIFEX_ADD_SETTING, 'settings.php?op=new', 'add');
		$adminObject->addItemButton(_AM_WGTRANSIFEX_SETTINGS_LIST, 'settings.php', 'list');
		$GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
		// Get Form
		$settingsObj = $settingsHandler->get($setId);
		$form = $settingsObj->getFormSettings();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());
	break;
	case 'delete':
		$templateMain = 'wgtransifex_admin_settings.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('settings.php'));
		$settingsObj = $settingsHandler->get($setId);
		$setUsername = $settingsObj->getVar('set_username');
		if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
			if (!$GLOBALS['xoopsSecurity']->check()) {
				redirect_header('settings.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
			}
			if ($settingsHandler->delete($settingsObj)) {
				redirect_header('settings.php', 3, _AM_WGTRANSIFEX_FORM_DELETE_OK);
			} else {
				$GLOBALS['xoopsTpl']->assign('error', $settingsObj->getHtmlErrors());
			}
		} else {
			$xoopsconfirm = new Common\XoopsConfirm(
				['ok' => 1, 'set_id' => $setId, 'op' => 'delete'],
				$_SERVER['REQUEST_URI'],
				sprintf(_AM_WGTRANSIFEX_FORM_SURE_DELETE, $settingsObj->getVar('set_username')));
			$form = $xoopsconfirm->getFormXoopsConfirm();
			$GLOBALS['xoopsTpl']->assign('form', $form->render());
		}
	break;
}
require __DIR__ . '/footer.php';
