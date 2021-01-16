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

use Xmf\Module\Admin;
use XoopsModules\Wgtransifex\{Common,
    Helper,
    PackagesHandler,
    ProjectsHandler,
    ResourcesHandler,
    TranslationsHandler,
    SettingsHandler,
    LanguagesHandler,
    RequestsHandler
};

/** @var Admin $adminObject */
/** @var Helper $helper */
/** @var PackagesHandler $packagesHandler */
/** @var ProjectsHandler $projectsHandler */
/** @var ResourcesHandler $resourcesHandler */
/** @var TranslationsHandler $translationsHandler */
/** @var SettingsHandler $settingsHandler */
/** @var LanguagesHandler $languagesHandler */
/** @var RequestsHandler $requestsHandler */

require dirname(__DIR__) . '/preloads/autoloader.php';

require dirname(__DIR__, 3) . '/include/cp_header.php';
require_once \dirname(__DIR__) . '/include/common.php';
$sysPathIcon16   = '../' . $GLOBALS['xoopsModule']->getInfo('sysicons16');
$sysPathIcon32   = '../' . $GLOBALS['xoopsModule']->getInfo('sysicons32');
$pathModuleAdmin = $GLOBALS['xoopsModule']->getInfo('dirmoduleadmin');
$modPathIcon16   = WGTRANSIFEX_URL . '/' . $GLOBALS['xoopsModule']->getInfo('modicons16') . '/';
$modPathIcon32   = WGTRANSIFEX_URL . '/' . $GLOBALS['xoopsModule']->getInfo('modicons32') . '/';
// Get instance of module
$helper              = Helper::getInstance();
$projectsHandler     = $helper->getHandler('Projects');
$resourcesHandler    = $helper->getHandler('Resources');
$settingsHandler     = $helper->getHandler('Settings');
$languagesHandler    = $helper->getHandler('Languages');
$translationsHandler = $helper->getHandler('Translations');
$packagesHandler     = $helper->getHandler('Packages');
$requestsHandler     = $helper->getHandler('Requests');
$moduleimagesHandler = $helper->getHandler('Moduleimages');

$myts = MyTextSanitizer::getInstance();
if (!isset($xoopsTpl) || !\is_object($xoopsTpl)) {
    require_once XOOPS_ROOT_PATH . '/class/template.php';
    $xoopsTpl = new \XoopsTpl();
}
// Load languages
\xoops_loadLanguage('admin');
\xoops_loadLanguage('modinfo');

xoops_cp_header();
// System icons path
$GLOBALS['xoopsTpl']->assign('sysPathIcon16', $sysPathIcon16);
$GLOBALS['xoopsTpl']->assign('sysPathIcon32', $sysPathIcon32);
$GLOBALS['xoopsTpl']->assign('modPathIcon16', $modPathIcon16);
$GLOBALS['xoopsTpl']->assign('modPathIcon32', $modPathIcon32);

$adminObject = Admin::getInstance();
$style       = WGTRANSIFEX_URL . '/assets/css/admin/style.css';
