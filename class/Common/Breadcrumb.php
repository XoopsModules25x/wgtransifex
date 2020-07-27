<?php

declare(strict_types=1);

namespace XoopsModules\Wgtransifex\Common;

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Breadcrumb Class
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      lucio <lucio.rota@gmail.com>
 * @package     Wgtransifex
 *
 * Example:
 * $breadcrumb = new Common\Breadcrumb();
 * $breadcrumb->addLink( 'bread 1', 'index1.php' );
 * $breadcrumb->addLink( 'bread 2', '' );
 * $breadcrumb->addLink( 'bread 3', 'index3.php' );
 * echo $breadcrumb->render();
 */
\defined('XOOPS_ROOT_PATH') || exit('XOOPS Root Path not defined');

/**
 * Class Breadcrumb
 */
class Breadcrumb
{
    public $dirname;
    private $bread = [];

    public function __construct()
    {
        $this->dirname = \basename(\dirname(\dirname(__DIR__)));
    }

    /**
     * Add link to breadcrumb
     *
     * @param string $title
     * @param string $link
     */
    public function addLink($title = '', $link = '')
    {
        $this->bread[] = [
            'link' => $link,
            'title' => $title,
        ];
    }

    /**
     * Render BreadCrumb
     */
    public function render()
    {
        if (!isset($GLOBALS['xoTheme']) || !\is_object($GLOBALS['xoTheme'])) {
            require $GLOBALS['xoops']->path('class/theme.php');
            $GLOBALS['xoTheme'] = new \xos_opal_Theme();
        }
        require $GLOBALS['xoops']->path('class/template.php');
        $breadcrumbTpl = new \XoopsTpl();
        $breadcrumbTpl->assign('breadcrumb', $this->bread);
        $html = $breadcrumbTpl->fetch('db:' . $this->dirname . '_common_breadcrumb.tpl');
        unset($breadcrumbTpl);

        return $html;
    }
}
