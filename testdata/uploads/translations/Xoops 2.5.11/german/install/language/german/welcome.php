<?php
//
// _LANGCODE: de
// _CHARSET : UTF-8
// Translator: XOOPS Translation Team

$content .= '
<p>
<abbr title="eXtensible Object-Oriented Portal System">XOOPS</abbr> ist ein dynamisches OO (Objekt Orientiertes) Open Source 
Portalskript geschrieben in PHP. XOOPS ist somit ein ideales CMS für 
den Aufbau von kleineren und größeren dynamischer Community-Webseiten, Webblogs und vieles mehr.
</p>
<p>
XOOPS ist freigegeben unter den Bedingungen der
    <a href="https://www.gnu.org/licenses/gpl-2.0.html" rel="external">GNU General Public License (GPL)</a>
Version 2 oder größer, und es ist frei zu verwenden und anzupassen.
Es ist frei, so lange Änderungen, wie Sie durch die Bestimungen der GPL genannt sind, erhalten bleiben.
</p>
<h3>Erfordernisse</h3>
<ul>
    <li>WWW Server (<a href="https://www.apache.org/" rel="external">Apache</a>, <a href="https://www.nginx.com/" rel="external">NGINX</a>, IIS, etc)</li>
    <li><a href="https://www.php.net/" rel="external">PHP</a> 5.3.9 oder höher, 7.2+ empfohlen</li>
    <li><a href="https://www.mysql.com/" rel="external">MySQL</a> 5.5 oder höher, 5.7+ empfohlen</li>
</ul>
<h3>Vor der Installation</h3>
<ol>
<li>Korrektes Aufsetzten des WWW Server, PHP und des Datenbankservers</li>
<li>Vorbereitung der Datenbank für Ihre XOOPS-Seite</li>
<li>Vorbereitung des Benutzeraccounts und Vergabe der Zugriffsrechte für diese Datenbank</li>
<li>Setzen dieser Verzeichnis- und Dateirechte auf beschreibbar: %s</li>
<li>Aus Sicherheitsgründen wird strengstens empfohlen, die zwei nachfolgend angeführten Verzeichnisse aus dem <a href="http://phpsec.org/projects/guide/3.html" rel="external">Dokumentenroot</a> zu verschieben (wenn möglich in einen von außen nicht aufrufbaren Bereich) und die Verzeichnisnamen umzubenennen: %s</li>
<li>Erstelle (sofern nicht schon vorhanden) und setze Schreibrechte für Verzeichnisse: %s</li>
<li>Cookie und JavaScript in Ihrem Webbrowser aktivieren</li>
</ol>
<h3>Besondere Hinweise</h3>
<p>Manche speziellen Software-Kombimationen brauchen eventuell zusätzliche Einstellungen für den einwandfreien Gebrauch
mit XOOPS. Wenn eine der Themen auf Ihre Umgebung zutrifft, dann überprüfen Sie 
 <a href="https://xoops.gitbook.io/xoops-install-upgrade/" rel="external">XOOPS 
 installation manual</a> für weitere Informationen. 
</p>
<p>MySQL 8.0 wird nicht in allen PHP-Versionen unterstützt. Sogar in den unterstützten Versionen kann es sein,  dass bei der 
 PHP <em>mysqlnd</em> Library zusätzlich die MySQL server&apos;s <em>default-authentication-plugin</em>
 auf <em>mysql_native_password</em> gesetzt werden muss, um einwandfrei zu funktionieren.
</p>
<p>SELinux enabled systems (wie z.B. CentOS und RHEL) brauchen vielleicht zusätzliche Sicherheitseinstellungen
für die XOOPS Verzeichnisse, zusätzlich zu den Schreibberechtigungen.
Schlagen Sie in Ihrer Systemdokumentation nach oder kontaktieren Sie Ihren System-Administrator.
</p>
';