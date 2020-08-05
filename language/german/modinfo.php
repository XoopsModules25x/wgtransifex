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
// ---------------- Admin Main ----------------
\define('_MI_WGTRANSIFEX_NAME', 'wgTransifex');
\define('_MI_WGTRANSIFEX_DESC', 'Dieses Modul dient zum Download von Sprachpaketen von Transifex');
// ---------------- Admin Menu ----------------
\define('_MI_WGTRANSIFEX_ADMENU1', 'Übersicht');
\define('_MI_WGTRANSIFEX_ADMENU2', 'Projekte');
\define('_MI_WGTRANSIFEX_ADMENU3', 'Resourcen');
\define('_MI_WGTRANSIFEX_ADMENU4', 'Übersetzungen');
\define('_MI_WGTRANSIFEX_ADMENU5', 'Pakete');
\define('_MI_WGTRANSIFEX_ADMENU6', 'Defekt');
\define('_MI_WGTRANSIFEX_ADMENU7', 'Einstellungen');
\define('_MI_WGTRANSIFEX_ADMENU8', 'Sprachen');
\define('_MI_WGTRANSIFEX_ADMENU9', 'Feedback');
\define('_MI_WGTRANSIFEX_ADMENU10', 'Anfragen');
\define('_MI_WGTRANSIFEX_ADMENU11', 'Festlegung Berechtigungen');
\define('_MI_WGTRANSIFEX_ABOUT', 'About');
// ---------------- Admin Nav ----------------
\define('_MI_WGTRANSIFEX_ADMIN_PAGER', 'Admin Listenzeilen');
\define('_MI_WGTRANSIFEX_ADMIN_PAGER_DESC', 'Anzahl der Zeilen für Listen im Admin-Bereich');
// User
\define('_MI_WGTRANSIFEX_USER_PAGER', 'User Listenzeilen');
\define('_MI_WGTRANSIFEX_USER_PAGER_DESC', 'Anzahl der Zeilen für Listen im Mitglieder-Bereich');
// Submenu
\define('_MI_WGTRANSIFEX_SMNAME1', 'Alle Sprachpakete');
\define('_MI_WGTRANSIFEX_SMNAME2', '%s Sprachpakete');
\define('_MI_WGTRANSIFEX_SMNAME3', 'Zeige Sprachenliste');
\define('_MI_WGTRANSIFEX_SMNAME4', 'Zeige Projektliste');
// Blocks
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_LAST', 'Block letzte Sprachpakete');
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_LAST_DESC', 'Block mit den letzten Sprachpaketen anzeigen');
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_NEW', 'Block neue Sprachpakete');
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_NEW_DESC', 'Block mit den neuesten Sprachpaketen anzeigen');
//\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_TOP', 'Block Top Sprachpakete');
//\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_TOP_DESC', 'Block mit den Top Sprachpaketen anzeigen');
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_RANDOM', 'Block zufällige Sprachpaketen');
\define('_MI_WGTRANSIFEX_PACKAGES_BLOCK_RANDOM_DESC', 'Block mit den zufälligen Sprachpaketen anzeigen');
// Config
\define('_MI_WGTRANSIFEX_EDITOR_ADMIN', 'Editor für Admins:');
\define('_MI_WGTRANSIFEX_EDITOR_ADMIN_DESC', 'Wähle Editor, der im Adminbereich verwendet werden soll');
\define('_MI_WGTRANSIFEX_EDITOR_USER', 'Editor User');
\define('_MI_WGTRANSIFEX_EDITOR_USER_DESC', 'Wähle Editor, der im Benutzerbereich verwendet werden soll');
\define('_MI_WGTRANSIFEX_EDITOR_MAXCHAR', 'Maximale Anzahl Zeichen');
\define('_MI_WGTRANSIFEX_EDITOR_MAXCHAR_DESC', 'Maximale Anzahl an Zeichen für die Kurzanzeige von Texten im Adminbereich');
\define('_MI_WGTRANSIFEX_SIZE_MB', 'MB');
\define('_MI_WGTRANSIFEX_MAXSIZE_IMAGE', 'Maximale Bildgröße');
\define('_MI_WGTRANSIFEX_MAXSIZE_IMAGE_DESC', 'Wähle die maximale Größe der Bilder für Upload aus');
\define('_MI_WGTRANSIFEX_MIMETYPES_IMAGE', 'Erlaubte Mime-types');
\define('_MI_WGTRANSIFEX_MIMETYPES_IMAGE_DESC', 'Definere die erlaubten Mime-Types für Bilderupload');
\define('_MI_WGTRANSIFEX_MAXWIDTH_IMAGE', 'Maximale Bildbreite');
\define('_MI_WGTRANSIFEX_MAXWIDTH_IMAGE_DESC', 'Definieren Sie die maximale Breite, auf die die hochgeladenen Bilder automatisch verkleinert werden sollen (in pixel)<br>0 bedeutet, dass Bilder die Originalgröße behalten. <br>Sofern das Originalbild kleiner sein sollte, so wird dieses nicht vergrößert.');
\define('_MI_WGTRANSIFEX_MAXHEIGHT_IMAGE', 'Maximale Bildhöhe');
\define('_MI_WGTRANSIFEX_MAXHEIGHT_IMAGE_DESC', 'Definieren Sie die maximale Höhe, auf die die hochgeladenen Bilder automatisch verkleinert werden sollen (in pixel)<br>0 bedeutet, dass Bilder die Originalgröße behalten. <br>Sofern das Originalbild kleiner sein sollte, so wird dieses nicht vergrößert.');
\define('_MI_WGTRANSIFEX_SHOW_TXADMIN', 'Tx Admin Tools anzeigen');
\define('_MI_WGTRANSIFEX_SHOW_TXADMIN_DESC', 'Transifex Admin Tools anzeigen (aktiviere nur, wenn Du Adminberechtigungen auf Transifex besitzt)');
\define('_MI_WGTRANSIFEX_KEYWORDS', 'Keywords');
\define('_MI_WGTRANSIFEX_KEYWORDS_DESC', 'Keywords eingeben (getrennt mit einem Komma)');
\define('_MI_WGTRANSIFEX_NUMB_COL', 'Anzahl Spalten');
\define('_MI_WGTRANSIFEX_NUMB_COL_DESC', 'Anzahl der Spalten in der Tabellenansicht');
\define('_MI_WGTRANSIFEX_DIVIDEBY', 'Geteilt durch');
\define('_MI_WGTRANSIFEX_DIVIDEBY_DESC', 'Geteilt durch Spaltenanzahl');
\define('_MI_WGTRANSIFEX_TABLE_TYPE', 'Tabellentype');
\define('_MI_WGTRANSIFEX_TABLE_TYPE_DESC', 'Tabellentype is bootstrap html table.');
\define('_MI_WGTRANSIFEX_PANEL_TYPE', 'Panel Type');
\define('_MI_WGTRANSIFEX_PANEL_TYPE_DESC', 'Panel Type is the bootstrap html div.');
\define('_MI_WGTRANSIFEX_IDPAYPAL', 'Paypal ID');
\define('_MI_WGTRANSIFEX_IDPAYPAL_DESC', 'Deinen PayPal IDfür Spenden hier angeben.');
\define('_MI_WGTRANSIFEX_ADVERTISE', 'Code Werbung');
\define('_MI_WGTRANSIFEX_ADVERTISE_DESC', 'Bitte hier den Code für die Werbung eingeben');
\define('_MI_WGTRANSIFEX_MAINTAINEDBY', 'Unterstützt von');
\define('_MI_WGTRANSIFEX_MAINTAINEDBY_DESC', 'Erlaubt den Url zur Supportseite oder Community');
\define('_MI_WGTRANSIFEX_BOOKMARKS', 'Social Bookmarks');
\define('_MI_WGTRANSIFEX_BOOKMARKS_DESC', 'Social Bookmarks in den Seiten anzeigen');
\define('_MI_WGTRANSIFEX_FACEBOOK_COMMENTS', 'Facebook-Kommentare');
\define('_MI_WGTRANSIFEX_FACEBOOK_COMMENTS_DESC', 'Facebook-Kommentare in den Seiten zulassen');
\define('_MI_WGTRANSIFEX_DISQUS_COMMENTS', 'Disqus-Kommentare');
\define('_MI_WGTRANSIFEX_DISQUS_COMMENTS_DESC', 'Disqus-Kommentare in den Seiten zulassen');
\define('_MI_WGTRANSIFEX_GROUPS_REQUEST', 'Gruppen für Anfragen');
\define('_MI_WGTRANSIFEX_GROUPS_REQUEST_DESC', 'Definiere die Gruppen, die eine Anfrage für neue Sprachpakete einsenden dürfen');
// Global notifications
\define('_MI_WGTRANSIFEX_NOTIFY_GLOBAL', 'Globale Benachrichtigungen');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE', 'Benachrichtigungen Pakete');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_ADMIN', 'Benachrichtigung Pakete (Admin)');
\define('_MI_WGTRANSIFEX_NOTIFY_REQUEST_ADMIN', 'Benachrichtigung Anfragen (Admin)');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_NEW', 'Neues Sprachpaket');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_NEW_CAPTION', 'Benachrichtige mich über neue Sprachpakete');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_NEW_SUBJECT', 'Benachrichtigung über neues Sprachpaket');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_BROKEN', 'Fehlerhaftes Sprachpaket');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_BROKEN_CAPTION', 'Benachrichtige mich über fehlerhafte Sprachpakete');
\define('_MI_WGTRANSIFEX_NOTIFY_PACKAGE_BROKEN_SUBJECT', 'Benachrichtigung über fehlerhaftes Sprachpaket');
\define('_MI_WGTRANSIFEX_NOTIFY_REQUEST_NEW', 'Neue Anfrage Sprachpaket');
\define('_MI_WGTRANSIFEX_NOTIFY_REQUEST_NEW_CAPTION', 'Benachrichtige mich über Anfragen für neue Sprachpakete');
\define('_MI_WGTRANSIFEX_NOTIFY_REQUEST_NEW_SUBJECT', 'Benachrichtigung Anfrage für neues Sprachpaket');
// ---------------- End ----------------
