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
include_once __DIR__ . '/main.php';

// ---------------- Admin Index ----------------
define('_AM_WGTRANSIFEX_STATISTICS', 'Statistics');
// There are
define('_AM_WGTRANSIFEX_THEREARE_PROJECTS', "There are <span class='bold'>%s</span> projects in the database");
define('_AM_WGTRANSIFEX_THEREARE_RESOURCES', "There are <span class='bold'>%s</span> resources in the database");
define('_AM_WGTRANSIFEX_THEREARE_SETTINGS', "There are <span class='bold'>%s</span> settings in the database");
define('_AM_WGTRANSIFEX_THEREARE_LANGUAGES', "There are <span class='bold'>%s</span> languages in the database");
define('_AM_WGTRANSIFEX_THEREARE_TRANSLATIONS', "There are <span class='bold'>%s</span> translations in the database");
define('_AM_WGTRANSIFEX_THEREARE_PACKAGES', "There are <span class='bold'>%s</span> packages in the database");
// ---------------- Admin Files ----------------
// There aren't
define('_AM_WGTRANSIFEX_THEREARENT_PROJECTS', "There aren't projects");
define('_AM_WGTRANSIFEX_THEREARENT_RESOURCES', "There aren't resources");
define('_AM_WGTRANSIFEX_THEREARENT_SETTINGS', "There aren't settings");
define('_AM_WGTRANSIFEX_THEREARENT_LANGUAGES', "There aren't languages");
define('_AM_WGTRANSIFEX_THEREARENT_TRANSLATIONS', "There aren't translations");
define('_AM_WGTRANSIFEX_THEREARENT_PACKAGES', "There aren't packages");
// Save/Delete
define('_AM_WGTRANSIFEX_FORM_OK', 'Successfully saved');
define('_AM_WGTRANSIFEX_FORM_DELETE_OK', 'Successfully deleted');
define('_AM_WGTRANSIFEX_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
define('_AM_WGTRANSIFEX_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
//Transifex
define('_AM_WGTRANSIFEX_READTX', 'Read data from Transifex');
define('_AM_WGTRANSIFEX_READTX_PROJECTS', 'Read all projects from Transifex');
define('_AM_WGTRANSIFEX_READTX_RESOURCES', 'Read resources from Transifex');
define('_AM_WGTRANSIFEX_READTX_TRANSLATIONS', 'Read translations from Transifex');
define('_AM_WGTRANSIFEX_CHECKTX_TRANSLATIONS', 'Check dates last translations from Transifex');
//define('_AM_WGTRANSIFEX_READTX_LANGUAGES', 'Read all languages from Transifex');
define('_AM_WGTRANSIFEX_READTX_OK', 'Reading data from Transifex successfully finished');
define('_AM_WGTRANSIFEX_READTX_NODATA', 'Reading data from Transifex finished: no data found');
define('_AM_WGTRANSIFEX_READTX_ERROR', 'Error reading data from Transifex');
define('_AM_WGTRANSIFEX_READTX_ERROR_API', 'Error exchange data with Transifex: ');
define('_AM_WGTRANSIFEX_READTX_ERROR_API_404', 'Error exchange data with Transifex: file not found');
define('_AM_WGTRANSIFEX_READTX_ERROR_API_405', 'Error exchange data with Transifex: method not allowed');
//define('_AM_WGTRANSIFEX_TRANSIFEX_ACTION', 'Transifex actions');
define('_AM_WGTRANSIFEX_READTX_PROJECT', 'Read this project from Transifex');
define('_AM_WGTRANSIFEX_READTX_RESOURCE', 'Read this resource from Transifex');
define('_AM_WGTRANSIFEX_READTX_TRANSLATION', 'Read this translation from Transifex');
define('_AM_WGTRANSIFEX_CHECKTX_TRANSLATION_OK', 'Translation is last version: ');
define('_AM_WGTRANSIFEX_CHECKTX_TRANSLATION_OUTDATED', 'Translation is outdated: ');
// Buttons
define('_AM_WGTRANSIFEX_ADD_PROJECT', 'Add New Project');
define('_AM_WGTRANSIFEX_ADD_RESOURCE', 'Add New Resource');
define('_AM_WGTRANSIFEX_ADD_SETTING', 'Add New Setting');
define('_AM_WGTRANSIFEX_ADD_LANGUAGE', 'Add New Language');
define('_AM_WGTRANSIFEX_ADD_TRANSLATION', 'Add New Translation');
define('_AM_WGTRANSIFEX_ADD_PACKAGE', 'Create New Package');
// Lists
define('_AM_WGTRANSIFEX_PROJECTS_LIST', 'List of Projects');
define('_AM_WGTRANSIFEX_RESOURCES_LIST', 'List of Projects with Resources');
define('_AM_WGTRANSIFEX_SETTINGS_LIST', 'List of Settings');
define('_AM_WGTRANSIFEX_LANGUAGES_LIST', 'List of Languages');
define('_AM_WGTRANSIFEX_TRANSLATIONS_LIST', 'List of Projects with Translations');
define('_AM_WGTRANSIFEX_PACKAGES_LIST', 'List of Packages');
// ---------------- Admin Classes ----------------
// Project add/edit
define('_AM_WGTRANSIFEX_PROJECT_ADD', 'Add Project');
define('_AM_WGTRANSIFEX_PROJECT_EDIT', 'Edit Project');
// Elements of Project
define('_AM_WGTRANSIFEX_PROJECT_ID', 'Id');
define('_AM_WGTRANSIFEX_PROJECT_DESCRIPTION', 'Description');
define('_AM_WGTRANSIFEX_PROJECT_SOURCE_LANGUAGE_CODE', 'Source language code');
define('_AM_WGTRANSIFEX_PROJECT_SLUG', 'Slug');
define('_AM_WGTRANSIFEX_PROJECT_NAME', 'Name');
define('_AM_WGTRANSIFEX_PROJECT_DATE', 'Date');
define('_AM_WGTRANSIFEX_PROJECT_SUBMITTER', 'Submitter');
define('_AM_WGTRANSIFEX_PROJECT_STATUS', 'Status');
define('_AM_WGTRANSIFEX_PROJECT_SELECT', 'Please select a project');
define('_AM_WGTRANSIFEX_PROJECT_RESOURCES', '%p   (%s resources)');
define('_AM_WGTRANSIFEX_PROJECT_LANGUAGES', '%p - %l  (%t translations)');
// Resource add/edit
define('_AM_WGTRANSIFEX_RESOURCE_ADD', 'Add Resource');
define('_AM_WGTRANSIFEX_RESOURCE_EDIT', 'Edit Resource');
define('_AM_WGTRANSIFEX_RESOURCES_SHOW', 'Show Resources');
define('_AM_WGTRANSIFEX_RESOURCES_SURE_DELETEALL', 'Do you really want to delete all resources and translations from %s');
// Elements of Resource
define('_AM_WGTRANSIFEX_RESOURCES_NB', 'Number of resources');
define('_AM_WGTRANSIFEX_RESOURCE_ID', 'Id');
define('_AM_WGTRANSIFEX_RESOURCE_SOURCE_LANGUAGE_CODE', 'Source language code');
define('_AM_WGTRANSIFEX_RESOURCE_NAME', 'Name');
define('_AM_WGTRANSIFEX_RESOURCE_I18N_TYPE', 'I18n type');
define('_AM_WGTRANSIFEX_RESOURCE_PRIORITY', 'Priority');
define('_AM_WGTRANSIFEX_RESOURCE_SLUG', 'Slug');
define('_AM_WGTRANSIFEX_RESOURCE_CATEGORIES', 'Categories');
define('_AM_WGTRANSIFEX_RESOURCE_METADATA', 'Metadata');
define('_AM_WGTRANSIFEX_RESOURCE_DATE', 'Date');
define('_AM_WGTRANSIFEX_RESOURCE_SUBMITTER', 'Submitter');
define('_AM_WGTRANSIFEX_RESOURCE_STATUS', 'Status');
define('_AM_WGTRANSIFEX_RESOURCE_PRO_ID', 'Projects');
// Setting add/edit
define('_AM_WGTRANSIFEX_SETTING_ADD', 'Add Setting');
define('_AM_WGTRANSIFEX_SETTING_EDIT', 'Edit Setting');
// Elements of Setting
define('_AM_WGTRANSIFEX_SETTING_ID', 'Id');
define('_AM_WGTRANSIFEX_SETTING_USERNAME', 'Username');
define('_AM_WGTRANSIFEX_SETTING_PASSWORD', 'Password');
define('_AM_WGTRANSIFEX_SETTING_OPTIONS', 'Options');
define('_AM_WGTRANSIFEX_SETTING_DATE', 'Date');
define('_AM_WGTRANSIFEX_SETTING_SUBMITTER', 'Submitter');
define('_AM_WGTRANSIFEX_SETTING_PRIMARY', 'Primary');
// Language add/edit
define('_AM_WGTRANSIFEX_LANGUAGE_ADD', 'Add Language');
define('_AM_WGTRANSIFEX_LANGUAGE_EDIT', 'Edit Language');
// Elements of Language
define('_AM_WGTRANSIFEX_LANGUAGE_ID', 'Id');
define('_AM_WGTRANSIFEX_LANGUAGE_NAME', 'Name');
define('_AM_WGTRANSIFEX_LANGUAGE_CODE', 'Code');
define('_AM_WGTRANSIFEX_LANGUAGE_FOLDER', 'Folder');
define('_AM_WGTRANSIFEX_LANGUAGE_DATE', 'Date');
define('_AM_WGTRANSIFEX_LANGUAGE_SUBMITTER', 'Submitter');
define('_AM_WGTRANSIFEX_LANGUAGE_ISO_639_1', 'Iso 639 1');
define('_AM_WGTRANSIFEX_LANGUAGE_ISO_639_2', 'Iso 639 2');
define('_AM_WGTRANSIFEX_LANGUAGE_FLAG', 'Flag');
define('_AM_WGTRANSIFEX_LANGUAGE_FLAG_UPLOADS', 'Existing flags in upload directory: %s');
define('_AM_WGTRANSIFEX_LANGUAGE_MENU', '%s language packages');
// Translation add/edit
define('_AM_WGTRANSIFEX_TRANSLATION_ADD', 'Add Translation');
define('_AM_WGTRANSIFEX_TRANSLATION_EDIT', 'Edit Translation');
define('_AM_WGTRANSIFEX_TRANSLATIONS_SHOW', 'Show Translations');
// Elements of Translation
define('_AM_WGTRANSIFEX_TRANSLATIONS_NB', 'Number of Translations');
define('_AM_WGTRANSIFEX_TRANSLATION_ID', 'Id');
define('_AM_WGTRANSIFEX_TRANSLATION_PRO_ID', 'Project');
define('_AM_WGTRANSIFEX_TRANSLATION_RES_ID', 'Resources');
define('_AM_WGTRANSIFEX_TRANSLATION_LANG_ID', 'Languages');
define('_AM_WGTRANSIFEX_TRANSLATION_CONTENT', 'Content');
define('_AM_WGTRANSIFEX_TRANSLATION_MIMETYPE', 'Mimetype');
define('_AM_WGTRANSIFEX_TRANSLATION_LOCAL', 'Local path/name');
define('_AM_WGTRANSIFEX_TRANSLATION_STATUS', 'Status');
define('_AM_WGTRANSIFEX_TRANSLATION_DATE', 'Date');
define('_AM_WGTRANSIFEX_TRANSLATION_SUBMITTER', 'Submitter');
define('_AM_WGTRANSIFEX_TRANSLATION_STATS', 'Statistics');
define('_AM_WGTRANSIFEX_TRANSLATION_PROOFREAD', 'Proof read');
define('_AM_WGTRANSIFEX_TRANSLATION_PROOFREAD_PERC', 'Proof read percentage');
define('_AM_WGTRANSIFEX_TRANSLATION_REVIEWED', 'Reviewed');
define('_AM_WGTRANSIFEX_TRANSLATION_REVIEWED_PERC', 'Reviewed percentage');
define('_AM_WGTRANSIFEX_TRANSLATION_COMPLETED', 'Completed');
define('_AM_WGTRANSIFEX_TRANSLATION_TRANSLATED_WORDS', 'Translated words');
define('_AM_WGTRANSIFEX_TRANSLATION_UNTRANSLATED_WORDS', 'Untranslated words');
//define('_AM_WGTRANSIFEX_TRANSLATION_LAST_COMMITER', 'Commiter');
define('_AM_WGTRANSIFEX_TRANSLATION_TRANSLATED_ENT', 'Translated entities');
define('_AM_WGTRANSIFEX_TRANSLATION_UNTRANSLATED_ENT', 'Untranslated entities');
define('_AM_WGTRANSIFEX_TRANSLATION_LAST_UPDATE', 'Last update');
// Package add/edit
define('_AM_WGTRANSIFEX_PACKAGE_ADD', 'Create new package');
define('_AM_WGTRANSIFEX_PACKAGE_EDIT', 'Edit Package');
// Elements of Package
define('_AM_WGTRANSIFEX_PACKAGE_ID', 'Id');
define('_AM_WGTRANSIFEX_PACKAGE_NAME', 'Name');
define('_AM_WGTRANSIFEX_PACKAGE_DESC', 'Description');
define('_AM_WGTRANSIFEX_PACKAGE_PRO_ID', 'Projects');
define('_AM_WGTRANSIFEX_PACKAGE_LANG_ID', 'Languages');
define('_AM_WGTRANSIFEX_PACKAGE_DATE', 'DateTime');
define('_AM_WGTRANSIFEX_PACKAGE_SUBMITTER', 'Submitter');
define('_AM_WGTRANSIFEX_PACKAGE_STATUS', 'Status');
define('_AM_WGTRANSIFEX_PACKAGE_VERSION', 'Version');
define('_AM_WGTRANSIFEX_PACKAGE_VERSION_OUTDATED', 'Outdated version');
define('_AM_WGTRANSIFEX_PACKAGE_VERSION_LAST', 'Last version');
define('_AM_WGTRANSIFEX_PACKAGE_ERROR_NODATA', 'Requested project/language is not available. Please download first');
define('_AM_WGTRANSIFEX_PACKAGE_ZIPFILE', 'Create automatically zip file of language package');
define('_AM_WGTRANSIFEX_PACKAGE_ZIP', 'Zip file name');
define('_AM_WGTRANSIFEX_PKG_LOGO', 'Logo');
define('_AM_WGTRANSIFEX_PKG_LOGO_UPLOADS', 'Existing logos in upload directory: %s');
// Broken
define('_AM_WGTRANSIFEX_BROKEN_RESULT', 'Broken items in table %s');
define('_AM_WGTRANSIFEX_BROKEN_NODATA', 'No broken items in table %s');
define('_AM_WGTRANSIFEX_BROKEN_TABLE', 'Table');
define('_AM_WGTRANSIFEX_BROKEN_KEY', 'Key field');
define('_AM_WGTRANSIFEX_BROKEN_KEYVAL', 'Key value');
define('_AM_WGTRANSIFEX_BROKEN_MAIN', 'Info main');
// General
define('_AM_WGTRANSIFEX_FORM_UPLOAD', 'Upload file');
define('_AM_WGTRANSIFEX_FORM_UPLOAD_NEW', 'Upload new file: ');
define('_AM_WGTRANSIFEX_FORM_UPLOAD_SIZE', 'Max file size: ');
define('_AM_WGTRANSIFEX_FORM_UPLOAD_SIZE_MB', 'MB');
define('_AM_WGTRANSIFEX_FORM_UPLOAD_IMG_WIDTH', 'Max image width: ');
define('_AM_WGTRANSIFEX_FORM_UPLOAD_IMG_HEIGHT', 'Max image height: ');
define('_AM_WGTRANSIFEX_FORM_IMAGE_PATH', 'Files in %s :');
define('_AM_WGTRANSIFEX_FORM_ACTION', 'Action');
define('_AM_WGTRANSIFEX_FORM_EDIT', 'Modification');
define('_AM_WGTRANSIFEX_FORM_DELETE', 'Clear');
// Status
define('_AM_WGTRANSIFEX_STATUS_NONE', 'No status');
define('_AM_WGTRANSIFEX_STATUS_OFFLINE', 'Offline');
define('_AM_WGTRANSIFEX_STATUS_SUBMITTED', 'Submitted');
define('_AM_WGTRANSIFEX_STATUS_APPROVED', 'Approved');
define('_AM_WGTRANSIFEX_STATUS_READTX', 'Read from Transifex');
define('_AM_WGTRANSIFEX_STATUS_BROKEN', 'Broken');
define('_AM_WGTRANSIFEX_STATUS_CREATED', 'Package created');
// ---------------- Admin Others ----------------
define('_AM_WGTRANSIFEX_MAINTAINEDBY', ' is maintained by ');
// ---------------- End ----------------
