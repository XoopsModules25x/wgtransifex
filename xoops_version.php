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

// 
$moduleDirName      = basename(__DIR__);
$moduleDirNameUpper = mb_strtoupper($moduleDirName);
// ------------------- Informations ------------------- //
$modversion = [
	'name'                => _MI_WGTRANSIFEX_NAME,
	'version'             => 1.0,
	'description'         => _MI_WGTRANSIFEX_DESC,
	'author'              => 'TDM XOOPS',
	'author_mail'         => 'info@email.com',
	'author_website_url'  => 'http://xoops.org',
	'author_website_name' => 'XOOPS Project',
	'credits'             => 'XOOPS Development Team',
	'license'             => 'GPL 2.0 or later',
	'license_url'         => 'http://www.gnu.org/licenses/gpl-3.0.en.html',
	'help'                => 'page=help',
	'release_info'        => 'release_info',
	'release_file'        => XOOPS_URL . '/modules/wgtransifex/docs/release_info file',
	'release_date'        => '2020/06/17',
	'manual'              => 'link to manual file',
	'manual_file'         => XOOPS_URL . '/modules/wgtransifex/docs/install.txt',
	'min_php'             => '7.0',
	'min_xoops'           => '2.5.9',
	'min_admin'           => '1.2',
	'min_db'              => array('mysql' => '5.6', 'mysqli' => '5.6'),
	'image'               => 'assets/images/logoModule.png',
	'dirname'             => basename(__DIR__),
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
	'release'             => '2017-12-02',
	'module_status'       => 'Beta 1',
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
	['file' => 'wgtransifex_admin_footer.tpl', 'description' => '', 'type' => 'admin'],
	// User templates
	['file' => 'wgtransifex_header.tpl', 'description' => ''],
	['file' => 'wgtransifex_index.tpl', 'description' => ''],
	['file' => 'wgtransifex_projects.tpl', 'description' => ''],
	['file' => 'wgtransifex_projects_list.tpl', 'description' => ''],
	['file' => 'wgtransifex_projects_item.tpl', 'description' => ''],
	['file' => 'wgtransifex_resources.tpl', 'description' => ''],
	['file' => 'wgtransifex_resources_list.tpl', 'description' => ''],
	['file' => 'wgtransifex_resources_item.tpl', 'description' => ''],
	['file' => 'wgtransifex_settings.tpl', 'description' => ''],
	['file' => 'wgtransifex_settings_list.tpl', 'description' => ''],
	['file' => 'wgtransifex_settings_item.tpl', 'description' => ''],
	['file' => 'wgtransifex_languages.tpl', 'description' => ''],
	['file' => 'wgtransifex_languages_list.tpl', 'description' => ''],
	['file' => 'wgtransifex_languages_item.tpl', 'description' => ''],
	['file' => 'wgtransifex_translations.tpl', 'description' => ''],
	['file' => 'wgtransifex_translations_list.tpl', 'description' => ''],
	['file' => 'wgtransifex_translations_item.tpl', 'description' => ''],
	['file' => 'wgtransifex_packages.tpl', 'description' => ''],
	['file' => 'wgtransifex_packages_list.tpl', 'description' => ''],
	['file' => 'wgtransifex_packages_item.tpl', 'description' => ''],
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
];
// ------------------- Menu ------------------- //
$currdirname  = isset($GLOBALS['xoopsModule']) && is_object($GLOBALS['xoopsModule']) ? $GLOBALS['xoopsModule']->getVar('dirname') : 'system';
if ($currdirname == $moduleDirName) {
    $helper = \XoopsModules\Wgtransifex\Helper::getInstance();
    $languagesHandler = $helper->getHandler('Languages');
    $packagesHandler = $helper->getHandler('Packages');
    $languagesAll = $languagesHandler->getAll();
    if ($languagesHandler->getCount() > 0) {
        foreach (array_keys($languagesAll) as $l) {
            $langId = $languagesAll[$l]->getVar('lang_id');
            $crPackages = new \CriteriaCompo();
            $crPackages->add(new \Criteria('pkg_lang_id', $langId));
            if ($packagesHandler->getCount($crPackages) > 0) {
                $modversion['sub'][] = [
                    'name' => sprintf(_MI_WGTRANSIFEX_SMNAME2, $languagesAll[$l]->getVar('lang_name')),
                    'url' => 'packages.php?lang_id=' . $languagesAll[$l]->getVar('lang_id'),
                ];
            }
        }
    } else {
        $modversion['sub'][] = [
            'name' => _MI_WGTRANSIFEX_SMNAME1,
            'url'  => 'packages.php',
        ];
    }


}
// ------------------- Config ------------------- //
// Editor Admin
xoops_load('xoopseditorhandler');
$editorHandler = XoopsEditorHandler::getInstance();
$modversion['config'][] = [
	'name'        => 'editor_admin',
	'title'       => '_MI_WGTRANSIFEX_EDITOR_ADMIN',
	'description' => '_MI_WGTRANSIFEX_EDITOR_ADMIN_DESC',
	'formtype'    => 'select',
	'valuetype'   => 'text',
	'default'     => 'dhtml',
	'options'     => array_flip($editorHandler->getList()),
];
// Editor User
xoops_load('xoopseditorhandler');
$editorHandler = XoopsEditorHandler::getInstance();
$modversion['config'][] = [
	'name'        => 'editor_user',
	'title'       => '_MI_WGTRANSIFEX_EDITOR_USER',
	'description' => '_MI_WGTRANSIFEX_EDITOR_USER_DESC',
	'formtype'    => 'select',
	'valuetype'   => 'text',
	'default'     => 'dhtml',
	'options'     => array_flip($editorHandler->getList()),
];
// Editor : max characters admin area
$modversion['config'][] = [
	'name'        => 'editor_maxchar',
	'title'       => '_MI_WGTRANSIFEX_EDITOR_MAXCHAR',
	'description' => '_MI_WGTRANSIFEX_EDITOR_MAXCHAR_DESC',
	'formtype'    => 'textbox',
	'valuetype'   => 'int',
	'default'     => 50,
];
// create increment steps for file size
include_once __DIR__ . '/include/xoops_version.inc.php';
$iniPostMaxSize       = wgtransifexReturnBytes(ini_get('post_max_size'));
$iniUploadMaxFileSize = wgtransifexReturnBytes(ini_get('upload_max_filesize'));
$maxSize              = min($iniPostMaxSize, $iniUploadMaxFileSize);
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
while ($i * 1048576  <=  $maxSize) {
    $optionMaxsize[$i . ' ' . _MI_WGTRANSIFEX_SIZE_MB] = $i * 1048576;
    $i += $increment;
}
// Uploads : maxsize of image
$modversion['config'][] = [
    'name'        => 'maxsize_image',
    'title'       => '_MI_WGTRANSIFEX_MAXSIZE_IMAGE',
    'description' => '_MI_WGTRANSIFEX_MAXSIZE_IMAGE_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 3145728,
    'options'     => $optionMaxsize,
];
// Uploads : mimetypes of image
$modversion['config'][] = [
    'name'        => 'mimetypes_image',
    'title'       => '_MI_WGTRANSIFEX_MIMETYPES_IMAGE',
    'description' => '_MI_WGTRANSIFEX_MIMETYPES_IMAGE_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'default'     => ['image/gif', 'image/jpeg', 'image/png'],
    'options'     => ['bmp' => 'image/bmp','gif' => 'image/gif','pjpeg' => 'image/pjpeg', 'jpeg' => 'image/jpeg','jpg' => 'image/jpg','jpe' => 'image/jpe', 'png' => 'image/png'],
];
$modversion['config'][] = [
    'name'        => 'maxwidth_image',
    'title'       => '_MI_WGTRANSIFEX_MAXWIDTH_IMAGE',
    'description' => '_MI_WGTRANSIFEX_MAXWIDTH_IMAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 8000,
];
$modversion['config'][] = [
    'name'        => 'maxheight_image',
    'title'       => '_MI_WGTRANSIFEX_MAXHEIGHT_IMAGE',
    'description' => '_MI_WGTRANSIFEX_MAXHEIGHT_IMAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 8000,
];
// Keywords
$modversion['config'][] = [
	'name'        => 'keywords',
	'title'       => '_MI_WGTRANSIFEX_KEYWORDS',
	'description' => '_MI_WGTRANSIFEX_KEYWORDS_DESC',
	'formtype'    => 'textbox',
	'valuetype'   => 'text',
	'default'     => 'wgtransifex, projects, resources, settings, languages, translations, packages',
];
// Admin pager
$modversion['config'][] = [
	'name'        => 'adminpager',
	'title'       => '_MI_WGTRANSIFEX_ADMIN_PAGER',
	'description' => '_MI_WGTRANSIFEX_ADMIN_PAGER_DESC',
	'formtype'    => 'textbox',
	'valuetype'   => 'int',
	'default'     => 10,
];
// User pager
$modversion['config'][] = [
	'name'        => 'userpager',
	'title'       => '_MI_WGTRANSIFEX_USER_PAGER',
	'description' => '_MI_WGTRANSIFEX_USER_PAGER_DESC',
	'formtype'    => 'textbox',
	'valuetype'   => 'int',
	'default'     => 10,
];
// Number column
$modversion['config'][] = [
	'name'        => 'numb_col',
	'title'       => '_MI_WGTRANSIFEX_NUMB_COL',
	'description' => '_MI_WGTRANSIFEX_NUMB_COL_DESC',
	'formtype'    => 'select',
	'valuetype'   => 'int',
	'default'     => 1,
	'options'     => [1 => '1', 2 => '2', 3 => '3', 4 => '4'],
];
// Divide by
$modversion['config'][] = [
	'name'        => 'divideby',
	'title'       => '_MI_WGTRANSIFEX_DIVIDEBY',
	'description' => '_MI_WGTRANSIFEX_DIVIDEBY_DESC',
	'formtype'    => 'select',
	'valuetype'   => 'int',
	'default'     => 1,
	'options'     => [1 => '1', 2 => '2', 3 => '3', 4 => '4'],
];
// Table type
$modversion['config'][] = [
	'name'        => 'table_type',
	'title'       => '_MI_WGTRANSIFEX_TABLE_TYPE',
	'description' => '_MI_WGTRANSIFEX_DIVIDEBY_DESC',
	'formtype'    => 'select',
	'valuetype'   => 'int',
	'default'     => 'bordered',
	'options'     => ['bordered' => 'bordered', 'striped' => 'striped', 'hover' => 'hover', 'condensed' => 'condensed'],
];
// Panel by
$modversion['config'][] = [
	'name'        => 'panel_type',
	'title'       => '_MI_WGTRANSIFEX_PANEL_TYPE',
	'description' => '_MI_WGTRANSIFEX_PANEL_TYPE_DESC',
	'formtype'    => 'select',
	'valuetype'   => 'text',
	'default'     => 'default',
	'options'     => ['default' => 'default', 'primary' => 'primary', 'success' => 'success', 'info' => 'info', 'warning' => 'warning', 'danger' => 'danger'],
];
// Advertise
$modversion['config'][] = [
	'name'        => 'advertise',
	'title'       => '_MI_WGTRANSIFEX_ADVERTISE',
	'description' => '_MI_WGTRANSIFEX_ADVERTISE_DESC',
	'formtype'    => 'textarea',
	'valuetype'   => 'text',
	'default'     => '',
];
// Bookmarks
$modversion['config'][] = [
	'name'        => 'bookmarks',
	'title'       => '_MI_WGTRANSIFEX_BOOKMARKS',
	'description' => '_MI_WGTRANSIFEX_BOOKMARKS_DESC',
	'formtype'    => 'yesno',
	'valuetype'   => 'int',
	'default'     => 0,
];
// Make Sample button visible?
$modversion['config'][] = [
	'name'        => 'displaySampleButton',
	'title'       => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON',
	'description' => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON_DESC',
	'formtype'    => 'yesno',
	'valuetype'   => 'int',
	'default'     => 1,
];
// Maintained by
$modversion['config'][] = [
	'name'        => 'maintainedby',
	'title'       => '_MI_WGTRANSIFEX_MAINTAINEDBY',
	'description' => '_MI_WGTRANSIFEX_MAINTAINEDBY_DESC',
	'formtype'    => 'textbox',
	'valuetype'   => 'text',
	'default'     => 'https://xoops.org/modules/newbb',
];
