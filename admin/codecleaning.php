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
 * modulebuilder module.
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 *
 * @since           2.5.5
 *
 * @author          Txmod Xoops <support@txmodxoops.org>
 */

use Xmf\Request;

$moduleDirName = \basename(\dirname(\dirname(__DIR__)));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

// Define main template
$templateMain = $moduleDirName . '_index.tpl';

require __DIR__ . '/header.php';
// Recovered value of argument op in the URL $
$op = Request::getString('op', 'list');

$src_path = \constant($moduleDirNameUpper . '_PATH');
$dst_path = \constant($moduleDirNameUpper . '_UPLOAD_PATH') . '/codecleaned';

$patKeys = [];
$patValues = [];
cloneFileFolder($src_path, $dst_path, $patKeys, $patValues);

function_qualifier($dst_path);

require __DIR__ . '/footer.php';

function function_qualifier($dst_path)
{
    $sources = [];

    //php functions
    $sources[0] = [
        'array_diff',
        'array_filter',
        'array_key_exists',
        'array_keys',
        'array_search',
        'array_slice',
        'array_unshift',
        'array_values',
        'assert',
        'basename',
        'boolval',
        'call_user_func',
        'call_user_func_array',
        'chr',
        'class_exists',
        'closedir',
        'constant',
        'copy',
        'count',
        'curl_close',
        'curl_error',
        'curl_exec',
        'curl_file_create',
        'curl_getinfo',
        'curl_init',
        'curl_setopt',
        'define',
        'defined',
        'dirname',
        'doubleval',
        'explode',
        'extension_loaded',
        'file_exists',
        'finfo_open',
        'floatval',
        'floor',
        'formatTimestamp',
        'func_get_args',
        'func_num_args',
        'function_exists',
        'get_called_class',
        'get_class',
        'getimagesize',
        'gettype',
        'imagecopyresampled',
        'imagecreatefromgif',
        'imagecreatefromjpeg',
        'imagecreatefrompng',
        'imagecreatefromstring',
        'imagecreatetruecolor',
        'imagedestroy',
        'imagegif',
        'imagejpeg',
        'imagepng',
        'imagerotate',
        'imagesx',
        'imagesy',
        'implode',
        'in_array',
        'ini_get',
        'intval',
        'is_array',
        'is_bool',
        'is_callable',
        'is_dir',
        'is_double',
        'is_float',
        'is_int',
        'is_integer',
        'is_link',
        'is_long',
        'is_null',
        'is_object',
        'is_real',
        'is_resource',
        'is_string',
        'json_decode',
        'json_encode',
        'mime_content_type',
        'mkdir',
        'opendir',
        'ord',
        'pathinfo',
        'preg_match',
        'preg_match_all',
        'preg_replace',
        'readdir',
        'readlink',
        'redirect_header',
        'rename',
        'rmdir',
        'round',
        'scandir',
        'sprintf',
        'str_replace',
        'strip_tags',
        'strlen',
        'strpos',
        'strtotime',
        'strval',
        'substr',
        'symlink',
        'time',
        'trigger_error',
        'trim',
        'ucfirst',
        'unlink',
        'version_compare',
        'mb_strtoupper',
        'mb_strtolower',
        'mb_strpos',
        'mb_strlen',
        'mb_strrpos',
    ];

    // xoops functions
    $sources[1] = [
        'xoops_getHandler',
        'xoops_load',
        'xoops_loadLanguage',
    ];

    // repair known errors
    $errors = [
        'mb_\strlen(' => 'mb_strlen(',
        'mb_\substr(' => 'mb_substr(',
        'x\copy' => 'xcopy',
        'r\rmdir' => 'rrmdir',
        'r\copy' => 'rcopy',
        '\dirname()' => 'dirname()',
        'assw\ord' => 'assword',
        'mb_\strpos' => 'mb_strpos',
        'image\copy(' => 'imagecopy(',
        '<{if \count(' => '<{if count(',
    ];

    $patterns = [];
    foreach ($sources as $source) {
        //reset existing in order to avoid double \\
        foreach ($source as $item) {
            $patterns['\\' . $item . '('] = $item . '(';
        }
        //apply now for all
        foreach ($source as $item) {
            $patterns[$item . '('] = '\\' . $item . '(';
        }
    }

    //add errors
    foreach ($errors as $key => $value) {
        $patterns[$key] = $value;
    }

    $patKeys = \array_keys($patterns);
    $patValues = \array_values($patterns);
    cloneFileFolder($dst_path, $dst_path, $patKeys, $patValues);
}

// recursive cloning script
/**
 * @param $src_path
 * @param $dst_path
 * @param array $patKeys
 * @param array $patValues
 */
function cloneFileFolder($src_path, $dst_path, $patKeys = [], $patValues = [])
{
    // open the source directory
    $dir = \opendir($src_path);
    // Make the destination directory if not exist
    @\mkdir($dst_path);
    // Loop through the files in source directory
    while ($file = \readdir($dir)) {
        if (('.' != $file) && ('..' != $file)) {
            if (\is_dir($src_path . '/' . $file)) {
                // Recursively calling custom copy function for sub directory
                cloneFileFolder($src_path . '/' . $file, $dst_path . '/' . $file, $patKeys, $patValues);
            } else {
                cloneFile($src_path . '/' . $file, $dst_path . '/' . $file, $patKeys, $patValues);
            }
        }
    }
    \closedir($dir);
}

/**
 * @param $src_file
 * @param $dst_file
 * @param array $patKeys
 * @param array $patValues
 */
function cloneFile($src_file, $dst_file, $patKeys = [], $patValues = [])
{
    $replace_code = false;
    $changeExtensions = ['php'];
    if (\in_array(\mb_strtolower(\pathinfo($src_file, PATHINFO_EXTENSION)), $changeExtensions, true)) {
        $replace_code = true;
    }
    if (\mb_strpos($dst_file, basename(__FILE__)) > 0) {
        //skip myself
        $replace_code = false;
    }
    if ($replace_code) {
        // file, read it and replace text
        $content = \file_get_contents($src_file);
        $content = \str_replace($patKeys, $patValues, $content);
        //check file name whether it contains replace code
        $path_parts = \pathinfo($dst_file);
        $path = $path_parts['dirname'];
        $file = $path_parts['basename'];
        $dst_file = $path . '/' . \str_replace($patKeys, $patValues, $file);
        \file_put_contents($dst_file, $content);
    } else {
        \copy($src_file, $dst_file);
    }
}
