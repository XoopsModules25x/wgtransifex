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
 * feedback plugin for xoops modules
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         XOOPS - Website:<https://xoops.org>
 */
$moduleDirName = \basename(\dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);
\define('CO_' . $moduleDirNameUpper . '_FB_FORM_TITLE', 'Ein Feedback senden');
\define('CO_' . $moduleDirNameUpper . '_FB_RECIPIENT', 'Empfänger');
\define('CO_' . $moduleDirNameUpper . '_FB_NAME', 'Name');
\define('CO_' . $moduleDirNameUpper . '_FB_NAME_PLACEHOLER', 'Bitte ergänzen Sie Ihren Namen');
\define('CO_' . $moduleDirNameUpper . '_FB_SITE', 'Website');
\define('CO_' . $moduleDirNameUpper . '_FB_SITE_PLACEHOLER', 'Bitte ergänzen Sie Ihre Website');
\define('CO_' . $moduleDirNameUpper . '_FB_MAIL', 'E-Mail');
\define('CO_' . $moduleDirNameUpper . '_FB_MAIL_PLACEHOLER', 'Bitte ergänzen Sie Ihre E-Mail');
\define('CO_' . $moduleDirNameUpper . '_FB_TYPE', 'Art des Feedbacks');
\define('CO_' . $moduleDirNameUpper . '_FB_TYPE_SUGGESTION', 'Vorschläge');
\define('CO_' . $moduleDirNameUpper . '_FB_TYPE_BUGS', 'Fehler & Bugs');
\define('CO_' . $moduleDirNameUpper . '_FB_TYPE_TESTIMONIAL', 'Empfehlungen');
\define('CO_' . $moduleDirNameUpper . '_FB_TYPE_FEATURES', 'Features');
\define('CO_' . $moduleDirNameUpper . '_FB_TYPE_OTHERS', 'Sonstiges');
\define('CO_' . $moduleDirNameUpper . '_FB_TYPE_CONTENT', 'Feedback Inhalt');
\define('CO_' . $moduleDirNameUpper . '_FB_SEND_FOR', 'Feedback für Modul ');
\define('CO_' . $moduleDirNameUpper . '_FB_SEND_SUCCESS', 'Feedback erfolgreich gesendet');
\define('CO_' . $moduleDirNameUpper . '_FB_SEND_ERROR', 'Beim Senden des Feedbacks ist leider ein Fehler aufgetreten!');