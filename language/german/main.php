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
\define('_MA_WGTRANSIFEX_DESC', 'Dieses Modul dient zum Download von Sprachpaketen von Transifex');
\define('_MA_WGTRANSIFEX_INDEX_DESC','Willkommen auf der Startseite vom Modul wgTransifex!<br>Mit diesem Modul wollen wir Dir zahlreiche Sprachpakete zum Download anbieten. Sollte das Gewünschte nicht dabei sein, dann sende uns eine Anfrage.');
\define('_MA_WGTRANSIFEX_DETAILS', 'Details anzeigen');
\define('_MA_WGTRANSIFEX_BROKEN', 'Als fehlerhaft melden');
\define('_MA_WGTRANSIFEX_INVALID_PARAM', 'Ungültiger Parameter');
\define('_MA_WGTRANSIFEX_NOPERM', 'Du hast nicht die erforderlichen Berechtigungen');
\define('_MA_WGTRANSIFEX_FORM_OK', 'Erfolgreich gespeichert');
\define('_MA_WGTRANSIFEX_FORM_SURE_BROKEN', "Willst du wirklich als fehlerhaft melden: <b><span style='color : Red;'>%s </span></b>");
// ---------------- Contents ----------------
// Project
\define('_MA_WGTRANSIFEX_PROJECT', 'Projekt');
\define('_MA_WGTRANSIFEX_PROJECTS', 'Projekte');
\define('_MA_WGTRANSIFEX_PROJECTS_TITLE', 'Übersicht der TX Projekte');
\define('_MA_WGTRANSIFEX_PROJECTS_DESC', 'Übersicht über alle auf Transifex existierende Projekte');
\define('_MA_WGTRANSIFEX_PROJECTS_LIST', 'Liste der Projekte');
\define('_MA_WGTRANSIFEX_PROJECTS_REFRESH', 'Aktuelle Liste der Projekte auf Transifex anfordern');
// Caption of Project
\define('_MA_WGTRANSIFEX_PROJECT_ID', 'Id');
\define('_MA_WGTRANSIFEX_PROJECT_DESCRIPTION', 'Zusätzliche Infos');
\define('_MA_WGTRANSIFEX_PROJECT_SOURCE_LANGUAGE_CODE', 'Code Quellsprache');
\define('_MA_WGTRANSIFEX_PROJECT_TXRESOURCES', 'Ressourcen auf Transifex');
\define('_MA_WGTRANSIFEX_PROJECT_LAST_UPDATED', 'Letztes Projektupdate auf Transifex');
\define('_MA_WGTRANSIFEX_PROJECT_TEAMS', 'Teams auf Transifex');
\define('_MA_WGTRANSIFEX_PROJECT_SLUG', 'Slug');
\define('_MA_WGTRANSIFEX_PROJECT_NAME', 'Name');
\define('_MA_WGTRANSIFEX_PROJECT_DATE', 'Datum');
\define('_MA_WGTRANSIFEX_PROJECT_SUBMITTER', 'Einsender');
\define('_MA_WGTRANSIFEX_PROJECT_STATUS', 'Status');
// Package
\define('_MA_WGTRANSIFEX_PACKAGE', 'Paket');
\define('_MA_WGTRANSIFEX_PACKAGES', 'Pakete');
\define('_MA_WGTRANSIFEX_PACKAGES_TITLE', 'Liste der Pakete');
\define('_MA_WGTRANSIFEX_PACKAGES_DESC', 'Beschreibung des Pakets');
\define('_MA_WGTRANSIFEX_PACKAGES_LIST', 'Liste der Pakete');
// Caption of Package
\define('_MA_WGTRANSIFEX_PACKAGE_ID', 'Id');
\define('_MA_WGTRANSIFEX_PACKAGE_NAME', 'Name Sprachpaket');
\define('_MA_WGTRANSIFEX_PACKAGE_DESC', 'Zusätzliche Infos');
\define('_MA_WGTRANSIFEX_PACKAGE_LANG_ID', 'Sprache');
\define('_MA_WGTRANSIFEX_PACKAGE_DATE', 'Datum Erstellung');
\define('_MA_WGTRANSIFEX_PACKAGE_SUBMITTER', 'Einsender');
\define('_MA_WGTRANSIFEX_PACKAGE_STATUS', 'Status');
\define('_MA_WGTRANSIFEX_INDEX_THEREARE', 'Es gibt %s Sprachpakete');
\define('_MA_WGTRANSIFEX_INDEX_LATEST_LIST', 'Liste der neuesten Sprachpakete');
// Languages
\define('_MA_WGTRANSIFEX_LANGUAGES', 'Sprachen');
\define('_MA_WGTRANSIFEX_LANGUAGES_TITLE', 'Liste der aktuellen Sprachen in unsere Datenbank');
\define('_MA_WGTRANSIFEX_LANGUAGE_FLAG', 'Flagge');
\define('_MA_WGTRANSIFEX_LANGUAGE_NAME', 'Name Sprache');
\define('_MA_WGTRANSIFEX_LANGUAGE_CODE', 'Code Sprache');
\define('_MA_WGTRANSIFEX_LANGUAGE_ISO_639_1', 'Kurzcode Sprache');
\define('_MA_WGTRANSIFEX_LANGUAGE_FOLDER', 'Ordnername Sprache');
// download
\define('_MA_WGTRANSIFEX_DOWNLOAD_PACKAGE', 'Paket herunterladen');
\define('_MA_WGTRANSIFEX_DOWNLOAD_ERR_NOFILE', 'Fehler: Datei für Download wurde nicht gefunden');
//requests
\define('_MA_WGTRANSIFEX_REQUESTS', 'Anfragen');
\define('_MA_WGTRANSIFEX_REQUEST_NEW', 'Neues Sprachpaket anfordern');
\define('_MA_WGTRANSIFEX_REQUEST_NEW_DESC', "Wenn Du nicht gefunden hast was Du suchst dann lass es uns wissen");
\define('_MA_WGTRANSIFEX_REQUEST_ERR_EXIST1', 'Anfrage exisitert bereits! Bitte warte bis das Sprachpaket zur Verfügung gestellt wurde!');
\define('_MA_WGTRANSIFEX_REQUEST_ERR_EXIST2', 'Sprachpaket exisitert bereits! Bitte überprüfe die Liste der Sprachpakete!');
// Admin link
\define('_MA_WGTRANSIFEX_ADMIN', 'Administrator');
// ---------------- End ----------------
