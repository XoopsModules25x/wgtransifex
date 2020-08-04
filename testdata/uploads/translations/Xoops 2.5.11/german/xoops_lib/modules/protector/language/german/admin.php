<?php
// mymenu
define('_MD_A_MYMENU_MYTPLSADMIN','');
define('_MD_A_MYMENU_MYBLOCKSADMIN','Festlegung Berechtigungen');
define('_MD_A_MYMENU_MYPREFERENCES','Einstellungen');
// index.php
define('_AM_TH_DATETIME', 'Zeit');
define('_AM_TH_USER', '<span style="color: #FF0000; font-size: Small;  font-weight: bold;">--- Benutzer ---</span> ');
define('_AM_TH_IP', 'IP');
define('_AM_TH_AGENT', 'Client');
define('_AM_TH_TYPE', 'Typ');
define('_AM_TH_DESCRIPTION', 'Zusätzliche Infos');
define('_AM_TH_BADIPS','Schlechte IP-Adressen<br><br><span style="font-weight:normal;">Schreibe jede IP in eine Zeile<br>Leerlassen wenn alle IPs erlaubt sind</span>');
define('_AM_TH_GROUP1IPS','Erlaubte IPs für Gruppe=1<br><br><span style="font-weight:normal;">Jede IP in eine Zeile.<br>192.168. bedeutet 192.168.*<br>Leer bedeutet alle IPs sind erlaubt</span>');
define('_AM_LABEL_COMPACTLOG', 'Komprimierter Bericht');
define('_AM_BUTTON_COMPACTLOG', 'Komprimieren!');
define('_AM_JS_COMPACTLOGCONFIRM', 'Datenduplikate (IPs, Angriffstypen) werden entfernt');
define('_AM_LABEL_REMOVEALL', 'Alle Aufzeichnungen löschen');
define('_AM_BUTTON_REMOVEALL', 'Alle löschen!');
define('_AM_JS_REMOVEALLCONFIRM', 'Sind Sie sich sicher, dass alle Aufzeichungen gelöscht werden sollen?');
define('_AM_LABEL_REMOVE', 'Lösche alle gewählten Aufzeichnungen:');
define('_AM_BUTTON_REMOVE', 'Löschen!');
define('_AM_JS_REMOVECONFIRM', 'Sollen alle ausgewahlten Eintrage gelöscht werden?');
define('_AM_MSG_IPFILESUPDATED', 'Die Dateien der IP Listen wurden aktualisiert');
define('_AM_MSG_BADIPSCANTOPEN', 'Die IP-Ausschlussdatei kann nicht geöffnet werden');
define('_AM_MSG_GROUP1IPSCANTOPEN', 'Die IP-Einschlussdatei für die Administratorengruppe kann nicht geöffnet werden');
define('_AM_MSG_REMOVED', 'Daten wurden entfernt');
define('_AM_FMT_CONFIGSNOTWRITABLE', 'Der Ordner %s braucht Schreibberechtigung (chm777)');
// prefix_manager.php
define('_AM_H3_PREFIXMAN', 'Präfix-Manager');
define('_AM_MSG_DBUPDATED', 'Aktualisierung Datenbank war erfolgreich!');
define('_AM_CONFIRM_DELETE', 'Sollen alle Daten gelöscht werden?');
define('_AM_TXT_HOWTOCHANGEDB',"Wenn Sie den Tabellenpräfix ändern wollen, dann <br> bearbeiten %sSie /data/secure.php manuell.<br><br>define('XOOPS_DB_PREFIX', '<b>%s</b>');");
// advisory.php
define('_AM_ADV_NOTSECURE', 'Nicht sicher');
define('_AM_ADV_TRUSTPATHPUBLIC', 'Wenn Sie eine Grafik aufrufen bzw. sehen können oder der Link zeigt Ihnen eine normale Website an, scheint der sog. trust_path nicht korrekt plaziert zu sein, z.B. innerhalb des Rootverzeichnis! Der trust_path muss außerhalb liegen, andernfalls ist ihr System nicht ausreichend geschützt! In manchen Fallen kann kein trust_path außerhalb des Rootverzeichnis gesetzt werden, in dem Fall können Sie eine .htaccess Datei mit dem Inhalt DENY FROM ALL erstellen und in das Verzeichnis kopieren. Dies ist zumindest eine Ersatzlösung, wenn auch nicht so sicher.');
define('_AM_ADV_TRUSTPATHPUBLICLINK', 'Überprüfen Sie PHP Dateien innerhalb des trust_Path, sie müssen eine Fehlermeldung erhalten, z.B. 404, 403 oder 500 Fehler, wenn Fehlerseiten seitens des Providers nicht erlaubt sind, dann eine weisse Seite.');
define('_AM_ADV_REGISTERGLOBALS',"Diese Einstellung lädt zu verschiedenen Formen der Code Injection ein. Wenn es geht, setzen Sie 'register_globals off' in der php.ini, oder falls dies nicht möglich ist, erstellen Sie eine .htaccess-Datei in Ihrem XOOPS-Verzeichnis:");
define('_AM_ADV_ALLOWURLFOPEN',"Diese Einstellung erlaubt Angreifern, Scripts auf entfernten Sytemen auszuführen.<br>Nur der Administrator des Servers kann diese Option ändern.<br>Wenn Sie der Admin sind, bearbeiten Sie php.ini or httpd.conf entsprechend.<br><b>Beispiele für httpd.conf:<br> &nbsp; php_admin_flag &nbsp; allow_url_fopen &nbsp; off</b><br>Wenn nicht, wenden Sie sich an Ihren Administrator. ");
define('_AM_ADV_USETRANSSID',"Wenn 'AN' wird Ihre Session-ID in Anker-Tags usw. angezeigt.<br>Um dem Session-Hijacking vorzubeugen, sollten Sie die folgende Zeile Ihrer .htaccess-Datei in XOOPS_ROOT_PATH hinzufugen.<br><b>php_flag session.use_trans_sid off</b>");
define('_AM_ADV_DBPREFIX',"Diese Einstellung lädt zu \"SQL Injections\" ein.<br>Vergessen Sie nicht \"Force sanitizing *\" in den Voreinstellungen dieses Moduls zu aktivieren. ");
define('_AM_ADV_LINK_TO_PREFIXMAN', 'Gehe zum Präfix-Manager');
define('_AM_ADV_MAINUNPATCHED', 'Sie sollten diese Datei wie im README beschrieben andern.');
define('_AM_ADV_DBFACTORYPATCHED', 'Die Datei databasefactory.php wurde zum Abfangen von SQL-Injektionen modifiziert.');
define('_AM_ADV_DBFACTORYUNPATCHED', 'Die Datei databasefactory.php muss zum Abfangen von SQL-Injektionen noch modifiziert werden.');
define('_AM_ADV_SUBTITLECHECK', 'Überprüfen, ob Protector korrekt funktioniert');
define('_AM_ADV_CHECKCONTAMI', 'Verseuchung');
define('_AM_ADV_CHECKISOCOM', 'Isolierte Kommentare');
//XOOPS 2.5.4
define('_AM_ADV_REGISTERGLOBALS2', 'und platzieren Sie es in die darunterliegenden Zeile:');
//XOOPS 2.5.8
define('_AM_PROTECTOR_PREFIX', 'Präfix');
define('_AM_PROTECTOR_TABLES', 'Tabellen');
define('_AM_PROTECTOR_UPDATED', 'Aktualisiert');
define('_AM_PROTECTOR_COPY', 'Kopieren');
define('_AM_PROTECTOR_ACTIONS', 'Aktionen');
// XOOPS 2.5.10 v Protector 3.60
define('_AM_LABEL_BAN_BY_IP', 'Sperre IPs nach überprüften Datensätzen:');
define('_AM_BUTTON_BAN_BY_IP', 'IP sperren!');
define('_AM_JS_BANCONFIRM', 'IP Sperren OK?');
define('_AM_MSG_BANNEDIP', 'IPs sind gesperrt');
define('_AM_ADMINSTATS_TITLE', 'Zusammenfassung Protector Log');

