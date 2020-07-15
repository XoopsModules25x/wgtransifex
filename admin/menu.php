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
$dirname       = \basename(\dirname(__DIR__));
$moduleHandler = \xoops_getHandler('module');
$xoopsModule   = XoopsModule::getByDirname($dirname);
$moduleInfo    = $moduleHandler->get($xoopsModule->getVar('mid'));
$sysPathIcon32 = $moduleInfo->getInfo('sysicons32');
$adminmenu[]   = [
    'title' => \_MI_WGTRANSIFEX_ADMENU1,
    'link'  => 'admin/index.php',
    'icon'  => $sysPathIcon32 . '/dashboard.png',
];
$adminmenu[]   = [
    'title' => \_MI_WGTRANSIFEX_ADMENU2,
    'link'  => 'admin/projects.php',
    'icon'  => 'assets/icons/32/projects.png',
];
$adminmenu[]   = [
    'title' => \_MI_WGTRANSIFEX_ADMENU3,
    'link'  => 'admin/resources.php',
    'icon'  => 'assets/icons/32/resources.png',
];
$adminmenu[]   = [
    'title' => \_MI_WGTRANSIFEX_ADMENU4,
    'link'  => 'admin/translations.php',
    'icon'  => 'assets/icons/32/translations.png',
];
$adminmenu[]   = [
    'title' => \_MI_WGTRANSIFEX_ADMENU5,
    'link'  => 'admin/packages.php',
    'icon'  => 'assets/icons/32/packages.png',
];
$adminmenu[]   = [
    'title' => \_MI_WGTRANSIFEX_ADMENU10,
    'link'  => 'admin/requests.php',
    'icon'  => 'assets/icons/32/requests.png',
];
$adminmenu[]   = [
    'title' => \_MI_WGTRANSIFEX_ADMENU6,
    'link'  => 'admin/broken.php',
    'icon'  => 'assets/icons/32/broken.png',
];
$adminmenu[]   = [
    'title' => \_MI_WGTRANSIFEX_ADMENU8,
    'link'  => 'admin/languages.php',
    'icon'  => 'assets/icons/32/languages.png',
];
$adminmenu[]   = [
    'title' => \_MI_WGTRANSIFEX_ADMENU7,
    'link'  => 'admin/settings.php',
    'icon'  => 'assets/icons/32/settings.png',
];
$adminmenu[]   = [
    'title' => \_MI_WGTRANSIFEX_ADMENU9,
    'link'  => 'admin/feedback.php',
    'icon'  => 'assets/icons/32/feedback.png',
];
$adminmenu[]   = [
    'title' => \_MI_WGTRANSIFEX_ABOUT,
    'link'  => 'admin/about.php',
    'icon'  => $sysPathIcon32 . '/about.png',
];
