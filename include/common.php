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
if (!\defined('XOOPS_ICONS32_PATH')) {
    \define('XOOPS_ICONS32_PATH', XOOPS_ROOT_PATH . '/Frameworks/moduleclasses/icons/32');
}
if (!\defined('XOOPS_ICONS32_URL')) {
    \define('XOOPS_ICONS32_URL', XOOPS_URL . '/Frameworks/moduleclasses/icons/32');
}
\define('WGTRANSIFEX_DIRNAME', 'wgtransifex');
\define('WGTRANSIFEX_PATH', XOOPS_ROOT_PATH . '/modules/' . WGTRANSIFEX_DIRNAME);
\define('WGTRANSIFEX_URL', XOOPS_URL . '/modules/' . WGTRANSIFEX_DIRNAME);
\define('WGTRANSIFEX_ICONS_PATH', WGTRANSIFEX_PATH . '/assets/icons');
\define('WGTRANSIFEX_ICONS_URL', WGTRANSIFEX_URL . '/assets/icons');
\define('WGTRANSIFEX_IMAGE_PATH', WGTRANSIFEX_PATH . '/assets/images');
\define('WGTRANSIFEX_IMAGE_URL', WGTRANSIFEX_URL . '/assets/images');
\define('WGTRANSIFEX_UPLOAD_PATH', XOOPS_UPLOAD_PATH . '/' . WGTRANSIFEX_DIRNAME);
\define('WGTRANSIFEX_UPLOAD_URL', XOOPS_UPLOAD_URL . '/' . WGTRANSIFEX_DIRNAME);
\define('WGTRANSIFEX_UPLOAD_TRANS_PATH', WGTRANSIFEX_UPLOAD_PATH . '/translations');
\define('WGTRANSIFEX_UPLOAD_TRANS_URL', WGTRANSIFEX_UPLOAD_URL . '/translations');
\define('WGTRANSIFEX_ADMIN', WGTRANSIFEX_URL . '/admin/index.php');
$localLogo = WGTRANSIFEX_IMAGE_URL . '/tdmxoops_logo.png';
// Module Information
$copyright = "<a href='http://xoops.org' title='XOOPS Project' target='_blank'><img src='" . $localLogo . "' alt='XOOPS Project'></a>";
require_once XOOPS_ROOT_PATH . '/class/xoopsrequest.php';
//require_once WGTRANSIFEX_PATH . '/include/functions.php';
