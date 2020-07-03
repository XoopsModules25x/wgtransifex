<?php

namespace XoopsModules\Wgtransifex;

/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * @copyright    XOOPS Project https://xoops.org/
 * @license      GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package
 * @since
 * @author       Goffy - XOOPS Development Team
 */

/**
 * Class Transifex
 */
class Transifex
{
    public const MASK_NO_TRIM = 1;
    public const MASK_ALLOW_RAW = 2;
    public const MASK_ALLOW_HTML = 4;

    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
    }

    /**
     * @static function &getInstance
     *
     * @param null
     * @return Transifex of Transifex
     */
    public static function getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
        return $instance;
    }

    /**
     * Get data of all project on transifex
     *
     * @param $proId
     * @return bool
     */
    public function readProjects($proId)
    {
        $setting = $this->getSetting();
        global $xoopsUser;
        $helper          = \XoopsModules\Wgtransifex\Helper::getInstance();
        $projectsHandler = $helper->getHandler('Projects');
        $count_ok        = 0;
        $count_err       = 0;
        //request data from transifex
        $transifexLib           = new \XoopsModules\Wgtransifex\TransifexLib();
        $transifexLib->user     = $setting['user'];
        $transifexLib->password = $setting['pwd'];
        $items                  = $transifexLib->getProjects();
        foreach ($items as $item) {
            $projectsObj = null;
            $crProjects  = new \CriteriaCompo();
            $crProjects->add(new \Criteria('pro_slug', $item['slug']));
            $projectsCount = $projectsHandler->getCount($crProjects);
            if ($projectsCount > 0) {
                $projectsObjExist = $projectsHandler->getObjects($crProjects);
                if ($proId > 0) {
                    if ($proId == $projectsObjExist[0]->getVar('pro_id')) {
                        $projectsObj = $projectsHandler->get($projectsObjExist[0]->getVar('pro_id'));
                    }
                } else {
                    $projectsObj = $projectsHandler->get($projectsObjExist[0]->getVar('pro_id'));
                }
                $projectsObj->setVar('pro_status', Constants::STATUS_READTX);
            } else {
                $projectsObj = $projectsHandler->create();
                $projectsObj->setVar('pro_status', Constants::STATUS_READTXNEW);
            }
            if (\is_object($projectsObj)) {
                $project = $transifexLib->getProject($item['slug'], true);
                // Set Vars
                $projectsObj->setVar('pro_description', $project['description']);
                $projectsObj->setVar('pro_source_language_code', $project['source_language_code']);
                $projectsObj->setVar('pro_slug', $project['slug']);
                $projectsObj->setVar('pro_name', $project['name']);
                if ('true' == $project['archived']) {
                    $projectsObj->setVar('pro_status', Constants::STATUS_ARCHIVED);
                    $projectsObj->setVar('pro_archived', 1);
                } else {
                    $projectsObj->setVar('pro_archived', 0);
                }
                $projectsObj->setVar('pro_txresources', \count($project['resources']));
                $projectsObj->setVar('pro_last_updated', \strtotime($project['last_updated']));
                $teams = \json_encode($project['teams'], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
                //str_replace(']', '', $teams);
                $projectsObj->setVar('pro_teams', $teams);

                $projectsObj->setVar('pro_date', \time());
                $projectsObj->setVar('pro_submitter', $xoopsUser->getVar('uid'));
                // Insert Data
                if ($projectsHandler->insert($projectsObj)) {
                    $count_ok++;
                } else {
                    $count_err++;
                }
            }
        }
        if ($count_err > 0) {
            return \_AM_WGTRANSIFEX_READTX_ERROR;
        }
        if ($count_ok > 0) {
            return \_AM_WGTRANSIFEX_READTX_OK;
        }
        return \_AM_WGTRANSIFEX_READTX_NODATA;
    }

    /**
     * Get data of all resources of a project on transifex
     *
     * @param $resId
     * @param $proId
     * @return bool
     */
    public function readResources($resId, $proId)
    {
        $setting = $this->getSetting();
        global $xoopsUser;
        $helper           = \XoopsModules\Wgtransifex\Helper::getInstance();
        $projectsHandler  = $helper->getHandler('Projects');
        $resourcesHandler = $helper->getHandler('Resources');
        $projectsObj      = $projectsHandler->get($proId);
        $project          = $projectsObj->getVar('pro_slug');
        $count_ok         = 0;
        $count_err        = 0;
        //request data from transifex
        $transifexLib           = new \XoopsModules\Wgtransifex\TransifexLib();
        $transifexLib->user     = $setting['user'];
        $transifexLib->password = $setting['pwd'];
        $items                  = $transifexLib->getResources($project);
        foreach ($items as $item) {
            $resourcesObj = null;
            $crResources  = new \CriteriaCompo();
            $crResources->add(new \Criteria('res_slug', $item['slug']));
            $crResources->add(new \Criteria('res_pro_id', $proId));
            $resourcesCount = $resourcesHandler->getCount($crResources);
            if ($resourcesCount > 0) {
                $resourcesObjExist = $resourcesHandler->getObjects($crResources);
                if ($resId > 0) {
                    if ($resId == $resourcesObjExist[0]->getVar('res_id')) {
                        $resourcesObj = $resourcesHandler->get($resourcesObjExist[0]->getVar('res_id'));
                    }
                } else {
                    $resourcesObj = $resourcesHandler->get($resourcesObjExist[0]->getVar('res_id'));
                }
            } else {
                $resourcesObj = $resourcesHandler->create();
            }
            if (\is_object($resourcesObj)) {
                // Set Vars
                $resourcesObj->setVar('res_source_language_code', $item['source_language_code']);
                $resourcesObj->setVar('res_name', $item['name']);
                $resourcesObj->setVar('res_i18n_type', $item['i18n_type']);
                $resourcesObj->setVar('res_priority', $item['priority']);
                $resourcesObj->setVar('res_slug', $item['slug']);
                $resourcesObj->setVar('res_categories', $item['categories']);
                $resourcesObj->setVar('res_metadata', $item['metadata']);
                $resourcesObj->setVar('res_pro_id', $proId);
                $resourcesObj->setVar('res_status', Constants::STATUS_READTX);
                $resourcesObj->setVar('res_date', \time());
                $resourcesObj->setVar('res_submitter', $xoopsUser->getVar('uid'));
                // Insert Data
                if ($resourcesHandler->insert($resourcesObj)) {
                    $count_ok++;
                } else {
                    $count_err++;
                }
            }
        }
        if ($count_err > 0) {
            return \_AM_WGTRANSIFEX_READTX_ERROR;
        }
        if ($count_ok > 0) {
            return \_AM_WGTRANSIFEX_READTX_OK;
        }
        return \_AM_WGTRANSIFEX_READTX_NODATA;
    }

    /**
     * Get data of all resources of a project on transifex
     *
     * @param $traId
     * @param $proId
     * @param $langId
     * @return bool
     */
    public function readTranslations($traId, $proId, $langId)
    {
        $setting = $this->getSetting();
        global $xoopsUser;
        $helper              = \XoopsModules\Wgtransifex\Helper::getInstance();
        $projectsHandler     = $helper->getHandler('Projects');
        $projectsObj         = $projectsHandler->get($proId);
        $project             = $projectsObj->getVar('pro_slug');
        $resourcesHandler    = $helper->getHandler('Resources');
        $translationsHandler = $helper->getHandler('Translations');
        $languagesHandler    = $helper->getHandler('Languages');
        $languagesObj        = $languagesHandler->get($langId);
        $language            = $languagesObj->getVar('lang_code');
        $langShort           = $languagesObj->getVar('lang_iso_639_1');
        $langFolder          = $languagesObj->getVar('lang_folder');
        $count_ok            = 0;
        $count_err           = 0;
        $crResources         = new \CriteriaCompo();
        $crResources->add(new \Criteria('res_pro_id', $proId));
        $resourcesCount = $resourcesHandler->getCount($crResources);
        if ($resourcesCount > 0) {
            //request data from transifex
            $transifexLib           = new \XoopsModules\Wgtransifex\TransifexLib();
            $transifexLib->user     = $setting['user'];
            $transifexLib->password = $setting['pwd'];
            $resourcesAll           = $resourcesHandler->getAll($crResources);
            foreach (\array_keys($resourcesAll) as $i) {
                $resId           = $resourcesAll[$i]->getVar('res_id');
                $resource        = $resourcesAll[$i]->getVar('res_slug');
                $resName         = $resourcesAll[$i]->getVar('res_name');
                $resSourceLang   = $resourcesAll[$i]->getVar('res_source_language_code');
                $item            = $transifexLib->getTranslation($project, $resource, $language, $resSourceLang);
                $translationsObj = null;
                $crTranslations  = new \CriteriaCompo();
                $crTranslations->add(new \Criteria('tra_res_id', $resId));
                $crTranslations->add(new \Criteria('tra_lang_id', $langId));
                $translationsCount = $translationsHandler->getCount($crTranslations);
                if ($translationsCount > 0) {
                    $translationsObjExist = $translationsHandler->getObjects($crTranslations);
                    if ($traId > 0) {
                        if ($traId == $translationsObjExist[0]->getVar('tra_id')) {
                            $translationsObj = $translationsHandler->get($translationsObjExist[0]->getVar('tra_id'));
                        }
                    } else {
                        $translationsObj = $translationsHandler->get($translationsObjExist[0]->getVar('tra_id'));
                    }
                } else {
                    $translationsObj = $translationsHandler->create();
                }
                if (\is_object($translationsObj)) {
                    $stats = $transifexLib->getStats($project, $resource, $language);
                    // Set Vars
                    $translationsObj->setVar('tra_content', $item['content']);
                    $translationsObj->setVar('tra_mimetype', $item['mimetype']);
                    $translationsObj->setVar('tra_pro_id', $proId);
                    $translationsObj->setVar('tra_res_id', $resId);
                    $translationsObj->setVar('tra_lang_id', $langId);
                    $translationsObj->setVar('tra_proofread', $stats['proofread']);
                    $translationsObj->setVar('tra_proofread_percentage', $stats['proofread_percentage']);
                    $translationsObj->setVar('tra_reviewed_percentage', $stats['reviewed_percentage']);
                    $translationsObj->setVar('tra_completed', $stats['completed']);
                    $translationsObj->setVar('tra_untranslated_words', $stats['untranslated_words']);
                    $translationsObj->setVar('tra_last_commiter', $stats['last_commiter']);
                    $translationsObj->setVar('tra_reviewed', $stats['reviewed']);
                    $translationsObj->setVar('tra_translated_entities', $stats['translated_entities']);
                    $translationsObj->setVar('tra_translated_words', $stats['translated_words']);
                    $translationsObj->setVar('tra_untranslated_entities', $stats['untranslated_entities']);
                    $translationsObj->setVar('tra_last_update', \strtotime($stats['last_update']));
                    $translationsObj->setVar('tra_local', $this->getLocal($resName, $langFolder, $langShort));
                    $translationsObj->setVar('tra_status', Constants::STATUS_READTX);
                    $translationsObj->setVar('tra_date', \time());
                    $translationsObj->setVar('tra_submitter', $xoopsUser->getVar('uid'));
                    // Insert Data
                    if ($translationsHandler->insert($translationsObj)) {
                        $count_ok++;
                    } else {
                        $count_err++;
                    }
                }
            }
        }
        if ($count_err > 0) {
            return \_AM_WGTRANSIFEX_READTX_ERROR;
        }
        if ($count_ok > 0) {
            return \_AM_WGTRANSIFEX_READTX_OK;
        }
        return \_AM_WGTRANSIFEX_READTX_NODATA;
    }

    /**
     * Check all existing translation whether there is a new translation on transifex
     *
     * @return bool
     */
    public function checkTranslations()
    {
        $setting             = $this->getSetting();
        $helper              = \XoopsModules\Wgtransifex\Helper::getInstance();
        $projectsHandler     = $helper->getHandler('Projects');
        $resourcesHandler    = $helper->getHandler('Resources');
        $translationsHandler = $helper->getHandler('Translations');
        $languagesHandler    = $helper->getHandler('Languages');
        $count_update        = 0;
        $count_ok            = 0;
        $count_err           = 0;
        $translationsCount   = $translationsHandler->getCount();
        if ($translationsCount > 0) {
            //request data from transifex
            $transifexLib           = new \XoopsModules\Wgtransifex\TransifexLib();
            $transifexLib->user     = $setting['user'];
            $transifexLib->password = $setting['pwd'];
            $translationsAll        = $translationsHandler->getAll();
            foreach (\array_keys($translationsAll) as $i) {
                $projectsObj = $projectsHandler->get($translationsAll[$i]->getVar('tra_pro_id'));
                $project     = $projectsObj->getVar('pro_slug');
                $resourceObj = $resourcesHandler->get($translationsAll[$i]->getVar('tra_res_id'));
                $resource    = $resourceObj->getVar('res_slug');
                //$resSourceLang = $resourceObj->getVar('res_source_language_code');
                $languagesObj = $languagesHandler->get($translationsAll[$i]->getVar('tra_lang_id'));
                $language     = $languagesObj->getVar('lang_code');
                //$item          = $transifexLib->getTranslation($project, $resource, $language, $resSourceLang);
                $stats         = $transifexLib->getStats($project, $resource, $language);
                $traLastUpdate = \strtotime($stats['last_update']);
                if ($traLastUpdate > $translationsAll[$i]->getVar('tra_date')) {
                    $translationsObj = $translationsHandler->get($translationsAll[$i]->getVar('tra_id'));
                    $translationsObj->setVar('tra_status', Constants::STATUS_OUTDATED);
                    // Insert Data
                    if ($translationsHandler->insert($translationsObj, true)) {
                        $count_update++;
                    } else {
                        $count_err++;
                    }
                } else {
                    $count_ok++;
                }
            }
        }
        if ($count_err > 0) {
            return \_AM_WGTRANSIFEX_READTX_ERROR;
        }
        if ($count_ok > 0) {
            $ret = \_AM_WGTRANSIFEX_READTX_OK . '<br>';
            $ret .= \_AM_WGTRANSIFEX_CHECKTX_TRANSLATION_OK . $count_ok . '<br>';
            $ret .= \_AM_WGTRANSIFEX_CHECKTX_TRANSLATION_OUTDATED . $count_update . '<br>';
            return $ret;
        }
        return \_AM_WGTRANSIFEX_READTX_NODATA;
    }

    /**
     * Get primary setting
     *
     * @return bool
     */
    private function getSetting()
    {
        $helper          = \XoopsModules\Wgtransifex\Helper::getInstance();
        $settingsHandler = $helper->getHandler('Settings');
        $setting         = $settingsHandler->getPrimarySetting();
        if (0 == \count($setting)) {
            \redirect_header('settings.php', 3, \_AM_WGTRANSIFEX_THEREARENT_SETTINGS);
        }
        return $setting;
    }

    /**
     * convert resource name into local path and file name
     *
     * @param $toConvert
     * @param $langFolder
     * @param $langShort
     * @return bool
     */
    private function getLocal($toConvert, $langFolder, $langShort)
    {
        $ret = $toConvert;
        if ('html.txt' == \mb_substr($ret, -8)) {
            $ret = \mb_substr($ret, 0, \mb_strlen($ret) - 4);
        }
        if ('php.txt' == \mb_substr($ret, -7)) {
            $ret = \mb_substr($ret, 0, \mb_strlen($ret) - 4);
        }
        if ('tpl.txt' == \mb_substr($ret, -7)) {
            $ret = \mb_substr($ret, 0, \mb_strlen($ret) - 4);
        }
        if ('js.txt' == \mb_substr($ret, -6)) {
            $ret = \mb_substr($ret, 0, \mb_strlen($ret) - 4);
        }
        $ret = \str_replace('[', '', $ret);
        $ret = \str_replace(']', '/', $ret);
        $ret = \str_replace('-', '/', $ret);
        $ret = \str_replace('yourlang', $langFolder, $ret);
        $ret = \str_replace('yourshortlang', $langShort, $ret);
        return $ret;
    }
}
