<div id="help-template" class="outer">
<h1 class="head">Hilfe: <a class="ui-corner-all tooltip" href="<{$xoops_url}>/modules/protector/admin/index.php" title="Zur&uuml;ck zur Administration von Protector"> Protector <img src="<{xoAdminIcons home.png}>" alt="Zur&uuml;ck zur Administration von Protector"/></a></h1>
    <!-- -----Help Content ---------- -->
<h4 class="odd">Beschreibung</h4>

<p class="even">Protector ist ein Modul zur Abwehr von verschiedenen Hackerattacken auf Ihr XOOPS CMS.</p>
    <h4 class="odd">Installieren/Deinstallieren</h4>

<p>Zuerst definieren Sie bitte XOOPS_TRUST_PATH in Ihrer mainfile.php, sofern dies nicht bereits geschehen ist.</p>
    <br>

<p>Kopieren Sie html/modules/protector aus dem Archiv in  Ihr XOOPS_ROOT_PATH/modules/</p>

<p>Kopieren Sie xoops_trust_path/modules/protector aus dem Archiv in Ihr XOOPS_TRUST_PATH/modules/</p>
    <br>

<p>Setzen Sie die Berechtigung von XOOPS_TRUST_PATH/modules/protector/configs auf beschreibbar</p>
<h4 class="odd">= Hilfemaßnahmen =</h4>

<p class="even">Wenn Sie selbst von Protector ausgesperrt wurden, dann löschen Sie einfach die Dateien unter XOOPS_TRUST_PATH/modules/protector/configs/</p>
<h4 class="odd">Einführung in die Filter-Plugins dieses Archivs.</h4>

<p class="even">- postcommon_post_deny_by_rbl.php
		<br>
ein Anti-SPAM Plugin.
		<br>
Alle POST-Befehle von IPs, registriert in RBL (Ausschlussliste), werden zurückgewiesen.
		<br>
Dieses Plugin kann die Performance von POST bremsen, speziell bei Chat-Modulen.
    </p>

<p>- postcommon_post_deny_by_httpbl.php
		<br>
ein Anti-SPAM Plugin.
		<br>
Alle POST-Befehle von IPs, registriert in RBL (Ausschlussliste), werden zurückgewiesen.
		<br>
Vor der Verwendung besorgen Sie sich bitte den HTTPBL_KEY von http://www.projecthoneypot.org/ und fügen diesen in die Filterdatei ein.
		<br>
define( 'PROTECTOR_HTTPBL_KEY' , '............' ) ;
    </p>

<p class="even">- postcommon_post_need_multibyte.php
		<br>
ein Anti-SPAM Plugin.
		<br>
POST ohne Multi-Byte-Zeichen werden zurückgewiesen.
		<br>
Dieses Plugin ist nur für japanische, chinesische oder koreanische Seiten.
    </p>

<p>- postcommon_post_htmlpurify4guest.php
		<br>
Alle von Gästen gesendeten POST-Befehlen werden vom HTMLPurifier bereinigt.
		<br>
Wenn Sie Gästen erlauben, HTML zu senden, wird die Aktivierung dieser Funktion dringendst empfohlen.
    </p>

<p class="even">-postcommon_register_insert_js_check.php
		<br>
Dieses Plugin verhindert die Registrierung von Usern durch Robots.
		<br>
Funktionierendes JavaScript auf dem Besucherbrowser erforderlich.
    </p>

<p>- bruteforce_overrun_message.php
		<br>
Erstellt eine Nachricht an Besucher, die das erlaubte Limit an Versuchen zur Eingabe des Passwortes überschritten haben.
		<br>
Alle Plugins mit der Endung *_message.php erstellen Nachrichten für den jeweiligen Zurückweisungsgrund.
    </p>

<p class="even">- precommon_bwlimit_errorlog.php
		<br>
Wenn bedauerlicherweise eine Bandbreiteneinschränkung vorliegt, schreibt dieses Plugin Einträge in Apache error_log.
    </p>

<p>Alle Plugins mit Endung *_errorlog.php schreiben Einträge in Apache error_log.</p>
<h4 class="odd">Benutzerhandbuch</h4>

<p class="even">Tutorial wird demnächst erstellt.</p>
    <!-- -----Help Content ---------- -->
</div>