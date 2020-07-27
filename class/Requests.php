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
 * @author         TDM XOOPS - Email:<info@email.com> - Website:<http://xoops.org>
 */

use XoopsModules\Wgtransifex;

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Requests
 */
class Requests extends \XoopsObject
{
    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        $this->initVar('req_id', \XOBJ_DTYPE_INT);
        $this->initVar('req_pro_id', \XOBJ_DTYPE_INT);
        $this->initVar('req_lang_id', \XOBJ_DTYPE_INT);
        $this->initVar('req_info', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('req_status', \XOBJ_DTYPE_INT);
        $this->initVar('req_statusdate', \XOBJ_DTYPE_INT);
        $this->initVar('req_statusuid', \XOBJ_DTYPE_INT);
        $this->initVar('req_date', \XOBJ_DTYPE_INT);
        $this->initVar('req_submitter', \XOBJ_DTYPE_INT);
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
    public function getNewInsertedIdRequests()
    {
        return $GLOBALS['xoopsDB']->getInsertId();
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormRequests($action = false)
    {
        $helper = \XoopsModules\Wgtransifex\Helper::getInstance();
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        // Title
        $title = $this->isNew() ? \sprintf(\_AM_WGTRANSIFEX_REQUEST_ADD) : \sprintf(\_AM_WGTRANSIFEX_REQUEST_EDIT);
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Table projects
        $projectsHandler = $helper->getHandler('Projects');
        $reqProjectSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_REQUEST_PROJECT, 'req_pro_id', $this->getVar('req_pro_id'));
        $reqProjectSelect->addOptionArray($projectsHandler->getList());
        $reqProjectSelect->addOption(0, \_AM_WGTRANSIFEX_REQUEST_PROJECT_NOTINLIST);
        $form->addElement($reqProjectSelect, true);
        // Form Table languages
        $languagesHandler = $helper->getHandler('Languages');
        $reqLanguageSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_REQUEST_LANGUAGE, 'req_lang_id', $this->getVar('req_lang_id'));
        $reqLanguageSelect->addOptionArray($languagesHandler->getList());
        $form->addElement($reqLanguageSelect);
        // Form Text reqInfo
        $reqInfoText = new \XoopsFormText(\_AM_WGTRANSIFEX_REQUEST_INFO, 'req_info', 50, 255, $this->getVar('req_info'));
        $reqInfoText->setDescription(\_AM_WGTRANSIFEX_REQUEST_INFO_DESC);
        $form->addElement($reqInfoText);
        // Form Select Status reqStatus
        $reqStatusSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_REQUEST_STATUS, 'req_status', $this->getVar('req_status'));
        $reqStatusSelect->addOption(Constants::STATUS_NONE, \_AM_WGTRANSIFEX_STATUS_NONE);
        $reqStatusSelect->addOption(Constants::STATUS_PENDING, \_AM_WGTRANSIFEX_STATUS_PENDING);
        $reqStatusSelect->addOption(Constants::STATUS_CREATED, \_AM_WGTRANSIFEX_STATUS_CREATED);
        $form->addElement($reqStatusSelect);
        // Form Text Date Select reqStatusdate
        $reqStatusdate = $this->isNew() ?: $this->getVar('req_statusdate');
        $form->addElement(new \XoopsFormDateTime(\_AM_WGTRANSIFEX_REQUEST_STATUSDATE, 'req_statusdate', '', $reqStatusdate));
        // Form Select User reqStatusuid
        $form->addElement(new \XoopsFormSelectUser(\_AM_WGTRANSIFEX_REQUEST_STATUSUID, 'req_statusuid', false, $this->getVar('req_statusuid')));
        // Form Text Date Select reqDate
        $reqDate = $this->isNew() ?: $this->getVar('req_date');
        $form->addElement(new \XoopsFormDateTime(\_AM_WGTRANSIFEX_REQUEST_DATE, 'req_date', '', $reqDate));
        // Form Select User reqSubmitter
        $reqSubmitter = isset($GLOBALS['xoopsUser']) && is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->getVar('uid') : 0;
        $form->addElement(new \XoopsFormSelectUser(\_AM_WGTRANSIFEX_REQUEST_SUBMITTER, 'req_submitter', false, $reqSubmitter));
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
    public function getFormRequestUser($action = false)
    {
        $helper = \XoopsModules\Wgtransifex\Helper::getInstance();
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        // Title
        $title = $this->isNew() ? \sprintf(\_AM_WGTRANSIFEX_REQUEST_ADD) : \sprintf(\_AM_WGTRANSIFEX_REQUEST_EDIT);
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Table projects
        $projectsHandler = $helper->getHandler('Projects');
        $reqProjectSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_REQUEST_PROJECT, 'req_pro_id', $this->getVar('req_pro_id'));
        $reqProjectSelect->addOptionArray($projectsHandler->getList());
        $reqProjectSelect->addOption(0, \_AM_WGTRANSIFEX_REQUEST_PROJECT_NOTINLIST);
        $form->addElement($reqProjectSelect, true);
        // Form Table languages
        $languagesHandler = $helper->getHandler('Languages');
        $reqLanguageSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_REQUEST_LANGUAGE, 'req_lang_id', $this->getVar('req_lang_id'));
        $reqLanguageSelect->addOptionArray($languagesHandler->getList());
        $form->addElement($reqLanguageSelect);
        // Form Text reqInfo
        $reqInfoText = new \XoopsFormText(\_AM_WGTRANSIFEX_REQUEST_INFO, 'req_info', 50, 255, $this->getVar('req_info'));
        $reqInfoText->setDescription(\_AM_WGTRANSIFEX_REQUEST_INFO_DESC);
        $form->addElement($reqInfoText);

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
    public function getValuesRequests($keys = null, $format = null, $maxDepth = null)
    {
        $helper = \XoopsModules\Wgtransifex\Helper::getInstance();
        $ret = $this->getValues($keys, $format, $maxDepth);
        $ret['id'] = $this->getVar('req_id');
        $projectsHandler = $helper->getHandler('Projects');
        $proId = $this->getVar('req_pro_id');
        if ($proId > 0) {
            $projectsObj = $projectsHandler->get($this->getVar('req_pro_id'));
            $ret['project'] = $projectsObj->getVar('pro_slug');
        } else {
            $ret['project'] = _AM_WGTRANSIFEX_REQUEST_PROJECT_NOTINLIST;
        }
        $languagesHandler = $helper->getHandler('Languages');
        $languagesObj = $languagesHandler->get($this->getVar('req_lang_id'));
        $ret['language'] = $languagesObj->getVar('lang_name');
        $ret['info'] = $this->getVar('req_info');
        $status = $this->getVar('req_status');
        $ret['status'] = $status;
        switch ($status) {
            case Constants::STATUS_NONE:
            default:
                $status_text = \_AM_WGTRANSIFEX_STATUS_NONE;
                break;
            case Constants::STATUS_CREATED:
                $status_text = \_AM_WGTRANSIFEX_STATUS_CREATED;
                break;
            case Constants::STATUS_PENDING:
                $status_text = \_AM_WGTRANSIFEX_STATUS_PENDING;
                break;
        }
        $ret['status_text'] = $status_text;
        $ret['statusdate'] = \formatTimestamp($this->getVar('req_statusdate'), 'm');
        $ret['statusuid'] = \XoopsUser::getUnameFromId($this->getVar('req_statusuid'));
        $ret['date'] = \formatTimestamp($this->getVar('req_date'), 'm');
        $ret['submitter'] = \XoopsUser::getUnameFromId($this->getVar('req_submitter'));

        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArrayRequests()
    {
        $ret = [];
        $vars = $this->getVars();
        foreach (\array_keys($vars) as $var) {
            $ret[$var] = $this->getVar('"{$var}"');
        }

        return $ret;
    }
}
