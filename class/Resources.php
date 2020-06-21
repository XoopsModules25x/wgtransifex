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
 * Class Object Resources
 */
class Resources extends \XoopsObject
{
    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        $this->initVar('res_id', XOBJ_DTYPE_INT);
        $this->initVar('res_source_language_code', XOBJ_DTYPE_TXTBOX);
        $this->initVar('res_name', XOBJ_DTYPE_TXTBOX);
        $this->initVar('res_i18n_type', XOBJ_DTYPE_TXTBOX);
        $this->initVar('res_priority', XOBJ_DTYPE_TXTBOX);
        $this->initVar('res_slug', XOBJ_DTYPE_TXTBOX);
        $this->initVar('res_categories', XOBJ_DTYPE_TXTBOX);
        $this->initVar('res_metadata', XOBJ_DTYPE_TXTAREA);
        $this->initVar('res_translations', XOBJ_DTYPE_INT);
        $this->initVar('res_date', XOBJ_DTYPE_INT);
        $this->initVar('res_submitter', XOBJ_DTYPE_INT);
        $this->initVar('res_status', XOBJ_DTYPE_INT);
        $this->initVar('res_pro_id', XOBJ_DTYPE_INT);
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
    public function getNewInsertedIdResources()
    {
        $newInsertedId = $GLOBALS['xoopsDB']->getInsertId();
        return $newInsertedId;
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormResources($action = false)
    {
        $helper = \XoopsModules\Wgtransifex\Helper::getInstance();
        if (false === $action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        // Title
        $title = $this->isNew() ? sprintf(_AM_WGTRANSIFEX_RESOURCE_ADD) : sprintf(_AM_WGTRANSIFEX_RESOURCE_EDIT);
        // Get Theme Form
        xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Table projects
        $projectsHandler = $helper->getHandler('Projects');
        $resPro_idSelect = new \XoopsFormSelect(_AM_WGTRANSIFEX_RESOURCE_PRO_ID, 'res_pro_id', $this->getVar('res_pro_id'));
        $resPro_idSelect->addOptionArray($projectsHandler->getList());
        $form->addElement($resPro_idSelect);
        // Form Text resSource_language_code
        $form->addElement(new \XoopsFormText(_AM_WGTRANSIFEX_RESOURCE_SOURCE_LANGUAGE_CODE, 'res_source_language_code', 50, 255, $this->getVar('res_source_language_code')));
        // Form Text resName
        $form->addElement(new \XoopsFormText(_AM_WGTRANSIFEX_RESOURCE_NAME, 'res_name', 50, 255, $this->getVar('res_name')));
        // Form Text resI18n_type
        $form->addElement(new \XoopsFormText(_AM_WGTRANSIFEX_RESOURCE_I18N_TYPE, 'res_i18n_type', 50, 255, $this->getVar('res_i18n_type')));
        // Form Text resPriority
        $form->addElement(new \XoopsFormText(_AM_WGTRANSIFEX_RESOURCE_PRIORITY, 'res_priority', 50, 255, $this->getVar('res_priority')));
        // Form Text resCategories
        $form->addElement(new \XoopsFormText(_AM_WGTRANSIFEX_RESOURCE_CATEGORIES, 'res_categories', 50, 255, $this->getVar('res_categories')));
        // Form Editor TextArea resMetadata
        $form->addElement(new \XoopsFormTextArea(_AM_WGTRANSIFEX_RESOURCE_METADATA, 'res_metadata', $this->getVar('res_metadata', 'e'), 4, 47));
        // Form Select Status resStatus
        $resStatusSelect = new \XoopsFormSelect(_AM_WGTRANSIFEX_RESOURCE_STATUS, 'res_status', $this->getVar('res_status'));
        $resStatusSelect->addOption(Constants::STATUS_NONE, _AM_WGTRANSIFEX_STATUS_NONE);
        $resStatusSelect->addOption(Constants::STATUS_OFFLINE, _AM_WGTRANSIFEX_STATUS_OFFLINE);
        $resStatusSelect->addOption(Constants::STATUS_SUBMITTED, _AM_WGTRANSIFEX_STATUS_SUBMITTED);
        $resStatusSelect->addOption(Constants::STATUS_APPROVED, _AM_WGTRANSIFEX_STATUS_APPROVED);
        $resStatusSelect->addOption(Constants::STATUS_READTX, _AM_WGTRANSIFEX_STATUS_READTX);
        $form->addElement($resStatusSelect);
        // Form Text resTranslations
        //$resTranslations = $this->isNew() ? 0 : $this->getVar('res_translations');
        //$form->addElement(new \XoopsFormText( _AM_WGTRANSIFEX_RESOURCE_TRANSLATIONS, 'res_translations', 50, 255, $resTranslations ) );
        // Form Text Date Select resDate
        $resDate = $this->isNew() ? 0 : $this->getVar('res_date');
        $form->addElement(new \XoopsFormDateTime(_AM_WGTRANSIFEX_RESOURCE_DATE, 'res_date', '', $resDate));
        // Form Select User resSubmitter
        $form->addElement(new \XoopsFormSelectUser(_AM_WGTRANSIFEX_RESOURCE_SUBMITTER, 'res_submitter', false, $this->getVar('res_submitter')));
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'save'));
        $form->addElement(new \XoopsFormButtonTray('', _SUBMIT, 'submit', '', false));
        return $form;
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormResourcesTx($action = false)
    {
        $helper = \XoopsModules\Wgtransifex\Helper::getInstance();
        if (false === $action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        // Title
        $title = _AM_WGTRANSIFEX_READTX;
        // Get Theme Form
        xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Table projects
        $projectsHandler = $helper->getHandler('Projects');
        $resPro_idSelect = new \XoopsFormSelect(_AM_WGTRANSIFEX_RESOURCE_PRO_ID, 'res_pro_id', $this->getVar('res_pro_id'));
        $resPro_idSelect->addOptionArray($projectsHandler->getList());
        $form->addElement($resPro_idSelect);
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'savetx'));
        $form->addElement(new \XoopsFormButtonTray('', $title, 'submit', '', false));
        return $form;
    }

    /**
     * Get Values
     * @param null $keys
     * @param null $format
     * @param null $maxDepth
     * @return array
     */
    public function getValuesResources($keys = null, $format = null, $maxDepth = null)
    {
        $helper                      = \XoopsModules\Wgtransifex\Helper::getInstance();
        $utility                     = new \XoopsModules\Wgtransifex\Utility();
        $ret                         = $this->getValues($keys, $format, $maxDepth);
        $ret['id']                   = $this->getVar('res_id');
        $ret['source_language_code'] = $this->getVar('res_source_language_code');
        $ret['name']                 = $this->getVar('res_name');
        $ret['i18n_type']            = $this->getVar('res_i18n_type');
        $ret['priority']             = $this->getVar('res_priority');
        $ret['slug']                 = $this->getVar('res_slug');
        $ret['categories']           = $this->getVar('res_categories');
        $ret['metadata']             = strip_tags($this->getVar('res_metadata', 'e'));
        $editorMaxchar               = $helper->getConfig('editor_maxchar');
        $ret['metadata_short']       = $utility::truncateHtml($ret['metadata'], $editorMaxchar);
        $ret['translations']         = $this->getVar('res_translations');
        $ret['date']                 = formatTimeStamp($this->getVar('res_date'), 'm');
        $ret['submitter']            = \XoopsUser::getUnameFromId($this->getVar('res_submitter'));
        $status                      = $this->getVar('res_status');
        $ret['status']               = $status;
        switch ($status) {
            case Constants::STATUS_NONE:
            default:
                $status_text = _AM_WGTRANSIFEX_STATUS_NONE;
                break;
            case Constants::STATUS_OFFLINE:
                $status_text = _AM_WGTRANSIFEX_STATUS_OFFLINE;
                break;
            case Constants::STATUS_SUBMITTED:
                $status_text = _AM_WGTRANSIFEX_STATUS_SUBMITTED;
                break;
        }
        $ret['status_text'] = $status_text;
        $projectsHandler    = $helper->getHandler('Projects');
        $projectsObj        = $projectsHandler->get($this->getVar('res_pro_id'));
        $ret['pro_id']      = $projectsObj->getVar('pro_slug');
        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArrayResources()
    {
        $ret  = [];
        $vars = $this->getVars();
        foreach (array_keys($vars) as $var) {
            $ret[$var] = $this->getVar('"{$var}"');
        }
        return $ret;
    }
}
