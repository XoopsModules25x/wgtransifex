<?php

declare(strict_types=1);

namespace XoopsModules\Wgtransifex\Common;

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright   XOOPS Project (https://xoops.org)
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      mamba <mambax7@gmail.com>
 */
trait VersionChecks
{
    /**
     * Verifies XOOPS version meets minimum requirements for this module
     * @static
     *
     * @param null|string       $requiredVer
     * @return bool true if meets requirements, false if not
     */
    public static function checkVerXoops(\XoopsModule $module = null, $requiredVer = null)
    {
        $moduleDirName = \basename(\dirname(\dirname(__DIR__)));
        $moduleDirNameUpper = \mb_strtoupper($moduleDirName);
        if (null === $module) {
            $module = \XoopsModule::getByDirname($moduleDirName);
        }
        \xoops_loadLanguage('admin', $moduleDirName);
        \xoops_loadLanguage('common', $moduleDirName);
        //check for minimum XOOPS version
        $currentVer = mb_substr(\XOOPS_VERSION, 6); // get the numeric part of string
        if (null === $requiredVer) {
            $requiredVer = '' . $module->getInfo('min_xoops'); //making sure it's a string
        }
        $success = true;
        if (\version_compare($currentVer, $requiredVer, '<')) {
            $success = false;
            $module->setErrors(\sprintf(\constant('CO_' . $moduleDirNameUpper . '_ERROR_BAD_XOOPS'), $requiredVer, $currentVer));
        }

        return $success;
    }

    /**
     * Verifies PHP version meets minimum requirements for this module
     * @static
     *
     * @return bool true if meets requirements, false if not
     */
    public static function checkVerPhp(\XoopsModule $module = null)
    {
        $moduleDirName = \basename(\dirname(\dirname(__DIR__)));
        $moduleDirNameUpper = \mb_strtoupper($moduleDirName);
        if (null === $module) {
            $module = \XoopsModule::getByDirname($moduleDirName);
        }
        \xoops_loadLanguage('admin', $moduleDirName);
        // check for minimum PHP version
        $success = true;
        $verNum = \PHP_VERSION;
        $reqVer = &$module->getInfo('min_php');
        if (false !== $reqVer && '' !== $reqVer) {
            if (\version_compare($verNum, $reqVer, '<')) {
                $module->setErrors(\sprintf(\constant('CO_' . $moduleDirNameUpper . '_ERROR_BAD_PHP'), $reqVer, $verNum));
                $success = false;
            }
        }

        return $success;
    }

    /**
     * compares current module version with latest GitHub release
     * @static
     * @param \Xmf\Module\Helper $helper
     * @param string|null        $source
     * @param string|null        $default
     *
     * @return string|array info about the latest module version, if newer
     */
    public static function checkVerModule($helper, $source = 'github', $default = 'master')
    {
        $moduleDirName = \basename(\dirname(\dirname(__DIR__)));
        $moduleDirNameUpper = \mb_strtoupper($moduleDirName);
        $update = '';
        $repository = 'XoopsModules25x/' . $moduleDirName;
        //        $repository         = 'XoopsModules25x/publisher'; //for testing only
        $ret = '';
        $infoReleasesUrl = "https://api.github.com/repos/$repository/releases";
        if ('github' === $source) {
            if (\function_exists('curl_init') && false !== ($curlHandle = \curl_init())) {
                \curl_setopt($curlHandle, \CURLOPT_URL, $infoReleasesUrl);
                \curl_setopt($curlHandle, \CURLOPT_RETURNTRANSFER, true);
                \curl_setopt($curlHandle, \CURLOPT_SSL_VERIFYPEER, false);
                \curl_setopt($curlHandle, \CURLOPT_HTTPHEADER, ["User-Agent:Publisher\r\n"]);
                $curlReturn = \curl_exec($curlHandle);
                if (false === $curlReturn) {
                    \trigger_error(\curl_error($curlHandle));
                } elseif (mb_strpos($curlReturn, 'Not Found')) {
                    \trigger_error('Repository Not Found: ' . $infoReleasesUrl);
                } else {
                    $file = \json_decode($curlReturn, false);
                    $latestVersionLink = \sprintf("https://github.com/$repository/archive/%s.zip", $file ? \reset($file)->tag_name : $default);
                    $latestVersion = $file[0]->tag_name;
                    $prerelease = $file[0]->prerelease;
                    if ('master' !== $latestVersionLink) {
                        $update = \constant('CO_' . $moduleDirNameUpper . '_' . 'NEW_VERSION') . $latestVersion;
                    }
                    //"PHP-standardized" version
                    $latestVersion = \mb_strtolower($latestVersion);
                    if (false !== mb_strpos($latestVersion, 'final')) {
                        $latestVersion = \str_replace('_', '', \mb_strtolower($latestVersion));
                        $latestVersion = \str_replace('final', '', \mb_strtolower($latestVersion));
                    }
                    $moduleVersion = $helper->getModule()->getInfo('version') . '_' . $helper->getModule()->getInfo('module_status');
                    //"PHP-standardized" version
                    $moduleVersion = \str_replace(' ', '', \mb_strtolower($moduleVersion));
                    //                    $moduleVersion = '1.0'; //for testing only
                    //                    $moduleDirName = 'publisher'; //for testing only
                    if (!$prerelease && \version_compare($moduleVersion, $latestVersion, '<')) {
                        $ret = [];
                        $ret[] = $update;
                        $ret[] = $latestVersionLink;
                    }
                }
                \curl_close($curlHandle);
            }
        }

        return $ret;
    }
}
