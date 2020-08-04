<?php
// _LANGCODE: de
// _CHARSET : UTF-8
// Translator: XOOPS Translation Team

define('LEGEND_XOOPS_PATHS', 'XOOPS Physischer Pfad');
define('LEGEND_DATABASE', 'Datenbank Zeichensatz');

define('XOOPS_LIB_PATH_LABEL', 'XOOPS Library Verzeichnis');
define('XOOPS_LIB_PATH_HELP', 'Physischer Pfad zum XOOPS Library Verzeichnis OHNE nachfolgenden Schrägstrich. Platzieren Sie das Verzeichnis außerhalb von ' . XOOPS_ROOT_PATH . ' um die Sicherheit zu erhöhen.');
define('XOOPS_DATA_PATH_LABEL', 'XOOPS Datenfiles Verzeichnis ');
define('XOOPS_DATA_PATH_HELP', 'Physischer Pfad zum XOOPS Datenfiles Verzeichnis (beschreibbar) OHNE nachfolgenden Schrägstrich. Platzieren Sie das Verzeichnis außerhalb von ' . XOOPS_ROOT_PATH . ' um die Sicherheit zu erhöhen.');

define('DB_COLLATION_LABEL', 'Database character set and collation');
define('DB_COLLATION_HELP', "Seit 4.12 MySQL sind benutzerdefinierte  Character Sets und Collation. Da dies ein sehr komplexes Thema ist wird empfohlen, dass Sie KEINE Änderungen durchführen, wenn Sie nicht genau wissen, was diese bewirken können.");
define('DB_COLLATION_NOCHANGE', 'Nicht ändern');

define('XOOPS_PATH_FOUND', 'Pfad gefunden.');
define('ERR_COULD_NOT_ACCESS', 'Konnte auf spezielles Verzeichnis nicht zugreifen. Bitte überprüfen Sie, ob es existiert und ob Leserechte seitens des Servers vergeben wurden.');
define('CHECKING_PERMISSIONS', 'Überprüfe Datei- und Verzeichnisberechtigungen...');
define('ERR_NEED_WRITE_ACCESS', 'Der Server muss Schreibrechte auf folgende Dateien und Verzeichnisse zulassen<br>(z.B. <em>chmod 777 directory_name</em> auf einen  UNIX/LINUX Server)');
define('IS_NOT_WRITABLE', '%s ist NICHT beschreibbar.');
define('IS_WRITABLE', '%s ist beschreibbar.');
define('ERR_COULD_NOT_WRITE_MAINFILE', 'Fehler beim Ändern des Inhaltes der mainfile.php, Schreiben Sie den erforderlichen Inhalt manuell in Ihre mainfile.php.');