<?php

declare(strict_types=1);

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
     * @param bool $user
     * @return bool|string
     */
    public function readProjects($proId, $user = false)
    {
        $setting = $this->getSetting($user);
        global $xoopsUser;
        $helper = Helper::getInstance();
        $projectsHandler = $helper->getHandler('Projects');
        $count_ok = 0;
        $count_err = 0;
        $txprojects = [];
        //request data from transifex
        $transifexLib = new \XoopsModules\Wgtransifex\TransifexLib();
        $transifexLib->user = $setting['user'];
        $transifexLib->password = $setting['pwd'];
        $items = $transifexLib->getProjects();
        foreach ($items as $item) {
            $txprojects[] = $item['slug'];
            $projectsObj = null;
            $oldProject = false;
            $crProjects = new \CriteriaCompo();
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
                $proStatus = Constants::STATUS_READTX;
                $oldProject = true;
            } else {
                $projectsObj = $projectsHandler->create();
                $proStatus = Constants::STATUS_READTXNEW;
            }
            if (\is_object($projectsObj)) {
                $project = $transifexLib->getProject($item['slug'], true);
                $archived = (bool)$project['archived'];
                if (!$archived || ($archived && $oldProject)) {
                    // Set Vars
                    $projectsObj->setVar('pro_description', $project['description']);
                    $projectsObj->setVar('pro_source_language_code', $project['source_language_code']);
                    $projectsObj->setVar('pro_slug', $project['slug']);
                    $projectsObj->setVar('pro_name', $project['name']);
                    if ($archived) {
                        $projectsObj->setVar('pro_status', Constants::STATUS_ARCHIVED);
                        $projectsObj->setVar('pro_archived', 1);
                    } else {
                        $projectsObj->setVar('pro_status', $proStatus);
                        $projectsObj->setVar('pro_archived', 0);
                    }
                    $projectsObj->setVar('pro_txresources', \count($project['resources']));
                    if (is_string($project['last_updated'])) {
                        $projectsObj->setVar('pro_last_updated', \strtotime($project['last_updated']));
                    }
                    $teams = \json_encode($project['teams'], \JSON_HEX_TAG | \JSON_HEX_APOS | \JSON_HEX_QUOT | \JSON_HEX_AMP | \JSON_UNESCAPED_UNICODE);
                    //\str_replace(']', '', $teams);
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
            unset($projectsObj);
        }
        //check whether all items from table projects have been in current download
        $projectsAll = $projectsHandler->getAll();
        foreach (\array_keys($projectsAll) as $i) {
            if (!\in_array($projectsAll[$i]->getVar('pro_slug'), $txprojects, true)) {
                $projectsObj = $projectsHandler->get($projectsAll[$i]->getVar('pro_id'));
                $projectsObj->setVar('pro_status', Constants::STATUS_DELETEDTX);
                // Insert Data
                if (!$projectsHandler->insert($projectsObj)) {
                    $count_err++;
                }
            }
            $project = $projectsAll[$i]->getValuesProjects();
            $GLOBALS['xoopsTpl']->append('projects_list', $project);
            unset($project);
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
     * @return bool|string
     */
    public function readResources($resId, $proId)
    {
        $setting = $this->getSetting();
        global $xoopsUser;
        $helper = Helper::getInstance();
        $projectsHandler = $helper->getHandler('Projects');
        $resourcesHandler = $helper->getHandler('Resources');
        $projectsObj = $projectsHandler->get($proId);
        $project = $projectsObj->getVar('pro_slug');
        $count_ok = 0;
        $count_err = 0;
        //request data from transifex
        $transifexLib = new \XoopsModules\Wgtransifex\TransifexLib();
        $transifexLib->user = $setting['user'];
        $transifexLib->password = $setting['pwd'];
        $items = $transifexLib->getResources($project);
        foreach ($items as $item) {
            $resourcesObj = null;
            $crResources = new \CriteriaCompo();
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
     * @return bool|string
     */
    public function readTranslations($traId, $proId, $langId)
    {
        $setting = $this->getSetting();
        global $xoopsUser;
        $helper = Helper::getInstance();
        $projectsHandler = $helper->getHandler('Projects');
        $projectsObj = $projectsHandler->get($proId);
        $project = $projectsObj->getVar('pro_slug');
        $resourcesHandler = $helper->getHandler('Resources');
        $translationsHandler = $helper->getHandler('Translations');
        $languagesHandler = $helper->getHandler('Languages');
        $languagesObj = $languagesHandler->get($langId);
        $language = $languagesObj->getVar('lang_code');
        $langShort = $languagesObj->getVar('lang_iso_639_1');
        $langFolder = $languagesObj->getVar('lang_folder');
        $count_ok = 0;
        $count_err = 0;
        $crResources = new \CriteriaCompo();
        $crResources->add(new \Criteria('res_pro_id', $proId));
        $resourcesCount = $resourcesHandler->getCount($crResources);
        if ($resourcesCount > 0) {
            //request data from transifex
            $transifexLib = new \XoopsModules\Wgtransifex\TransifexLib();
            $transifexLib->user = $setting['user'];
            $transifexLib->password = $setting['pwd'];
            $resourcesAll = $resourcesHandler->getAll($crResources);
            foreach (\array_keys($resourcesAll) as $i) {
                $resId = $resourcesAll[$i]->getVar('res_id');
                $resource = $resourcesAll[$i]->getVar('res_slug');
                $resName = $resourcesAll[$i]->getVar('res_name');
                $resSourceLang = $resourcesAll[$i]->getVar('res_source_language_code');
                $item = $transifexLib->getTranslation($project, $resource, $language, $resSourceLang);
                $translationsObj = null;
                $crTranslations = new \CriteriaCompo();
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
                    if (is_string($stats['last_update'])) {
                        $translationsObj->setVar('tra_last_update', \strtotime($stats['last_update']));
                    }
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
     * @return bool|string
     */
    public function checkTranslations()
    {
        $setting = $this->getSetting();
        $helper = Helper::getInstance();
        $projectsHandler = $helper->getHandler('Projects');
        $resourcesHandler = $helper->getHandler('Resources');
        $translationsHandler = $helper->getHandler('Translations');
        $languagesHandler = $helper->getHandler('Languages');
        $count_update = 0;
        $count_ok = 0;
        $count_err = 0;
        $translationsCount = $translationsHandler->getCount();
        if ($translationsCount > 0) {
            //request data from transifex
            $transifexLib = new \XoopsModules\Wgtransifex\TransifexLib();
            $transifexLib->user = $setting['user'];
            $transifexLib->password = $setting['pwd'];
            $translationsAll = $translationsHandler->getAll();
            foreach (\array_keys($translationsAll) as $i) {
                $projectsObj = $projectsHandler->get($translationsAll[$i]->getVar('tra_pro_id'));
                $project = $projectsObj->getVar('pro_slug');
                $resourceObj = $resourcesHandler->get($translationsAll[$i]->getVar('tra_res_id'));
                $resource = '';
                if (\is_object($resourceObj)) {
                    $resource = $resourceObj->getVar('res_slug');
                } else {
                    $count_err++;
                }
                //$resSourceLang = $resourceObj->getVar('res_source_language_code');
                $languagesObj = $languagesHandler->get($translationsAll[$i]->getVar('tra_lang_id'));
                $language = '';
                if (\is_object($languagesObj)) {
                    $language = $languagesObj->getVar('lang_code');
                } else {
                    $count_err++;
                }
                //$item          = $transifexLib->getTranslation($project, $resource, $language, $resSourceLang);
                $stats = $transifexLib->getStats($project, $resource, $language);
                $traLastUpdate = \strtotime($stats['last_update']);
                if ($traLastUpdate > $translationsAll[$i]->getVar('tra_date')) {
                    $translationsObj = $translationsHandler->get($translationsAll[$i]->getVar('tra_id'));
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
     * Upload resources to existing project on transifex
     *
     * @param      $proId
     * @param      $dirStart
     * @param bool $skipExisting
     * @param bool $skipExisting
     * @return array
     */
    public function uploadResources($proId, $dirStart, $skipExisting = false, $uploadTest = false)
    {
        $setting = $this->getSetting();
        $count_ok = 0;
        $count_err = 0;
        $count_skip = 0;
        $infos = [];

        global $xoopsUser;
        $helper = Helper::getInstance();
        $projectsHandler = $helper->getHandler('Projects');
        $resourcesHandler = $helper->getHandler('Resources');
        $projectsObj = $projectsHandler->get($proId);

        //request data from transifex
        $transifexLib = new TransifexLib();
        $transifexLib->user = $setting['user'];
        $transifexLib->password = $setting['pwd'];
        $project = $projectsObj->getVar('pro_slug');

        // read resources data
        $crResources = new \CriteriaCompo();
        $crResources->add(new \Criteria('res_pro_id', $proId));
        $resourcesCount = $resourcesHandler->getCount($crResources);
        $resourcesAll = $resourcesHandler->getAll($crResources);
        // Table view resources
        if ($resourcesCount > 0) {
            //load all resources and check, whether file exists
            foreach (\array_keys($resourcesAll) as $i) {
                $resources[$i]['name'] = $resourcesAll[$i]->getVar('res_name');
                $resources[$i]['slug'] = $resourcesAll[$i]->getVar('res_slug');
                $resources[$i]['i18n_type'] = $resourcesAll[$i]->getVar('res_i18n_type');
                $resources[$i]['file'] = $dirStart . $this->getLocal($resources[$i]['name'], 'english', 'en');
                if (file_exists($resources[$i]['file'])) {
                    $infos[] = ['type' => 'ok', 'text' => 'File found: ' .  $resources[$i]['file']];
                    $resources[$i]['local'] = true;
                    //check whether resource already exists
                    $resExists = $transifexLib->checkResource($project, $resources[$i]['slug']);
                    if ($resExists) {
                        if ($skipExisting) {
                            $infos[] = ['type' => 'warning', 'text' => \_AM_WGTRANSIFEX_UPLOADTX_RESEXISTSSKIP . $resources[$i]['slug']];
                            $count_skip++;
                        } else {
                            $infos[] = ['type' => 'error', 'text' => \_AM_WGTRANSIFEX_UPLOADTX_RESEXISTS . $resources[$i]['slug']];
                            $count_err++;
                        }
                    } else {
                        $infos[] = ['type' => 'ok', 'text' => \_AM_WGTRANSIFEX_UPLOADTX_RESNOTEXISTS . $resources[$i]['slug']];
                    }
                    $resources[$i]['exist'] = $resExists;
                } else {
                    $infos[] = ['type' => 'error', 'text' => \_AM_WGTRANSIFEX_UPLOADTX_FILENOTFOUND .  $resources[$i]['file']];
                    $resources[$i]['local'] = false;
                    $count_err++;
                }
            }

            //create resource on tranisfex
            if ($uploadTest) {
                $infos[] = ['type' => 'warning', 'text' => \_AM_WGTRANSIFEX_UPLOADTX_NOTSTARTED];
            } else {
                if (0 === $count_err && !$uploadTest) {
                    foreach ($resources as $resource) {
                        if ($resource['exist']) {
                            $infos[] = ['type' => 'warning', 'text' => \_AM_WGTRANSIFEX_UPLOADTX_FILEUPLOADSKIP . $resource['file']];
                        } else {
                            $transifexLib->createResource($project, $resource['name'], $resource['slug'], $resource['i18n_type'], $resource['file']);
                            $count_ok++;
                            $infos[] = ['type' => 'ok', 'text' => \_AM_WGTRANSIFEX_UPLOADTX_FILEUPLOADED . $resource['file']];
                        }
                    }
                } else {
                    $infos[] = ['type' => 'warning', 'text' => \_AM_WGTRANSIFEX_UPLOADTX_NOTSTARTED];
                }
            }
        }

        $ret = ['success' => $count_ok, 'errors' => $count_err, 'skipped' => $count_skip, 'infos' => $infos];

        return $ret;
    }

    /**
     * Get primary setting
     *
     * @param bool $user
     * @return bool|array
     */
    private function getSetting($user = false)
    {
        $helper = Helper::getInstance();
        $settingsHandler = $helper->getHandler('Settings');
        if ($user) {
            $setting = $settingsHandler->getRequestSetting();
        } else {
            $setting = $settingsHandler->getPrimarySetting();
        }

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
     * @return bool|string
     */
    private function getLocal($toConvert, $langFolder, $langShort)
    {
        $ret = $toConvert;
        if ('html.txt' == \mb_substr($ret, -8)) {
            $ret = \mb_substr($ret, 0, -4);
        }
        if ('php.txt' == \mb_substr($ret, -7)) {
            $ret = \mb_substr($ret, 0, -4);
        }
        if ('tpl.txt' == \mb_substr($ret, -7)) {
            $ret = \mb_substr($ret, 0, -4);
        }
        if ('js.txt' == \mb_substr($ret, -6)) {
            $ret = \mb_substr($ret, 0, -4);
        }
        if ('sql.txt' == \mb_substr($ret, -7)) {
            $ret = \mb_substr($ret, 0, -4);
        }

        //replace language name placeholders
        $ret = \str_replace('yourlang', $langFolder, $ret);
        $ret = \str_replace('yourshortlang', $langShort, $ret);

        //replace/add directory seperator
        $pos = strpos($ret, ']');
        if ($pos > 0) {
            $part1 =  substr ( $ret , 0 , $pos + 1 );
            $part2 =  substr ( $ret , $pos + 1 , 255);
            $part1 = \str_replace('[', '', $part1);
            $part1 = \str_replace(']', '/', $part1);
            $part1 = \str_replace('-', '/', $part1);
            $ret = $part1 . $part2;
        }

        return $ret;
    }
}
