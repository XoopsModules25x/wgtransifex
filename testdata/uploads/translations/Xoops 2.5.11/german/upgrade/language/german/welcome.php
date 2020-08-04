<?php
// _LANGCODE: de
// _CHARSET : UTF-8
// Translator: XOOPS Translation Team

define('_XOOPS_UPGRADE_WELCOME', <<<'EOT'
<h2>XOOPS Upgrader</h2>

<p>
<em>Upgrade</em> wird die XOOPS Installation überprüft und alle erforderlichen Patches werden angewendet damit Ihr System wieder 
mit dem neuen XOOPS kompatibel wird. Die Patches können auch Datenbankänderungen, Änderungen der Standardwerte,  
Datei- und Datenupdaten, und einiges mehr.
<p>
Nach jedem Patch wird ein Bericht über den Status angezeigt, und das Upgrade wartet auf eine weitere Eingabe.
Am Ende des Upgrades werden Sie zur Updatefunktion Ihres Systemmodules weitergeleiten.

<div class="alert alert-warning">
Wenn Sie das Upgrade komplett abgeschlossen haben, dann vergessen Sie nicht:
<ul class="fa-ul">
 <li><span class="fa-li fa fa-folder-open-o"></span> den Upgrade-Ordner zu löschen</li>
 <li><span class="fa-li fa fa-refresh"></span> alle Module, die vom Update betroffen waren, nochmals updaten</li>
</div>

EOT
);