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
require_once __DIR__ . '/admin.php';
// ---------------- Main ----------------
\define('_MA_WGTRANSIFEX_INDEX', 'Home');
\define('_MA_WGTRANSIFEX_TITLE', 'wgTransifex');
\define('_MA_WGTRANSIFEX_DESC', 'This module is for doing following...');
\define(
    '_MA_WGTRANSIFEX_INDEX_DESC',
    "Welcome to the homepage of your new module wgTransifex!<br>
As you can see, you have created a page with a list of links at the top to navigate between the pages of your module. This description is only visible on the homepage of this module, the other pages you will see the content you created when you built this module with the module ModuleBuilder, and after creating new content in admin of this module. In order to expand this module with other resources, just add the code you need to extend the functionality of the same. The files are grouped by type, from the header to the footer to see how divided the source code.<br><br>If you see this message, it is because you have not created content for this module. Once you have created any type of content, you will not see this message.<br><br>If you liked the module ModuleBuilder and thanks to the long process for giving the opportunity to the new module to be created in a moment, consider making a donation to keep the module ModuleBuilder and make a donation using this button <a href='http://www.txmodxoops.org/modules/xdonations/index.php' title='Donation To Txmod Xoops'><img src='https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif' alt='Button Donations'></a><br>Thanks!<br><br>Use the link below to go to the admin and create content."
);
\define('_MA_WGTRANSIFEX_DETAILS', 'Show details');
\define('_MA_WGTRANSIFEX_BROKEN', 'Notify broken');
\define('_MA_WGTRANSIFEX_INVALID_PARAM', 'Invalid parameter');
\define('_MA_WGTRANSIFEX_NOPERM', 'You do not have the necessary permissions');
\define('_MA_WGTRANSIFEX_FORM_OK', 'Successfully saved');
//\define('_MA_WGTRANSIFEX_FORM_DELETE_OK', 'Successfully deleted');
//\define('_MA_WGTRANSIFEX_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
//\define('_MA_WGTRANSIFEX_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
\define('_MA_WGTRANSIFEX_FORM_SURE_BROKEN', "Are you sure to notify as broken: <b><span style='color : Red;'>%s </span></b>");
// ---------------- Contents ----------------

// Project
\define('_MA_WGTRANSIFEX_PROJECT', 'Project');
\define('_MA_WGTRANSIFEX_PROJECTS', 'Projects');
\define('_MA_WGTRANSIFEX_PROJECTS_TITLE', 'Overview of TX Project');
\define('_MA_WGTRANSIFEX_PROJECTS_DESC', 'Overview of projects existing on Transifex');
\define('_MA_WGTRANSIFEX_PROJECTS_LIST', 'List of Projects');
\define('_MA_WGTRANSIFEX_PROJECTS_REFRESH', 'Request current list of projects from Transifex');
// Caption of Project
\define('_MA_WGTRANSIFEX_PROJECT_ID', 'Id');
\define('_MA_WGTRANSIFEX_PROJECT_DESCRIPTION', 'Description');
\define('_MA_WGTRANSIFEX_PROJECT_SOURCE_LANGUAGE_CODE', 'Source_language_code');
\define('_MA_WGTRANSIFEX_PROJECT_TXRESOURCES', 'Resources on Transifex');
\define('_MA_WGTRANSIFEX_PROJECT_LAST_UPDATED', 'Last project update on Transifex');
\define('_MA_WGTRANSIFEX_PROJECT_TEAMS', 'Teams on Transifex');
\define('_MA_WGTRANSIFEX_PROJECT_SLUG', 'Slug');
\define('_MA_WGTRANSIFEX_PROJECT_NAME', 'Name');
\define('_MA_WGTRANSIFEX_PROJECT_DATE', 'Date');
\define('_MA_WGTRANSIFEX_PROJECT_SUBMITTER', 'Submitter');
\define('_MA_WGTRANSIFEX_PROJECT_STATUS', 'Status');

// Package
\define('_MA_WGTRANSIFEX_PACKAGE', 'Package');
\define('_MA_WGTRANSIFEX_PACKAGES', 'Packages');
\define('_MA_WGTRANSIFEX_PACKAGES_TITLE', 'List of available packages');
\define('_MA_WGTRANSIFEX_PACKAGES_DESC', 'Packages description');
\define('_MA_WGTRANSIFEX_PACKAGES_LIST', 'List of Packages');
// Caption of Package
\define('_MA_WGTRANSIFEX_PACKAGE_ID', 'Id');
\define('_MA_WGTRANSIFEX_PACKAGE_NAME', 'Language Package Name');
\define('_MA_WGTRANSIFEX_PACKAGE_DESC', 'Description');
\define('_MA_WGTRANSIFEX_PACKAGE_LANG_ID', 'Language');
\define('_MA_WGTRANSIFEX_PACKAGE_DATE', 'Date of creation');
\define('_MA_WGTRANSIFEX_PACKAGE_SUBMITTER', 'Submitter');
\define('_MA_WGTRANSIFEX_PACKAGE_STATUS', 'Status');
\define('_MA_WGTRANSIFEX_INDEX_THEREARE', 'There are %s Packages');
\define('_MA_WGTRANSIFEX_INDEX_LATEST_LIST', 'List of newest language packages');
// Languages
\define('_MA_WGTRANSIFEX_LANGUAGES', 'Languages');
\define('_MA_WGTRANSIFEX_LANGUAGES_TITLE', 'List of current languages in database');
\define('_MA_WGTRANSIFEX_LANGUAGE_FLAG', 'Flag');
\define('_MA_WGTRANSIFEX_LANGUAGE_NAME', 'Language name');
\define('_MA_WGTRANSIFEX_LANGUAGE_CODE', 'Language code');
\define('_MA_WGTRANSIFEX_LANGUAGE_ISO_639_1', 'Language code short');
\define('_MA_WGTRANSIFEX_LANGUAGE_FOLDER', 'Language Folder Name');
// download
\define('_MA_WGTRANSIFEX_DOWNLOAD_PACKAGE', 'Download package');
\define('_MA_WGTRANSIFEX_DOWNLOAD_ERR_NOFILE', 'Error: download file not found');
//requests
\define('_MA_WGTRANSIFEX_REQUESTS', 'Requests');
\define('_MA_WGTRANSIFEX_REQUEST_NEW', 'Request a new language package');
\define('_MA_WGTRANSIFEX_REQUEST_NEW_DESC', "You didn't find what you are looking for? Then please let us know");
\define('_MA_WGTRANSIFEX_REQUEST_ERR_EXIST1', 'Request already exist! Please wait until language package is released!');
\define('_MA_WGTRANSIFEX_REQUEST_ERR_EXIST2', 'Language package already exist! Please check list of language packages!');
// Admin link
\define('_MA_WGTRANSIFEX_ADMIN', 'Admin');
// ---------------- End ----------------
