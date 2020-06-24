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

use XoopsModules\Wgtransifex;

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Languages
 */
class Languages extends \XoopsObject
{
    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        $this->initVar('lang_id', \XOBJ_DTYPE_INT);
        $this->initVar('lang_name', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('lang_code', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('lang_iso_639_1', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('lang_iso_639_2', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('lang_iso_639_1', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('lang_folder', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('lang_flag', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('lang_date', \XOBJ_DTYPE_INT);
        $this->initVar('lang_submitter', \XOBJ_DTYPE_INT);
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
    public function getNewInsertedIdLanguages()
    {
        $newInsertedId = $GLOBALS['xoopsDB']->getInsertId();
        return $newInsertedId;
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormLanguages($action = false)
    {
        $helper = \XoopsModules\Wgtransifex\Helper::getInstance();
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        // Title
        $title = $this->isNew() ? \sprintf(\_AM_WGTRANSIFEX_LANGUAGE_ADD) : \sprintf(\_AM_WGTRANSIFEX_LANGUAGE_EDIT);
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Text langName
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_LANGUAGE_NAME, 'lang_name', 50, 255, $this->getVar('lang_name')), true);
        // Form Text langCode
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_LANGUAGE_CODE, 'lang_code', 50, 255, $this->getVar('lang_code')));
        // Form Text langIso_639_1
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_LANGUAGE_ISO_639_1, 'lang_iso_639_1', 50, 255, $this->getVar('lang_iso_639_1')));
        // Form Text langIso_639_2
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_LANGUAGE_ISO_639_2, 'lang_iso_639_2', 50, 255, $this->getVar('lang_iso_639_2')));
        // Form Text langFolder
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_LANGUAGE_FOLDER, 'lang_folder', 50, 255, $this->getVar('lang_folder')));
        // Form Frameworks Images langFlag: Select Uploaded Image
        $getLangFlag    = $this->getVar('lang_flag');
        $langFlag       = $getLangFlag ?: 'blank.gif';
        $imageDirectory = '/modules/wgtransifex/assets/images/flags';
        $imageTray      = new \XoopsFormElementTray(\_AM_WGTRANSIFEX_LANGUAGE_FLAG, '<br>');
        $imageSelect    = new \XoopsFormSelect(\sprintf(\_AM_WGTRANSIFEX_LANGUAGE_FLAG_UPLOADS, ".{$imageDirectory}/"), 'lang_flag', $langFlag, 5);
        $imageArray     = \XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH . $imageDirectory);
        foreach ($imageArray as $image1) {
            $imageSelect->addOption(($image1), $image1);
        }
        $imageSelect->setExtra("onchange='showImgSelected(\"imglabel_lang_flag\", \"lang_flag\", \"" . $imageDirectory . '", "", "' . XOOPS_URL . "\")'");
        $imageTray->addElement($imageSelect, false);
        $imageTray->addElement(new \XoopsFormLabel('', "<br><img src='" . XOOPS_URL . '/' . $imageDirectory . '/' . $langFlag . "' id='imglabel_lang_flag' alt='' style='max-width:100px' />"));
        // Form Frameworks Images langFlag: Upload new image
        $fileSelectTray = new \XoopsFormElementTray('', '<br>');
        $fileSelectTray->addElement(new \XoopsFormFile(\_AM_WGTRANSIFEX_FORM_UPLOAD_NEW, 'lang_flag', $helper->getConfig('maxsize_image')));
        $fileSelectTray->addElement(new \XoopsFormLabel(''));
        $imageTray->addElement($fileSelectTray);
        $form->addElement($imageTray);
        // Form Text Date Select langDate
        $langDate = $this->isNew() ? 0 : $this->getVar('lang_date');
        $form->addElement(new \XoopsFormTextDateSelect(\_AM_WGTRANSIFEX_LANGUAGE_DATE, 'lang_date', '', $langDate));
        // Form Select User langSubmitter
        $form->addElement(new \XoopsFormSelectUser(\_AM_WGTRANSIFEX_LANGUAGE_SUBMITTER, 'lang_submitter', false, $this->getVar('lang_submitter')));
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'save'));
        $form->addElement(new \XoopsFormButtonTray('', \_SUBMIT, 'submit', '', false));
        return $form;
    }

    /**
     * Get Values
     * @param null $keys
     * @param null $format
     * @param null $maxDepth
     * @return array
     */
    public function getValuesLanguages($keys = null, $format = null, $maxDepth = null)
    {
        $ret              = $this->getValues($keys, $format, $maxDepth);
        $ret['id']        = $this->getVar('lang_id');
        $ret['name']      = $this->getVar('lang_name');
        $ret['code']      = $this->getVar('lang_code');
        $ret['folder']    = $this->getVar('lang_folder');
        $ret['flag']      = $this->getVar('lang_flag');
        $ret['date']      = \formatTimestamp($this->getVar('lang_date'), 's');
        $ret['submitter'] = \XoopsUser::getUnameFromId($this->getVar('lang_submitter'));
        $ret['iso_639_1'] = $this->getVar('lang_iso_639_1');
        $ret['iso_639_2'] = $this->getVar('lang_iso_639_2');
        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArrayLanguages()
    {
        $ret  = [];
        $vars = $this->getVars();
        foreach (\array_keys($vars) as $var) {
            $ret[$var] = $this->getVar('"{$var}"');
        }
        return $ret;
    }
}
