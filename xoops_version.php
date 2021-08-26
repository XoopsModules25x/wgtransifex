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

use XoopsModules\Wgtransifex\Helper;

$moduleDirName      = \basename(__DIR__);
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);
// ------------------- Informations ------------------- //
$modversion = [
    'version'             => 1.05,
    'module_status'       => 'RC1',
    'release_date'        => '2021/02/22',
    'name'                => \_MI_WGTRANSIFEX_NAME,
    'description'         => \_MI_WGTRANSIFEX_DESC,
    'author'              => 'Goffy (XOOPS Germany)',
    'author_mail'         => 'webmaster@wedega.com',
    'author_website_url'  => 'http://myxoops.org',
    'author_website_name' => 'XOOPS Project',
    'credits'             => 'XOOPS Development Team',
    'license'             => 'GPL 2.0 or later',
    'license_url'         => 'http://www.gnu.org/licenses/gpl-3.0.en.html',
    'help'                => 'page=help',
    'release_info'        => 'release_info',
    'release_file'        => \XOOPS_URL . "/modules/$moduleDirName/docs/release_info file",
    'manual'              => 'link to manual file',
    'manual_file'         => \XOOPS_URL . "/modules/$moduleDirName/docs/install.txt",
    'min_php'             => '7.3',
    'min_xoops'           => '2.5.10',
    'min_admin'           => '1.2',
    'min_db'              => ['mysql' => '5.6', 'mysqli' => '5.6'],
    'image'               => 'assets/images/logoModule.png',
    'dirname'             => \basename(__DIR__),
    'dirmoduleadmin'      => 'Frameworks/moduleclasses/moduleadmin',
    'sysicons16'          => '../../Frameworks/moduleclasses/icons/16',
    'sysicons32'          => '../../Frameworks/moduleclasses/icons/32',
    'modicons16'          => 'assets/icons/16',
    'modicons32'          => 'assets/icons/32',
    'demo_site_url'       => 'https://xoops.org',
    'demo_site_name'      => 'XOOPS Demo Site',
    'support_url'         => 'https://xoops.org/modules/newbb',
    'support_name'        => 'Support Forum',
    'module_website_url'  => 'www.xoops.org',
    'module_website_name' => 'XOOPS Project',
    'release'             => '2020-10-11',
    'system_menu'         => 1,
    'hasAdmin'            => 1,
    'hasMain'             => 1,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    'onInstall'           => 'include/install.php',
    'onUninstall'         => 'include/uninstall.php',
    'onUpdate'            => 'include/update.php',
];
// ------------------- Templates ------------------- //
$modversion['templates'] = [
    // Admin templates
    ['file' => 'wgtransifex_admin_about.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_header.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_index.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_projects.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_resources.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_settings.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_languages.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_translations.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_packages.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_broken.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_requests.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_bulkactions.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_moduleimages.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgtransifex_admin_footer.tpl', 'description' => '', 'type' => 'admin'],
    // User templates
    ['file' => 'wgtransifex_header.tpl', 'description' => ''],
    ['file' => 'wgtransifex_index.tpl', 'description' => ''],
    ['file' => 'wgtransifex_projects.tpl', 'description' => ''],
    ['file' => 'wgtransifex_projects_item.tpl', 'description' => ''],
    ['file' => 'wgtransifex_languages.tpl', 'description' => ''],
    ['file' => 'wgtransifex_languages_list.tpl', 'description' => ''],
    ['file' => 'wgtransifex_languages_item.tpl', 'description' => ''],
    ['file' => 'wgtransifex_packages.tpl', 'description' => ''],
    ['file' => 'wgtransifex_packages_list.tpl', 'description' => ''],
    ['file' => 'wgtransifex_packages_prolist.tpl', 'description' => ''],
    ['file' => 'wgtransifex_packages_item.tpl', 'description' => ''],
    ['file' => 'wgtransifex_requests.tpl', 'description' => ''],
    ['file' => 'wgtransifex_breadcrumbs.tpl', 'description' => ''],
    ['file' => 'wgtransifex_footer.tpl', 'description' => ''],
];
// ------------------- Mysql ------------------- //
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables
$modversion['tables'] = [
    'wgtransifex_projects',
    'wgtransifex_resources',
    'wgtransifex_settings',
    'wgtransifex_languages',
    'wgtransifex_translations',
    'wgtransifex_packages',
    'wgtransifex_requests',
];
// ------------------- Search ------------------- //
$modversion['hasSearch'] = 1;
$modversion['search'] = [
    'file' => 'include/search.inc.php',
    'func' => 'wgtransifex_search',
];
// ------------------- Menu ------------------- //
$currdirname = isset($GLOBALS['xoopsModule']) && \is_object($GLOBALS['xoopsModule']) ? $GLOBALS['xoopsModule']->getVar('dirname') : 'system';
if ($currdirname == $moduleDirName) {
    $helper = Helper::getInstance();
    $languagesHandler = $helper->getHandler('Languages');
    $packagesHandler = $helper->getHandler('Packages');
    $languagesAll = $languagesHandler->getAll();
    if ($languagesHandler->getCount() > 0) {
        foreach (\array_keys($languagesAll) as $l) {
            $langId = $languagesAll[$l]->getVar('lang_id');
            $crPackages = new \CriteriaCompo();
            $crPackages->add(new \Criteria('pkg_lang_id', $langId));
            if ($packagesHandler->getCount($crPackages) > 0) {
                $modversion['sub'][] = [
                    'name' => \sprintf(\_MI_WGTRANSIFEX_SMNAME2, $languagesAll[$l]->getVar('lang_name')),
                    'url' => 'packages.php?lang_id=' . $languagesAll[$l]->getVar('lang_id'),
                ];
            }
        }
    } else {
        $modversion['sub'][] = [
            'name' => \_MI_WGTRANSIFEX_SMNAME1,
            'url' => 'packages.php',
        ];
    }
    // Sub languages
    $modversion['sub'][] = [
        'name' => \_MI_WGTRANSIFEX_SMNAME3,
        'url' => 'languages.php',
    ];
    // Sub projects
    $modversion['sub'][] = [
        'name' => \_MI_WGTRANSIFEX_SMNAME4,
        'url' => 'projects.php',
    ];
}
// ------------------- Blocks ------------------- //
// Packages last
$modversion['blocks'][] = [
    'file' => 'packages.php',
    'name' => \_MI_WGTRANSIFEX_PACKAGES_BLOCK_LAST,
    'description' => \_MI_WGTRANSIFEX_PACKAGES_BLOCK_LAST_DESC,
    'show_func' => 'b_wgtransifex_packages_show',
    'edit_func' => 'b_wgtransifex_packages_edit',
    'template' => 'wgtransifex_block_packages.tpl',
    'options' => 'last|5|25|0',
];
// Packages new
$modversion['blocks'][] = [
    'file' => 'packages.php',
    'name' => \_MI_WGTRANSIFEX_PACKAGES_BLOCK_NEW,
    'description' => \_MI_WGTRANSIFEX_PACKAGES_BLOCK_NEW_DESC,
    'show_func' => 'b_wgtransifex_packages_show',
    'edit_func' => 'b_wgtransifex_packages_edit',
    'template' => 'wgtransifex_block_packages.tpl',
    'options' => 'new|5|25|0',
];
/*
 * // Packages top
$modversion['blocks'][] = [
    'file'        => 'packages.php',
    'name'        => \_MI_WGTRANSIFEX_PACKAGES_BLOCK_TOP,
    'description' => \_MI_WGTRANSIFEX_PACKAGES_BLOCK_TOP_DESC,
    'show_func'   => 'b_wgtransifex_packages_show',
    'edit_func'   => 'b_wgtransifex_packages_edit',
    'template'    => 'wgtransifex_block_packages.tpl',
    'options'     => 'top|5|25|0',
];
*/
// Packages random
$modversion['blocks'][] = [
    'file' => 'packages.php',
    'name' => \_MI_WGTRANSIFEX_PACKAGES_BLOCK_RANDOM,
    'description' => \_MI_WGTRANSIFEX_PACKAGES_BLOCK_RANDOM_DESC,
    'show_func' => 'b_wgtransifex_packages_show',
    'edit_func' => 'b_wgtransifex_packages_edit',
    'template' => 'wgtransifex_block_packages.tpl',
    'options' => 'random|5|25|0',
];
// ------------------- Config ------------------- //
// Editor Admin
\xoops_load('xoopseditorhandler');
$editorHandler = XoopsEditorHandler::getInstance();
$modversion['config'][] = [
    'name' => 'editor_admin',
    'title' => '_MI_WGTRANSIFEX_EDITOR_ADMIN',
    'description' => '_MI_WGTRANSIFEX_EDITOR_ADMIN_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'default' => 'dhtml',
    'options' => \array_flip($editorHandler->getList()),
];
// Editor User
\xoops_load('xoopseditorhandler');
$editorHandler = XoopsEditorHandler::getInstance();
$modversion['config'][] = [
    'name' => 'editor_user',
    'title' => '_MI_WGTRANSIFEX_EDITOR_USER',
    'description' => '_MI_WGTRANSIFEX_EDITOR_USER_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'default' => 'dhtml',
    'options' => \array_flip($editorHandler->getList()),
];
// Editor : max characters admin area
$modversion['config'][] = [
    'name' => 'editor_maxchar',
    'title' => '_MI_WGTRANSIFEX_EDITOR_MAXCHAR',
    'description' => '_MI_WGTRANSIFEX_EDITOR_MAXCHAR_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 50,
];
// create increment steps for file size
require_once __DIR__ . '/include/xoops_version.inc.php';
$iniPostMaxSize = wgtransifexReturnBytes(\ini_get('post_max_size'));
$iniUploadMaxFileSize = wgtransifexReturnBytes(\ini_get('upload_max_filesize'));
$maxSize = \min($iniPostMaxSize, $iniUploadMaxFileSize);
if ($maxSize > 10000 * 1048576) {
    $increment = 500;
}
if ($maxSize <= 10000 * 1048576) {
    $increment = 200;
}
if ($maxSize <= 5000 * 1048576) {
    $increment = 100;
}
if ($maxSize <= 2500 * 1048576) {
    $increment = 50;
}
if ($maxSize <= 1000 * 1048576) {
    $increment = 10;
}
if ($maxSize <= 500 * 1048576) {
    $increment = 5;
}
if ($maxSize <= 100 * 1048576) {
    $increment = 2;
}
if ($maxSize <= 50 * 1048576) {
    $increment = 1;
}
if ($maxSize <= 25 * 1048576) {
    $increment = 0.5;
}
$optionMaxsize = [];
$i = $increment;
while ($i * 1048576 <= $maxSize) {
    $optionMaxsize[$i . ' ' . \_MI_WGTRANSIFEX_SIZE_MB] = $i * 1048576;
    $i += $increment;
}
// Uploads : maxsize of image
$modversion['config'][] = [
    'name' => 'maxsize_image',
    'title' => '_MI_WGTRANSIFEX_MAXSIZE_IMAGE',
    'description' => '_MI_WGTRANSIFEX_MAXSIZE_IMAGE_DESC',
    'formtype' => 'select',
    'valuetype' => 'int',
    'default' => 3145728,
    'options' => $optionMaxsize,
];
// Uploads : mimetypes of image
$modversion['config'][] = [
    'name' => 'mimetypes_image',
    'title' => '_MI_WGTRANSIFEX_MIMETYPES_IMAGE',
    'description' => '_MI_WGTRANSIFEX_MIMETYPES_IMAGE_DESC',
    'formtype' => 'select_multi',
    'valuetype' => 'array',
    'default' => ['image/gif', 'image/jpeg', 'image/png'],
    'options' => ['bmp' => 'image/bmp', 'gif' => 'image/gif', 'pjpeg' => 'image/pjpeg', 'jpeg' => 'image/jpeg', 'jpg' => 'image/jpg', 'jpe' => 'image/jpe', 'png' => 'image/png'],
];
$modversion['config'][] = [
    'name' => 'maxwidth_image',
    'title' => '_MI_WGTRANSIFEX_MAXWIDTH_IMAGE',
    'description' => '_MI_WGTRANSIFEX_MAXWIDTH_IMAGE_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 1280,
];
$modversion['config'][] = [
    'name' => 'maxheight_image',
    'title' => '_MI_WGTRANSIFEX_MAXHEIGHT_IMAGE',
    'description' => '_MI_WGTRANSIFEX_MAXHEIGHT_IMAGE_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 640,
];
// Get groups
/** @var \XoopsMemberHandler $memberHandler */
$memberHandler = \xoops_getHandler('member');
$xoopsGroups   = $memberHandler->getGroupList();
$groups        = [];
foreach ($xoopsGroups as $key => $group) {
    $groups[$group] = $key;
}
// General access groups
$modversion['config'][] = [
    'name' => 'groups_request',
    'title' => '_MI_WGTRANSIFEX_GROUPS_REQUEST',
    'description' => '_MI_WGTRANSIFEX_GROUPS_REQUEST_DESC',
    'formtype' => 'select_multi',
    'valuetype' => 'array',
    'default' => $groups,
    'options' => $groups,
];
// Make Transifex Admin Tools visible?
$modversion['config'][] = [
    'name' => 'displayTxAdmin',
    'title' => '_MI_WGTRANSIFEX_SHOW_TXADMIN',
    'description' => '_MI_WGTRANSIFEX_SHOW_TXADMIN_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 0,
];
// Keywords
$modversion['config'][] = [
    'name' => 'keywords',
    'title' => '_MI_WGTRANSIFEX_KEYWORDS',
    'description' => '_MI_WGTRANSIFEX_KEYWORDS_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'wgtransifex, projects, resources, settings, languages, translations, packages',
];
// Admin pager
$modversion['config'][] = [
    'name' => 'adminpager',
    'title' => '_MI_WGTRANSIFEX_ADMIN_PAGER',
    'description' => '_MI_WGTRANSIFEX_ADMIN_PAGER_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 10,
];
// User pager
$modversion['config'][] = [
    'name' => 'userpager',
    'title' => '_MI_WGTRANSIFEX_USER_PAGER',
    'description' => '_MI_WGTRANSIFEX_USER_PAGER_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 10,
];
// Number column
$modversion['config'][] = [
    'name' => 'numb_col',
    'title' => '_MI_WGTRANSIFEX_NUMB_COL',
    'description' => '_MI_WGTRANSIFEX_NUMB_COL_DESC',
    'formtype' => 'select',
    'valuetype' => 'int',
    'default' => 1,
    'options' => [1 => '1', 2 => '2', 3 => '3', 4 => '4'],
];
// Divide by
$modversion['config'][] = [
    'name' => 'divideby',
    'title' => '_MI_WGTRANSIFEX_DIVIDEBY',
    'description' => '_MI_WGTRANSIFEX_DIVIDEBY_DESC',
    'formtype' => 'select',
    'valuetype' => 'int',
    'default' => 1,
    'options' => [1 => '1', 2 => '2', 3 => '3', 4 => '4'],
];
// Table type
$modversion['config'][] = [
    'name' => 'table_type',
    'title' => '_MI_WGTRANSIFEX_TABLE_TYPE',
    'description' => '_MI_WGTRANSIFEX_DIVIDEBY_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'default' => 'bordered',
    'options' => ['bordered' => 'bordered', 'striped' => 'striped', 'hover' => 'hover', 'condensed' => 'condensed'],
];
// Panel by
$modversion['config'][] = [
    'name' => 'panel_type',
    'title' => '_MI_WGTRANSIFEX_PANEL_TYPE',
    'description' => '_MI_WGTRANSIFEX_PANEL_TYPE_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'default' => 'default',
    'options' => ['default' => 'default', 'primary' => 'primary', 'success' => 'success', 'info' => 'info', 'warning' => 'warning', 'danger' => 'danger'],
];
// display type for index
$modversion['config'][] = [
    'name' => 'index_display',
    'title' => '_MI_WGTRANSIFEX_INDEX_DISPLAY',
    'description' => '_MI_WGTRANSIFEX_INDEX_DISPLAY_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'default' => 'single',
    'options' => [\_MI_WGTRANSIFEX_INDEX_DISPLAY_SINGLE => 'single', \_MI_WGTRANSIFEX_INDEX_DISPLAY_COLLECTION => 'collection'],
];
// Panel by
$modversion['config'][] = [
    'name' => 'download_type',
    'title' => '_MI_WGTRANSIFEX_DOWNLOAD_TYPE',
    'description' => '_MI_WGTRANSIFEX_DOWNLOAD_TYPE_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'default' => 'fpassthru',
    'options' => [\_MI_WGTRANSIFEX_DOWNLOAD_TYPE_FPASSTHRU => 'fpassthru', \_MI_WGTRANSIFEX_DOWNLOAD_TYPE_REDIRECT => 'redirect'],
];
// Make tab bulk visible?
$modversion['config'][] = [
    'name' => 'bulkactions',
    'title' => '_MI_WGTRANSIFEX_BULKACTIONS',
    'description' => '_MI_WGTRANSIFEX_BULKACTIONS_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 0,
];
// Advertise
$modversion['config'][] = [
    'name' => 'advertise',
    'title' => '_MI_WGTRANSIFEX_ADVERTISE',
    'description' => '_MI_WGTRANSIFEX_ADVERTISE_DESC',
    'formtype' => 'textarea',
    'valuetype' => 'text',
    'default' => '',
];
// Bookmarks
$modversion['config'][] = [
    'name' => 'bookmarks',
    'title' => '_MI_WGTRANSIFEX_BOOKMARKS',
    'description' => '_MI_WGTRANSIFEX_BOOKMARKS_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 0,
];
// Make Sample button visible?
$modversion['config'][] = [
    'name' => 'displaySampleButton',
    'title' => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON',
    'description' => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1,
];
// Maintained by
$modversion['config'][] = [
    'name' => 'maintainedby',
    'title' => '_MI_WGTRANSIFEX_MAINTAINEDBY',
    'description' => '_MI_WGTRANSIFEX_MAINTAINEDBY_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'https://xoops.org/modules/newbb',
];
// ------------------- Notifications ------------------- //
$modversion['hasNotification'] = 1;
$modversion['notification'] = [
    'lookup_file' => 'include/notification.inc.php',
    'lookup_func' => 'wgtransifex_notify_iteminfo',
];
// Categories of notification
// Global Notify
$modversion['notification']['category'][] = [
    'name' => 'global',
    'title' => \_MI_WGTRANSIFEX_NOTIFY_GLOBAL,
    'description' => '',
    'subscribe_from' => ['index.php', 'packages.php'],
];
// Package Notify
$modversion['notification']['category'][] = [
    'name' => 'packages',
    'title' => \_MI_WGTRANSIFEX_NOTIFY_PACKAGE,
    'description' => '',
    'subscribe_from' => ['index.php', 'packages.php'],
    'item_name' => 'pkg_id',
    'allow_bookmark' => 1,
];
// Request Notify
$modversion['notification']['category'][] = [
    'name' => 'requests',
    'title' => \_MI_WGTRANSIFEX_NOTIFY_REQUEST_ADMIN,
    'description' => '',
    'subscribe_from' => ['index.php', 'projects.php'],
    'item_name' => 'req_id',
    'allow_bookmark' => 1,
];
// events notification
// package new
$modversion['notification']['event'][] = [
    'name' => 'package_new',
    'category' => 'global',
    'admin_only' => 0,
    'title' => \_MI_WGTRANSIFEX_NOTIFY_PACKAGE_NEW,
    'caption' => \_MI_WGTRANSIFEX_NOTIFY_PACKAGE_NEW_CAPTION,
    'description' => '',
    'mail_template' => 'package_new_notify',
    'mail_subject' => \_MI_WGTRANSIFEX_NOTIFY_PACKAGE_NEW_SUBJECT,
];

// package broken
$modversion['notification']['event'][] = [
    'name' => 'package_broken',
    'category' => 'global',
    'admin_only' => 1,
    'title' => \_MI_WGTRANSIFEX_NOTIFY_PACKAGE_BROKEN,
    'caption' => \_MI_WGTRANSIFEX_NOTIFY_PACKAGE_BROKEN_CAPTION,
    'description' => '',
    'mail_template' => 'package_broken_notify',
    'mail_subject' => \_MI_WGTRANSIFEX_NOTIFY_PACKAGE_BROKEN_SUBJECT,
];
// request new
$modversion['notification']['event'][] = [
    'name' => 'request_new',
    'category' => 'global',
    'admin_only' => 1,
    'title' => \_MI_WGTRANSIFEX_NOTIFY_REQUEST_NEW,
    'caption' => \_MI_WGTRANSIFEX_NOTIFY_REQUEST_NEW_CAPTION,
    'description' => '',
    'mail_template' => 'request_new_notify',
    'mail_subject' => \_MI_WGTRANSIFEX_NOTIFY_REQUEST_NEW_SUBJECT,
];
