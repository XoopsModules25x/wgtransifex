<?php

declare(strict_types=1);

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
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         Goffy - Email:<webmaster@wedega.com> - Website:<https://wedega.com> / <https://xoops.org>
 */

use XoopsModules\Wgtransifex;


/**
 * Class Object Packages
 */
class Packages extends \XoopsObject
{
    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        $this->initVar('pkg_id', \XOBJ_DTYPE_INT);
        $this->initVar('pkg_name', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('pkg_desc', \XOBJ_DTYPE_OTHER);
        $this->initVar('pkg_pro_id', \XOBJ_DTYPE_INT);
        $this->initVar('pkg_lang_id', \XOBJ_DTYPE_INT);
        $this->initVar('pkg_zip', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('pkg_logo', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('pkg_status', \XOBJ_DTYPE_INT);
        $this->initVar('pkg_date', \XOBJ_DTYPE_INT);
        $this->initVar('pkg_submitter', \XOBJ_DTYPE_INT);
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
     * @return int inserted id
     */
    public function getNewInsertedIdPackages()
    {
        return $GLOBALS['xoopsDB']->getInsertId();
    }

    /**
     * @public function getForm
     * @param bool|string $action
     * @return \XoopsThemeForm
     */
    public function getFormPackages($action = false)
    {
        $helper = Helper::getInstance();
        $projectsHandler = $helper->getHandler('Projects');
        //$resourcesHandler = $helper->getHandler('Resources');
        $languagesHandler = $helper->getHandler('Languages');
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        $isAdmin = $GLOBALS['xoopsUser']->isAdmin($GLOBALS['xoopsModule']->mid());
        // Title
        $title = $this->isNew() ? \sprintf(\_AM_WGTRANSIFEX_PACKAGE_ADD) : \sprintf(\_AM_WGTRANSIFEX_PACKAGE_EDIT);
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Text pkgName
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_PACKAGE_NAME, 'pkg_name', 50, 255, $this->getVar('pkg_name')), true);
        // Form Editor DhtmlTextArea pkgDesc
        $editorConfigs = [];
        if ($isAdmin) {
            $editor = $helper->getConfig('editor_admin');
        } else {
            $editor = $helper->getConfig('editor_user');
        }
        $editorConfigs['name'] = 'pkg_desc';
        $editorConfigs['value'] = $this->getVar('pkg_desc', 'e');
        $editorConfigs['rows'] = 5;
        $editorConfigs['cols'] = 40;
        $editorConfigs['width'] = '100%';
        $editorConfigs['height'] = '400px';
        $editorConfigs['editor'] = $editor;
        $form->addElement(new \XoopsFormEditor(\_AM_WGTRANSIFEX_PACKAGE_DESC, 'pkg_desc', $editorConfigs));
        // Form Table projects
        $pkgPro_idSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_PACKAGE_PRO_ID, 'pkg_pro_id', $this->getVar('pkg_pro_id'));
        $crProjects = new \CriteriaCompo();
        $crProjects->add(new \Criteria('pro_status', Constants::STATUS_READTX));
        $crProjects->add(new \Criteria('pro_status', Constants::STATUS_READTXNEW), 'OR');
        $pkgPro_idSelect->addOptionArray($projectsHandler->getList($crProjects));
        $form->addElement($pkgPro_idSelect, true);
        // Form Table languages
        $langId = $this->getVar('pkg_lang_id') ?: $languagesHandler->getPrimaryLang();
        $pkgLang_idSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_PACKAGE_LANG_ID, 'pkg_lang_id', $langId);
        $crLanguages = new \CriteriaCompo();
        $crLanguages->add(new \Criteria('lang_online', 1));
        $crLanguages->setSort('lang_name');
        $pkgLang_idSelect->addOptionArray($languagesHandler->getList($crLanguages));
        $form->addElement($pkgLang_idSelect, true);
        $downloadTray = new \XoopsFormElementTray(\_AM_WGTRANSIFEX_PACKAGE_DOWNLOAD, '<br><br>');
        $downloadTray->addElement(new \XoopsFormRadioYN('', 'pkg_download', 0), true);
        $downloadTray->addElement(new \XoopsFormLabel(\_AM_WGTRANSIFEX_PACKAGE_DOWNLOAD_DESC, ''));
        $form->addElement($downloadTray);
        $form->addElement(new \XoopsFormRadioYN(\_AM_WGTRANSIFEX_PACKAGE_ZIPFILE, 'pkg_zipfile', 1), true);
        if (!$this->isNew()) {
            $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_PACKAGE_ZIP, 'pkg_zip', 100, 255, $this->getVar('pkg_zip')));
        }
        // Form Frameworks Images langFlag: Select Uploaded Image
        $getPkg_logo = $this->getVar('pkg_logo');
        $pkgLogo = $getPkg_logo ?: 'blank.gif';
        $imageDirectory = '/uploads/wgtransifex/logos';
        $imageTray = new \XoopsFormElementTray(\_AM_WGTRANSIFEX_PACKAGE_LOGO, '<br>');
        $imageSelect = new \XoopsFormSelect(\sprintf(\_AM_WGTRANSIFEX_PACKAGE_LOGO_UPLOADS, ".{$imageDirectory}/"), 'pkg_logo', $pkgLogo, 5);
        $imageArray = \XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH . $imageDirectory);
        foreach ($imageArray as $image1) {
            $imageSelect->addOption($image1, $image1);
        }
        $imageSelect->setExtra("onchange='showImgSelected(\"imglabel_pkg_logo\", \"pkg_logo\", \"" . $imageDirectory . '", "", "' . XOOPS_URL . "\")'");
        $imageTray->addElement($imageSelect, false);
        $imageTray->addElement(new \XoopsFormLabel('', "<br><img src='" . XOOPS_URL . '/' . $imageDirectory . '/' . $pkgLogo . "' id='imglabel_pkg_logo' alt='' style='max-width:100px'>"));
        // Form Frameworks Images langFlag: Upload new image
        $fileSelectTray = new \XoopsFormElementTray('', '<br>');
        $fileSelectTray->addElement(new \XoopsFormFile(\_AM_WGTRANSIFEX_FORM_UPLOAD_NEW, 'pkg_logo', $helper->getConfig('maxsize_image')));
        $fileSelectTray->addElement(new \XoopsFormLabel(''));
        $imageTray->addElement($fileSelectTray);
        $form->addElement($imageTray);

        $pkgSubmitter = $this->isNew() ? $GLOBALS['xoopsUser']->getVar('uid') : $this->getVar('pkg_submitter');
        if ($this->isNew()) {
            $form->addElement(new \XoopsFormHidden('pkg_submitter', $pkgSubmitter));
        } else {
            // Form Select Status pkgStatus
            $pkgStatusSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_PACKAGE_STATUS, 'pkg_status', $this->getVar('pkg_status'));
            $pkgStatusSelect->addOption(Constants::STATUS_NONE, \_AM_WGTRANSIFEX_STATUS_NONE);
            $pkgStatusSelect->addOption(Constants::STATUS_CREATED, \_AM_WGTRANSIFEX_STATUS_CREATED);
            $pkgStatusSelect->addOption(Constants::STATUS_BROKEN, \_AM_WGTRANSIFEX_STATUS_BROKEN);
            $form->addElement($pkgStatusSelect);
            // Form Text Date Select pkgDate
            $pkgDate = $this->isNew() ? 0 : $this->getVar('pkg_date');
            $form->addElement(new \XoopsFormDateTime(\_AM_WGTRANSIFEX_PACKAGE_DATE, 'pkg_date', '', $pkgDate));
            // Form Select User pkgSubmitter
            $form->addElement(new \XoopsFormSelectUser(\_AM_WGTRANSIFEX_PACKAGE_SUBMITTER, 'pkg_submitter', false, $pkgSubmitter));
        }

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
    public function getValuesPackages($keys = null, $format = null, $maxDepth = null)
    {
        $helper = Helper::getInstance();
        $ret = $this->getValues($keys, $format, $maxDepth);
        $ret['id'] = $this->getVar('pkg_id');
        $ret['name'] = $this->getVar('pkg_name');
        $ret['desc'] = $this->getVar('pkg_desc');
        $projectsHandler = $helper->getHandler('Projects');
        $projectsObj = $projectsHandler->get($this->getVar('pkg_pro_id'));
        $ret['pro_id'] = $projectsObj->getVar('pro_slug');
        $languagesHandler = $helper->getHandler('Languages');
        $languagesObj = $languagesHandler->get($this->getVar('pkg_lang_id'));
        $ret['lang_id'] = $languagesObj->getVar('lang_name');
        $ret['lang_flag'] = $languagesObj->getVar('lang_flag');
        $ret['zip'] = $this->getVar('pkg_zip');
        $ret['logo'] = $this->getVar('pkg_logo');
        $ret['date'] = \formatTimestamp($this->getVar('pkg_date'), 'm');
        $ret['submitter'] = \XoopsUser::getUnameFromId($this->getVar('pkg_submitter'));
        $status = $this->getVar('pkg_status');
        $ret['status'] = $status;
        $status_text = '';
        switch ($status) {
            case Constants::STATUS_NONE:
            default:
                $status_text .= \_AM_WGTRANSIFEX_STATUS_NONE;
                break;
            case Constants::STATUS_CREATED:
                $status_text .= \_AM_WGTRANSIFEX_STATUS_CREATED;
                break;
            case Constants::STATUS_BROKEN:
                $status_text .= \_AM_WGTRANSIFEX_STATUS_BROKEN;
                break;
        }
        $ret['status_text'] = $status_text;

        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArrayPackages()
    {
        $ret = [];
        $vars = $this->getVars();
        foreach (\array_keys($vars) as $var) {
            $ret[$var] = $this->getVar('"{$var}"');
        }

        return $ret;
    }
}
