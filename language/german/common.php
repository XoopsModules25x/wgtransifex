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
 *  wgTransifex Modul
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since           3.23
 * @author          Xoops Development Team
 */
$moduleDirName = \basename(dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);
\define('CO_' . $moduleDirNameUpper . '_GDLIBSTATUS', 'GD library support: ');
\define('CO_' . $moduleDirNameUpper . '_GDLIBVERSION', 'GD Library version: ');
\define('CO_' . $moduleDirNameUpper . '_GDOFF', "<span style='font-weight: bold;'>Deaktivieren</span> (Keine Vorschaubilder verfügbar)");
\define('CO_' . $moduleDirNameUpper . '_GDON', "<span style='font-weight: bold;'>Aktivieren</span> (Vorschaubilder verfügbar)");
\define('CO_' . $moduleDirNameUpper . '_IMAGEINFO', 'Server Status');
\define('CO_' . $moduleDirNameUpper . '_MAXPOSTSIZE', 'Maximal erlaubte Größe (Wert post_max_size in php.ini): ');
\define('CO_' . $moduleDirNameUpper . '_MAXUPLOADSIZE', 'Maximal erlaubte Uploadgröße (Wert upload_max_filesize in php.ini): ');
\define('CO_' . $moduleDirNameUpper . '_MEMORYLIMIT', 'Memory limit (Wert memory_limit in php.ini): ');
\define('CO_' . $moduleDirNameUpper . '_METAVERSION', "<span style='font-weight: bold;'>Downloads Meta Version:</span> ");
\define('CO_' . $moduleDirNameUpper . '_OFF', "<span style='font-weight: bold;'>AUS</span>");
\define('CO_' . $moduleDirNameUpper . '_ON', "<span style='font-weight: bold;'>EIN</span>");
\define('CO_' . $moduleDirNameUpper . '_SERVERPATH', 'Serverpfad zum XOOPS Root: ');
\define('CO_' . $moduleDirNameUpper . '_SERVERUPLOADSTATUS', 'Server Uploads Status: ');
\define('CO_' . $moduleDirNameUpper . '_SPHPINI', "<span style='font-weight: bold;'>Aus der Datei PHP.Ini enthaltene Information:</span>");
\define('CO_' . $moduleDirNameUpper . '_UPLOADPATHDSC', 'Beachte. Der Upload-Pfad *MUSS* den vollständigen Serverpfad zum Upload-Verzeichnis enthalten.');
\define('CO_' . $moduleDirNameUpper . '_PRINT', "<span style='font-weight: bold;'>Drucken</span>");
\define('CO_' . $moduleDirNameUpper . '_PDF', "<span style='font-weight: bold;'>PDF erstellen</span>");
\define('CO_' . $moduleDirNameUpper . '_UPGRADEFAILED0', "Update fehlgeschlagen - konnte Feld '%s' nicht umbenennen");
\define('CO_' . $moduleDirNameUpper . '_UPGRADEFAILED1', "Update fehlgeschlagen - konnte neues Feld '%s' nicht hinzufügen");
\define('CO_' . $moduleDirNameUpper . '_UPGRADEFAILED2', "Update fehlgeschlagen - konnte Tabelle '%s' nicht umbenennen");
\define('CO_' . $moduleDirNameUpper . '_ERROR_COLUMN', 'Konnte Feld in Datenbank nicht erstellen: %s');
\define('CO_' . $moduleDirNameUpper . '_ERROR_BAD_XOOPS', 'Dieses Modul benötigt XOOPS %s+ (%s installiert)');
\define('CO_' . $moduleDirNameUpper . '_ERROR_BAD_PHP', 'Dieses Modul benötigt PHP Version %s+ (%s installiert)');
\define('CO_' . $moduleDirNameUpper . '_ERROR_TAG_REMOVAL', 'Konnte Tags vom Modul Tags nicht entfernen');
\define('CO_' . $moduleDirNameUpper . '_FOLDERS_DELETED_OK', 'Upload-Ordner wurden gelöscht');
// Error Msgs
\define('CO_' . $moduleDirNameUpper . '_ERROR_BAD_DEL_PATH', 'Konnte Verzeichnis %s nicht löschen');
\define('CO_' . $moduleDirNameUpper . '_ERROR_BAD_REMOVE', 'Konnte %s nicht löschen');
\define('CO_' . $moduleDirNameUpper . '_ERROR_NO_PLUGIN', 'Konnte PlugIn nicht laden');
//Hilfe
\define('CO_' . $moduleDirNameUpper . '_DIRNAME', \basename(dirname(__DIR__, 2)));
\define('CO_' . $moduleDirNameUpper . '_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
\define('CO_' . $moduleDirNameUpper . '_BACK_2_ADMIN', 'Zurück zur Administration von');
\define('CO_' . $moduleDirNameUpper . '_OVERVIEW', 'Übersicht');
//\define('CO_' . $moduleDirNameUpper . '_HELP_DIR', __DIR__);
//help multi-page
\define('CO_' . $moduleDirNameUpper . '_DISCLAIMER', 'Disclaimer');
\define('CO_' . $moduleDirNameUpper . '_LICENSE', 'License');
\define('CO_' . $moduleDirNameUpper . '_SUPPORT', 'Support');
//Sample Data
\define('CO_' . $moduleDirNameUpper . '_' . 'ADD_SAMPLEDATA', 'Importe Beispieldaten (ALLE vorhandenen Daten werden gelöscht)');
\define('CO_' . $moduleDirNameUpper . '_' . 'SAMPLEDATA_SUCCESS', 'Beispieldaten erfolgreich geladen');
\define('CO_' . $moduleDirNameUpper . '_' . 'SAVE_SAMPLEDATA', 'Exportiere Tabellen nach YAML');
\define('CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON', 'Schaltfläche Import Beispieldaten anzeigen?');
\define('CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON_DESC', 'Falls Ja, dann wird die Schaltfläche "Importe Beispieldaten" im Adminbereich sichtbar. Diese Option ist nach der Installation standardmäßig aktiviert.');
\define('CO_' . $moduleDirNameUpper . '_' . 'EXPORT_SCHEMA', 'Exportiere DB Schema nach YAML');
\define('CO_' . $moduleDirNameUpper . '_' . 'EXPORT_SCHEMA_SUCCESS', 'Export DB Schema nach YAML erfolgreich abgeschlossen');
\define('CO_' . $moduleDirNameUpper . '_' . 'EXPORT_SCHEMA_ERROR', 'Fehler: Export DB Schema nach YAML fehlgeschlagen');
\define('CO_' . $moduleDirNameUpper . '_' . 'ADD_SAMPLEDATA_OK', 'Sind Sie sicher, Beispieldaten zu importieren? (ALLE vorhandenen Daten werden gelöscht)');
\define('CO_' . $moduleDirNameUpper . '_' . 'HIDE_SAMPLEDATA_BUTTONS', 'Schaltfläche Import verstecken');
\define('CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLEDATA_BUTTONS', 'Schaltfläche Import anzeigen');
\define('CO_' . $moduleDirNameUpper . '_' . 'CONFIRM', 'Bestätigen');
//letter choice
\define('CO_' . $moduleDirNameUpper . '_' . 'BROWSETOTOPIC', "<span style='font-weight: bold;'>Einträge alphabetisch anzeigen</span>");
\define('CO_' . $moduleDirNameUpper . '_' . 'OTHER', 'Andere');
\define('CO_' . $moduleDirNameUpper . '_' . 'ALL', 'Alle');
// block defines
\define('CO_' . $moduleDirNameUpper . '_' . 'ACCESSRIGHTS', 'Zugriffsberechtigungen');
\define('CO_' . $moduleDirNameUpper . '_' . 'ACTION', 'Aktion');
\define('CO_' . $moduleDirNameUpper . '_' . 'ACTIVERIGHTS', 'Aktive Berechtigungen');
\define('CO_' . $moduleDirNameUpper . '_' . 'BADMIN', 'Blockverwaltung');
\define('CO_' . $moduleDirNameUpper . '_' . 'BLKDESC', 'Beschreibung');
\define('CO_' . $moduleDirNameUpper . '_' . 'CBCENTER', 'Mitte Mitte');
\define('CO_' . $moduleDirNameUpper . '_' . 'CBLEFT', 'Mitte Links');
\define('CO_' . $moduleDirNameUpper . '_' . 'CBRIGHT', 'Mitte Rechts');
\define('CO_' . $moduleDirNameUpper . '_' . 'SBLEFT', 'Links');
\define('CO_' . $moduleDirNameUpper . '_' . 'SBRIGHT', 'Rechts');
\define('CO_' . $moduleDirNameUpper . '_' . 'SIDE', 'Ausrichtung');
\define('CO_' . $moduleDirNameUpper . '_' . 'TITLE', 'Titel');
\define('CO_' . $moduleDirNameUpper . '_' . 'VISIBLE', 'Sichtbar');
\define('CO_' . $moduleDirNameUpper . '_' . 'VISIBLEIN', 'Sichtbar in');
\define('CO_' . $moduleDirNameUpper . '_' . 'WEIGHT', 'Reihung');
\define('CO_' . $moduleDirNameUpper . '_' . 'PERMISSIONS', 'Berechtigungen');
\define('CO_' . $moduleDirNameUpper . '_' . 'BLOCKS', 'Blockverwaltung');
\define('CO_' . $moduleDirNameUpper . '_' . 'BLOCKS_DESC', 'Block- und Gruppenverwaltung');
\define('CO_' . $moduleDirNameUpper . '_' . 'BLOCKS_MANAGMENT', 'Management');
\define('CO_' . $moduleDirNameUpper . '_' . 'BLOCKS_ADDBLOCK', 'Neuen Block hinzufügen');
\define('CO_' . $moduleDirNameUpper . '_' . 'BLOCKS_EDITBLOCK', 'Block bearbeiten');
\define('CO_' . $moduleDirNameUpper . '_' . 'BLOCKS_CLONEBLOCK', 'Block klonen');
//myblocksadmin
\define('CO_' . $moduleDirNameUpper . '_' . 'AGDS', 'Administration Gruppen');
\define('CO_' . $moduleDirNameUpper . '_' . 'BCACHETIME', 'Cache Time');
\define('CO_' . $moduleDirNameUpper . '_' . 'BLOCKS_ADMIN', 'Blockverwaltung');
//Template Admin
\define('CO_' . $moduleDirNameUpper . '_' . 'TPLSETS', 'Template Management');
\define('CO_' . $moduleDirNameUpper . '_' . 'GENERATE', 'Generieren');
\define('CO_' . $moduleDirNameUpper . '_' . 'FILENAME', 'Dateiname');
//Menu
\define('CO_' . $moduleDirNameUpper . '_' . 'ADMENU_MIGRATE', 'Migirieren');
\define('CO_' . $moduleDirNameUpper . '_' . 'FOLDER_YES', 'Ordner "%s" existiert');
\define('CO_' . $moduleDirNameUpper . '_' . 'FOLDER_NO', 'Ordner "%s" existiert nicht. Erstelle diesen speziellen Ordner mit Rechten CHMOD 777.');
\define('CO_' . $moduleDirNameUpper . '_' . 'SHOW_DEV_TOOLS', 'Zeige Schaltfläche Entwicklerwerkzeuge?');
\define('CO_' . $moduleDirNameUpper . '_' . 'SHOW_DEV_TOOLS_DESC', 'Wenn ja dann wird das Tab "Migration" mit verschiedenen Entwicklertools im Adminbereich anzeigen.');
\define('CO_' . $moduleDirNameUpper . '_' . 'ADMENU_FEEDBACK', 'Feedback');
//Latest Version Check
\define('CO_' . $moduleDirNameUpper . '_' . 'NEW_VERSION', 'Neue Version: ');
//DirectoryChecker
\define('CO_' . $moduleDirNameUpper . '_' . 'AVAILABLE', "<span style='color: green;'>Verfügbar</span>");
\define('CO_' . $moduleDirNameUpper . '_' . 'NOTAVAILABLE', "<span style='color: red;'>Nicht verfügbar</span>");
\define('CO_' . $moduleDirNameUpper . '_' . 'NOTWRITABLE', "<span style='color: red;'>Sollte Berechtigung haben ( %d ), aber es hat ( %d )</span>");
\define('CO_' . $moduleDirNameUpper . '_' . 'CREATETHEDIR', 'Estelle es');
\define('CO_' . $moduleDirNameUpper . '_' . 'SETMPERM', 'Setze Berechtigung');
\define('CO_' . $moduleDirNameUpper . '_' . 'DIRCREATED', 'Das Verzeichnis wurde erstellt');
\define('CO_' . $moduleDirNameUpper . '_' . 'DIRNOTCREATED', 'Das Verzeichnis konnte nicht erstellt werden');
\define('CO_' . $moduleDirNameUpper . '_' . 'PERMSET', 'Berechtigung wurde gesetzt');
\define('CO_' . $moduleDirNameUpper . '_' . 'PERMNOTSET', 'Berechtigung konnte nicht gesetzt werden');
//FileChecker
//\define('CO_' . $moduleDirNameUpper . '_' . 'AVAILABLE', "<span style='color: green;'>Available</span>");
//\define('CO_' . $moduleDirNameUpper . '_' . 'NOTAVAILABLE', "<span style='color: red;'>Not available</span>");
//\define('CO_' . $moduleDirNameUpper . '_' . 'NOTWRITABLE', "<span style='color: red;'>Should have permission ( %d ), but it has ( %d )</span>");
//\define('CO_' . $moduleDirNameUpper . '_' . 'COPYTHEFILE', 'Copy it');
//\define('CO_' . $moduleDirNameUpper . '_' . 'CREATETHEFILE', 'Create it');
//\define('CO_' . $moduleDirNameUpper . '_' . 'SETMPERM', 'Set the permission');
\define('CO_' . $moduleDirNameUpper . '_' . 'FILECOPIED', 'Datei wurde kopiert');
\define('CO_' . $moduleDirNameUpper . '_' . 'FILENOTCOPIED', 'Datei konnte nicht kopiert werden');
//\define('CO_' . $moduleDirNameUpper . '_' . 'PERMSET', 'The permission has been set');
//\define('CO_' . $moduleDirNameUpper . '_' . 'PERMNOTSET', 'The permission cannot be set');
//image config
\define('CO_' . $moduleDirNameUpper . '_' . 'IMAGE_WIDTH', 'Breite Anzeige Bild');
\define('CO_' . $moduleDirNameUpper . '_' . 'IMAGE_WIDTH_DSC', 'Definiere Breite Anzeige Bild');
\define('CO_' . $moduleDirNameUpper . '_' . 'IMAGE_HEIGHT', 'Höhe Anzeige Bild');
\define('CO_' . $moduleDirNameUpper . '_' . 'IMAGE_HEIGHT_DSC', 'Definiere Höhe Anzeige Bild');
\define('CO_' . $moduleDirNameUpper . '_' . 'IMAGE_CONFIG', '<span style="color: #FF0000; font-size: Small;  font-weight: bold;">--- EXTERNE Bildkonfiguration ---</span> ');
\define('CO_' . $moduleDirNameUpper . '_' . 'IMAGE_CONFIG_DSC', '');
\define('CO_' . $moduleDirNameUpper . '_' . 'IMAGE_UPLOAD_PATH', 'Pfad Bilder-Upload');
\define('CO_' . $moduleDirNameUpper . '_' . 'IMAGE_UPLOAD_PATH_DSC', 'Pfad zum Verzeichnis für hochgeladene Bildern');
//Preferences
\define('CO_' . $moduleDirNameUpper . '_' . 'TRUNCATE_LENGTH', 'Anzahl Zeichen für das verkürzen von langen Texten');
\define('CO_' . $moduleDirNameUpper . '_' . 'TRUNCATE_LENGTH_DESC', 'Definiere die maximale Anzahl an Zeichen zum Kürzen von langen Texten');
//Module Stats
\define('CO_' . $moduleDirNameUpper . '_' . 'STATS_SUMMARY', 'Modul-Statistiken');
\define('CO_' . $moduleDirNameUpper . '_' . 'TOTAL_CATEGORIES', 'Kategorien:');
\define('CO_' . $moduleDirNameUpper . '_' . 'TOTAL_ITEMS', 'Einträge');
\define('CO_' . $moduleDirNameUpper . '_' . 'TOTAL_OFFLINE', 'Offline');
\define('CO_' . $moduleDirNameUpper . '_' . 'TOTAL_PUBLISHED', 'Veröffentlicht');
\define('CO_' . $moduleDirNameUpper . '_' . 'TOTAL_REJECTED', 'Zurückgewiesen');
\define('CO_' . $moduleDirNameUpper . '_' . 'TOTAL_SUBMITTED', 'Eingesendet');
//Xoops form Delete
\define('CO_' . $moduleDirNameUpper . '_DELETE_CONFIRM', 'Bestätigen Löschen');
\define('CO_' . $moduleDirNameUpper . '_DELETE_LABEL', 'Wollen Sie wirklich löschen:');
