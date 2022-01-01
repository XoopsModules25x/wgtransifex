<?php

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
 * Wgtransifex module
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Xoops Development Team
 */

use Xmf\Request;
use XoopsModules\Wgtransifex;

//\defined('XOOPS_ROOT_PATH') || die('XOOPS root path not defined');

require_once \dirname(__DIR__, 4) . '/mainfile.php';
$moduleDirName      = \basename(\dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);
\xoops_loadLanguage('filechecker', $moduleDirName);

/**
 * Class FileChecker
 * check status of a directory
 */
class FileChecker
{
    /**
     * @param string      $file_path
     * @param string|null $original_file_path
     * @param string      $redirectFile
     * @return bool|string
     */
    public static function getFileStatus($file_path, $original_file_path = null, $redirectFile)
    {
        $pathIcon16 = \Xmf\Module\Admin::iconUrl('', '16');

        if (empty($file_path)) {
            return false;
        }
        if (null === $redirectFile) {
            $redirectFile = $_SERVER['SCRIPT_NAME'];
        }
        $moduleDirName      = \basename(\dirname(__DIR__, 2));
        $moduleDirNameUpper = \mb_strtoupper($moduleDirName);
        if (null === $original_file_path) {
            if (self::fileExists($file_path)) {
                $path_status = "<img src='$pathIcon16/1.png' >";
                $path_status .= "$file_path (" . \constant('CO_' . $moduleDirNameUpper . '_' . 'FC_AVAILABLE') . ') ';
            } else {
                $path_status = "<img src='$pathIcon16/0.png' >";
                $path_status .= "$file_path (" . \constant('CO_' . $moduleDirNameUpper . '_' . 'FC_NOTAVAILABLE') . ') ';
            }
        } else {
            if (self::compareFiles($file_path, $original_file_path)) {
                $path_status = "<img src='$pathIcon16/1.png' >";
                $path_status .= "$file_path (" . \constant('CO_' . $moduleDirNameUpper . '_' . 'FC_AVAILABLE') . ') ';
            } else {
                $path_status = "<img src='$pathIcon16/0.png' >";
                $path_status .= "$file_path (" . \constant('CO_' . $moduleDirNameUpper . '_' . 'FC_NOTAVAILABLE') . ') ';
                $path_status .= "<form action='" . $_SERVER['SCRIPT_NAME'] . "' method='post'>";
                $path_status .= "<input type='hidden' name='op' value='copyfile'>";
                $path_status .= "<input type='hidden' name='file_path' value='$file_path'>";
                $path_status .= "<input type='hidden' name='original_file_path' value='$original_file_path'>";
                $path_status .= "<input type='hidden' name='redirect' value='$redirectFile'>";
                $path_status .= "<button class='submit' onClick='this.form.submit();'>" . \constant('CO_' . $moduleDirNameUpper . '_' . 'FC_CREATETHEFILE') . '</button>';
                $path_status .= '</form>';
            }
        }

        return $path_status;
    }

    /**
     * @param   $source_path
     * @param   $destination_path
     *
     * @return bool
     */
    public static function copyFile($source_path, $destination_path)
    {
        $source_path      = \str_replace('..', '', $source_path);
        $destination_path = \str_replace('..', '', $destination_path);

        return @\copy($source_path, $destination_path);
    }

    /**
     * @param   $file1_path
     * @param   $file2_path
     *
     * @return bool
     */
    public static function compareFiles($file1_path, $file2_path)
    {
        if (!self::fileExists($file1_path) || !self::fileExists($file2_path)) {
            return false;
        }
        if (\filetype($file1_path) !== \filetype($file2_path)) {
            return false;
        }
        if (\filesize($file1_path) !== \filesize($file2_path)) {
            return false;
        }
        $crc1 = \mb_strtoupper(\dechex(\crc32(\file_get_contents($file1_path))));
        $crc2 = \mb_strtoupper(\dechex(\crc32(\file_get_contents($file2_path))));

        return !($crc1 !== $crc2);
    }

    /**
     * @param   $file_path
     *
     * @return bool
     */
    public static function fileExists($file_path)
    {
        return \is_file($file_path);
    }

    /**
     * @param     $target
     * @param int $mode
     *
     * @return bool
     */
    public static function setFilePermissions($target, $mode = 0777)
    {
        $target = \str_replace('..', '', $target);

        return @\chmod($target, (int)$mode);
    }
}

$op = Request::getString('op', '', 'POST');
switch ($op) {
    case 'copyfile':
        if (\Xmf\Request::hasVar('original_file_path', 'POST')) {
            $original_file_path = $_POST['original_file_path'];
        }
        if (\Xmf\Request::hasVar('file_path', 'POST')) {
            $file_path = $_POST['file_path'];
        }
        if (\Xmf\Request::hasVar('redirect', 'POST')) {
            $redirect = $_POST['redirect'];
        }
        $msg = FileChecker::copyFile($original_file_path, $file_path) ? \constant('CO_' . $moduleDirNameUpper . '_' . 'FC_FILECOPIED') : \constant('CO_' . $moduleDirNameUpper . '_' . 'FC_FILENOTCOPIED');
        \redirect_header($redirect, 2, $msg . ': ' . $file_path);
        break;
}
