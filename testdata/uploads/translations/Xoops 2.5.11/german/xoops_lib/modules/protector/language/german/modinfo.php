<?php

if (defined('FOR_XOOPS_LANG_CHECKER')) {
    $mydirname = 'protector';
}
$constpref = '_MI_' . strtoupper($mydirname);

if (defined('FOR_XOOPS_LANG_CHECKER') || !defined($constpref . '_LOADED')) {
    define($constpref . '_LOADED', 1);

    // The name of this module
    define($constpref . '_NAME', 'Protector');

    // A brief description of this module
define($constpref . '_DESC', 'Diese Module schützt Ihre Seite vor verschiedenen Angriffen z.B. DoS , SQL Injection und Variablencontamination.');

    // Menu
    define($constpref . '_ADMININDEX', 'Protector Center');
define($constpref . '_ADVISORY', 'Sicherheitsberatung');
define($constpref . '_PREFIXMANAGER', 'Präfix-Manager');
define($constpref . '_ADMENU_MYBLOCKSADMIN', 'Berechtigungen');

    // Configs
define($constpref . '_GLOBAL_DISBL', 'Vorübergehend deaktiviert');
define($constpref . '_GLOBAL_DISBLDSC', 'Alle Sicherheitsfunktionen sind vorübergehend deaktiviert.<br>Vergessen Sie nicht, diese nach der Problembehandlung wieder einzuschalten');

define($constpref . '_DEFAULT_LANG', 'Standardsprache');
define($constpref . '_DEFAULT_LANGDSC', 'Geben Sie die Sprache fur die Anzeige von Nachrichten bei der Verarbeitung der common.php an.');

define($constpref . '_RELIABLE_IPS', 'Sichere IPs');
define($constpref . '_RELIABLE_IPSDSC', 'Sie konnen IP Adressen mit einem | trennen. ^ setzt den Kopf des String, $ setzt das Ende des Strings.');

define($constpref . '_LOG_LEVEL', 'Berichtsstufe');
    define($constpref . '_LOG_LEVELDSC', '');

define($constpref . '_BANIP_TIME0', 'Blockadezeit von gesperrten IPs (in Sekunden)');

define($constpref . '_LOGLEVEL0', 'keine');
define($constpref . '_LOGLEVEL15', 'Still');
define($constpref . '_LOGLEVEL63', 'still');
define($constpref . '_LOGLEVEL255', 'voll');

define($constpref . '_HIJACK_TOPBIT', 'Geschützte IP-Bits für eine Session');
define($constpref . '_HIJACK_TOPBITDSC', 'Anti Session Hi-Jacking:<br>Default 24/56 (netmask for IPV4/IPV6). (Alle Bits sind geschützt)<br>Wenn Sie keine statische IP verwenden, setzen Sie den IP-Bereich entsprechend der Anzahl an Bits <br>(z.B.) Wenn Ihre IP von 192.168.0.0 bis 192.168.0.255 schwankt, dann setzen Sie hier 24(bit)');
define($constpref . '_HIJACK_DENYGP', 'Gruppen denen das andern der IP innerhalb einer Session untersagt wird');
define($constpref . '_HIJACK_DENYGPDSC', 'Anti Session Hi-Jacking:<br>Wählen Sie die Gruppen, denen es erlaubt ist, während einer Session die IP zu wechseln.<br>(Es wird empfohlen, dies zumindest beim Administrator zu aktivieren.)');
define($constpref . '_SAN_NULLBYTE', 'Sanitizing (Säuberung) null-bytes');
define($constpref . '_SAN_NULLBYTEDSC', 'Das abschliessende Zeichen "\\0" wird oft bei bösartigen Hackerattacken verwendet.<br>Ein Null-byte wird daher in ein Leerzeichen verwandelt.<br>(Die Aktivierung wird nachdrücklich empfohlen)');
define($constpref . '_DIE_NULLBYTE', 'Beenden wenn Null-bytes gefunden werden');
define($constpref . '_DIE_NULLBYTEDSC', 'Das abschliessende Zeichen "\\0" wird oft bei bösartigen Hackerattacken verwendet.<br>(AN wird nachdrücklich empfohlen)');
define($constpref . '_DIE_BADEXT', 'Beenden, wenn unzulässige Dateien hochgeladen werden');
define($constpref . '_DIE_BADEXTDSC', 'Wenn jemand versucht, Dateien mit problematischen Dateiendungen, wie z.B. .php, hochzuladen, dann wird Ihr XOOPS davor bewahrt.<br>Wenn Sie öfters php-Dateien z.B. bei einem B-Wiki oder PukiWikiMod anhängen wollen, dann müssen Sie diese Funktion deaktivieren.');
define($constpref . '_CONTAMI_ACTION', 'Maßnahmen, wenn eine Verunreinigung gefunden wurde');
define($constpref . '_CONTAMI_ACTIONDS', 'Wählen Sie die Aktion, wenn jemand versucht, Ihr XOOPS mit globalen Systemvariablen zu contaminieren.<br>(empfohlene Option ist Weißer Bildschirm)');
define($constpref . '_ISOCOM_ACTION', 'Maßnahmen, wenn eine isolierte Einkommentierung gefunden wurde');
define($constpref . '_ISOCOM_ACTIONDSC', 'Anti SQL Injection:<br>Wählen Sie die Aktion, wenn ein einzelnes "/*" gefunden wird.<br>"Sanitizing" bedeutet, dass ein weiteres "*/" am Ende angefügt wird.<br>(empfohlene Option ist Sanitizing - Säuberung)');
define($constpref . '_UNION_ACTION', 'Massnahme wenn ein UNION gefunden wurde');
define($constpref . '_UNION_ACTIONDSC', 'Anti SQL Injection:<br>Wählen Sie die Aktion, wenn ein SQL-Syntax wie UNION enthalten ist.<br>"Sanitizing" bedeutet, dass "union" in "uni-on" gewändert wird.<br>(empfohlene Option ist Sanitizing - Säuberung)');
define($constpref . '_ID_INTVAL', 'Erzwinge intval für Variablen wie IDs');
define($constpref . '_ID_INTVALDSC', 'Alle Anfragen mit Name "*id" werden als Zahl behandelt.<br>Diese Option schützt vor einigen Arten der XSS-(Cross Site Scripting-) und SQL-Injection-Attacken.<br>Es wird empfohlen, diese Option zu aktivieren, obwohl es bei manchen Modulen Probleme verursachen kann.');
define($constpref . '_FILE_DOTDOT', 'Schutz vor Verzeichnisabfragen');
define($constpref . '_FILE_DOTDOTDSC', 'Eliminiert alle ".." aus Anfragen, die nach Dateien suchen');

define($constpref . '_BF_COUNT', 'Anti Brute Force');
define($constpref . '_BF_COUNTDSC', 'Setzt die Anzahl der Anmeldeversuchen von Gästen innerhalb 10 Minuten. Wenn die Anzahl von Loginversuchen erreicht ist, wird die IP auf die Liste der schlechten IPs gesetzt.');

define($constpref . '_BWLIMIT_COUNT', 'Bandbreitenbegrenzung');
define($constpref . '_BWLIMIT_COUNTDSC', 'Geben Sie die maximalen Zugriffe zur mainfile.php an während der Überwachungszeit. Dieser Wert sollte 0 sein für eine normale Umgebung, die über genügend CPU-Bandbreite verfügen. Die Zahlen weniger als 10 werden ignoriert.');

define($constpref . '_DOS_SKIPMODS', 'Module die nicht auf DoS/Crawler geprüft werden');
define($constpref . '_DOS_SKIPMODSDSC', 'Geben Sie die Verzeichnisnamen der Module an, getrennt durch ein |. Diese Option ist bei Chatmodulen etc. hilfreich');

define($constpref . '_DOS_EXPIRE', 'Beobachtungszeit für Serverbelastung (in Sekunden)');
define($constpref . '_DOS_EXPIREDSC', 'Dieser Wert gibt das Zeitlimit für rasch wiederholte Reloads der Seite (F5 Attacke) und für Suchmaschinen mit zu hoher Belastung an.');

define($constpref . '_DOS_F5COUNT', 'Anzahl als schädlich eingestufter Seitenwiederaufrufe F5');
define($constpref . '_DOS_F5COUNTDSC', 'Beschützt vor DoS Attacken.<br>Dieser Wert bestimmt die Anzahl der neuerlichen Seitenaufrufe innerhalb eines bestimmten Zeitraumes, was einen bösartigen Angriff bedeuten könnte.');
define($constpref . '_DOS_F5ACTION', 'Maßnahmen gegen F5 Attacke');

define($constpref . '_DOS_CRCOUNT', 'Anzahl der als schädlich eingestufter Suchmaschinen-Abfragen');
define($constpref . '_DOS_CRCOUNTDSC', 'Beschützt vor hochbelastenden Crawlern.<br>Dieser Wert bestimmt die Anzahl der Zugriff, um als schlechter Crawler eingestuft zu werden.');
define($constpref . '_DOS_CRACTION', 'Maßnahmen gegen server-intensive Suchmaschinen');

define($constpref . '_DOS_CRSAFE', 'Willkommene Suchmaschinen');
define($constpref . '_DOS_CRSAFEDSC', 'Ein perl regex Muster für Suchmaschinen.<br>Wenn dies zutrifft, dann wird der Crawler niemals als serverbelastend eingestuft, <br>z.B.) /(bingbot|Googlebot|Yahoo! Slurp)/i');

define($constpref . '_OPT_NONE', 'Keine (nur Logging)');
define($constpref . '_OPT_SAN', 'Sanitizing - Säuberung');
define($constpref . '_OPT_EXIT', 'Weisser Bildschirm');
define($constpref . '_OPT_BIP', 'IP sperren (ohne Einschränkung)');
define($constpref . '_OPT_BIPTIME0', 'IP sperren (Aufschub)');

define($constpref . '_DOSOPT_NONE', 'Keine (nur Logging)');
define($constpref . '_DOSOPT_SLEEP', 'Schlafen');
define($constpref . '_DOSOPT_EXIT', 'Weisser Bildschirm');
define($constpref . '_DOSOPT_BIP', 'IP sperren (ohne Einschränkung)');
define($constpref . '_DOSOPT_BIPTIME0', 'IP sperren (Aufschub)');
define($constpref . '_DOSOPT_HTA', 'DENY durch .htaccess (Experimental)');

define($constpref . '_BIP_EXCEPT', 'Gruppen, die niemals als schlechte IP eingestuft werden sollen');
define($constpref . '_BIP_EXCEPTDSC', 'Ein User, der in dieser Gruppe ist, wird niemals eine IP-Sperre erhalten.<br>(Empfohlen wird, die Administartor-Gruppe anzugeben.)');

define($constpref . '_DISABLES', 'Deaktiviere gefährliche Funktionen in XOOPS');

define($constpref . '_DBLAYERTRAP', 'Aktiviere DB Layer trapping anti-SQL-Injection');
define($constpref . '_DBLAYERTRAPDSC', 'Beinahe alle SQL-Injection-Attacken werden durch diese Funktion beendet. Diese Funktion benötigt die Unterstützung durch Databasefactory. Sie können dies bei der Sicherheitsberatung überprüfen. Schalten Sie dies niemals grundlos aus.');
define($constpref . '_DBTRAPWOSRV', 'Niemals _SERVER auf Anti-SQL-Injection überprüfen');
define($constpref . '_DBTRAPWOSRVDSC', 'Einige Server erlauben DB Layer trapping. Dies verursacht teilweise die falsche Annahme einer SQL-Injection-Attake. Wenn Sie solche Fehler erhalten, dann sollten Sie diese Option aktivieren. Bitte beachten Sie aber, dass dies auch den Systemschutz gegen DB Layer trapping anti-SQL-Injection schwächt.');

define($constpref . '_BIGUMBRELLA', 'Aktiviere anti-XSS (BigUmbrella)');
define($constpref . '_BIGUMBRELLADSC', 'Dies schützt vor Angriffen via XSS vulnerabilities. Schützt nicht zu 100%');

define($constpref . '_SPAMURI4U', 'Anti-SPAM: Anzahl URLs für normale Users');
define($constpref . '_SPAMURI4UDSC', 'Wenn diese Anzahl von URLs in Beitragen von Usern (nicht Admins) gefunden wird, ist der Beitrag als Spam eingestuft. 0 bedeutet dieses Feature ist deaktiviert.');
define($constpref . '_SPAMURI4G', 'Anti-SPAM: Anzahl URLs für Gäste');
define($constpref . '_SPAMURI4GDSC', 'Wenn diese Anzahl von URLs in Beitragen von Gästen gefunden wird, ist der Beitrag als Spam eingestuft. 0 bedeutet dieses Feature ist deaktiviert.');

    //3.40b
define($constpref . '_ADMINHOME', 'Übersicht');
define($constpref . '_ADMINABOUT', 'Über');
//3.50
define($constpref . '_STOPFORUMSPAM_ACTION', 'Stop Forum Spam');
define($constpref . '_STOPFORUMSPAM_ACTIONDSC', 'Überprüft POST Daten gegen Spammer die in der www.stopforumspam.com Datenbank eingetragen sind. Benötigt PHP CURL lib.');
    // 3.60
    define($constpref . '_ADMINSTATS', 'Übersicht Statistik');
    define($constpref . '_BANIP_TIME0DSC', 'Blockadezeit von automatisch gesperrten IPs in Sekunden');
}