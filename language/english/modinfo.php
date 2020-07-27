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
require_once __DIR__ . '/common.php';
// ---------------- Admin Main ----------------
\define('_MI_WGTRANSIFEX_NAME', 'wgTransifex');
\define('_MI_WGTRANSIFEX_DESC', 'This module is for doing following...');
// ---------------- Admin Menu ----------------
\define('_MI_WGTRANSIFEX_ADMENU1', 'Dashboard');
\define('_MI_WGTRANSIFEX_ADMENU2', 'Projects');
\define('_MI_WGTRANSIFEX_ADMENU3', 'Resources');
\define('_MI_WGTRANSIFEX_ADMENU4', 'Translations');
\define('_MI_WGTRANSIFEX_ADMENU5', 'Packages');
\define('_MI_WGTRANSIFEX_ADMENU6', 'Broken');
\define('_MI_WGTRANSIFEX_ADMENU7', 'Settings');
\define('_MI_WGTRANSIFEX_ADMENU8', 'Languages');
\define('_MI_WGTRANSIFEX_ADMENU9', 'Feedback');
\define('_MI_WGTRANSIFEX_ADMENU10', 'Requests');
\define('_MI_WGTRANSIFEX_ADMENU11', 'Permissions');
\define('_MI_WGTRANSIFEX_ABOUT', 'About');
// ---------------- Admin Nav ----------------
\define('_MI_WGTRANSIFEX_ADMIN_PAGER', 'Admin pager');
\define('_MI_WGTRANSIFEX_ADMIN_PAGER_DESC', 'Admin per page list');
// User
\define('_MI_WGTRANSIFEX_USER_PAGER', 'User pager');
\define('_MI_WGTRANSIFEX_USER_PAGER_DESC', 'User per page list');
// Submenu
\define('_MI_WGTRANSIFEX_SMNAME1', 'All language packages');
\define('_MI_WGTRANSIFEX_SMNAME2', '%s language packages');
\define('_MI_WGTRANSIFEX_SMNAME3', 'Show language list');
\define('_MI_WGTRANSIFEX_SMNAME4', 'Show project list');
// Blocks
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_LAST', 'Packages block last');
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_LAST_DESC', 'Packages block last description');
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_NEW', 'Packages block new');
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_NEW_DESC', 'Packages block new description');
//\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_TOP', 'Packages block top');
//\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_TOP_DESC', 'Packages block top description');
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_RANDOM', 'Packages block random');
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_RANDOM_DESC', 'Packages block random description');
// Config
\define('_MI_WGTRANSIFEX_EDITOR_ADMIN', 'Editor admin');
\define('_MI_WGTRANSIFEX_EDITOR_ADMIN_DESC', 'Select the editor which should be used in admin area for text area fields');
\define('_MI_WGTRANSIFEX_EDITOR_USER', 'Editor user');
\define('_MI_WGTRANSIFEX_EDITOR_USER_DESC', 'Select the editor which should be used in user area for text area fields');
\define('_MI_WGTRANSIFEX_EDITOR_MAXCHAR', 'Text max characters');
\define('_MI_WGTRANSIFEX_EDITOR_MAXCHAR_DESC', 'Max characters for showing text of a textarea or editor field in admin area');
\define('_MI_WGTRANSIFEX_SIZE_MB', 'MB');
\define('_MI_WGTRANSIFEX_MAXSIZE_IMAGE', 'Max size image');
\define('_MI_WGTRANSIFEX_MAXSIZE_IMAGE_DESC', 'Define the max size for uploading images');
\define('_MI_WGTRANSIFEX_MIMETYPES_IMAGE', 'Mime types image');
\define('_MI_WGTRANSIFEX_MIMETYPES_IMAGE_DESC', 'Define the allowed mime types for uploading images');
\define('_MI_WGTRANSIFEX_MAXWIDTH_IMAGE', 'Max width image');
\define('_MI_WGTRANSIFEX_MAXWIDTH_IMAGE_DESC', 'Set the max width which is allowed for uploading images (in pixel)<br>0 means that images keep original size<br>If original image is smaller the image will be not enlarged');
\define('_MI_WGTRANSIFEX_MAXHEIGHT_IMAGE', 'Max height image');
\define('_MI_WGTRANSIFEX_MAXHEIGHT_IMAGE_DESC', 'Set the max height which is allowed for uploading images (in pixel)<br>0 means that images keep original size<br>If original image is smaller the image will be not enlarged');
\define('_MI_WGTRANSIFEX_KEYWORDS', 'Keywords');
\define('_MI_WGTRANSIFEX_KEYWORDS_DESC', 'Insert here the keywords (separate by comma)');
\define('_MI_WGTRANSIFEX_NUMB_COL', 'Number Columns');
\define('_MI_WGTRANSIFEX_NUMB_COL_DESC', 'Number Columns to View.');
\define('_MI_WGTRANSIFEX_DIVIDEBY', 'Divide By');
\define('_MI_WGTRANSIFEX_DIVIDEBY_DESC', 'Divide by columns number.');
\define('_MI_WGTRANSIFEX_TABLE_TYPE', 'Table Type');
\define('_MI_WGTRANSIFEX_TABLE_TYPE_DESC', 'Table Type is the bootstrap html table.');
\define('_MI_WGTRANSIFEX_PANEL_TYPE', 'Panel Type');
\define('_MI_WGTRANSIFEX_PANEL_TYPE_DESC', 'Panel Type is the bootstrap html div.');
\define('_MI_WGTRANSIFEX_IDPAYPAL', 'Paypal ID');
\define('_MI_WGTRANSIFEX_IDPAYPAL_DESC', 'Insert here your PayPal ID for donactions.');
\define('_MI_WGTRANSIFEX_ADVERTISE', 'Advertisement Code');
\define('_MI_WGTRANSIFEX_ADVERTISE_DESC', 'Insert here the advertisement code');
\define('_MI_WGTRANSIFEX_MAINTAINEDBY', 'Maintained By');
\define('_MI_WGTRANSIFEX_MAINTAINEDBY_DESC', 'Allow url of support site or community');
\define('_MI_WGTRANSIFEX_BOOKMARKS', 'Social Bookmarks');
\define('_MI_WGTRANSIFEX_BOOKMARKS_DESC', 'Show Social Bookmarks in the single page');
\define('_MI_WGTRANSIFEX_FACEBOOK_COMMENTS', 'Facebook comments');
\define('_MI_WGTRANSIFEX_FACEBOOK_COMMENTS_DESC', 'Allow Facebook comments in the single page');
\define('_MI_WGTRANSIFEX_DISQUS_COMMENTS', 'Disqus comments');
\define('_MI_WGTRANSIFEX_DISQUS_COMMENTS_DESC', 'Allow Disqus comments in the single page');
\define('_MI_WGTRANSIFEX_GROUPS_REQUEST', 'Groups requests');
\define('_MI_WGTRANSIFEX_GROUPS_REQUEST_DESC', 'Define the groups which are allowed to send requests for language packages');
// Global notifications
\define('_MI_WGTRANSIFEX_NOTIFY_GLOBAL', 'Global notification');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE', 'Package notification');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_ADMIN', 'Package notification (Admin)');
\define('_MI_WGTRANSIFEX_NOTIFY_REQUEST_ADMIN', 'Request notification (Admin)');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_NEW', 'New language package');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_NEW_CAPTION', 'Notify me about a new language package');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_NEW_SUBJECT', 'Notification about new language package');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_BROKEN', 'Broken language package');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_BROKEN_CAPTION', 'Notify me about a broken language package');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_BROKEN_SUBJECT', 'Notification about broken language package');
\define('_MI_WGTRANSIFEX_NOTIFY_REQUEST_NEW', 'New request for language package');
\define('_MI_WGTRANSIFEX_NOTIFY_REQUEST_NEW_CAPTION', 'Notify me about a new prequest for language package');
\define('_MI_WGTRANSIFEX_NOTIFY_REQUEST_NEW_SUBJECT', 'Notification about new request for language package');
// ---------------- End ----------------
