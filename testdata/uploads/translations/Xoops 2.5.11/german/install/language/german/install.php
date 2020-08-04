<?php
/**
 * Installer main english strings declaration file
 *
 * @copyright    (c) 2000-2016 XOOPS Project (www.xoops.org)
 * @license          GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package          installer
 * @since            2.3.0
 * @author           Haruki Setoyama  <haruki@planewave.org>
 * @author           Kazumi Ono <webmaster@myweb.ne.jp>
 * @author           Skalpa Keo <skalpa@xoops.org>
 * @author           Taiwen Jiang <phppp@users.sourceforge.net>
 * @author           dugris <dugris@frxoops.org>
 */
// _LANGCODE: en
// _CHARSET : UTF-8
// Translator: XOOPS Translation Team
define('SHOW_HIDE_HELP', 'Anzeigen/Ausblenden des Hilfe-Textes');
// License
define('LICENSE_NOT_WRITEABLE', 'Lizenzdatei "%s" ist NICHT beschreibbar!');
define('LICENSE_IS_WRITEABLE', 'Lizenz ist %s beschreibbar.');
// Configuration check page
define('SERVER_API', 'Server API');
define('PHP_EXTENSION', '%s Erweiterung');
define('CHAR_ENCODING', 'Zeichencodierung');
define('XML_PARSING', 'XML Parser');
define('REQUIREMENTS', 'Anforderungen');
define('_PHP_VERSION', 'PHP Version');
define('RECOMMENDED_SETTINGS', 'Empfohlene Einstellungen');
define('RECOMMENDED_EXTENSIONS', 'Empfohlene Erweiterungen');
define('SETTING_NAME', 'Name Einstellung');
define('RECOMMENDED', 'empfohlen');
define('CURRENT', 'Aktuell');
define('RECOMMENDED_EXTENSIONS_MSG', 'Diese Erweiterungen sind für den normalen Gebrauch nicht zwingend notwendig,
 könnten aber bei bestimmten Zusatzfunktionen (wie multi-language oder RSS Unterstützung) benötigt werden. Es empfiehlt sich deswegen diese zu installieren.');
define('NONE', 'Nein');
define('SUCCESS', 'Erfolgreich');
define('WARNING', 'Warnung');
define('FAILED', 'Fehlgeschlagen');
// Titles (main and pages)
define('XOOPS_INSTALL_WIZARD', 'XOOPS Installations-Assistent');
define('LANGUAGE_SELECTION', 'Sprachauswahl');
define('LANGUAGE_SELECTION_TITLE', 'Bitte wählen Sie Ihre Sprache aus');        // L128
define('INTRODUCTION', 'Einleitung');
define('INTRODUCTION_TITLE', 'Wilkommen beim XOOPS Installations-Assistenten!');        // L0
define('CONFIGURATION_CHECK', 'Überprüfung der Konfiguration');
define('CONFIGURATION_CHECK_TITLE', 'Überprüfung der Serverkonfiguration');
define('PATHS_SETTINGS', 'Pfadeinstellungen');
define('PATHS_SETTINGS_TITLE', 'Pfadeinstellungen');
define('DATABASE_CONNECTION', 'Datenbankverbindung');
define('DATABASE_CONNECTION_TITLE', 'Datenbankverbindung');
define('DATABASE_CONFIG', 'Datenbankeinstellungen');
define('DATABASE_CONFIG_TITLE', 'Datenbankeinstellungen');
define('CONFIG_SAVE', 'Konfiguration speichern');
define('CONFIG_SAVE_TITLE', 'Die Systemeinstellungen werden gespeichert.');
define('TABLES_CREATION', 'Tabellenerstellung');
define('TABLES_CREATION_TITLE', 'Erstellung der Datenbank-Tabellen');
define('INITIAL_SETTINGS', 'Ausgangseinstellungen');
define('INITIAL_SETTINGS_TITLE', 'Bitte geben Sie die Einstellungen für den Administrator-Account an.');
define('DATA_INSERTION', 'Daten einfügen');
define('DATA_INSERTION_TITLE', 'Einstellungen in der Datenbank speichern');
define('WELCOME', 'Willkommen');
define('WELCOME_TITLE', 'Willkommen auf Ihrer XOOPS-Seite!');        // L0
// Settings (labels and help text)
define('XOOPS_PATHS', 'XOOPS Physikalische Pfade');
define('XOOPS_URLS', 'Webverzeichnisse');
define('XOOPS_ROOT_PATH_LABEL', 'XOOPS Dokumentroot (physikalischer Pfad)');
define('XOOPS_ROOT_PATH_HELP', 'Physikalischer Pfad zum XOOPS Dokumentverzeichnis (ohne abschliessenden Slash)');
define('XOOPS_LIB_PATH_LABEL', 'XOOPS Bibliotheksverzeichnis');
define('XOOPS_LIB_PATH_HELP', 'Physical path to the XOOPS library directory WITHOUT trailing slash, for forward compatibility. Locate the folder out of ' . XOOPS_ROOT_PATH_LABEL . ' to make it secure.');
define('XOOPS_DATA_PATH_LABEL', 'XOOPS Verzeichnis Datendatei');
define('XOOPS_DATA_PATH_HELP', 'Physical path to the XOOPS data files (writable) directory WITHOUT trailing slash, for forward compatibility. Locate the folder out of ' . XOOPS_ROOT_PATH_LABEL . ' to make it secure.');
define('XOOPS_URL_LABEL', 'Webseiten-Adresse (URL)'); // L56
define('XOOPS_URL_HELP', 'Die Haupt-URL unter der diese XOOPS-Installation laufen soll'); // L58
define('LEGEND_CONNECTION', 'Serververbindung');
define('LEGEND_DATABASE', 'Datenbank'); // L51
define('DB_HOST_LABEL', 'Server Hostname');    // L27
define('DB_HOST_HELP', 'Hostname des Datenbankservers. Wenn Sie unsicher sind, <em>localhost</em> funktioniert in den meisten Fällen'); // L67
define('DB_USER_LABEL', 'Benutzername');    // L28
define('DB_USER_HELP', 'Name des Useraccount, welcher für die Verbindung zum Datenbankserver verwendet wird'); // L65
define('DB_PASS_LABEL', 'Passwort');    // L52
define('DB_PASS_HELP', 'Passwort des Datenbankusers'); // L68
define('DB_NAME_LABEL', 'Datenbankname');    // L29
define('DB_NAME_HELP', 'Der Name der Datenbank. Der Installations-Assistent prüft, ob diese vorhanden ist. Gegebenenfalls wird diese angelegt, sofern sie nicht existiert'); // L64
define('DB_CHARSET_LABEL', 'Datenbank Zeichensatz');
define('DB_CHARSET_HELP', 'MySQL unterstützt verschiedene Zeichensätze,  wodurch das Speichern mit den verschiedenen Zeichensätzen sowie ein performanter Zeichenvergleich möglich wird.');
define('DB_COLLATION_LABEL', 'Datenbank Textvergleich');
define('DB_COLLATION_HELP', 'Der Textvergleich der Datenbank eine Reihe von Regeln zum Vergleichen von Zeichensätzen.');
define('DB_PREFIX_LABEL', 'Tabellen-Präfix');    // L30
define('DB_PREFIX_HELP', 'Der Präfix, der den Tabellen bei der Neuerstellung vorangestellt wird, um Namenskonflikte in Ihrer Datenbank zu vermeiden. Wenn Sie unsicher sind, belassen Sie die Voreinstellung'); // L63
define('DB_PCONNECT_LABEL', 'Ständige Verbindung verwenden?');    // L54
define('DB_PCONNECT_HELP', "Standardeinstellung ist 'Nein'. Stellen Sie auf  'Ja', wenn Sie eine dauerhafte Verbindung zur Datenbank benötigen. Wenn Sie sich nicht sicher sind, dann belassen Sie die Standardeinstellung"); // L69
define('DB_DATABASE_LABEL', 'Datenbank');
define('LEGEND_ADMIN_ACCOUNT', 'Administrator Account');
define('ADMIN_LOGIN_LABEL', 'Administrator Login'); // L37
define('ADMIN_EMAIL_LABEL', 'Administrator E-Mail'); // L38
define('ADMIN_PASS_LABEL', 'Administrator Passwort'); // L39
define('ADMIN_CONFIRMPASS_LABEL', 'Passwort bestätigen'); // L74
// Buttons
define('BUTTON_PREVIOUS', 'Vorherige'); // L42
define('BUTTON_NEXT', 'Weiter'); // L47
// Messages
define('XOOPS_FOUND', '%s gefunden');
define('CHECKING_PERMISSIONS', 'Überprüfe Datei- und Ordnerberechtigungen ...'); // L82
define('IS_NOT_WRITABLE', '%s ist NICHT beschreibbar.'); // L83
define('IS_WRITABLE', '%s ist beschreibbar.'); // L84
define('XOOPS_PATH_FOUND', 'Pfad gefunden.');
//define('READY_CREATE_TABLES', 'Es wurden keine XOOPS Tabellen gefunden.<br>Der Installations-Assistent wird nun die XOOPS System Tabellen erstellen.');
define('XOOPS_TABLES_FOUND', 'Die XOOPS System Tabellen existieren bereits in Ihrer Datenbank.'); // L131
define('XOOPS_TABLES_CREATED', 'Die XOOPS System Tabellen wurden erstellt.');
//define('READY_INSERT_DATA', 'Der Installations-Assistent ist nun bereit, die Standarddaten in Ihre Datenbank zu schreiben.');
//define('READY_SAVE_MAINFILE', 'Der Installations-Assistent ist nun bereit, die Einstellungen in der <em>mainfile.php</em> zu speichern.');
define('SAVED_MAINFILE', 'Die Einstellungen wurden in der mainfile.php gespeichert!');
define('SAVED_MAINFILE_MSG', 'Der Installations-Assistent hat die Einstellungen in der  <em>mainfile.php</em> und <em>secure.php</em> gepeichert.');
define('DATA_ALREADY_INSERTED', 'XOOPS-Daten in der Datenbank gefunden.');
define('DATA_INSERTED', 'Die Standarddaten wurden in die Datenbank eingefügt. ');
// %s is database name
define('DATABASE_CREATED', 'Datenbank %s wurde erstellt!'); // L43
// %s is table name
define('TABLE_NOT_CREATED', 'Tabelle %s konnte nicht erstellt werden'); // L118
define('TABLE_CREATED', 'Tabelle %s erstellt.'); // L45
define('ROWS_INSERTED', '%d Einträge wurden in die Tabelle %s geschrieben.'); // L119
define('ROWS_FAILED', 'Fehler beim Schreiben von %d Einträgen in die Tabelle %s.'); // L120
define('TABLE_ALTERED', 'Tabelle %s wurde aktualisiert.'); // L133
define('TABLE_NOT_ALTERED', 'Fehler beim Aktualisieren der Tabelle %s.'); // L134
define('TABLE_DROPPED', 'Tabelle %s wurde gelöscht.'); // L163
define('TABLE_NOT_DROPPED', 'Fehler beim Löschen der Tabelle %s.'); // L164
// Error messages
define('ERR_COULD_NOT_ACCESS', 'Auf den angegebenen Ordner konnte nicht zugegriffen werden. Bitte vergewissern Sie sich, dass er existiert und vom Server gelesen werden kann.');
define('ERR_NO_XOOPS_FOUND', 'Es konnte keine XOOPS Installation im angegebenen Ordner gefunden werden.');
define('ERR_INVALID_EMAIL', 'Ungültige E-Mail-Adresse'); // L73
define('ERR_REQUIRED', 'Information ist erforderlich.'); // L41
define('ERR_PASSWORD_MATCH', 'Die beiden Passwörter stimmen nicht überein');
define('ERR_NEED_WRITE_ACCESS', 'Der Server muss Schreibrechte auf die folgenden Ordner bzw. Dateien besitzen <br>(z.B. <em>chmod 775 Ordner_name</em> auf einem UNIX/LINUX server)<br>Wenn diese nicht vorhanden sind oder nicht ordnungsgemäss erstellt wurden, erstellen Sie diese bitte manuell und vergeben anschliessend die entsprechenden Rechte. ');
define('ERR_NO_DATABASE', 'Es konnte keine Datenbank erstellt werden. Bitte kontaktieren Sie Ihren Server-Administrator für weitere Details.'); // L31
define('ERR_NO_DBCONNECTION', 'Es konnte keine Verbindung zum Datenbankserver hergestellt werden.'); // L106
define('ERR_WRITING_CONSTANT', 'Fehler beim Schreiben der Konstante %s.'); // L122
define('ERR_COPY_MAINFILE', 'Die mainfile.php konnte nicht nach %s kopiert werden. ');
define('ERR_WRITE_MAINFILE', 'Die %s konnte nicht beschrieben werden. Bitte prüfen und ändern Sie ggf. die Dateiattribute und versuchen Sie es erneut. ');
define('ERR_READ_MAINFILE', 'Die %s konnte nicht zum Lesen geöffnet werden');
define('ERR_INVALID_DBCHARSET', "Der Zeichensatz '%s' wird nicht unterstützt.");
define('ERR_INVALID_DBCOLLATION', "Die Zeichenvergleichsmethode '%s' ist nicht verfügbar.");
define('ERR_CHARSET_NOT_SET', 'Standard-Zeichensatz ist nicht für XOOPS-Datenbank eingerichtet.');
define('_INSTALL_CHARSET', 'UTF-8');
define('SUPPORT', 'Support');
define('LOGIN', 'Anmeldung');
define('LOGIN_TITLE', 'Anmeldung');
define('USER_LOGIN', 'Administrator Login');
define('USERNAME', 'Benutzername:');
define('PASSWORD', 'Passwort :');
define('ICONV_CONVERSION', 'Zeichensatz Konvertierung');
define('ZLIB_COMPRESSION', 'Zlib Kompression');
define('IMAGE_FUNCTIONS', 'Image Funktionen');
define('IMAGE_METAS', 'Image meta data (exif)');
define('FILTER_FUNCTIONS', 'Filterfunktionen');
define('ADMIN_EXIST', 'Das Administratorkonto ist bereits vorhanden.');
define('CONFIG_SITE', 'Seitenkonfiguration');
define('CONFIG_SITE_TITLE', 'Seitenkonfiguration');
define('MODULES', 'Modulinstallation');
define('MODULES_TITLE', 'Modulinstallation');
define('THEME', 'Theme wählen');
define('THEME_TITLE', 'Wählen Sie Ihr Theme aus');
define('INSTALLED_MODULES', 'Das folgende Modul wurde installiert.');
define('NO_MODULES_FOUND', 'Keine Module gefunden');
define('NO_INSTALLED_MODULES', 'Es sind keine Module installiert.');
define('THEME_NO_SCREENSHOT', 'Kein Vorschaubild gefunden');
define('IS_VALOR', ' => ');
// password message
define('PASSWORD_LABEL', 'Passwort Stärke');
define('PASSWORD_DESC', 'Passwort nicht eingegeben');
define('PASSWORD_GENERATOR', 'Passwort-Generator');
define('PASSWORD_GENERATE', 'Erzeuge');
define('PASSWORD_COPY', 'Kopieren');
define('PASSWORD_VERY_WEAK', 'Sehr schwach');
define('PASSWORD_WEAK', 'Schwach');
define('PASSWORD_BETTER', 'besser');
define('PASSWORD_MEDIUM', 'Mittel');
define('PASSWORD_STRONG', 'Stark');
define('PASSWORD_STRONGEST', 'Sehr stark');
//2.5.7
define('WRITTEN_LICENSE', 'Erstellter XOOPS %s Lizenzschlüssel: <strong>%s</strong>');
//2.5.8
define('CHMOD_CHGRP_REPEAT', 'Erneut versuchen');
define('CHMOD_CHGRP_IGNORE', 'Auf jeden Fall verwenden');
define('CHMOD_CHGRP_ERROR', 'Das Installationsprogramm ist vielleicht nicht in der Lage die Konfigurationsdatei %1$s zu erstellen.<p>PHP erstellt die Dateien als User %2$s und Gruppe %3$s.<p>Das Verzeichnis %4$s/ hat User %5$s und Gruppe %6$s');
//2.5.9
define("CURL_HTTP", "Client URL Library (cURL)");
define('XOOPS_COOKIE_DOMAIN_LABEL', 'Cookie Domain für Ihre Website');
define('XOOPS_COOKIE_DOMAIN_HELP', 'Domain zum Setzen von Cookies. Darf leer sein, dann wird der vollständige URL (www.example.com) oder die registrierte Domain ohne Subdomain (example.com) bei subdomainübergreifenden Zugriffen (www.example.com and blog.example.com.) verwendet.');
define('INTL_SUPPORT', 'Internationalisierungsfunktionen');
define('XOOPS_SOURCE_CODE', "XOOPS auf GitHub");
define('XOOPS_INSTALLING', 'Installieren ');
define('XOOPS_ERROR_ENCOUNTERED', 'Fehler');
define('XOOPS_ERROR_SEE_BELOW', 'Siehe nachfolgende Nachrichten.');
define('MODULES_AVAILABLE', 'Verfügbare Module');
define('INSTALL_THIS_MODULE', 'Hinzufügen %s');
