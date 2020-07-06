<?php

namespace XoopsModules\Wgtransifex;

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
 * @package        wgtransifex
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         Goffy - Email:<webmaster@wedega.com> - Website:<https://wedega.com> / <https://xoops.org>
 */

/**
 * Interface  Constants
 */
interface Constants
{
    // Constants for tables
    public const TABLE_PROJECTS = 0;
    public const TABLE_RESOURCES = 1;
    public const TABLE_SETTINGS = 2;
    public const TABLE_LANGUAGES = 3;
    public const TABLE_TRANSLATIONS = 4;
    // Constants for status
    public const STATUS_NONE = 0;
    public const STATUS_OFFLINE = 1;
    public const STATUS_SUBMITTED = 2;
    public const STATUS_APPROVED = 3;
    public const STATUS_BROKEN = 5;
    public const STATUS_CREATED = 6;
    public const STATUS_OUTDATED = 7;
    public const STATUS_ARCHIVED = 8;
    public const STATUS_DELETEDTX = 9;
    public const STATUS_READTX = 10;
    public const STATUS_READTXNEW = 11;
}
