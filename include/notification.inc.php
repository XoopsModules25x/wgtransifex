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
 * @param mixed $category
 * @param mixed $item_id
 */

/**
 * comment callback functions
 *
 * @param  $category
 * @param  $item_id
 * @return array item|null
 */
function wgtransifex_notify_iteminfo($category, $item_id)
{
    global $xoopsDB;

    if (!\defined('\WGTRANSIFEX_URL')) {
        \define('\WGTRANSIFEX_URL', \XOOPS_URL . '/modules/wgtransifex');
    }

    switch ($category) {
        case 'global':
            $item['name'] = '';
            $item['url'] = '';

            return $item;
        case 'packages':
            $sql = 'SELECT pkg_name FROM ' . $xoopsDB->prefix('wgtransifex_packages') . ' WHERE pkg_id = ' . $item_id;
            $result = $xoopsDB->query($sql);
            $result_array = $xoopsDB->fetchArray($result);
            $item['name'] = $result_array['pkg_name'];
            $item['url'] = \WGTRANSIFEX_URL . '/packages.php?pkg_id=' . $item_id;

            return $item;
        case 'requests':
            $sql = 'SELECT req_project FROM ' . $xoopsDB->prefix('wgtransifex_requests') . ' WHERE req_id = ' . $item_id;
            $result = $xoopsDB->query($sql);
            $result_array = $xoopsDB->fetchArray($result);
            $item['name'] = $result_array['req_project'];
            $item['url'] = \WGTRANSIFEX_URL . '/requests.php?pkg_id=' . $item_id;

            return $item;
    }

    return null;
}
