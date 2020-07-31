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
use XoopsModules\Wgtransifex\Constants;

/**
 * Class Object Handler Resources
 */
class ResourcesHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'wgtransifex_resources', Resources::class, 'res_id', 'res_slug');
    }

    /**
     * @param bool $isNew
     *
     * @return object
     */
    public function create($isNew = true)
    {
        return parent::create($isNew);
    }

    /**
     * retrieve a field
     *
     * @param null|int       $i field id
     * @param null|mixed $fields
     * @return mixed reference to the {@link Get} object
     */
    public function get($i = null, $fields = null)
    {
        return parent::get($i, $fields);
    }

    /**
     * get inserted id
     *
     * @param null
     * @return int reference to the {@link Get} object
     */
    public function getInsertId()
    {
        return $this->db->getInsertId();
    }

    /**
     * Get Count Resources in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountResources($start = 0, $limit = 0, $sort = 'res_id ASC, res_slug', $order = 'ASC')
    {
        $crCountResources = new \CriteriaCompo();
        $crCountResources = $this->getResourcesCriteria($crCountResources, $start, $limit, $sort, $order);

        return $this->getCount($crCountResources);
    }

    /**
     * Get All Resources in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllResources($start = 0, $limit = 0, $sort = 'res_id ASC, res_slug', $order = 'ASC')
    {
        $crAllResources = new \CriteriaCompo();
        $crAllResources = $this->getResourcesCriteria($crAllResources, $start, $limit, $sort, $order);

        return $this->getAll($crAllResources);
    }

    /**
     * Get Criteria Resources
     * @param \CriteriaCompo $crResources
     * @param int            $start
     * @param int            $limit
     * @param string         $sort
     * @param string         $order
     * @return \CriteriaCompo|int
     */
    private function getResourcesCriteria($crResources, $start, $limit, $sort, $order)
    {
        $crResources->setStart($start);
        $crResources->setLimit($limit);
        $crResources->setSort($sort);
        $crResources->setOrder($order);

        return $crResources;
    }
    
    /**
     * Clone resources from one project to another one
     * @param int    $proIdOld
     * @param int    $proIdNew
     * @return bool
     */
    public function cloneByProject($proIdOld, $proIdNew)
    {
        global $xoopsUser;
        $crResources = new \CriteriaCompo();
        $crResources->add(new \Criteria('res_pro_id', $proIdOld));
        $resourcesCount = $this->getCount($crResources);
        // Table view resources
        if ($resourcesCount > 0) {
            $resourcesAll = $this->getAll($crResources);
            foreach (\array_keys($resourcesAll) as $i) {
                $resourcesObj = $this->create();
                $resourcesObj->setVar('res_source_language_code', $resourcesAll[$i]->getVar('res_source_language_code'));
                $resourcesObj->setVar('res_name', $resourcesAll[$i]->getVar('res_name'));
                $resourcesObj->setVar('res_i18n_type', $resourcesAll[$i]->getVar('res_i18n_type'));
                $resourcesObj->setVar('res_priority', $resourcesAll[$i]->getVar('res_priority'));
                $resourcesObj->setVar('res_slug', $resourcesAll[$i]->getVar('res_slug'));
                $resourcesObj->setVar('res_categories', $resourcesAll[$i]->getVar('res_categories'));
                $resourcesObj->setVar('res_metadata', $resourcesAll[$i]->getVar('res_metadata'));
                $resourcesObj->setVar('res_date', time());
                $uid = $xoopsUser instanceof \XoopsUser ? $xoopsUser->id() : 0;
                $resourcesObj->setVar('res_submitter', $uid);
                $resourcesObj->setVar('res_status', Constants::STATUS_LOCAL);
                $resourcesObj->setVar('res_pro_id', $proIdNew);
                $this->insert($resourcesObj);
                unset($resourcesObj);
            }
        }
        unset($crResources);
        $crResources = new \CriteriaCompo();
        $crResources->add(new \Criteria('res_pro_id', $proIdNew));
        return $this->getCount($crResources);
    }
    /**
     * get form with all existing modules
     * @return \XoopsThemeForm
     */
    public function getFormResourcesModules($action = false)
    {
        $dir = XOOPS_ROOT_PATH . '/modules/';
        $cdir = \scandir($dir);
        foreach ($cdir as $key => $value) {
            if (!in_array($value,array('.','..'))) {
                if (is_dir($dir . $value)) {
                    $modules[$dir . $value . '/'] = $value;
                }
            }
        }
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        // Title
        $title = \_AM_WGTRANSIFEX_PROJECT_CLONE;
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Table projects
        $resPro_idSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_RESOURCE_PRO_ID, 'module_upload', 0);
        $resPro_idSelect->addOptionArray($modules);
        $form->addElement($resPro_idSelect);
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'uploadtx'));
        $form->addElement(new \XoopsFormButtonTray('', _SUBMIT, 'submit', '', false));

        return $form;
    }
}
