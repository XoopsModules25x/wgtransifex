<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * wgGallery module for xoops
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        wggallery
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         Wedega - Email:<webmaster@wedega.com> - Website:<https://wedega.com>
 * @version        $Id: 1.0 download.php 1 Mon 2018-03-19 10:04:51Z XOOPS Project (www.xoops.org) $
 */

use Xmf\Request;

require __DIR__ . '/header.php';

$op = Request::getString('op', 'list');
$pkgId = Request::getInt('pkg_id');

switch ($op) {
    case 'package':
    default:
        // download package
        $packagesObj = $packagesHandler->get($pkgId);
        $package = $packagesObj->getValuesPackages();
        $file = $package['pkg_zip'];

        if ('' === $file) {
            redirect_header('packages.php?op=list&amp;pkg_id=' . $pkgId, 3, _MA_WGTRANSIFEX_DOWNLOAD_ERR_NOFILE);
        }

        $fp = fopen($file, 'rb');
        header('Content-type: application/zip');
        header('Content-Length: ' . filesize($file));
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        fpassthru($fp);

        break;
}
