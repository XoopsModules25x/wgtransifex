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
 * @author         TDM XOOPS - Email:<info@email.com> - Website:<http://xoops.org>
 */

use Xmf\Request;
use XoopsModules\Wgtransifex;
use XoopsModules\Wgtransifex\Constants;
use XoopsModules\Wgtransifex\Common;

require __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op = Request::getCmd('op', 'list');
// Request req_id
$reqId = Request::getInt('req_id');
switch ($op) {
	case 'list':
	default:
		// Define Stylesheet
		$GLOBALS['xoTheme']->addStylesheet($style, null);
		$start = Request::getInt('start', 0);
		$limit = Request::getInt('limit', $helper->getConfig('adminpager'));
		$templateMain = 'wgtransifex_admin_requests.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('requests.php'));
        $adminObject->addItemButton(_AM_WGTRANSIFEX_ADD_REQUEST, 'requests.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
		$requestsCount = $requestsHandler->getCountRequests();
		$requestsAll = $requestsHandler->getAllRequests($start, $limit);
		$GLOBALS['xoopsTpl']->assign('requests_count', $requestsCount);
		$GLOBALS['xoopsTpl']->assign('wgtransifex_url', WGTRANSIFEX_URL);
		$GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', WGTRANSIFEX_UPLOAD_URL);
		// Table view requests
		if ($requestsCount > 0) {
			foreach (\array_keys($requestsAll) as $i) {
				$request = $requestsAll[$i]->getValuesRequests();
				$GLOBALS['xoopsTpl']->append('requests_list', $request);
				unset($request);
			}
			// Display Navigation
			if ($requestsCount > $limit) {
				include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
				$pagenav = new \XoopsPageNav($requestsCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
				$GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
			}
		} else {
			$GLOBALS['xoopsTpl']->assign('error', _AM_WGTRANSIFEX_THEREARENT_REQUESTS);
		}
		break;
	case 'new':
		$templateMain = 'wgtransifex_admin_requests.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('requests.php'));
		$adminObject->addItemButton(_AM_WGTRANSIFEX_REQUESTS_LIST, 'requests.php', 'list');
		$GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
		// Form Create
		$requestsObj = $requestsHandler->create();
		$form = $requestsObj->getFormRequests();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());
		break;
	case 'save':
		// Security Check
		if (!$GLOBALS['xoopsSecurity']->check()) {
			\redirect_header('requests.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
		}
		if ($reqId > 0) {
			$requestsObj = $requestsHandler->get($reqId);
		} else {
			$requestsObj = $requestsHandler->create();
		}
		// Set Vars
		$requestsObj->setVar('req_pro_id', Request::getInt('req_pro_id', 0));
		$requestsObj->setVar('req_lang_id', Request::getInt('req_lang_id', 0));
		$requestsObj->setVar('req_status', Request::getInt('req_status', 0));
		$requestStatusdateArr = Request::getArray('req_statusdate');
		$requestStatusdateObj = \DateTime::createFromFormat(_SHORTDATESTRING, $requestStatusdateArr['date']);
		$requestStatusdateObj->setTime(0, 0, 0);
		$requestStatusdate = $requestStatusdateObj->getTimestamp() + (int)$requestStatusdateArr['time'];
		$requestsObj->setVar('req_statusdate', $requestStatusdate);
		$requestsObj->setVar('req_statusuid', Request::getInt('req_statusuid', 0));
		$requestDateArr = Request::getArray('req_date');
		$requestDateObj = \DateTime::createFromFormat(_SHORTDATESTRING, $requestDateArr['date']);
		$requestDateObj->setTime(0, 0, 0);
		$requestDate = $requestDateObj->getTimestamp() + (int)$requestDateArr['time'];
		$requestsObj->setVar('req_date', $requestDate);
		$requestsObj->setVar('req_submitter', Request::getInt('req_submitter', 0));
		// Insert Data
		if ($requestsHandler->insert($requestsObj)) {
			\redirect_header('requests.php?op=list', 2, _AM_WGTRANSIFEX_FORM_OK);
		}
		// Get Form
		$GLOBALS['xoopsTpl']->assign('error', $requestsObj->getHtmlErrors());
		$form = $requestsObj->getFormRequests();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());
		break;
	case 'edit':
		$templateMain = 'wgtransifex_admin_requests.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('requests.php'));
		$adminObject->addItemButton(_AM_WGTRANSIFEX_REQUESTS_LIST, 'requests.php', 'list');
		$GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
		// Get Form
		$requestsObj = $requestsHandler->get($reqId);
		$form = $requestsObj->getFormRequests();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());
		break;
	case 'delete':
		$templateMain = 'wgtransifex_admin_requests.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('requests.php'));
		$requestsObj = $requestsHandler->get($reqId);
		$reqProject = $requestsObj->getVar('req_pro_id');
		if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
			if (!$GLOBALS['xoopsSecurity']->check()) {
				\redirect_header('requests.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
			}
			if ($requestsHandler->delete($requestsObj)) {
				\redirect_header('requests.php', 3, _AM_WGTRANSIFEX_FORM_DELETE_OK);
			} else {
				$GLOBALS['xoopsTpl']->assign('error', $requestsObj->getHtmlErrors());
			}
		} else {
			$xoopsconfirm = new Common\XoopsConfirm(
				['ok' => 1, 'req_id' => $reqId, 'op' => 'delete'],
				$_SERVER['REQUEST_URI'],
				\sprintf(_AM_WGTRANSIFEX_FORM_SURE_DELETE, $projectsHandler->get($requestsObj->getVar('req_pro_id'))->getVar('pro_name')));
			$form = $xoopsconfirm->getFormXoopsConfirm();
			$GLOBALS['xoopsTpl']->assign('form', $form->render());
		}
		break;
}
require __DIR__ . '/footer.php';
