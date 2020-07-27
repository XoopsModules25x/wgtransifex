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

use XoopsModules\Wgtransifex;

/**
 * search callback functions
 *
 * @param $queryarray
 * @param $andor
 * @param $limit
 * @param $offset
 * @param $userid
 * @return mixed
 */
function wgtransifex_search($queryarray, $andor, $limit, $offset, $userid)
{
    $ret = [];
    $helper = \XoopsModules\Wgtransifex\Helper::getInstance();

    // search in table packages
    // search keywords
    $elementCount = 0;
    $packagesHandler = $helper->getHandler('Packages');
    if (\is_array($queryarray)) {
        $elementCount = \count($queryarray);
    }
    if ($elementCount > 0) {
        $crKeywords = new \CriteriaCompo();
        for ($i = 0; $i < $elementCount; $i++) {
            $crKeyword = new \CriteriaCompo();
            unset($crKeyword);
        }
    }
    // search user(s)
    if ($userid && \is_array($userid)) {
        $userid = array_map('intval', $userid);
        $crUser = new \CriteriaCompo();
        $crUser->add(new \Criteria('pkg_submitter', '(' . \implode(',', $userid) . ')', 'IN'), 'OR');
    } elseif (is_numeric($userid) && $userid > 0) {
        $crUser = new \CriteriaCompo();
        $crUser->add(new \Criteria('pkg_submitter', $userid), 'OR');
    }
    $crSearch = new \CriteriaCompo();
    if (isset($crKeywords)) {
        $crSearch->add($crKeywords, 'AND');
    }
    if (isset($crUser)) {
        $crSearch->add($crUser, 'AND');
    }
    $crSearch->setStart($offset);
    $crSearch->setLimit($limit);
    $crSearch->setSort('pkg_date');
    $crSearch->setOrder('DESC');
    $packagesAll = $packagesHandler->getAll($crSearch);
    foreach (\array_keys($packagesAll) as $i) {
        $ret[] = [
            'image' => 'assets/icons/16/packages.png',
            'link' => 'packages.php?op=show&amp;pkg_id=' . $packagesAll[$i]->getVar('pkg_id'),
            'title' => $packagesAll[$i]->getVar('pkg_name'),
            'time' => $packagesAll[$i]->getVar('pkg_date'),
        ];
    }
    unset($crKeywords);
    unset($crKeyword);
    unset($crUser);
    unset($crSearch);

    return $ret;
}
