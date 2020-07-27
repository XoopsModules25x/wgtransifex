<?php

declare(strict_types=1);

/**
 * uninstall.php - cleanup on module uninstall
 *
 * @author          XOOPS Module Development Team
 * @copyright       {@link https://xoops.org 2001-2016 XOOPS Project}
 * @license         {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @link            https://xoops.org XOOPS
 */

use XoopsModules\Wgtransifex;

/**
 * Prepares system prior to attempting to uninstall module
 * @param \XoopsModule $module {@link XoopsModule}
 *
 * @return bool true if ready to uninstall, false if not
 */
function xoops_module_pre_uninstall_wgtransifex(\XoopsModule $module)
{
    // Do some synchronization
    return true;
}

/**
 * Performs tasks required during uninstallation of the module
 * @param \XoopsModule $module {@link XoopsModule}
 *
 * @return bool true if uninstallation successful, false if not
 */
function xoops_module_uninstall_wgtransifex(\XoopsModule $module)
{
    //    return true;
    $moduleDirName = \basename(\dirname(__DIR__));
    $moduleDirNameUpper = \mb_strtoupper($moduleDirName);
    /** @var Wgtransifex\Helper $helper */
    $helper = Wgtransifex\Helper::getInstance();
    $utility = new Wgtransifex\Utility();
    $success = true;
    $helper->loadLanguage('admin');
    //------------------------------------------------------------------
    // Remove uploads folder (and all subfolders) if they exist
    //------------------------------------------------------------------
    $old_directories = [$GLOBALS['xoops']->path("uploads/{$moduleDirName}")];
    foreach ($old_directories as $old_dir) {
        $dirInfo = new \SplFileInfo($old_dir);
        if ($dirInfo->isDir()) {
            // The directory exists so delete it
            if (!$utility::rrmdir($old_dir)) {
                $module->setErrors(\sprintf(\constant('CO_' . $moduleDirNameUpper . '_ERROR_BAD_DEL_PATH'), $old_dir));
                $success = false;
            }
        }
        unset($dirInfo);
    }
    /*
    //------------ START ----------------
    //------------------------------------------------------------------
    // Remove xsitemap.xml from XOOPS root folder if it exists
    //------------------------------------------------------------------
    $xmlfile = $GLOBALS['xoops']->path('xsitemap.xml');
    if (is_file($xmlfile)) {
        if (false === ($delOk = \unlink($xmlfile))) {
            $module->setErrors(\sprintf(_AM_WGTRANSIFEX_ERROR_BAD_REMOVE, $xmlfile));
        }
    }
//    return $success && $delOk; // use this if you're using this routine
*/
    return $success;
    //------------ END  ----------------
}
