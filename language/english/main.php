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
include_once __DIR__ . '/admin.php';
// ---------------- Main ----------------
define('_MA_WGTRANSIFEX_INDEX', 'Home');
define('_MA_WGTRANSIFEX_TITLE', 'wgTransifex');
define('_MA_WGTRANSIFEX_DESC', 'This module is for doing following...');
define(
    '_MA_WGTRANSIFEX_INDEX_DESC',
    "Welcome to the homepage of your new module wgTransifex!<br>
As you can see, you have created a page with a list of links at the top to navigate between the pages of your module. This description is only visible on the homepage of this module, the other pages you will see the content you created when you built this module with the module ModuleBuilder, and after creating new content in admin of this module. In order to expand this module with other resources, just add the code you need to extend the functionality of the same. The files are grouped by type, from the header to the footer to see how divided the source code.<br><br>If you see this message, it is because you have not created content for this module. Once you have created any type of content, you will not see this message.<br><br>If you liked the module ModuleBuilder and thanks to the long process for giving the opportunity to the new module to be created in a moment, consider making a donation to keep the module ModuleBuilder and make a donation using this button <a href='http://www.txmodxoops.org/modules/xdonations/index.php' title='Donation To Txmod Xoops'><img src='https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif' alt='Button Donations' /></a><br>Thanks!<br><br>Use the link below to go to the admin and create content."
);
define('_MA_WGTRANSIFEX_NO_PDF_LIBRARY', 'Libraries TCPDF not there yet, upload them in root/Frameworks');
define('_MA_WGTRANSIFEX_NO', 'No');
define('_MA_WGTRANSIFEX_DETAILS', 'Show details');
define('_MA_WGTRANSIFEX_BROKEN', 'Notify broken');
define('_MA_WGTRANSIFEX_INVALID_PARAM', 'Invalid parameter');
define('_MA_WGTRANSIFEX_FORM_OK', 'Successfully saved');
define('_MA_WGTRANSIFEX_FORM_DELETE_OK', 'Successfully deleted');
define('_MA_WGTRANSIFEX_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
define('_MA_WGTRANSIFEX_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
define('_MA_WGTRANSIFEX_FORM_SURE_BROKEN', "Are you sure to notify as broken: <b><span style='color : Red;'>%s </span></b>");
// ---------------- Contents ----------------
// Project
define('_MA_WGTRANSIFEX_PROJECT', 'Project');
define('_MA_WGTRANSIFEX_PROJECTS', 'Projects');
define('_MA_WGTRANSIFEX_PROJECTS_TITLE', 'Projects title');
define('_MA_WGTRANSIFEX_PROJECTS_DESC', 'Projects description');
define('_MA_WGTRANSIFEX_PROJECTS_LIST', 'List of Projects');
// Caption of Project
define('_MA_WGTRANSIFEX_PROJECT_ID', 'Id');
define('_MA_WGTRANSIFEX_PROJECT_DESCRIPTION', 'Description');
define('_MA_WGTRANSIFEX_PROJECT_SOURCE_LANGUAGE_CODE', 'Source_language_code');
define('_MA_WGTRANSIFEX_PROJECT_SLUG', 'Slug');
define('_MA_WGTRANSIFEX_PROJECT_NAME', 'Name');
define('_MA_WGTRANSIFEX_PROJECT_DATE', 'Date');
define('_MA_WGTRANSIFEX_PROJECT_SUBMITTER', 'Submitter');
define('_MA_WGTRANSIFEX_PROJECT_STATUS', 'Status');
// Resource
define('_MA_WGTRANSIFEX_RESOURCE', 'Resource');
define('_MA_WGTRANSIFEX_RESOURCES', 'Resources');
define('_MA_WGTRANSIFEX_RESOURCES_TITLE', 'Resources title');
define('_MA_WGTRANSIFEX_RESOURCES_DESC', 'Resources description');
define('_MA_WGTRANSIFEX_RESOURCES_LIST', 'List of Resources');
// Caption of Resource
define('_MA_WGTRANSIFEX_RESOURCE_ID', 'Id');
define('_MA_WGTRANSIFEX_RESOURCE_SOURCE_LANGUAGE_CODE', 'Source_language_code');
define('_MA_WGTRANSIFEX_RESOURCE_NAME', 'Name');
define('_MA_WGTRANSIFEX_RESOURCE_I18N_TYPE', 'I18n_type');
define('_MA_WGTRANSIFEX_RESOURCE_PRIORITY', 'Priority');
define('_MA_WGTRANSIFEX_RESOURCE_SLUG', 'Slug');
define('_MA_WGTRANSIFEX_RESOURCE_CATEGORIES', 'Categories');
define('_MA_WGTRANSIFEX_RESOURCE_METADATA', 'Metadata');
define('_MA_WGTRANSIFEX_RESOURCE_DATE', 'Date');
define('_MA_WGTRANSIFEX_RESOURCE_SUBMITTER', 'Submitter');
define('_MA_WGTRANSIFEX_RESOURCE_STATUS', 'Status');
define('_MA_WGTRANSIFEX_RESOURCE_PRO_ID', 'Pro_id');
// Setting
define('_MA_WGTRANSIFEX_SETTING', 'Setting');
define('_MA_WGTRANSIFEX_SETTINGS', 'Settings');
define('_MA_WGTRANSIFEX_SETTINGS_TITLE', 'Settings title');
define('_MA_WGTRANSIFEX_SETTINGS_DESC', 'Settings description');
define('_MA_WGTRANSIFEX_SETTINGS_LIST', 'List of Settings');
// Caption of Setting
define('_MA_WGTRANSIFEX_SETTING_ID', 'Id');
define('_MA_WGTRANSIFEX_SETTING_USERNAME', 'Username');
define('_MA_WGTRANSIFEX_SETTING_PASSWORD', 'Password');
define('_MA_WGTRANSIFEX_SETTING_OPTIONS', 'Options');
define('_MA_WGTRANSIFEX_SETTING_DATE', 'Date');
define('_MA_WGTRANSIFEX_SETTING_SUBMITTER', 'Submitter');
define('_MA_WGTRANSIFEX_SETTING_PRIMARY', 'Primary');
// Language
define('_MA_WGTRANSIFEX_LANGUAGE', 'Language');
define('_MA_WGTRANSIFEX_LANGUAGES', 'Languages');
define('_MA_WGTRANSIFEX_LANGUAGES_TITLE', 'Languages title');
define('_MA_WGTRANSIFEX_LANGUAGES_DESC', 'Languages description');
define('_MA_WGTRANSIFEX_LANGUAGES_LIST', 'List of Languages');
// Caption of Language
define('_MA_WGTRANSIFEX_LANGUAGE_ID', 'Id');
define('_MA_WGTRANSIFEX_LANGUAGE_NAME', 'Name');
define('_MA_WGTRANSIFEX_LANGUAGE_CODE', 'Code');
define('_MA_WGTRANSIFEX_LANGUAGE_FOLDER', 'Folder');
define('_MA_WGTRANSIFEX_LANGUAGE_DATE', 'Date');
define('_MA_WGTRANSIFEX_LANGUAGE_SUBMITTER', 'Submitter');
define('_MA_WGTRANSIFEX_LANGUAGE_ISO_639_1', 'Iso_639_1');
define('_MA_WGTRANSIFEX_LANGUAGE_ISO_639_2', 'Iso_639_2');
// Translation
define('_MA_WGTRANSIFEX_TRANSLATION', 'Translation');
define('_MA_WGTRANSIFEX_TRANSLATIONS', 'Translations');
define('_MA_WGTRANSIFEX_TRANSLATIONS_TITLE', 'Translations title');
define('_MA_WGTRANSIFEX_TRANSLATIONS_DESC', 'Translations description');
define('_MA_WGTRANSIFEX_TRANSLATIONS_LIST', 'List of Translations');
// Caption of Translation
define('_MA_WGTRANSIFEX_TRANSLATION_ID', 'Id');
define('_MA_WGTRANSIFEX_TRANSLATION_PRO_ID', 'Pro_id');
define('_MA_WGTRANSIFEX_TRANSLATION_RES_ID', 'Res_id');
define('_MA_WGTRANSIFEX_TRANSLATION_LANG_ID', 'Lang_id');
define('_MA_WGTRANSIFEX_TRANSLATION_TEXT', 'Text');
define('_MA_WGTRANSIFEX_TRANSLATION_STATUS', 'Status');
define('_MA_WGTRANSIFEX_TRANSLATION_DATE', 'Date');
define('_MA_WGTRANSIFEX_TRANSLATION_SUBMITTER', 'Submitter');
// Package
define('_MA_WGTRANSIFEX_PACKAGE', 'Package');
define('_MA_WGTRANSIFEX_PACKAGES', 'Packages');
define('_MA_WGTRANSIFEX_PACKAGES_TITLE', 'Packages title');
define('_MA_WGTRANSIFEX_PACKAGES_DESC', 'Packages description');
define('_MA_WGTRANSIFEX_PACKAGES_LIST', 'List of Packages');
// Caption of Package
define('_MA_WGTRANSIFEX_PACKAGE_ID', 'Id');
define('_MA_WGTRANSIFEX_PACKAGE_NAME', 'Language Package Name');
define('_MA_WGTRANSIFEX_PACKAGE_DESC', 'Description');
define('_MA_WGTRANSIFEX_PACKAGE_LANG_ID', 'Language');
define('_MA_WGTRANSIFEX_PACKAGE_DATE', 'Date of creation');
define('_MA_WGTRANSIFEX_PACKAGE_SUBMITTER', 'Submitter');
define('_MA_WGTRANSIFEX_PACKAGE_STATUS', 'Status');
define('_MA_WGTRANSIFEX_INDEX_THEREARE', 'There are %s Packages');
define('_MA_WGTRANSIFEX_INDEX_LATEST_LIST', 'Last wgTransifex');
// downlioad
define('_MA_WGTRANSIFEX_DOWNLOAD_PACKAGE', 'Download package');
define('_MA_WGTRANSIFEX_DOWNLOAD_ERR_NOFILE', 'Error: download file not found');
// Submit
define('_MA_WGTRANSIFEX_SUBMIT', 'Submit');
define('_MA_WGTRANSIFEX_SUBMIT_PACKAGE', 'Submit Package');
define('_MA_WGTRANSIFEX_SUBMIT_ALLPENDING', 'All package/script information are posted pending verification.');
define('_MA_WGTRANSIFEX_SUBMIT_DONTABUSE', 'Username and IP are recorded, so please do not abuse the system.');
define('_MA_WGTRANSIFEX_SUBMIT_ISAPPROVED', 'Your package has been approved');
define('_MA_WGTRANSIFEX_SUBMIT_PROPOSER', 'Submit a package');
define('_MA_WGTRANSIFEX_SUBMIT_RECEIVED', 'We have received your package info. Thank you !');
define('_MA_WGTRANSIFEX_SUBMIT_SUBMITONCE', 'Submit your package/script only once.');
define('_MA_WGTRANSIFEX_SUBMIT_TAKEDAYS', 'This will take many days to see your package/script added successfully in our database.');
// Admin link
define('_MA_WGTRANSIFEX_ADMIN', 'Admin');
// ---------------- End ----------------
