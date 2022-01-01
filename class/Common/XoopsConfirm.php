<?php

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
 * My Module module for xoops
 *
 * @copyright     2020 XOOPS Project (https://xoops.org)
 * @license        GPL 2.0 or later
 * @package        Wgtransifex
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         Goffy - Email:<goffy@myxoops.org> - Website:<https://xoops.org>
 */

use XoopsModules\Wgtransifex;

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object XoopsConfirm
 */
class XoopsConfirm
{
    private $hiddens = [];
    private $action  = '';
    private $title   = '';
    private $label   = '';
    private $object  = '';

    /**
     * @public function constructor class
     * @param        $hiddens
     * @param        $action
     * @param        $object
     * @param string $title
     * @param string $label
     */
    public function __construct($hiddens, $action, $object, $title = '', $label = '')
    {
        $this->hiddens = $hiddens;
        $this->action  = $action;
        $this->object  = $object;
        $this->title   = $title;
        $this->label   = $label;
    }

    /**
     * @public function getXoopsConfirm
     * @return \XoopsThemeForm
     */
    public function getFormXoopsConfirm()
    {
        //in order to be accessable from user and admin area this should be place in language common.php
        if (!\defined('CO_WGTEAMS_DELETE_CONFIRM')) {
            \define('CO_WGTEAMS_DELETE_CONFIRM', 'Confirm delete');
            \define('CO_WGTEAMS_DELETE_LABEL', 'Do you really want to delete:');
        }

        // Get Theme Form
        if ('' === $this->action) {
            $this->action = \Xmf\Request::getString('REQUEST_URI', '', 'SERVER');
        }
        if ('' === $this->title) {
            $this->title = \CO_WGTEAMS_DELETE_CONFIRM;
        }
        if ('' === $this->label) {

            $this->label = \CO_WGTEAMS_DELETE_LABEL;
        }

        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($this->title, 'formXoopsConfirm', $this->action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        $form->addElement(new \XoopsFormLabel($this->label, $this->object));
        //hiddens
        foreach ($this->hiddens as $key => $value) {
            $form->addElement(new \XoopsFormHidden($key, $value));
        }
        $form->addElement(new \XoopsFormHidden('ok', 1));
        $buttonTray = new \XoopsFormElementTray('');
        $buttonTray->addElement(new \XoopsFormButton('', 'confirm_submit', \_YES, 'submit'));
        $buttonBack = new \XoopsFormButton('', 'confirm_back', \_NO, 'button');
        $buttonBack->setExtra('onclick="history.go(-1);return true;"');
        $buttonTray->addElement($buttonBack);
        $form->addElement($buttonTray);
        return $form;
    }
}
