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
 * @author         TDM XOOPS - Email:<info@email.com> - Website:<http://xoops.org>
 */

use XoopsModules\Wgtransifex;

defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Settings
 */
class Settings extends \XoopsObject
{
    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        $this->initVar('set_id', XOBJ_DTYPE_INT);
        $this->initVar('set_username', XOBJ_DTYPE_TXTBOX);
        $this->initVar('set_password', XOBJ_DTYPE_TXTBOX);
        $this->initVar('set_options', XOBJ_DTYPE_TXTAREA);
        $this->initVar('set_date', XOBJ_DTYPE_INT);
        $this->initVar('set_submitter', XOBJ_DTYPE_INT);
        $this->initVar('set_primary', XOBJ_DTYPE_INT);
    }

    /**
     * @static function &getInstance
     *
     * @param null
     */
    public static function getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
    }

    /**
     * The new inserted $Id
     * @return inserted id
     */
    public function getNewInsertedIdSettings()
    {
        $newInsertedId = $GLOBALS['xoopsDB']->getInsertId();
        return $newInsertedId;
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormSettings($action = false)
    {
        if (false === $action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        // Title
        $title = $this->isNew() ? sprintf(_AM_WGTRANSIFEX_SETTING_ADD) : sprintf(_AM_WGTRANSIFEX_SETTING_EDIT);
        // Get Theme Form
        xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Text setUsername
        $form->addElement(new \XoopsFormText(_AM_WGTRANSIFEX_SETTING_USERNAME, 'set_username', 50, 255, $this->getVar('set_username')), true);
        // Form Text setPassword
        $form->addElement(new \XoopsFormText(_AM_WGTRANSIFEX_SETTING_PASSWORD, 'set_password', 50, 255, $this->getVar('set_password')));
        // Form Editor TextArea setOptions
        $form->addElement(new \XoopsFormTextArea(_AM_WGTRANSIFEX_SETTING_OPTIONS, 'set_options', $this->getVar('set_options', 'e'), 4, 47));
        // Form Radio Yes/No setPrimary
        $setPrimary = $this->isNew() ? 1 : $this->getVar('set_primary');
        $form->addElement(new \XoopsFormRadioYN(_AM_WGTRANSIFEX_SETTING_PRIMARY, 'set_primary', $setPrimary), true);
        // Form Text Date Select setDate
        $setDate = $this->isNew() ? 0 : $this->getVar('set_date');
        $form->addElement(new \XoopsFormTextDateSelect(_AM_WGTRANSIFEX_SETTING_DATE, 'set_date', '', $setDate));
        // Form Select User setSubmitter
        $form->addElement(new \XoopsFormSelectUser(_AM_WGTRANSIFEX_SETTING_SUBMITTER, 'set_submitter', false, $this->getVar('set_submitter')));
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'save'));
        $form->addElement(new \XoopsFormButtonTray('', _SUBMIT, 'submit', '', false));
        return $form;
    }

    /**
     * Get Values
     * @param null $keys
     * @param null $format
     * @param null $maxDepth
     * @return array
     */
    public function getValuesSettings($keys = null, $format = null, $maxDepth = null)
    {
        $helper               = \XoopsModules\Wgtransifex\Helper::getInstance();
        $utility              = new \XoopsModules\Wgtransifex\Utility();
        $ret                  = $this->getValues($keys, $format, $maxDepth);
        $ret['id']            = $this->getVar('set_id');
        $ret['username']      = $this->getVar('set_username');
        $ret['password']      = $this->getVar('set_password');
        $ret['options']       = strip_tags($this->getVar('set_options', 'e'));
        $editorMaxchar        = $helper->getConfig('editor_maxchar');
        $ret['options_short'] = $utility::truncateHtml($ret['options'], $editorMaxchar);
        $ret['date']          = formatTimeStamp($this->getVar('set_date'), 's');
        $ret['submitter']     = \XoopsUser::getUnameFromId($this->getVar('set_submitter'));
        $ret['primary']       = (int)$this->getVar('set_primary') > 0 ? _YES : _NO;
        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArraySettings()
    {
        $ret  = [];
        $vars = $this->getVars();
        foreach (array_keys($vars) as $var) {
            $ret[$var] = $this->getVar('"{$var}"');
        }
        return $ret;
    }
}
