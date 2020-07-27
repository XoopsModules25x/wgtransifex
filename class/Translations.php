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

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Translations
 */
class Translations extends \XoopsObject
{
    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        $this->initVar('tra_id', \XOBJ_DTYPE_INT);
        $this->initVar('tra_pro_id', \XOBJ_DTYPE_INT);
        $this->initVar('tra_res_id', \XOBJ_DTYPE_INT);
        $this->initVar('tra_lang_id', \XOBJ_DTYPE_INT);
        $this->initVar('tra_content', \XOBJ_DTYPE_TXTAREA);
        $this->initVar('tra_mimetype', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('tra_local', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('tra_status', \XOBJ_DTYPE_INT);
        $this->initVar('tra_date', \XOBJ_DTYPE_INT);
        $this->initVar('tra_submitter', \XOBJ_DTYPE_INT);
        $this->initVar('tra_proofread', \XOBJ_DTYPE_INT);
        $this->initVar('tra_proofread_percentage', \XOBJ_DTYPE_INT);
        $this->initVar('tra_reviewed_percentage', \XOBJ_DTYPE_INT);
        $this->initVar('tra_completed', \XOBJ_DTYPE_INT);
        $this->initVar('tra_untranslated_words', \XOBJ_DTYPE_INT);
        //$this->initVar('tra_last_commiter', XOBJ_DTYPE_TXTBOX);
        $this->initVar('tra_reviewed', \XOBJ_DTYPE_INT);
        $this->initVar('tra_translated_entities', \XOBJ_DTYPE_INT);
        $this->initVar('tra_translated_words', \XOBJ_DTYPE_INT);
        $this->initVar('tra_last_update', \XOBJ_DTYPE_INT);
        $this->initVar('tra_untranslated_entities', \XOBJ_DTYPE_INT);
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
    public function getNewInsertedIdTranslations()
    {
        return $GLOBALS['xoopsDB']->getInsertId();
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormTranslations($action = false)
    {
        $helper = \XoopsModules\Wgtransifex\Helper::getInstance();
        $projectsHandler = $helper->getHandler('Projects');
        $resourcesHandler = $helper->getHandler('Resources');
        $languagesHandler = $helper->getHandler('Languages');
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        // Title
        $title = $this->isNew() ? \sprintf(\_AM_WGTRANSIFEX_TRANSLATION_ADD) : \sprintf(\_AM_WGTRANSIFEX_TRANSLATION_EDIT);
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Table projects
        $traPro_idSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_TRANSLATION_PRO_ID, 'tra_pro_id', $this->getVar('tra_pro_id'));
        $traPro_idSelect->addOptionArray($projectsHandler->getList());
        $form->addElement($traPro_idSelect, true);
        // Form Table resources
        $traRes_idSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_TRANSLATION_RES_ID, 'tra_res_id', $this->getVar('tra_res_id'));
        $traRes_idSelect->addOptionArray($resourcesHandler->getList());
        $form->addElement($traRes_idSelect, true);
        // Form Table languages
        $langId = $this->isNew() ? $languagesHandler->getPrimaryLang() : $this->getVar('tra_lang_id');
        $traLang_idSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_TRANSLATION_LANG_ID, 'tra_lang_id', $langId);
        $crLanguages = new \CriteriaCompo();
        $crLanguages->add(new \Criteria('lang_online', 1));
        $crLanguages->setSort('lang_name');
        $traLang_idSelect->addOptionArray($languagesHandler->getList($crLanguages));
        $form->addElement($traLang_idSelect);
        // Form Editor TextArea traContent
        $form->addElement(new \XoopsFormTextArea(\_AM_WGTRANSIFEX_TRANSLATION_CONTENT, 'tra_content', $this->getVar('tra_content', 'e'), 20, 47));
        // Form Text traMimetype
        // $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_TRANSLATION_MIMETYPE, 'tra_mimetype', 50, 255, $this->getVar('tra_mimetype')));
        $form->addElement(new \XoopsFormHidden('tra_mimetype', $this->getVar('tra_mimetype')));
        // Form Text traMimetype
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_TRANSLATION_LOCAL, 'tra_local', 50, 255, $this->getVar('tra_local')));
        //$form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_TRANSLATION_PROOFREAD, 'tra_proofread', 50, 255, $this->getVar('tra_proofread')));
        $form->addElement(new \XoopsFormHidden('tra_proofread', $this->getVar('tra_proofread')));
        //$form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_TRANSLATION_PROOFREAD_PERC, 'tra_proofread_percentage', 50, 255, $this->getVar('tra_proofread_percentage')));
        $form->addElement(new \XoopsFormHidden('tra_proofread_percentage', $this->getVar('tra_proofread_percentage')));
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_TRANSLATION_REVIEWED, 'tra_reviewed', 50, 255, $this->getVar('tra_reviewed')));
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_TRANSLATION_REVIEWED_PERC, 'tra_reviewed_percentage', 50, 255, $this->getVar('tra_reviewed_percentage')));
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_TRANSLATION_COMPLETED, 'tra_completed', 50, 255, $this->getVar('tra_completed')));
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_TRANSLATION_UNTRANSLATED_WORDS, 'tra_untranslated_words', 50, 255, $this->getVar('tra_untranslated_words')));
        //$form->addElement(new \XoopsFormText( _AM_WGTRANSIFEX_TRANSLATION_LAST_COMMITER, 'tra_last_commiter', 50, 255, $this->getVar('tra_last_commiter') ) );
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_TRANSLATION_TRANSLATED_WORDS, 'tra_translated_words', 50, 255, $this->getVar('tra_translated_words')));
        $form->addElement(new \XoopsFormText(\_AM_WGTRANSIFEX_TRANSLATION_UNTRANSLATED_ENT, 'tra_untranslated_entities', 50, 255, $this->getVar('tra_untranslated_entities')));
        $form->addElement(new \XoopsFormDateTime(\_AM_WGTRANSIFEX_TRANSLATION_LAST_UPDATE, 'tra_last_update', '', $this->getVar('tra_last_update')));
        // Form Select Status traStatus
        $traStatusSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_TRANSLATION_STATUS, 'tra_status', $this->getVar('tra_status'));
        $traStatusSelect->addOption(Constants::STATUS_NONE, \_AM_WGTRANSIFEX_STATUS_NONE);
        $traStatusSelect->addOption(Constants::STATUS_SUBMITTED, \_AM_WGTRANSIFEX_STATUS_SUBMITTED);
        $traStatusSelect->addOption(Constants::STATUS_READTX, \_AM_WGTRANSIFEX_STATUS_READTX);
        $traStatusSelect->addOption(Constants::STATUS_OUTDATED, \_AM_WGTRANSIFEX_STATUS_OUTDATED);
        $form->addElement($traStatusSelect, true);
        // Form Text Date Select traDate
        $traDate = $this->isNew() ? 0 : $this->getVar('tra_date');
        $form->addElement(new \XoopsFormDateTime(\_AM_WGTRANSIFEX_TRANSLATION_DATE, 'tra_date', '', $traDate));
        // Form Select User traSubmitter
        $traSubmitter = $this->isNew() ? $GLOBALS['xoopsUser']->getVar('uid') : $this->getVar('tra_submitter');
        $form->addElement(new \XoopsFormSelectUser(\_AM_WGTRANSIFEX_TRANSLATION_SUBMITTER, 'tra_submitter', false, $traSubmitter));
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'save'));
        $form->addElement(new \XoopsFormButtonTray('', \_SUBMIT, 'submit', '', false));

        return $form;
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormTranslationsTx($action = false)
    {
        $helper = \XoopsModules\Wgtransifex\Helper::getInstance();
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        // Title
        $title = \_AM_WGTRANSIFEX_READTX_TRANSLATION;
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Table projects
        $projectsHandler = $helper->getHandler('Projects');
        $resourcesHandler = $helper->getHandler('Resources');
        $traPro_idSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_TRANSLATION_PRO_ID, 'tra_pro_id', $this->getVar('tra_pro_id'));
        $projectsCount = $projectsHandler->getCountProjects();
        if ($projectsCount > 0) {
            $projectsAll = $projectsHandler->getAll();
            foreach (\array_keys($projectsAll) as $i) {
                $proId = $projectsAll[$i]->getVar('pro_id');
                $crResources = new \CriteriaCompo();
                $crResources->add(new \Criteria('res_pro_id', $proId));
                $resourcesCount = $resourcesHandler->getCount($crResources);
                if ($resourcesCount > 0) {
                    $traPro_idSelect->addOption($proId, $projectsAll[$i]->getVar('pro_name'));
                }
                unset($crResources);
            }
        }
        $form->addElement($traPro_idSelect, true);
        // Form Table languages
        $languagesHandler = $helper->getHandler('Languages');
        $langId = $this->isNew() ? $languagesHandler->getPrimaryLang() : $this->getVar('tra_lang_id');
        $traLang_idSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_TRANSLATION_LANG_ID, 'tra_lang_id', $langId);
        $crLanguages = new \CriteriaCompo();
        $crLanguages->add(new \Criteria('lang_online', 1));
        $crLanguages->setSort('lang_name');
        $traLang_idSelect->addOptionArray($languagesHandler->getList($crLanguages));
        $form->addElement($traLang_idSelect);
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
    public function getValuesTranslations($keys = null, $format = null, $maxDepth = null)
    {
        $helper = \XoopsModules\Wgtransifex\Helper::getInstance();
        $utility = new \XoopsModules\Wgtransifex\Utility();
        $ret = $this->getValues($keys, $format, $maxDepth);
        $ret['id'] = $this->getVar('tra_id');
        $projectsHandler = $helper->getHandler('Projects');
        $projectsObj = $projectsHandler->get($this->getVar('tra_pro_id'));
        $ret['pro_id'] = $projectsObj->getVar('pro_slug');
        $resourcesHandler = $helper->getHandler('Resources');
        $resourcesObj = $resourcesHandler->get($this->getVar('tra_res_id'));
        $ret['res_id'] = $resourcesObj->getVar('res_slug');
        $languagesHandler = $helper->getHandler('Languages');
        $languagesObj = $languagesHandler->get($this->getVar('tra_lang_id'));
        $ret['lang_id'] = $languagesObj->getVar('lang_name');
        $ret['content'] = \strip_tags($this->getVar('tra_content', 'e'));
        $editorMaxchar = $helper->getConfig('editor_maxchar');
        $ret['content_short'] = $utility::truncateHtml($ret['content'], $editorMaxchar, '...', true);
        $ret['mimetype'] = $this->getVar('tra_mimetype');
        $ret['local'] = $this->getVar('tra_local');
        $status = $this->getVar('tra_status');
        $ret['status'] = $status;
        switch ($status) {
            case Constants::STATUS_NONE:
                $status_text = \_AM_WGTRANSIFEX_STATUS_NONE;
                break;
            case Constants::STATUS_SUBMITTED:
                $status_text = \_AM_WGTRANSIFEX_STATUS_SUBMITTED;
                break;
            case Constants::STATUS_READTX:
                $status_text = \_AM_WGTRANSIFEX_STATUS_READTX;
                break;
            case Constants::STATUS_ARCHIVED:
                $status_text = \_AM_WGTRANSIFEX_STATUS_ARCHIVED;
                break;
            case Constants::STATUS_OUTDATED:
                $status_text = \_AM_WGTRANSIFEX_STATUS_OUTDATED;
                break;
            case -1:
            default:
                $status_text = 'missing status text'; /* this should not be */
                break;
        }
        $ret['status_text'] = $status_text;
        $ret['date'] = \formatTimestamp($this->getVar('tra_date'), 'm');
        $ret['submitter'] = \XoopsUser::getUnameFromId($this->getVar('tra_submitter'));
        $ret['proofread'] = $this->getVar('tra_proofread');
        $ret['proofread_percentage'] = $this->getVar('tra_proofread_percentage');
        $ret['reviewed'] = $this->getVar('tra_reviewed');
        $ret['reviewed_percentage'] = $this->getVar('tra_reviewed_percentage');
        $ret['untranslated_words'] = $this->getVar('tra_untranslated_words');
        $ret['translated_words'] = $this->getVar('tra_translated_words');
        $ret['translated_entities'] = $this->getVar('tra_translated_entities');
        $ret['untranslated_entities'] = $this->getVar('tra_untranslated_entities');
        $ret['completed'] = $this->getVar('tra_completed');
        //$ret['last_commiter']        = $this->getVar('tra_last_commiter');
        $ret['last_update'] = \formatTimestamp($this->getVar('tra_last_update'), 'm');

        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArrayTranslations()
    {
        $ret = [];
        $vars = $this->getVars();
        foreach (\array_keys($vars) as $var) {
            $ret[$var] = $this->getVar('"{$var}"');
        }

        return $ret;
    }
}
