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
require_once __DIR__ . '/main.php';
// ---------------- Admin Index ----------------
\define('_AM_WGTRANSIFEX_STATISTICS', 'Statistics');
// There are
\define('_AM_WGTRANSIFEX_THEREARE_PROJECTS', "There are <span class='bold'>%s</span> projects in the database");
\define('_AM_WGTRANSIFEX_THEREARE_RESOURCES', "There are <span class='bold'>%s</span> resources in the database");
\define('_AM_WGTRANSIFEX_THEREARE_SETTINGS', "There are <span class='bold'>%s</span> settings in the database");
\define('_AM_WGTRANSIFEX_THEREARE_LANGUAGES', "There are <span class='bold'>%s</span> languages in the database");
\define('_AM_WGTRANSIFEX_THEREARE_TRANSLATIONS', "There are <span class='bold'>%s</span> translations in the database");
\define('_AM_WGTRANSIFEX_THEREARE_PACKAGES', "There are <span class='bold'>%s</span> packages in the database");
\define('_AM_WGTRANSIFEX_THEREARE_REQUESTS', "There are <span class='bold'>%s</span> requests in the database");
// ---------------- Admin Files ----------------
// There aren't
\define('_AM_WGTRANSIFEX_THEREARENT_PROJECTS', "There aren't projects");
\define('_AM_WGTRANSIFEX_THEREARENT_RESOURCES', "There aren't resources");
\define('_AM_WGTRANSIFEX_THEREARENT_SETTINGS', "There aren't settings");
\define('_AM_WGTRANSIFEX_THEREARENT_LANGUAGES', "There aren't languages");
\define('_AM_WGTRANSIFEX_THEREARENT_TRANSLATIONS', "There aren't translations");
\define('_AM_WGTRANSIFEX_THEREARENT_PACKAGES', "There aren't packages");
\define('_AM_WGTRANSIFEX_THEREARENT_REQUESTS', "There aren't requests");
// Save/Delete
\define('_AM_WGTRANSIFEX_FORM_OK', 'Successfully saved');
\define('_AM_WGTRANSIFEX_FORM_DELETE_OK', 'Successfully deleted');
\define('_AM_WGTRANSIFEX_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
\define('_AM_WGTRANSIFEX_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
\define('_AM_WGTRANSIFEX_INVALID_PARAM', 'Invalid parameter');
//Transifex
\define('_AM_WGTRANSIFEX_READTX', 'Read data from Transifex');
\define('_AM_WGTRANSIFEX_READTX_PROJECTS', 'Read all projects from Transifex');
\define('_AM_WGTRANSIFEX_READTX_RESOURCES', 'Read resources from Transifex');
\define('_AM_WGTRANSIFEX_READTX_TRANSLATIONS', 'Read translations from Transifex');
\define('_AM_WGTRANSIFEX_CHECKTX_TRANSLATIONS', 'Check dates last translations from Transifex');
//\define('_AM_WGTRANSIFEX_READTX_LANGUAGES', 'Read all languages from Transifex');
\define('_AM_WGTRANSIFEX_READTX_OK', 'Reading data from Transifex successfully finished');
\define('_AM_WGTRANSIFEX_READTX_NODATA', 'Reading data from Transifex finished: no data found');
\define('_AM_WGTRANSIFEX_READTX_ERROR', 'Error reading data from Transifex');
\define('_AM_WGTRANSIFEX_READTX_ERROR_API', 'Error exchange data with Transifex: ');
\define('_AM_WGTRANSIFEX_READTX_ERROR_API_401', 'Error exchange data with Transifex: Unauthorized');
\define('_AM_WGTRANSIFEX_READTX_ERROR_API_403', 'Error exchange data with Transifex: Forbidden');
\define('_AM_WGTRANSIFEX_READTX_ERROR_API_404', 'Error exchange data with Transifex: file not found');
\define('_AM_WGTRANSIFEX_READTX_ERROR_API_405', 'Error exchange data with Transifex: method not allowed');
//\define('_AM_WGTRANSIFEX_TRANSIFEX_ACTION', 'Transifex actions');
\define('_AM_WGTRANSIFEX_READTX_PROJECT', 'Read this project from Transifex');
\define('_AM_WGTRANSIFEX_READTX_RESOURCE', 'Read this resource from Transifex');
\define('_AM_WGTRANSIFEX_READTX_TRANSLATION', 'Read this translation from Transifex');
\define('_AM_WGTRANSIFEX_CHECKTX_TRANSLATION_OK', 'Translation is last version: ');
\define('_AM_WGTRANSIFEX_CHECKTX_TRANSLATION_OUTDATED', 'Translation is outdated: ');
// Buttons
\define('_AM_WGTRANSIFEX_ADD_PROJECT', 'Add New Project');
\define('_AM_WGTRANSIFEX_ADD_RESOURCE', 'Add New Resource');
\define('_AM_WGTRANSIFEX_ADD_SETTING', 'Add New Setting');
\define('_AM_WGTRANSIFEX_ADD_LANGUAGE', 'Add New Language');
\define('_AM_WGTRANSIFEX_ADD_TRANSLATION', 'Add New Translation');
\define('_AM_WGTRANSIFEX_ADD_PACKAGE', 'Create New Package');
\define('_AM_WGTRANSIFEX_ADD_REQUEST', 'Add New Request');
// Lists
\define('_AM_WGTRANSIFEX_PROJECTS_LIST', 'List of Projects');
\define('_AM_WGTRANSIFEX_RESOURCES_LIST', 'List of Projects with Resources');
\define('_AM_WGTRANSIFEX_SETTINGS_LIST', 'List of Settings');
\define('_AM_WGTRANSIFEX_LANGUAGES_LIST', 'List of Languages');
\define('_AM_WGTRANSIFEX_TRANSLATIONS_LIST', 'List of Projects with Translations');
\define('_AM_WGTRANSIFEX_PACKAGES_LIST', 'List of Packages');
\define('_AM_WGTRANSIFEX_REQUESTS_LIST', 'List of Requests');
// ---------------- Admin Classes ----------------
// Project add/edit
\define('_AM_WGTRANSIFEX_PROJECT_ADD', 'Add Project');
\define('_AM_WGTRANSIFEX_PROJECT_EDIT', 'Edit Project');
// Elements of Project
\define('_AM_WGTRANSIFEX_PROJECT_ID', 'Id');
\define('_AM_WGTRANSIFEX_PROJECT_DESCRIPTION', 'Description');
\define('_AM_WGTRANSIFEX_PROJECT_SOURCE_LANGUAGE_CODE', 'Source language code');
\define('_AM_WGTRANSIFEX_PROJECT_SLUG', 'Slug');
\define('_AM_WGTRANSIFEX_PROJECT_NAME', 'Name');
\define('_AM_WGTRANSIFEX_PROJECT_TXRESOURCES', 'Resources on Transifex');
\define('_AM_WGTRANSIFEX_PROJECT_LAST_UPDATED', 'Last project update on Transifex');
\define('_AM_WGTRANSIFEX_PROJECT_TEAMS', 'Teams on Transifex');
\define('_AM_WGTRANSIFEX_PROJECT_LOCRES', 'Local Resources');
\define('_AM_WGTRANSIFEX_PROJECT_DATE', 'Date');
\define('_AM_WGTRANSIFEX_PROJECT_SUBMITTER', 'Submitter');
\define('_AM_WGTRANSIFEX_PROJECT_ARCHIVED', 'Archived on Transifex');
\define('_AM_WGTRANSIFEX_PROJECT_STATUS', 'Status');
\define('_AM_WGTRANSIFEX_PROJECT_SELECT', 'Please select a project');
\define('_AM_WGTRANSIFEX_PROJECT_RESOURCES', '%p   (%s resources)');
\define('_AM_WGTRANSIFEX_PROJECT_LANGUAGES', '%p - %l  (%t translations)');
\define('_AM_WGTRANSIFEX_PROJECT_PKG_FORM', 'Create package directly from Transifex');
\define('_AM_WGTRANSIFEX_PROJECT_PKG', 'Pay attention');
\define('_AM_WGTRANSIFEX_PROJECT_CLONE', 'Clone resources to other project');
\define('_AM_WGTRANSIFEX_PROJECT_CLONENEW', 'Clone resources to new project');
\define('_AM_WGTRANSIFEX_PROJECT_TYPE', 'Project type');
// Resource add/edit
\define('_AM_WGTRANSIFEX_RESOURCE_ADD', 'Add Resource');
\define('_AM_WGTRANSIFEX_RESOURCE_EDIT', 'Edit Resource');
\define('_AM_WGTRANSIFEX_RESOURCES_SHOW', 'Show Resources');
\define('_AM_WGTRANSIFEX_RESOURCES_SURE_DELETEALL', 'Do you really want to delete all resources and translations from %s');
\define('_AM_WGTRANSIFEX_RESOURCES_UPLOADTX', 'Upload resources to Transifex');
\define('_AM_WGTRANSIFEX_RESOURCES_UPLOADTX_TEST', 'Test data for uploading resources to Transifex');
// Elements of Resource
\define('_AM_WGTRANSIFEX_RESOURCES_NB', 'Number of resources');
\define('_AM_WGTRANSIFEX_RESOURCE_ID', 'Id');
\define('_AM_WGTRANSIFEX_RESOURCE_SOURCE_LANGUAGE_CODE', 'Source language code');
\define('_AM_WGTRANSIFEX_RESOURCE_NAME', 'Name');
\define('_AM_WGTRANSIFEX_RESOURCE_I18N_TYPE', 'I18n type');
\define('_AM_WGTRANSIFEX_RESOURCE_PRIORITY', 'Priority');
\define('_AM_WGTRANSIFEX_RESOURCE_SLUG', 'Slug');
\define('_AM_WGTRANSIFEX_RESOURCE_CATEGORIES', 'Categories');
\define('_AM_WGTRANSIFEX_RESOURCE_METADATA', 'Metadata');
\define('_AM_WGTRANSIFEX_RESOURCE_DATE', 'Date');
\define('_AM_WGTRANSIFEX_RESOURCE_SUBMITTER', 'Submitter');
\define('_AM_WGTRANSIFEX_RESOURCE_STATUS', 'Status');
\define('_AM_WGTRANSIFEX_RESOURCE_PRO_ID', 'Projects');
// Setting add/edit
\define('_AM_WGTRANSIFEX_SETTING_ADD', 'Add Setting');
\define('_AM_WGTRANSIFEX_SETTING_EDIT', 'Edit Setting');
// Elements of Setting
\define('_AM_WGTRANSIFEX_SETTING_ID', 'Id');
\define('_AM_WGTRANSIFEX_SETTING_USERNAME', 'Username');
\define('_AM_WGTRANSIFEX_SETTING_PASSWORD', 'Password');
\define('_AM_WGTRANSIFEX_SETTING_OPTIONS', 'Options');
\define('_AM_WGTRANSIFEX_SETTING_DATE', 'Date');
\define('_AM_WGTRANSIFEX_SETTING_SUBMITTER', 'Submitter');
\define('_AM_WGTRANSIFEX_SETTING_PRIMARY', 'Primary');
\define('_AM_WGTRANSIFEX_SETTING_PRIMARY_DESC', "Type 'Primary' should be used by admins");
\define('_AM_WGTRANSIFEX_SETTING_REQUEST', 'Request');
\define('_AM_WGTRANSIFEX_SETTING_REQUEST_DESC', "If you have an own transifex account for user requests then select 'Request'");
// Language add/edit
\define('_AM_WGTRANSIFEX_LANGUAGE_ADD', 'Add Language');
\define('_AM_WGTRANSIFEX_LANGUAGE_EDIT', 'Edit Language');
// Elements of Language
\define('_AM_WGTRANSIFEX_LANGUAGE_ID', 'Id');
\define('_AM_WGTRANSIFEX_LANGUAGE_NAME', 'Name');
\define('_AM_WGTRANSIFEX_LANGUAGE_CODE', 'Code');
\define('_AM_WGTRANSIFEX_LANGUAGE_FOLDER', 'Folder');
\define('_AM_WGTRANSIFEX_LANGUAGE_DATE', 'Date');
\define('_AM_WGTRANSIFEX_LANGUAGE_SUBMITTER', 'Submitter');
\define('_AM_WGTRANSIFEX_LANGUAGE_ISO_639_1', 'Iso 639 1');
\define('_AM_WGTRANSIFEX_LANGUAGE_ISO_639_2', 'Iso 639 2');
\define('_AM_WGTRANSIFEX_LANGUAGE_FLAG', 'Flag');
\define('_AM_WGTRANSIFEX_LANGUAGE_FLAG_UPLOADS', 'Existing flags in upload directory: %s');
\define('_AM_WGTRANSIFEX_LANGUAGE_PRIMARY', 'Primary Language');
\define('_AM_WGTRANSIFEX_LANGUAGE_SETPRIMARY', 'Set as Primary Language');
\define('_AM_WGTRANSIFEX_LANGUAGE_ONLINE', 'Language Online');
\define('_AM_WGTRANSIFEX_LANGUAGE_SETONLINE', 'Set Online');
\define('_AM_WGTRANSIFEX_LANGUAGE_SETONLINE_ALL', 'Set all Online');
\define('_AM_WGTRANSIFEX_LANGUAGE_SETOFFLINE', 'Set Offline');
\define('_AM_WGTRANSIFEX_LANGUAGE_SETOFFLINE_ALL', 'Set all Offline');
\define('_AM_WGTRANSIFEX_LANGUAGE_MENU', '%s language packages');
// Translation add/edit
\define('_AM_WGTRANSIFEX_TRANSLATION_ADD', 'Add Translation');
\define('_AM_WGTRANSIFEX_TRANSLATION_EDIT', 'Edit Translation');
\define('_AM_WGTRANSIFEX_TRANSLATIONS_SHOW', 'Show Translations');
// Elements of Translation
\define('_AM_WGTRANSIFEX_TRANSLATIONS_NB', 'Number of Translations');
\define('_AM_WGTRANSIFEX_TRANSLATION_ID', 'Id');
\define('_AM_WGTRANSIFEX_TRANSLATION_PRO_ID', 'Project');
\define('_AM_WGTRANSIFEX_TRANSLATION_RES_ID', 'Resources');
\define('_AM_WGTRANSIFEX_TRANSLATION_LANG_ID', 'Languages');
\define('_AM_WGTRANSIFEX_TRANSLATION_CONTENT', 'Content');
\define('_AM_WGTRANSIFEX_TRANSLATION_MIMETYPE', 'Mimetype');
\define('_AM_WGTRANSIFEX_TRANSLATION_LOCAL', 'Local path/name');
\define('_AM_WGTRANSIFEX_TRANSLATION_STATUS', 'Status');
\define('_AM_WGTRANSIFEX_TRANSLATION_DATE', 'Date');
\define('_AM_WGTRANSIFEX_TRANSLATION_SUBMITTER', 'Submitter');
\define('_AM_WGTRANSIFEX_TRANSLATION_STATS', 'Statistics');
\define('_AM_WGTRANSIFEX_TRANSLATION_PROOFREAD', 'Proof read');
\define('_AM_WGTRANSIFEX_TRANSLATION_PROOFREAD_PERC', 'Proof read percentage');
\define('_AM_WGTRANSIFEX_TRANSLATION_REVIEWED', 'Reviewed');
\define('_AM_WGTRANSIFEX_TRANSLATION_REVIEWED_PERC', 'Reviewed percentage');
\define('_AM_WGTRANSIFEX_TRANSLATION_COMPLETED', 'Completed');
\define('_AM_WGTRANSIFEX_TRANSLATION_TRANSLATED_WORDS', 'Translated words');
\define('_AM_WGTRANSIFEX_TRANSLATION_UNTRANSLATED_WORDS', 'Untranslated words');
//\define('_AM_WGTRANSIFEX_TRANSLATION_LAST_COMMITER', 'Commiter');
\define('_AM_WGTRANSIFEX_TRANSLATION_TRANSLATED_ENT', 'Translated entities');
\define('_AM_WGTRANSIFEX_TRANSLATION_UNTRANSLATED_ENT', 'Untranslated entities');
\define('_AM_WGTRANSIFEX_TRANSLATION_LAST_UPDATE', 'Last update');
// Package add/edit
\define('_AM_WGTRANSIFEX_PACKAGE_ADD', 'Create new package');
\define('_AM_WGTRANSIFEX_PACKAGE_EDIT', 'Edit Package');
// Elements of Package
\define('_AM_WGTRANSIFEX_PACKAGE_ID', 'Id');
\define('_AM_WGTRANSIFEX_PACKAGE_NAME', 'Name');
\define('_AM_WGTRANSIFEX_PACKAGE_DESC', 'Description');
\define('_AM_WGTRANSIFEX_PACKAGE_PRO_ID', 'Projects');
\define('_AM_WGTRANSIFEX_PACKAGE_LANG_ID', 'Languages');
\define('_AM_WGTRANSIFEX_PACKAGE_DATE', 'DateTime');
\define('_AM_WGTRANSIFEX_PACKAGE_SUBMITTER', 'Submitter');
\define('_AM_WGTRANSIFEX_PACKAGE_STATUS', 'Status');
\define('_AM_WGTRANSIFEX_PACKAGE_VERSION', 'Version');
\define('_AM_WGTRANSIFEX_PACKAGE_VERSION_OUTDATED', 'Outdated version');
\define('_AM_WGTRANSIFEX_PACKAGE_VERSION_LAST', 'Last version');
\define('_AM_WGTRANSIFEX_PACKAGE_ERROR_NODATA', 'Requested project/language is not available. Please download first');
\define('_AM_WGTRANSIFEX_PACKAGE_ZIPFILE', 'Create automatically zip file of language package');
\define('_AM_WGTRANSIFEX_PACKAGE_ZIP', 'Zip file name');
\define('_AM_WGTRANSIFEX_PACKAGE_LOGO', 'Logo');
\define('_AM_WGTRANSIFEX_PACKAGE_LOGO_UPLOADS', 'Existing logos in upload directory: %s');
\define('_AM_WGTRANSIFEX_PACKAGE_DOWNLOAD', 'Do you want to download files from Transifex?');
\define('_AM_WGTRANSIFEX_PACKAGE_DOWNLOAD_DESC', 'Pay attention: 
<ul><li>if yes: non existing resources and translations will be downloaded / existing resources and translations will be overwritten!</li>
<li>if no: resources and translations must be downloaded before, otherwise package will be incomplete!</li></ul>
');
// Broken
\define('_AM_WGTRANSIFEX_BROKEN_RESULT', 'Broken items in table %s');
\define('_AM_WGTRANSIFEX_BROKEN_NODATA', 'No broken items in table %s');
\define('_AM_WGTRANSIFEX_BROKEN_TABLE', 'Table');
\define('_AM_WGTRANSIFEX_BROKEN_KEY', 'Key field');
\define('_AM_WGTRANSIFEX_BROKEN_KEYVAL', 'Key value');
\define('_AM_WGTRANSIFEX_BROKEN_MAIN', 'Info main');
// Request add/edit
\define('_AM_WGTRANSIFEX_REQUEST_ADD', 'Neue Anfrage');
\define('_AM_WGTRANSIFEX_REQUEST_EDIT', 'Edit Request');
// Elements of Request
\define('_AM_WGTRANSIFEX_REQUEST_ID', 'Id');
\define('_AM_WGTRANSIFEX_REQUEST_PROJECT', 'Projekte');
\define('_AM_WGTRANSIFEX_REQUEST_LANGUAGE', 'Sprache');
\define('_AM_WGTRANSIFEX_REQUEST_STATUS', 'Status');
\define('_AM_WGTRANSIFEX_REQUEST_STATUSDATE', 'Status DateTime');
\define('_AM_WGTRANSIFEX_REQUEST_STATUSUID', 'Status uid');
\define('_AM_WGTRANSIFEX_REQUEST_DATE', 'DateTime');
\define('_AM_WGTRANSIFEX_REQUEST_SUBMITTER', 'Submitter');
\define('_AM_WGTRANSIFEX_REQUEST_PROJECT_NOTINLIST', '--- Nicht in der Liste ---');
\define('_AM_WGTRANSIFEX_REQUEST_INFO', 'Nicht in der Liste');
\define('_AM_WGTRANSIFEX_REQUEST_INFO_DESC', 'Wenn das gewünschte Projekt/Module nicht in der Liste ist, dann bitte hier den Namen eingeben');
// General
\define('_AM_WGTRANSIFEX_FORM_UPLOAD', 'Upload file');
\define('_AM_WGTRANSIFEX_FORM_UPLOAD_NEW', 'Upload new file: ');
\define('_AM_WGTRANSIFEX_FORM_UPLOAD_SIZE', 'Max file size: ');
\define('_AM_WGTRANSIFEX_FORM_UPLOAD_SIZE_MB', 'MB');
\define('_AM_WGTRANSIFEX_FORM_UPLOAD_IMG_WIDTH', 'Max image width: ');
\define('_AM_WGTRANSIFEX_FORM_UPLOAD_IMG_HEIGHT', 'Max image height: ');
\define('_AM_WGTRANSIFEX_FORM_IMAGE_PATH', 'Files in %s :');
\define('_AM_WGTRANSIFEX_FORM_ACTION', 'Action');
\define('_AM_WGTRANSIFEX_FORM_EDIT', 'Modification');
\define('_AM_WGTRANSIFEX_FORM_DELETE', 'Clear');
// Status
\define('_AM_WGTRANSIFEX_STATUS_NONE', 'No status');
\define('_AM_WGTRANSIFEX_STATUS_OFFLINE', 'Offline');
\define('_AM_WGTRANSIFEX_STATUS_SUBMITTED', 'Submitted');
\define('_AM_WGTRANSIFEX_STATUS_APPROVED', 'Approved');
\define('_AM_WGTRANSIFEX_STATUS_READTX', 'Read from Transifex');
\define('_AM_WGTRANSIFEX_STATUS_BROKEN', 'Broken');
\define('_AM_WGTRANSIFEX_STATUS_CREATED', 'Package available');
\define('_AM_WGTRANSIFEX_STATUS_ARCHIVED', 'Project archived on Transifex');
\define('_AM_WGTRANSIFEX_STATUS_DELETEDTX', 'Project not on Transifex');
\define('_AM_WGTRANSIFEX_STATUS_READTXNEW', 'New from Transifex');
\define('_AM_WGTRANSIFEX_STATUS_PENDING', 'Pending');
\define('_AM_WGTRANSIFEX_STATUS_OUTDATED', 'Outdated');
\define('_AM_WGTRANSIFEX_STATUS_LOCAL', 'Local data');
// Project types
\define('_AM_WGTRANSIFEX_PROTYPE_NONE', 'Not defined');
\define('_AM_WGTRANSIFEX_PROTYPE_MODULE', 'Upload from module');
\define('_AM_WGTRANSIFEX_PROTYPE_CORE', 'XOOPS Core');
// Upload to transifex
\define('_AM_WGTRANSIFEX_UPLOADTX_ERR_PROTYPE', 'Error: project type is not defined');
\define('_AM_WGTRANSIFEX_UPLOADTX_ERR_DIR', 'Error: directory for reading files not found: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_SUMMARY', 'Summary of upload procedure');
\define('_AM_WGTRANSIFEX_UPLOADTX_SUCCESS', 'Uploads successful: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_ERRORS', 'Upload errors: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_SKIPPED', 'Skipped uploads: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_DETAILS', 'Details: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_NOTSTARTED', 'Upload not started');
\define('_AM_WGTRANSIFEX_UPLOADTX_FILENOTFOUND', 'File not found: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_RESNOTEXISTS', 'Resource does not exists: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_RESEXISTS', 'Resource already exists: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_RESEXISTSSKIP', 'Skipped - Resource already exists: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_FILEUPLOADED', 'File uploaded: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_FILEUPLOADSKIP', 'File upload skipped: ');
// ---------------- Admin Others ----------------
\define('_AM_WGTRANSIFEX_MAINTAINEDBY', ' is maintained by ');
\define('_AM_WGTRANSIFEX_NO_CURL', 'This module needs PHP curl functions. Please activate otherwise download will not work!');
// ---------------- End ----------------
\define('_AM_WGTRANSIFEX_ABOUT_MAKE_DONATION', 'Make a Donation to support this module');
\define('_AM_WGTRANSIFEX_MAINTAINED', '<strong>%s</strong> is maintained by the ');
\define('_AM_WGTRANSIFEX_SUPPORT_FORUM', 'Support Forum');
\define('_AM_WGTRANSIFEX_DONATION_AMOUNT', 'Donation Amount');
