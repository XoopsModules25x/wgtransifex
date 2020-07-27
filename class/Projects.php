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
 * Class Object Projects
 */
class Projects extends \XoopsObject
{
    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        $this->initVar('pro_id', \XOBJ_DTYPE_INT);
        $this->initVar('pro_description', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('pro_source_language_code', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('pro_slug', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('pro_name', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('pro_txresources', \XOBJ_DTYPE_INT);
        $this->initVar('pro_last_updated', \XOBJ_DTYPE_INT);
        $this->initVar('pro_teams', \XOBJ_DTYPE_TXTAREA);
        $this->initVar('pro_resources', \XOBJ_DTYPE_INT);
        $this->initVar('pro_translations', \XOBJ_DTYPE_INT);
        $this->initVar('pro_archived', \XOBJ_DTYPE_INT);
        $this->initVar('pro_date', \XOBJ_DTYPE_INT);
        $this->initVar('pro_submitter', \XOBJ_DTYPE_INT);
        $this->initVar('pro_status', \XOBJ_DTYPE_INT);
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
    public function getNewInsertedIdProjects()
    {
        return $GLOBALS['xoopsDB']->getInsertId();
    }

    /**
     * @public function getForm
     * @param bool|string $action
     * @return \XoopsThemeForm
     */
    public function getFormProjects($action = false)
    {
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        // Title
        $title = $this->isNew() ? \sprintf(\_AM_WGTRANSIFEX_PROJECT_ADD) : \sprintf(\_AM_WGTRANSIFEX_PROJECT_EDIT);
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Text proDescription
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_PROJECT_DESCRIPTION, 'pro_description', 50, 255, $this->getVar('pro_description')));
        // Form Text proSource_language_code
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_PROJECT_SOURCE_LANGUAGE_CODE, 'pro_source_language_code', 50, 255, $this->getVar('pro_source_language_code')));
        // Form Text proSlug
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_PROJECT_SLUG, 'pro_slug', 50, 255, $this->getVar('pro_slug')));
        // Form Text proName
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_PROJECT_NAME, 'pro_name', 50, 255, $this->getVar('pro_name')));
        // Form Text proTxresources
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_PROJECT_TXRESOURCES, 'pro_txresources', 50, 255, $this->getVar('pro_txresources')));
        // Form Text Date Select proLastupdated
        $proLastupdated = $this->isNew() ? 0 : $this->getVar('pro_last_updated');
        $form->addElement(new \XoopsFormDateTime(\_AM_WGTRANSIFEX_PROJECT_LAST_UPDATED, 'pro_last_updated', '', $proLastupdated));
        // Form Text proTeams
        $form->addElement(new \XoopsFormTextArea(\_AM_WGTRANSIFEX_PROJECT_TEAMS, 'pro_teams', $this->getVar('pro_teams', 'e'), 4, 47));
        // Form Select Status proStatus
        $proStatusSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_PROJECT_STATUS, 'pro_status', $this->getVar('pro_status'));
        $proStatusSelect->addOption(Constants::STATUS_NONE, \_AM_WGTRANSIFEX_STATUS_NONE);
        $proStatusSelect->addOption(Constants::STATUS_SUBMITTED, \_AM_WGTRANSIFEX_STATUS_SUBMITTED);
        $proStatusSelect->addOption(Constants::STATUS_BROKEN, \_AM_WGTRANSIFEX_STATUS_BROKEN);
        $proStatusSelect->addOption(Constants::STATUS_READTX, \_AM_WGTRANSIFEX_STATUS_READTX);
        $proStatusSelect->addOption(Constants::STATUS_ARCHIVED, \_AM_WGTRANSIFEX_STATUS_ARCHIVED);
        $proStatusSelect->addOption(Constants::STATUS_DELETEDTX, \_AM_WGTRANSIFEX_STATUS_DELETEDTX);
        $form->addElement($proStatusSelect);
        // Form Text proResources
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_RESOURCES_NB, 'pro_resources', 50, 255, $this->getVar('pro_resources')));
        // Form Text proTranslations
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_TRANSLATIONS_NB, 'pro_translations', 50, 255, $this->getVar('pro_translations')));
        // Form Radio Yes/No proArchived
        $proArchived = $this->isNew() ? 0 : $this->getVar('pro_archived');
        $form->addElement(new \XoopsFormRadioYN(\_AM_WGTRANSIFEX_PROJECT_ARCHIVED, 'pro_archived', $proArchived));
        // Form Text Date Select proDate
        $proDate = $this->isNew() ? 0 : $this->getVar('pro_date');
        $form->addElement(new \XoopsFormDateTime(\_AM_WGTRANSIFEX_PROJECT_DATE, 'pro_date', '', $proDate));
        // Form Select User proSubmitter
        $proSubmitter = $this->isNew() ? $GLOBALS['xoopsUser']->getVar('uid') : $this->getVar('pro_submitter');
        $form->addElement(new \XoopsFormSelectUser(\_AM_WGTRANSIFEX_PROJECT_SUBMITTER, 'pro_submitter', false, $proSubmitter));
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
    public function getValuesProjects($keys = null, $format = null, $maxDepth = null)
    {
        $ret = $this->getValues($keys, $format, $maxDepth);
        $ret['id'] = $this->getVar('pro_id');
        $ret['description'] = $this->getVar('pro_description');
        $ret['source_language_code'] = $this->getVar('pro_source_language_code');
        $ret['slug'] = $this->getVar('pro_slug');
        $ret['name'] = $this->getVar('pro_name');
        $ret['txresources'] = $this->getVar('pro_txresources');
        $ret['last_updated'] = \formatTimestamp($this->getVar('pro_last_updated'), 'm');
        $teams = '<ul>';
        $teams_short = '<ul>';
        $key = 0;
        $teams_arr = \json_decode(\html_entity_decode($this->getVar('pro_teams')), true);
        foreach ($teams_arr as $key => $value) {
            $teams .= '<li>' . $value . '</li>';
            if ($key < 4) {
                $teams_short .= '<li>' . $value . '</li>';
            }
        }
        if ($key > 3) {
            $teams_short .= '<li>...</li>';
        }
        $teams .= '</ul>';
        $teams_short .= '</ul>';
        $ret['teams'] = $teams;
        $ret['teams_short'] = $teams_short;
        $ret['resources'] = $this->getVar('pro_resources');
        $ret['translations'] = $this->getVar('pro_translations');
        $ret['date'] = \formatTimestamp($this->getVar('pro_date'), 'm');
        $ret['submitter'] = \XoopsUser::getUnameFromId($this->getVar('pro_submitter'));
        $ret['archived'] = $this->getVar('pro_archived');
        $status = $this->getVar('pro_status');
        $ret['status'] = $status;
        switch ($status) {
            case Constants::STATUS_NONE:
                $status_text = \_AM_WGTRANSIFEX_STATUS_NONE;
                break;
            case Constants::STATUS_SUBMITTED:
                $status_text = \_AM_WGTRANSIFEX_STATUS_SUBMITTED;
                break;
            case Constants::STATUS_APPROVED:
                $status_text = \_AM_WGTRANSIFEX_STATUS_APPROVED;
                break;
            case Constants::STATUS_READTX:
                $status_text = \_AM_WGTRANSIFEX_STATUS_READTX;
                break;
            case Constants::STATUS_ARCHIVED:
                $status_text = \_AM_WGTRANSIFEX_STATUS_ARCHIVED;
                break;
            case Constants::STATUS_READTXNEW:
                $status_text = \_AM_WGTRANSIFEX_STATUS_READTXNEW;
                break;
            case Constants::STATUS_DELETEDTX:
                $status_text = \_AM_WGTRANSIFEX_STATUS_DELETEDTX;
                break;
            case -1:
            default:
                $status_text = 'missing status text'; /* this should not be */
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
    public function toArrayProjects()
    {
        $ret = [];
        $vars = $this->getVars();
        foreach (\array_keys($vars) as $var) {
            $ret[$var] = $this->getVar('"{$var}"');
        }

        return $ret;
    }
}
