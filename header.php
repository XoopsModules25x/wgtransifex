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
include dirname(dirname(__DIR__)) . '/mainfile.php';
include __DIR__ . '/include/common.php';
$moduleDirName = basename(__DIR__);
// Breadcrumbs
$xoBreadcrumbs = [];
$xoBreadcrumbs[] = ['title' => _MA_WGTRANSIFEX_TITLE, 'link' => WGTRANSIFEX_URL . '/'];
// Get instance of module
$helper = \XoopsModules\Wgtransifex\Helper::getInstance();
$projectsHandler = $helper->getHandler('Projects');
$resourcesHandler = $helper->getHandler('Resources');
$settingsHandler = $helper->getHandler('Settings');
$languagesHandler = $helper->getHandler('Languages');
$translationsHandler = $helper->getHandler('Translations');
$packagesHandler = $helper->getHandler('Packages');
// 
$myts = MyTextSanitizer::getInstance();
// Default Css Style
$style = WGTRANSIFEX_URL . '/assets/css/style.css';
// Smarty Default
$sysPathIcon16 = $GLOBALS['xoopsModule']->getInfo('sysicons16');
$sysPathIcon32 = $GLOBALS['xoopsModule']->getInfo('sysicons32');
$pathModuleAdmin = $GLOBALS['xoopsModule']->getInfo('dirmoduleadmin');
$modPathIcon16 = $GLOBALS['xoopsModule']->getInfo('modicons16');
$modPathIcon32 = $GLOBALS['xoopsModule']->getInfo('modicons16');
// Load Languages
xoops_loadLanguage('main');
xoops_loadLanguage('modinfo');
