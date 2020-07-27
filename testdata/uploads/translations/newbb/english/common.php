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
 * Wfdownloads module
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since           3.23
 * @author          Xoops Development Team
 */
$moduleDirName = \basename(\dirname(\dirname(__DIR__)));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

\define('CO_' . $moduleDirNameUpper . '_GDLIBSTATUS', 'GD library support: ');
\define('CO_' . $moduleDirNameUpper . '_GDLIBVERSION', 'GD Library version: ');
\define('CO_' . $moduleDirNameUpper . '_GDOFF', "<span style='font-weight: bold;'>Disabled</span> (No thumbnails available)");
\define('CO_' . $moduleDirNameUpper . '_GDON', "<span style='font-weight: bold;'>Enabled</span> (Thumbsnails available)");
\define('CO_' . $moduleDirNameUpper . '_IMAGEINFO', 'Server status');
\define('CO_' . $moduleDirNameUpper . '_MAXPOSTSIZE', 'Max post size permitted (post_max_size directive in php.ini): ');
\define('CO_' . $moduleDirNameUpper . '_MAXUPLOADSIZE', 'Max upload size permitted (upload_max_filesize directive in php.ini): ');
\define('CO_' . $moduleDirNameUpper . '_MEMORYLIMIT', 'Memory limit (memory_limit directive in php.ini): ');
\define('CO_' . $moduleDirNameUpper . '_METAVERSION', "<span style='font-weight: bold;'>Downloads meta version:</span> ");
\define('CO_' . $moduleDirNameUpper . '_OFF', "<span style='font-weight: bold;'>OFF</span>");
\define('CO_' . $moduleDirNameUpper . '_ON', "<span style='font-weight: bold;'>ON</span>");
\define('CO_' . $moduleDirNameUpper . '_SERVERPATH', 'Server path to XOOPS root: ');
\define('CO_' . $moduleDirNameUpper . '_SERVERUPLOADSTATUS', 'Server uploads status: ');
\define('CO_' . $moduleDirNameUpper . '_SPHPINI', "<span style='font-weight: bold;'>Information taken from PHP ini file:</span>");
\define('CO_' . $moduleDirNameUpper . '_UPLOADPATHDSC', 'Note. Upload path *MUST* contain the full server path of your upload folder.');

\define('CO_' . $moduleDirNameUpper . '_PRINT', "<span style='font-weight: bold;'>Print</span>");
\define('CO_' . $moduleDirNameUpper . '_PDF', "<span style='font-weight: bold;'>Create PDF</span>");

\define('CO_' . $moduleDirNameUpper . '_UPGRADEFAILED0', "Update failed - couldn't rename field '%s'");
\define('CO_' . $moduleDirNameUpper . '_UPGRADEFAILED1', "Update failed - couldn't add new fields");
\define('CO_' . $moduleDirNameUpper . '_UPGRADEFAILED2', "Update failed - couldn't rename table '%s'");
\define('CO_' . $moduleDirNameUpper . '_ERROR_COLUMN', 'Could not create column in database : %s');
\define('CO_' . $moduleDirNameUpper . '_ERROR_BAD_XOOPS', 'This module requires XOOPS %s+ (%s installed)');
\define('CO_' . $moduleDirNameUpper . '_ERROR_BAD_PHP', 'This module requires PHP version %s+ (%s installed)');
\define('CO_' . $moduleDirNameUpper . '_ERROR_TAG_REMOVAL', 'Could not remove tags from Tag Module');

\define('CO_' . $moduleDirNameUpper . '_FOLDERS_DELETED_OK', 'Upload Folders have been deleted');

// Error Msgs
\define('CO_' . $moduleDirNameUpper . '_ERROR_BAD_DEL_PATH', 'Could not delete %s directory');
\define('CO_' . $moduleDirNameUpper . '_ERROR_BAD_REMOVE', 'Could not delete %s');
\define('CO_' . $moduleDirNameUpper . '_ERROR_NO_PLUGIN', 'Could not load plugin');

//Help
\define('CO_' . $moduleDirNameUpper . '_DIRNAME', \basename(\dirname(\dirname(__DIR__))));
\define('CO_' . $moduleDirNameUpper . '_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
\define('CO_' . $moduleDirNameUpper . '_BACK_2_ADMIN', 'Back to Administration of ');
\define('CO_' . $moduleDirNameUpper . '_OVERVIEW', 'Overview');

//\define('CO_' . $moduleDirNameUpper . '_HELP_DIR', __DIR__);

//help multi-page
\define('CO_' . $moduleDirNameUpper . '_DISCLAIMER', 'Disclaimer');
\define('CO_' . $moduleDirNameUpper . '_LICENSE', 'License');
\define('CO_' . $moduleDirNameUpper . '_SUPPORT', 'Support');
