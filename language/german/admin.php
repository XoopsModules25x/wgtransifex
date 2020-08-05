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
\define('_AM_WGTRANSIFEX_STATISTICS', 'Statistiken');
// There are
\define('_AM_WGTRANSIFEX_THEREARE_PROJECTS', "Es gibt <span class='bold'>%s</span>Projekte in der Datenbank");
\define('_AM_WGTRANSIFEX_THEREARE_RESOURCES', "Es sind <span class='bold'>%s</span>Ressourcen in der Datenbank");
\define('_AM_WGTRANSIFEX_THEREARE_SETTINGS', "Es gibt <span class='bold'>%s</span>Einstellungen in der Datenbank");
\define('_AM_WGTRANSIFEX_THEREARE_LANGUAGES', "Es gibt <span class='bold'>%s</span> Sprachen in der Datenbank");
\define('_AM_WGTRANSIFEX_THEREARE_TRANSLATIONS', "Es gibt <span class='bold'>%s</span> Übersetzungen in der Datenbank");
\define('_AM_WGTRANSIFEX_THEREARE_PACKAGES', "Es sind <span class='bold'>%s</span>Pakete in der Datenbank");
\define('_AM_WGTRANSIFEX_THEREARE_REQUESTS', "Es sind <span class='bold'>%s</span>Löschanfragen in der Datenbank");
// ---------------- Admin Files ----------------
// There aren't
\define('_AM_WGTRANSIFEX_THEREARENT_PROJECTS', "Es gibt keine Projekte");
\define('_AM_WGTRANSIFEX_THEREARENT_RESOURCES', "Es gibt keine Ressourcen");
\define('_AM_WGTRANSIFEX_THEREARENT_SETTINGS', "Es gibt keine Einstellungen");
\define('_AM_WGTRANSIFEX_THEREARENT_LANGUAGES', "Es gibt keine Sprachen");
\define('_AM_WGTRANSIFEX_THEREARENT_TRANSLATIONS', "Es gibt keine Übersetzungen");
\define('_AM_WGTRANSIFEX_THEREARENT_PACKAGES', "Es gibt keine Pakete");
\define('_AM_WGTRANSIFEX_THEREARENT_REQUESTS', "Es gibt keine Anfragen");
// Save/Delete
\define('_AM_WGTRANSIFEX_FORM_OK', 'Erfolgreich gespeichert');
\define('_AM_WGTRANSIFEX_FORM_DELETE_OK', 'Erfolgreich gelöscht');
\define('_AM_WGTRANSIFEX_FORM_SURE_DELETE', "Willst Du <b><span style='color : Red;'>%s </span></b> wirklich löschen?");
\define('_AM_WGTRANSIFEX_FORM_SURE_RENEW', "Willst Du <b><span style='color : Red;'>%s </span></b> wirklich aktualisieren");
\define('_AM_WGTRANSIFEX_INVALID_PARAM', 'Ungültiger Parameter');
//Transifex
\define('_AM_WGTRANSIFEX_READTX', 'Daten von Transifex einlesen');
\define('_AM_WGTRANSIFEX_READTX_PROJECTS', 'Alle Projekte von Transifex einlesen');
\define('_AM_WGTRANSIFEX_READTX_RESOURCES', 'Ressourcen von Transifex einlesen');
\define('_AM_WGTRANSIFEX_READTX_TRANSLATIONS', 'Übersetzungen von Transifex einlesen');
\define('_AM_WGTRANSIFEX_CHECKTX_TRANSLATIONS', 'Die letzten Übersetzungen von Transifex überprüfen');
//\define('_AM_WGTRANSIFEX_READTX_LANGUAGES', 'Lesen Sie alle Sprachen von Transifex');
\define('_AM_WGTRANSIFEX_READTX_OK', 'Das Lesen der Daten von Transifex wurde erfolgreich abgeschlossen');
\define('_AM_WGTRANSIFEX_READTX_NODATA', 'Lesen der Daten von Transifex beendet: Keine Daten gefunden');
\define('_AM_WGTRANSIFEX_READTX_ERROR', 'Fehler beim Lesen der Daten von Transifex');
\define('_AM_WGTRANSIFEX_READTX_ERROR_API', 'Fehler beim Datenaustausch mit Transifex');
\define('_AM_WGTRANSIFEX_READTX_ERROR_API_401', 'Fehler beim Datenaustausch mit Transifex: Nicht authorisiert');
\define('_AM_WGTRANSIFEX_READTX_ERROR_API_403', 'Fehler beim Datenaustausch mit Transifex: Zugriff nicht erlaubt');
\define('_AM_WGTRANSIFEX_READTX_ERROR_API_404', 'Fehler beim Datenaustausch mit Transifex: Datei nicht gefunden');
\define('_AM_WGTRANSIFEX_READTX_ERROR_API_405', 'Fehler beim Datenaustausch mit Transifex: Ungültige Methode');
//\define('_AM_WGTRANSIFEX_TRANSIFEX_ACTION', 'Transifex Aktionen');
\define('_AM_WGTRANSIFEX_READTX_PROJECT', 'Dieses Projekt von Transifex einlesen');
\define('_AM_WGTRANSIFEX_READTX_RESOURCE', 'Diese Ressource von Transifex einlesen');
\define('_AM_WGTRANSIFEX_READTX_TRANSLATION', 'Diese Übersetzung von Transifex einlesen');
\define('_AM_WGTRANSIFEX_CHECKTX_TRANSLATION_OK', 'Übersetzung ist letzte Version:');
\define('_AM_WGTRANSIFEX_CHECKTX_TRANSLATION_OUTDATED', 'Die Übersetzung ist veraltet:');
// Buttons
\define('_AM_WGTRANSIFEX_ADD_PROJECT', 'Neues Projekt hinzufügen');
\define('_AM_WGTRANSIFEX_ADD_RESOURCE', 'Neue Ressource hinzufügen');
\define('_AM_WGTRANSIFEX_ADD_SETTING', 'Neue Einstellung hinzufügen');
\define('_AM_WGTRANSIFEX_ADD_LANGUAGE', 'Neue Sprache hinzufügen');
\define('_AM_WGTRANSIFEX_ADD_TRANSLATION', 'Neue Übersetzung hinzufügen');
\define('_AM_WGTRANSIFEX_ADD_PACKAGE', 'Neues Paket erstellen');
\define('_AM_WGTRANSIFEX_ADD_REQUEST', 'Neue Anfrage hinzufügen');
// Lists
\define('_AM_WGTRANSIFEX_PROJECTS_LIST', 'Liste der Projekte');
\define('_AM_WGTRANSIFEX_RESOURCES_LIST', 'Liste der Projekte mit Ressourcen');
\define('_AM_WGTRANSIFEX_SETTINGS_LIST', 'Liste der Einstellungen');
\define('_AM_WGTRANSIFEX_LANGUAGES_LIST', 'Liste der Sprachen');
\define('_AM_WGTRANSIFEX_TRANSLATIONS_LIST', 'Liste der Projekte mit Übersetzungen');
\define('_AM_WGTRANSIFEX_PACKAGES_LIST', 'Liste der Pakete');
\define('_AM_WGTRANSIFEX_REQUESTS_LIST', 'Liste der Anfragen');
// ---------------- Admin Classes ----------------
// Project add/edit
\define('_AM_WGTRANSIFEX_PROJECT_ADD', 'Projekt hinzufügen');
\define('_AM_WGTRANSIFEX_PROJECT_EDIT', 'Projekt bearbeiten');
// Elements of Project
\define('_AM_WGTRANSIFEX_PROJECT_ID', 'Id');
\define('_AM_WGTRANSIFEX_PROJECT_DESCRIPTION', 'Zusätzliche Infos');
\define('_AM_WGTRANSIFEX_PROJECT_SOURCE_LANGUAGE_CODE', 'Quellsprachcode');
\define('_AM_WGTRANSIFEX_PROJECT_SLUG', 'Slug');
\define('_AM_WGTRANSIFEX_PROJECT_NAME', 'Projektname');
\define('_AM_WGTRANSIFEX_PROJECT_TXRESOURCES', 'Ressourcen auf Transifex');
\define('_AM_WGTRANSIFEX_PROJECT_LAST_UPDATED', 'Letztes Projektupdate auf Transifex');
\define('_AM_WGTRANSIFEX_PROJECT_TEAMS', 'Teams auf Transifex');
\define('_AM_WGTRANSIFEX_PROJECT_LOCRES', 'Lokale Ressourcen');
\define('_AM_WGTRANSIFEX_PROJECT_DATE', 'Datum');
\define('_AM_WGTRANSIFEX_PROJECT_SUBMITTER', 'Einsender');
\define('_AM_WGTRANSIFEX_PROJECT_ARCHIVED', 'Archiviert auf Transifex');
\define('_AM_WGTRANSIFEX_PROJECT_STATUS', 'Status');
\define('_AM_WGTRANSIFEX_PROJECT_SELECT', 'Bitte wähle ein Projekt');
\define('_AM_WGTRANSIFEX_PROJECT_RESOURCES', '%p   (%s Ressourcen)');
\define('_AM_WGTRANSIFEX_PROJECT_LANGUAGES', '%p - %l  (%t Übersetzungen)');
\define('_AM_WGTRANSIFEX_PROJECT_PKG_FORM', 'Erstelle Sprachpaket direkt von Transifex');
\define('_AM_WGTRANSIFEX_PROJECT_PKG', 'Achtung');
\define('_AM_WGTRANSIFEX_PROJECT_CLONE', 'Klone Ressourcen in ein anderes Projekt');
\define('_AM_WGTRANSIFEX_PROJECT_CLONENEW', 'Klone Ressourcen in ein neues Projekt');
\define('_AM_WGTRANSIFEX_PROJECT_TYPE', 'Projekt-Typ');
// Resource add/edit
\define('_AM_WGTRANSIFEX_RESOURCE_ADD', 'Resource hinzufügen');
\define('_AM_WGTRANSIFEX_RESOURCE_EDIT', 'Ressource editieren');
\define('_AM_WGTRANSIFEX_RESOURCES_SHOW', 'Ressourcen anzeigen');
\define('_AM_WGTRANSIFEX_RESOURCES_SURE_DELETEALL', 'Willst Du wirklich alle Ressourcen und Übersetzungen von %s löschen?');
\define('_AM_WGTRANSIFEX_RESOURCES_UPLOADTX', 'Ressourcen zu Transifex hochladen');
\define('_AM_WGTRANSIFEX_RESOURCES_UPLOADTX_TEST', 'Teste Daten für Hochladen von Ressourcen zu Transifex');
\define('_AM_WGTRANSIFEX_RESOURCES_READM', 'Die Ressourcen von einem bestehenden Modul einlesen');
// Elements of Resource
\define('_AM_WGTRANSIFEX_RESOURCES_NB', 'Anzahl der Ressourcen');
\define('_AM_WGTRANSIFEX_RESOURCE_ID', 'Id');
\define('_AM_WGTRANSIFEX_RESOURCE_SOURCE_LANGUAGE_CODE', 'Quellsprachcode');
\define('_AM_WGTRANSIFEX_RESOURCE_NAME', 'Name');
\define('_AM_WGTRANSIFEX_RESOURCE_I18N_TYPE', 'I18n-Typ');
\define('_AM_WGTRANSIFEX_RESOURCE_PRIORITY', 'Priorität');
\define('_AM_WGTRANSIFEX_RESOURCE_SLUG', 'Slug');
\define('_AM_WGTRANSIFEX_RESOURCE_CATEGORIES', 'Kategorien');
\define('_AM_WGTRANSIFEX_RESOURCE_METADATA', 'Metadaten');
\define('_AM_WGTRANSIFEX_RESOURCE_DATE', 'Datum');
\define('_AM_WGTRANSIFEX_RESOURCE_SUBMITTER', 'Einsender');
\define('_AM_WGTRANSIFEX_RESOURCE_STATUS', 'Status');
\define('_AM_WGTRANSIFEX_RESOURCE_PRO_ID', 'Projekte');
// Setting add/edit
\define('_AM_WGTRANSIFEX_SETTING_ADD', 'Neue Einstellung hinzufügen');
\define('_AM_WGTRANSIFEX_SETTING_EDIT', 'Einstellung bearbeiten');
// Elements of Setting
\define('_AM_WGTRANSIFEX_SETTING_ID', 'Id');
\define('_AM_WGTRANSIFEX_SETTING_USERNAME', 'Benutzername');
\define('_AM_WGTRANSIFEX_SETTING_PASSWORD', 'Passwort');
\define('_AM_WGTRANSIFEX_SETTING_OPTIONS', 'Optionen');
\define('_AM_WGTRANSIFEX_SETTING_DATE', 'Datum');
\define('_AM_WGTRANSIFEX_SETTING_SUBMITTER', 'Einsender');
\define('_AM_WGTRANSIFEX_SETTING_PRIMARY', 'Primär');
\define('_AM_WGTRANSIFEX_SETTING_PRIMARY_DESC', "Typ 'Primär' sollte nur für Administratoren verwendet werden");
\define('_AM_WGTRANSIFEX_SETTING_REQUEST', 'Anfrage');
\define('_AM_WGTRANSIFEX_SETTING_REQUEST_DESC', "Wenn Du ein eigenes Transifex Konto für die Benutzeranfragen hast, dann verwende 'Anfrage'");
// Language add/edit
\define('_AM_WGTRANSIFEX_LANGUAGE_ADD', 'Sprache hinzufügen');
\define('_AM_WGTRANSIFEX_LANGUAGE_EDIT', 'Sprache bearbeiten');
// Elements of Language
\define('_AM_WGTRANSIFEX_LANGUAGE_ID', 'Id');
\define('_AM_WGTRANSIFEX_LANGUAGE_NAME', 'Name');
\define('_AM_WGTRANSIFEX_LANGUAGE_CODE', 'Code');
\define('_AM_WGTRANSIFEX_LANGUAGE_FOLDER', 'Ordner');
\define('_AM_WGTRANSIFEX_LANGUAGE_DATE', 'Datum');
\define('_AM_WGTRANSIFEX_LANGUAGE_SUBMITTER', 'Einsender');
\define('_AM_WGTRANSIFEX_LANGUAGE_ISO_639_1', 'Iso 639 1');
\define('_AM_WGTRANSIFEX_LANGUAGE_ISO_639_2', 'Iso 639 2');
\define('_AM_WGTRANSIFEX_LANGUAGE_FLAG', 'Flagge');
\define('_AM_WGTRANSIFEX_LANGUAGE_FLAG_UPLOADS', 'Existierende Flaggen im Uploadverzeichnis: %s');
\define('_AM_WGTRANSIFEX_LANGUAGE_PRIMARY', 'Primäre Sprache');
\define('_AM_WGTRANSIFEX_LANGUAGE_SETPRIMARY', 'Als primäre Sprache setzen');
\define('_AM_WGTRANSIFEX_LANGUAGE_ONLINE', 'Sprache Online');
\define('_AM_WGTRANSIFEX_LANGUAGE_SETONLINE', 'Auf Online setzen');
\define('_AM_WGTRANSIFEX_LANGUAGE_SETONLINE_ALL', 'Alle auf Online setzen');
\define('_AM_WGTRANSIFEX_LANGUAGE_SETOFFLINE', 'Offline setzen');
\define('_AM_WGTRANSIFEX_LANGUAGE_SETOFFLINE_ALL', 'Alle auf Offline setzen');
\define('_AM_WGTRANSIFEX_LANGUAGE_MENU', '%s Sprachpakete');
// Translation add/edit
\define('_AM_WGTRANSIFEX_TRANSLATION_ADD', 'Neue Übersetzung hinzufügen');
\define('_AM_WGTRANSIFEX_TRANSLATION_EDIT', 'Übersetzung bearbeiten');
\define('_AM_WGTRANSIFEX_TRANSLATIONS_SHOW', 'Übersetzungen anzeigen');
// Elements of Translation
\define('_AM_WGTRANSIFEX_TRANSLATIONS_NB', 'Anzahl der Übersetzungen');
\define('_AM_WGTRANSIFEX_TRANSLATION_ID', 'Id');
\define('_AM_WGTRANSIFEX_TRANSLATION_PRO_ID', 'Projekt');
\define('_AM_WGTRANSIFEX_TRANSLATION_RES_ID', 'Resourcen');
\define('_AM_WGTRANSIFEX_TRANSLATION_LANG_ID', 'Sprachen');
\define('_AM_WGTRANSIFEX_TRANSLATION_CONTENT', 'Inhalt');
\define('_AM_WGTRANSIFEX_TRANSLATION_MIMETYPE', 'Erweiterungen / Mimetypes');
\define('_AM_WGTRANSIFEX_TRANSLATION_LOCAL', 'Lokaler Pfad/Name');
\define('_AM_WGTRANSIFEX_TRANSLATION_STATUS', 'Status');
\define('_AM_WGTRANSIFEX_TRANSLATION_DATE', 'Datum');
\define('_AM_WGTRANSIFEX_TRANSLATION_SUBMITTER', 'Einsender');
\define('_AM_WGTRANSIFEX_TRANSLATION_STATS', 'Statistiken');
\define('_AM_WGTRANSIFEX_TRANSLATION_PROOFREAD', 'Gelesen und bestätigt');
\define('_AM_WGTRANSIFEX_TRANSLATION_PROOFREAD_PERC', 'Prozent gelesen und bestätigt');
\define('_AM_WGTRANSIFEX_TRANSLATION_REVIEWED', 'Kontrollgelesen');
\define('_AM_WGTRANSIFEX_TRANSLATION_REVIEWED_PERC', 'Prozent kontrollgelesen');
\define('_AM_WGTRANSIFEX_TRANSLATION_COMPLETED', 'Vervollständigt');
\define('_AM_WGTRANSIFEX_TRANSLATION_TRANSLATED_WORDS', 'Übersetzte Wörter');
\define('_AM_WGTRANSIFEX_TRANSLATION_UNTRANSLATED_WORDS', 'Nicht übersetzte Wörter');
//\define('_AM_WGTRANSIFEX_TRANSLATION_LAST_COMMITER', 'Einsender');
\define('_AM_WGTRANSIFEX_TRANSLATION_TRANSLATED_ENT', 'Übersetzte Einheiten');
\define('_AM_WGTRANSIFEX_TRANSLATION_UNTRANSLATED_ENT', 'Nicht übersetzte Einheiten');
\define('_AM_WGTRANSIFEX_TRANSLATION_LAST_UPDATE', 'Letztes Update');
// Package add/edit
\define('_AM_WGTRANSIFEX_PACKAGE_ADD', 'Neues Paket erstellen');
\define('_AM_WGTRANSIFEX_PACKAGE_EDIT', 'Paket bearbeiten');
// Elements of Package
\define('_AM_WGTRANSIFEX_PACKAGE_ID', 'Id');
\define('_AM_WGTRANSIFEX_PACKAGE_NAME', 'Name');
\define('_AM_WGTRANSIFEX_PACKAGE_DESC', 'Zusätzliche Infos');
\define('_AM_WGTRANSIFEX_PACKAGE_PRO_ID', 'Projekte');
\define('_AM_WGTRANSIFEX_PACKAGE_LANG_ID', 'Sprachen');
\define('_AM_WGTRANSIFEX_PACKAGE_DATE', 'Datum/Zeit');
\define('_AM_WGTRANSIFEX_PACKAGE_SUBMITTER', 'Einsender');
\define('_AM_WGTRANSIFEX_PACKAGE_STATUS', 'Status');
\define('_AM_WGTRANSIFEX_PACKAGE_VERSION', 'Version');
\define('_AM_WGTRANSIFEX_PACKAGE_VERSION_OUTDATED', 'Veraltete Version');
\define('_AM_WGTRANSIFEX_PACKAGE_VERSION_LAST', 'Letzte Version');
\define('_AM_WGTRANSIFEX_PACKAGE_ERROR_NODATA', 'Das gewünschte Projekt und/oder Sprache sind nicht verfügbar. Bitte zuerst herunterladen');
\define('_AM_WGTRANSIFEX_PACKAGE_ZIPFILE', 'Zip-Datei von Sprachpaket automatisch erstellen');
\define('_AM_WGTRANSIFEX_PACKAGE_ZIP', 'Name Zip-Datei');
\define('_AM_WGTRANSIFEX_PACKAGE_LOGO', 'Logo');
\define('_AM_WGTRANSIFEX_PACKAGE_LOGO_UPLOADS', 'Existierende Logos im Uploadverzeichnis: %s');
\define('_AM_WGTRANSIFEX_PACKAGE_DOWNLOAD', 'Willst Du die Dateien von Transifex herunterladen?');
\define('_AM_WGTRANSIFEX_PACKAGE_DOWNLOAD_DESC', 'Achtung: 
<ul><li>Wenn Ja: nicht existierende Ressourcen und Übersetzungen werden heruntergeladen / existierende Ressourcen und Übersetzungen werden überrschrieben!</li>
<li>Wenn Nein:  Ressourcen und Übersetzungen müssen vorher heruntergeladen worden sein, ansonsten ist das sprachpaket eventuell unvollständig!</li></ul>
');
// Broken
\define('_AM_WGTRANSIFEX_BROKEN_RESULT', 'Fehlerhafte Einträge in Tabelle %s');
\define('_AM_WGTRANSIFEX_BROKEN_NODATA', 'Keine fehlerhaften Einträge in Tabelle %s');
\define('_AM_WGTRANSIFEX_BROKEN_TABLE', 'Tabelle');
\define('_AM_WGTRANSIFEX_BROKEN_KEY', 'Schlüsselfeld');
\define('_AM_WGTRANSIFEX_BROKEN_KEYVAL', 'Schlüsselwert');
\define('_AM_WGTRANSIFEX_BROKEN_MAIN', 'Hauptinfo');
// Request add/edit
\define('_AM_WGTRANSIFEX_REQUEST_ADD', 'Anfrage hinzufügen');
\define('_AM_WGTRANSIFEX_REQUEST_EDIT', 'Anfrage bearbeiten');
// Elements of Request
\define('_AM_WGTRANSIFEX_REQUEST_ID', 'Id');
\define('_AM_WGTRANSIFEX_REQUEST_PROJECT', 'Projekte');
\define('_AM_WGTRANSIFEX_REQUEST_LANGUAGE', 'Sprachen');
\define('_AM_WGTRANSIFEX_REQUEST_STATUS', 'Status');
\define('_AM_WGTRANSIFEX_REQUEST_STATUSDATE', 'Datum/Zeit Status');
\define('_AM_WGTRANSIFEX_REQUEST_STATUSUID', 'Verantwortlicher Status');
\define('_AM_WGTRANSIFEX_REQUEST_DATE', 'Datum/Zeit');
\define('_AM_WGTRANSIFEX_REQUEST_SUBMITTER', 'Einsender');
\define('_AM_WGTRANSIFEX_REQUEST_PROJECT_NOTINLIST', '--- Nicht in der Liste ---');
\define('_AM_WGTRANSIFEX_REQUEST_INFO', 'Nicht in der Liste');
\define('_AM_WGTRANSIFEX_REQUEST_INFO_DESC', 'Wenn das gewünschte Projekt/Modul nicht in der List ist, dann bitte den entsprechenden Namen hier eingeben');
// General
\define('_AM_WGTRANSIFEX_FORM_UPLOAD', 'Datei hochladen');
\define('_AM_WGTRANSIFEX_FORM_UPLOAD_NEW', 'Neue Datei hochladen:');
\define('_AM_WGTRANSIFEX_FORM_UPLOAD_SIZE', 'Maximale Dateigröße:');
\define('_AM_WGTRANSIFEX_FORM_UPLOAD_SIZE_MB', 'MB');
\define('_AM_WGTRANSIFEX_FORM_UPLOAD_IMG_WIDTH', 'Maximale Bildbreite:');
\define('_AM_WGTRANSIFEX_FORM_UPLOAD_IMG_HEIGHT', 'Maximale Bildhöhe:');
\define('_AM_WGTRANSIFEX_FORM_IMAGE_PATH', 'Dateien in %s :');
\define('_AM_WGTRANSIFEX_FORM_ACTION', 'Aktion');
\define('_AM_WGTRANSIFEX_FORM_EDIT', 'Ändern');
\define('_AM_WGTRANSIFEX_FORM_DELETE', 'Löschen');
// Status
\define('_AM_WGTRANSIFEX_STATUS_NONE', 'Kein Status');
\define('_AM_WGTRANSIFEX_STATUS_OFFLINE', 'Offen');
\define('_AM_WGTRANSIFEX_STATUS_SUBMITTED', 'Eingereicht');
\define('_AM_WGTRANSIFEX_STATUS_APPROVED', 'Genehmigt');
\define('_AM_WGTRANSIFEX_STATUS_READTX', 'Lese Daten von Transifex');
\define('_AM_WGTRANSIFEX_STATUS_BROKEN', 'Defekt');
\define('_AM_WGTRANSIFEX_STATUS_CREATED', 'Sprachpaket verfügbar');
\define('_AM_WGTRANSIFEX_STATUS_ARCHIVED', 'Projekt wurde auf Transifex archiviert');
\define('_AM_WGTRANSIFEX_STATUS_DELETEDTX', 'Projekt befindet sich nicht auf Transifex');
\define('_AM_WGTRANSIFEX_STATUS_READTXNEW', 'Neu von Transifex');
\define('_AM_WGTRANSIFEX_STATUS_PENDING', 'Offen');
\define('_AM_WGTRANSIFEX_STATUS_OUTDATED', 'Veraltet');
\define('_AM_WGTRANSIFEX_STATUS_LOCAL', 'Lokale Daten');
// Project types
\define('_AM_WGTRANSIFEX_PROTYPE_NONE', 'Nicht definiert');
\define('_AM_WGTRANSIFEX_PROTYPE_MODULE', 'Upload von Modul');
\define('_AM_WGTRANSIFEX_PROTYPE_CORE', 'XOOPS Core');
// Upload to transifex
\define('_AM_WGTRANSIFEX_UPLOADTX_ERR_PROTYPE', 'Fehler: Projekt-Typ nicht definiert');
\define('_AM_WGTRANSIFEX_UPLOADTX_ERR_DIR', 'Fehler: Verzeichnis zum Lesen der Dateien nicht gefunden:');
\define('_AM_WGTRANSIFEX_UPLOADTX_SUMMARY', 'Zusammenfassung für Upload-Prozedur');
\define('_AM_WGTRANSIFEX_UPLOADTX_SUCCESS', 'Upload erfolgreich:');
\define('_AM_WGTRANSIFEX_UPLOADTX_ERRORS', 'Upload-Fehler:');
\define('_AM_WGTRANSIFEX_UPLOADTX_SKIPPED', 'Übersprungene Uploads: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_DETAILS', 'Details: ');
\define('_AM_WGTRANSIFEX_UPLOADTX_NOTSTARTED', 'Upload nicht gestartet');
\define('_AM_WGTRANSIFEX_UPLOADTX_FILENOTFOUND', 'Datei nicht gefunden:');
\define('_AM_WGTRANSIFEX_UPLOADTX_RESNOTEXISTS', 'Ressource existiert nicht:');
\define('_AM_WGTRANSIFEX_UPLOADTX_RESEXISTS', 'Ressource existiert bereits:');
\define('_AM_WGTRANSIFEX_UPLOADTX_RESEXISTSSKIP', 'Übersprungen - Ressource existiert bereits:');
\define('_AM_WGTRANSIFEX_UPLOADTX_FILEUPLOADED', 'Datei hochgeladen:');
\define('_AM_WGTRANSIFEX_UPLOADTX_FILEUPLOADSKIP', 'Datei-Upload übersprungen:');
\define('_AM_WGTRANSIFEX_UPLOADTX_CHECK_NOERRORS', 'Ende Überprüfung - keine Fehler gefunden');
\define('_AM_WGTRANSIFEX_UPLOADTX_MODULE', 'Quellmodul wählen');
// ---------------- Admin Others ----------------
\define('_AM_WGTRANSIFEX_MAINTAINEDBY', ' wird unterstützt von ');
\define('_AM_WGTRANSIFEX_NO_CURL', 'Dieses Module benötigt PHP curl functions. Bite aktivieren, da sonst der Download nicht funktioniert!');
// ---------------- End ----------------
\define('_AM_WGTRANSIFEX_ABOUT_MAKE_DONATION', 'Mache eine Spende um dieses Modul zu unterstützen');
\define('_AM_WGTRANSIFEX_MAINTAINED', '<strong>%s</strong> wird unterstützt von ');
\define('_AM_WGTRANSIFEX_SUPPORT_FORUM', 'Support Forum');
\define('_AM_WGTRANSIFEX_DONATION_AMOUNT', 'Spendenbetrag');
