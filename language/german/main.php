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
 * @author         Goffy - Email:<webmaster@wedega.com> - Website:<https://wedega.com> / <https://xoops.org>
 */
include_once __DIR__ . '/admin.php';
// ---------------- Main ----------------
\define('_MA_WGTRANSIFEX_INDEX', 'Home');
\define('_MA_WGTRANSIFEX_TITLE', 'wgTransifex');
\define('_MA_WGTRANSIFEX_DESC', 'Übersicht über alle verfügbaren Sprachpakete');
\define(
    '_MA_WGTRANSIFEX_INDEX_DESC',
    "Welcome to the homepage of your new module wgTransifex!<br>
As you can see, you have created a page with a list of links at the top to navigate between the pages of your module. This description is only visible on the homepage of this module, the other pages you will see the content you created when you built this module with the module ModuleBuilder, and after creating new content in admin of this module. In order to expand this module with other resources, just add the code you need to extend the functionality of the same. The files are grouped by type, from the header to the footer to see how divided the source code.<br><br>If you see this message, it is because you have not created content for this module. Once you have created any type of content, you will not see this message.<br><br>If you liked the module ModuleBuilder and thanks to the long process for giving the opportunity to the new module to be created in a moment, consider making a donation to keep the module ModuleBuilder and make a donation using this button <a href='http://www.txmodxoops.org/modules/xdonations/index.php' title='Donation To Txmod Xoops'><img src='https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif' alt='Button Donations' /></a><br>Thanks!<br><br>Use the link below to go to the admin and create content."
);
\define('_MA_WGTRANSIFEX_DETAILS', 'Details anzeigen');
\define('_MA_WGTRANSIFEX_BROKEN', 'Als fehlerhaft melden');
\define('_MA_WGTRANSIFEX_INVALID_PARAM', 'Ungültiger Parameter');
\define('_MA_WGTRANSIFEX_NOPERM', 'Sie verfügen nicht über die erforderlichen Berechtigungen');
\define('_MA_WGTRANSIFEX_FORM_OK', 'Erfolgreich gespeichert');
//\define('_MA_WGTRANSIFEX_FORM_DELETE_OK', 'Successfully deleted');
//\define('_MA_WGTRANSIFEX_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
//\define('_MA_WGTRANSIFEX_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
\define('_MA_WGTRANSIFEX_FORM_SURE_BROKEN', "Wollen Sie den Downloadlink für dieses Sprachpaket wirklich als fehlerhaft melden: <b><span style='color : Red;'>%s </span></b>");
// ---------------- Contents ----------------
// Project
\define('_MA_WGTRANSIFEX_PROJECT', 'Projekt');
\define('_MA_WGTRANSIFEX_PROJECTS', 'Projekte');
\define('_MA_WGTRANSIFEX_PROJECTS_TITLE', 'Übersicht der Transifex Projekte');
\define('_MA_WGTRANSIFEX_PROJECTS_DESC', 'Übersicht der Transifex Projekte auf www.transifex.com');
\define('_MA_WGTRANSIFEX_PROJECTS_LIST', 'Liste der Projekte');
\define('_MA_WGTRANSIFEX_PROJECTS_REFRESH', 'Aktuelle Liste der Projekte von Transifex abrufen');
// Caption of Project
\define('_MA_WGTRANSIFEX_PROJECT_ID', 'Id');
\define('_MA_WGTRANSIFEX_PROJECT_DESCRIPTION', 'Beschreibung');
\define('_MA_WGTRANSIFEX_PROJECT_SOURCE_LANGUAGE_CODE', 'Sprachcode Quellsprache');
\define('_MA_WGTRANSIFEX_PROJECT_TXRESOURCES', 'Ressourcen auf Transifex');
\define('_MA_WGTRANSIFEX_PROJECT_LAST_UPDATED', 'Letztes Projektupdate auf Transifex');
\define('_MA_WGTRANSIFEX_PROJECT_TEAMS', 'Teams auf Transifex');
\define('_MA_WGTRANSIFEX_PROJECT_SLUG', 'Slug');
\define('_MA_WGTRANSIFEX_PROJECT_NAME', 'Name');
\define('_MA_WGTRANSIFEX_PROJECT_DATE', 'Datum');
\define('_MA_WGTRANSIFEX_PROJECT_SUBMITTER', 'Ersteller');
\define('_MA_WGTRANSIFEX_PROJECT_STATUS', 'Status');
// Package
\define('_MA_WGTRANSIFEX_PACKAGE', 'Sprachpaket');
\define('_MA_WGTRANSIFEX_PACKAGES', 'Sprachpakete');
\define('_MA_WGTRANSIFEX_PACKAGES_TITLE', 'Liste der verfügbaren Sprachpakete');
\define('_MA_WGTRANSIFEX_PACKAGES_DESC', 'Beschreibung');
\define('_MA_WGTRANSIFEX_PACKAGES_LIST', 'Liste der Sprachpakete');
// Caption of Package
\define('_MA_WGTRANSIFEX_PACKAGE_ID', 'Id');
\define('_MA_WGTRANSIFEX_PACKAGE_NAME', 'Name Sprachpaket');
\define('_MA_WGTRANSIFEX_PACKAGE_DESC', 'Beschreibung');
\define('_MA_WGTRANSIFEX_PACKAGE_LANG_ID', 'Sprache');
\define('_MA_WGTRANSIFEX_PACKAGE_DATE', 'Erstelldatum');
\define('_MA_WGTRANSIFEX_PACKAGE_SUBMITTER', 'Ersteller');
\define('_MA_WGTRANSIFEX_PACKAGE_STATUS', 'Status');
\define('_MA_WGTRANSIFEX_INDEX_THEREARE', 'Es gibt %s Sprachpakete');
\define('_MA_WGTRANSIFEX_INDEX_LATEST_LIST', 'Liste der neuesten Sprachpakete');
// Languages
\define('_MA_WGTRANSIFEX_LANGUAGES', 'Sprachen');
\define('_MA_WGTRANSIFEX_LANGUAGES_TITLE', 'Liste der aktuellen Sprachen in unserer Datenbank');
\define('_MA_WGTRANSIFEX_LANGUAGE_FLAG', 'Flagge');
\define('_MA_WGTRANSIFEX_LANGUAGE_NAME', 'Sprachenname');
\define('_MA_WGTRANSIFEX_LANGUAGE_CODE', 'Sprachen-Ccode');
\define('_MA_WGTRANSIFEX_LANGUAGE_ISO_639_1', 'Sprachen-Ccode kurz');
\define('_MA_WGTRANSIFEX_LANGUAGE_FOLDER', 'Ordner Sprache');
// download
\define('_MA_WGTRANSIFEX_DOWNLOAD_PACKAGE', 'Download Sprachpaket');
\define('_MA_WGTRANSIFEX_DOWNLOAD_ERR_NOFILE', 'Fehler: Download-Datei nicht gefunden');
//requests
\define('_MA_WGTRANSIFEX_REQUESTS', 'Anfragen');
\define('_MA_WGTRANSIFEX_REQUEST_NEW', 'Anfrage für neues Sprachpaket');
\define('_MA_WGTRANSIFEX_REQUEST_NEW_DESC', "Sie haben das gewünschte Sprachpaket nicht gefunden? Dann lassen Sie uns das wissen");
\define('_MA_WGTRANSIFEX_REQUEST_ERR_EXIST1', 'Anfrage existiert bereits! Bitte warten Sie bis das Sprachpaket freigegeben wurde!');
\define('_MA_WGTRANSIFEX_REQUEST_ERR_EXIST2', 'Sprachpaket exisiert bereits! Bitte überprüfen Sie die Liste der Sprachpakete!');
// Admin link
\define('_MA_WGTRANSIFEX_ADMIN', 'Administration');
// ---------------- End ----------------
