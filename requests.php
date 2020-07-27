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
 * @author         TDM XOOPS - Email:<info@email.com> - Website:<http://xoops.org>
 */

use Xmf\Request;
use Xmf\Module\Admin;
use XoopsModules\Wgtransifex\{
    Constants,
    Helper,
    RequestsHandler,
    PackagesHandler
};

/** @var Admin $adminObject */
/** @var Helper $helper */
/** @var RequestsHandler $requestsHandler */
/** @var PackagesHandler $packagesHandler */

require __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'wgtransifex_requests.tpl';
require_once XOOPS_ROOT_PATH . '/header.php';

$op = Request::getCmd('op', 'new');
$proId = Request::getInt('req_pro_id');
$langId = Request::getInt('req_lang_id');

// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet($style, null);

$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('wgtransifex_url', WGTRANSIFEX_URL);

// Checking permissions
$request_allowed = false;

$groups = isset($GLOBALS['xoopsUser']) && \is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->getGroups() : [XOOPS_GROUP_ANONYMOUS];
foreach ($groups as $group) {
    if (XOOPS_GROUP_ADMIN == $group || \in_array($group, $helper->getConfig('groups_request'), true)) {
        $request_allowed = true;
        break;
    }
}
if (!$request_allowed) {
    \redirect_header(WGTRANSIFEX_URL . '/index.php', 2, _MA_WGTRANSIFEX_NOPERM);
}

switch ($op) {
    case 'list':
    default:
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('requests.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($proId > 0) {
            //check whether request already exists
            $crRequests = new \CriteriaCompo();
            $crRequests->add(new \Criteria('req_pro_id', $proId));
            $crRequests->add(new \Criteria('req_lang_id', $langId));
            if ($requestsHandler->getCount($crRequests) > 0) {
                \redirect_header('requests.php', 3, \_MA_WGTRANSIFEX_REQUEST_ERR_EXIST1);
            }
            //check whether package already exists
            $crPackages = new \CriteriaCompo();
            $crPackages->add(new \Criteria('pkg_pro_id', $proId));
            $crPackages->add(new \Criteria('pkg_lang_id', $langId));
            if ($packagesHandler->getCount($crPackages) > 0) {
                \redirect_header('requests.php', 3, \_MA_WGTRANSIFEX_REQUEST_ERR_EXIST2);
            }
        }
        $uid = isset($GLOBALS['xoopsUser']) && is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->getVar('uid') : 0;
        $requestsObj = $requestsHandler->create();

        $requestsObj->setVar('req_pro_id', Request::getInt('req_pro_id', 0));
        $requestsObj->setVar('req_lang_id', Request::getInt('req_lang_id', 0));
        $requestsObj->setVar('req_info', Request::getString('req_info'));
        $requestsObj->setVar('req_date', \time());
        $requestsObj->setVar('req_submitter', $uid);
        $requestsObj->setVar('req_status', Constants::STATUS_PENDING);
        $requestsObj->setVar('req_statusdate', \time());
        $requestsObj->setVar('req_statusuid', $uid);
        // Insert Data
        if ($requestsHandler->insert($requestsObj)) {
            $newReqId = $reqId > 0 ? $reqId : $requestsObj->getNewInsertedIdRequests();
            // Handle notification
            $reqProject = $requestsObj->getVar('req_project');
            $reqStatus = $requestsObj->getVar('req_status');
            $tags = [];
            $tags['ITEM_NAME'] = $reqProject;
            $tags['ITEM_URL'] = $helper->url('admin/requests.php?op=show&req_id=' . $reqId);
            $notificationHandler = \xoops_getHandler('notification');
            // Event approve notification
            /** @var \XoopsNotificationHandler $notificationHandler */
            $notificationHandler->triggerEvent('requests', $newReqId, 'request_new', $tags);
            // redirect after insert
            \redirect_header('index.php', 2, _MA_WGTRANSIFEX_FORM_OK);
        }
        // Get Form Error
        $GLOBALS['xoopsTpl']->assign('error', $requestsObj->getHtmlErrors());
        $form = $requestsObj->getFormRequests();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'new':
        // Form Create
        $requestsObj = $requestsHandler->create();
        $form = $requestsObj->getFormRequestUser();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
}

// Breadcrumbs
$xoBreadcrumbs[] = ['title' => _MA_WGTRANSIFEX_REQUESTS];

require __DIR__ . '/footer.php';
