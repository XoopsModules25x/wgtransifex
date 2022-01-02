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
 * Custom form confirm for XOOPS modules
 *
 * @copyright     2020 XOOPS Project (https://xoops.org)
 * @license        GPL 2.0 or later
 * @package        general
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         Goffy - Email:<goffy@myxoops.org> - Website:<https://xoops.org>
 *
 *
 * Example:
    $customConfirm = new Common\Confirm(
        ['ok' => 1, 'item_id' => $itemId, 'op' => 'delete'],
        $_SERVER['REQUEST_URI'],
        \sprintf(\_MA_MYMODULE_FORM_SURE_DELETE,
        $itemsObj->getCaption()));
    $form = $customConfirm->getFormConfirm();
    $GLOBALS['xoopsTpl']->assign('form', $form->render());
 */

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Confirm
 */
class Confirm
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
     * @public function getFormConfirm
     * @return \XoopsThemeForm
     */
    public function getFormConfirm()
    {
        $moduleDirName      = \basename(__DIR__);
        $moduleDirNameUpper = \mb_strtoupper($moduleDirName);
        //in order to be accessable from user and admin area this should be place in language common.php
        if (!\defined('CO_' . $moduleDirNameUpper . '_DELETE_CONFIRM')) {
            \define('CO_' . $moduleDirNameUpper . '_DELETE_CONFIRM', 'Confirm delete');
            \define('CO_' . $moduleDirNameUpper . '_DELETE_LABEL', 'Do you really want to delete:');
        }

        // Get Theme Form
        if ('' === $this->action) {
            $this->action = \Xmf\Request::getString('REQUEST_URI', '', 'SERVER');
        }
        if ('' === $this->title) {
            $this->title = \constant('CO_' . $moduleDirNameUpper . '_DELETE_CONFIRM');
        }
        if ('' === $this->label) {

            $this->label = \constant('CO_' . $moduleDirNameUpper . '_DELETE_LABEL');
        }

        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($this->title, 'formConfirm', $this->action, 'post', true);
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
