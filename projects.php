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
$GLOBALS['xoopsOption']['template_main'] = 'wgtransifex_projects.tpl';
include_once XOOPS_ROOT_PATH . '/header.php';

$op    = Request::getCmd('op', 'list');
$start = Request::getInt('start', 0);
$limit = Request::getInt('limit', $helper->getConfig('userpager'));
$proId = Request::getInt('pro_id', 0);

// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet($style, null);

$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('wgtransifex_url', WGTRANSIFEX_URL);

$keywords = [];

$GLOBALS['xoopsTpl']->assign('showItem', 'show' == $op);

// Checking permissions
$request_allowed = false;
$groups = (isset($GLOBALS['xoopsUser']) && \is_object($GLOBALS['xoopsUser'])) ? $GLOBALS['xoopsUser']->getGroups() : XOOPS_GROUP_ANONYMOUS;
foreach ($groups as $group) {
    if (XOOPS_GROUP_ADMIN == $group || \in_array($group, $helper->getConfig('groups_request'))) {
        $request_allowed = true;
        break;
    }
}

switch ($op) {
	case 'show':
	case 'list':
	default:
        $GLOBALS['xoopsTpl']->assign('showRefresh', $request_allowed);

	    $crProjects = new \CriteriaCompo();
		if ($proId > 0) {
			$crProjects->add(new \Criteria('pro_id', $proId));
		}
        $crProjects->add(new \Criteria('pro_status', Constants::STATUS_READTX, '>='));
		$projectsCount = $projectsHandler->getCount($crProjects);
		$GLOBALS['xoopsTpl']->assign('projectsCount', $projectsCount);
		$crProjects->setStart($start);
		$crProjects->setLimit($limit);
		$projectsAll = $projectsHandler->getAll($crProjects);
		if ($projectsCount > 0) {
			$projects = [];
			// Get All Projects
			foreach (\array_keys($projectsAll) as $i) {
				$projects[$i] = $projectsAll[$i]->getValuesProjects();
				$keywords[$i] = $projectsAll[$i]->getVar('pro_slug');
			}
			$GLOBALS['xoopsTpl']->assign('projects', $projects);
			unset($projects);
			// Display Navigation
			if ($projectsCount > $limit) {
				include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
				$pagenav = new \XoopsPageNav($projectsCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
				$GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
			}
			$GLOBALS['xoopsTpl']->assign('type', $helper->getConfig('table_type'));
			$GLOBALS['xoopsTpl']->assign('divideby', $helper->getConfig('divideby'));
			$GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
		}
		break;
    case 'refresh':
        if (!$request_allowed) {
            \redirect_header(WGTRANSIFEX_URL . '/index.php', 2, _MA_WGTRANSIFEX_NOPERM);
        }
        $transifex = \XoopsModules\Wgtransifex\Transifex::getInstance();
        $result    = $transifex->readProjects($proId, true);
        \redirect_header('projects.php?op=list', 3, $result);
        break;
}

// Breadcrumbs
$xoBreadcrumbs[] = ['title' => \_MA_WGTRANSIFEX_PROJECTS];

// Keywords
wgtransifexMetaKeywords($helper->getConfig('keywords') . ', ' . \implode(',', $keywords));
unset($keywords);

// Description
wgtransifexMetaDescription(\_MA_WGTRANSIFEX_PROJECTS_DESC);
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', WGTRANSIFEX_URL.'/projects.php');
$GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', WGTRANSIFEX_UPLOAD_URL);

require __DIR__ . '/footer.php';
