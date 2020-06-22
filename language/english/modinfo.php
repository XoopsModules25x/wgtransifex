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
 * @author         TDM XOOPS - Email:<info@email.com> - Website:<http://xoops.org>
 */
include_once __DIR__ . '/common.php';
// ---------------- Admin Main ----------------
define('_MI_WGTRANSIFEX_NAME', 'wgTransifex');
define('_MI_WGTRANSIFEX_DESC', 'This module is for doing following...');
// ---------------- Admin Menu ----------------
define('_MI_WGTRANSIFEX_ADMENU1', 'Dashboard');
define('_MI_WGTRANSIFEX_ADMENU2', 'Projects');
define('_MI_WGTRANSIFEX_ADMENU3', 'Resources');
define('_MI_WGTRANSIFEX_ADMENU4', 'Translations');
define('_MI_WGTRANSIFEX_ADMENU5', 'Packages');
define('_MI_WGTRANSIFEX_ADMENU6', 'Broken');
define('_MI_WGTRANSIFEX_ADMENU7', 'Settings');
define('_MI_WGTRANSIFEX_ADMENU8', 'Languages');
define('_MI_WGTRANSIFEX_ADMENU9', 'Feedback');
define('_MI_WGTRANSIFEX_ABOUT', 'About');
// ---------------- Admin Nav ----------------
define('_MI_WGTRANSIFEX_ADMIN_PAGER', 'Admin pager');
define('_MI_WGTRANSIFEX_ADMIN_PAGER_DESC', 'Admin per page list');
// User
define('_MI_WGTRANSIFEX_USER_PAGER', 'User pager');
define('_MI_WGTRANSIFEX_USER_PAGER_DESC', 'User per page list');
// Submenu
define('_MI_WGTRANSIFEX_SMNAME1', 'All language packages');
define('_MI_WGTRANSIFEX_SMNAME2', '%s language packages');
// Blocks
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK', 'Projects block');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_DESC', 'Projects block description');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_PROJECT', 'Projects block  PROJECT');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_PROJECT_DESC', 'Projects block  PROJECT description');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_LAST', 'Projects block last');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_LAST_DESC', 'Projects block last description');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_NEW', 'Projects block new');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_NEW_DESC', 'Projects block new description');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_HITS', 'Projects block hits');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_HITS_DESC', 'Projects block hits description');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_TOP', 'Projects block top');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_TOP_DESC', 'Projects block top description');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_RANDOM', 'Projects block random');
define('_MI_WGTRANSIFEX_PROJECTS_BLOCK_RANDOM_DESC', 'Projects block random description');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK', 'Resources block');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_DESC', 'Resources block description');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_RESOURCE', 'Resources block  RESOURCE');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_RESOURCE_DESC', 'Resources block  RESOURCE description');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_LAST', 'Resources block last');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_LAST_DESC', 'Resources block last description');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_NEW', 'Resources block new');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_NEW_DESC', 'Resources block new description');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_HITS', 'Resources block hits');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_HITS_DESC', 'Resources block hits description');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_TOP', 'Resources block top');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_TOP_DESC', 'Resources block top description');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_RANDOM', 'Resources block random');
define('_MI_WGTRANSIFEX_RESOURCES_BLOCK_RANDOM_DESC', 'Resources block random description');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK', 'Settings block');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_DESC', 'Settings block description');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_SETTING', 'Settings block  SETTING');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_SETTING_DESC', 'Settings block  SETTING description');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_LAST', 'Settings block last');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_LAST_DESC', 'Settings block last description');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_NEW', 'Settings block new');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_NEW_DESC', 'Settings block new description');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_HITS', 'Settings block hits');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_HITS_DESC', 'Settings block hits description');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_TOP', 'Settings block top');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_TOP_DESC', 'Settings block top description');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_RANDOM', 'Settings block random');
define('_MI_WGTRANSIFEX_SETTINGS_BLOCK_RANDOM_DESC', 'Settings block random description');
define('_MI_WGTRANSIFEX_LANGUAGES_BLOCK', 'Languages block');
define('_MI_WGTRANSIFEX_LANGUAGES_BLOCK_DESC', 'Languages block description');
define('_MI_WGTRANSIFEX_LANGUAGES_BLOCK_LANGUAGE', 'Languages block LANGUAGE');
define('_MI_WGTRANSIFEX_LANGUAGES_BLOCK_LANGUAGE_DESC', 'Languages block LANGUAGE description');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK', 'Translations block');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_DESC', 'Translations block description');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_TRANSLATION', 'Translations block  TRANSLATION');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_TRANSLATION_DESC', 'Translations block  TRANSLATION description');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_LAST', 'Translations block last');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_LAST_DESC', 'Translations block last description');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_NEW', 'Translations block new');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_NEW_DESC', 'Translations block new description');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_HITS', 'Translations block hits');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_HITS_DESC', 'Translations block hits description');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_TOP', 'Translations block top');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_TOP_DESC', 'Translations block top description');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_RANDOM', 'Translations block random');
define('_MI_WGTRANSIFEX_TRANSLATIONS_BLOCK_RANDOM_DESC', 'Translations block random description');
// Config
define('_MI_WGTRANSIFEX_EDITOR_ADMIN', 'Editor admin');
define('_MI_WGTRANSIFEX_EDITOR_ADMIN_DESC', 'Select the editor which should be used in admin area for text area fields');
define('_MI_WGTRANSIFEX_EDITOR_USER', 'Editor user');
define('_MI_WGTRANSIFEX_EDITOR_USER_DESC', 'Select the editor which should be used in user area for text area fields');
define('_MI_WGTRANSIFEX_EDITOR_MAXCHAR', 'Text max characters');
define('_MI_WGTRANSIFEX_EDITOR_MAXCHAR_DESC', 'Max characters for showing text of a textarea or editor field in admin area');
define('_MI_WGTRANSIFEX_SIZE_MB', 'MB');
define('_MI_WGTRANSIFEX_MAXSIZE_IMAGE', 'Max size image');
define('_MI_WGTRANSIFEX_MAXSIZE_IMAGE_DESC', 'Define the max size for uploading images');
define('_MI_WGTRANSIFEX_MIMETYPES_IMAGE', 'Mime types image');
define('_MI_WGTRANSIFEX_MIMETYPES_IMAGE_DESC', 'Define the allowed mime types for uploading images');
define('_MI_WGTRANSIFEX_MAXWIDTH_IMAGE', 'Max width image');
define('_MI_WGTRANSIFEX_MAXWIDTH_IMAGE_DESC', 'Set the max width which is allowed for uploading images (in pixel)<br>0 means that images keep original size<br>If original image is smaller the image will be not enlarged');
define('_MI_WGTRANSIFEX_MAXHEIGHT_IMAGE', 'Max height image');
define('_MI_WGTRANSIFEX_MAXHEIGHT_IMAGE_DESC', 'Set the max height which is allowed for uploading images (in pixel)<br>0 means that images keep original size<br>If original image is smaller the image will be not enlarged');
define('_MI_WGTRANSIFEX_KEYWORDS', 'Keywords');
define('_MI_WGTRANSIFEX_KEYWORDS_DESC', 'Insert here the keywords (separate by comma)');
define('_MI_WGTRANSIFEX_NUMB_COL', 'Number Columns');
define('_MI_WGTRANSIFEX_NUMB_COL_DESC', 'Number Columns to View.');
define('_MI_WGTRANSIFEX_DIVIDEBY', 'Divide By');
define('_MI_WGTRANSIFEX_DIVIDEBY_DESC', 'Divide by columns number.');
define('_MI_WGTRANSIFEX_TABLE_TYPE', 'Table Type');
define('_MI_WGTRANSIFEX_TABLE_TYPE_DESC', 'Table Type is the bootstrap html table.');
define('_MI_WGTRANSIFEX_PANEL_TYPE', 'Panel Type');
define('_MI_WGTRANSIFEX_PANEL_TYPE_DESC', 'Panel Type is the bootstrap html div.');
define('_MI_WGTRANSIFEX_IDPAYPAL', 'Paypal ID');
define('_MI_WGTRANSIFEX_IDPAYPAL_DESC', 'Insert here your PayPal ID for donactions.');
define('_MI_WGTRANSIFEX_ADVERTISE', 'Advertisement Code');
define('_MI_WGTRANSIFEX_ADVERTISE_DESC', 'Insert here the advertisement code');
define('_MI_WGTRANSIFEX_MAINTAINEDBY', 'Maintained By');
define('_MI_WGTRANSIFEX_MAINTAINEDBY_DESC', 'Allow url of support site or community');
define('_MI_WGTRANSIFEX_BOOKMARKS', 'Social Bookmarks');
define('_MI_WGTRANSIFEX_BOOKMARKS_DESC', 'Show Social Bookmarks in the single page');
define('_MI_WGTRANSIFEX_FACEBOOK_COMMENTS', 'Facebook comments');
define('_MI_WGTRANSIFEX_FACEBOOK_COMMENTS_DESC', 'Allow Facebook comments in the single page');
define('_MI_WGTRANSIFEX_DISQUS_COMMENTS', 'Disqus comments');
define('_MI_WGTRANSIFEX_DISQUS_COMMENTS_DESC', 'Allow Disqus comments in the single page');
// ---------------- End ----------------
