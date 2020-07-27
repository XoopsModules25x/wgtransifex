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

require __DIR__ . '/header.php';
$templateMain = 'wgtransifex_admin_about.tpl';
/** @var Xmf\Module\Admin $adminObject */
$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('about.php'));
$adminObject::setPaypal('6KJ7RW5DR3VTJ');
$GLOBALS['xoopsTpl']->assign('about', $adminObject->renderAbout(false));
require __DIR__ . '/footer.php';
