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
 * Class Object Handler Projects
 */
class ProjectsHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'wgtransifex_projects', Projects::class, 'pro_id', 'pro_slug');
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
     * @return \XoopsObject|null reference to the {@link Get} object
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
     * Get Count Projects in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountProjects($start = 0, $limit = 0, $sort = 'pro_id ASC, pro_slug', $order = 'ASC')
    {
        $crCountProjects = new \CriteriaCompo();
        $crCountProjects = $this->getProjectsCriteria($crCountProjects, $start, $limit, $sort, $order);

        return $this->getCount($crCountProjects);
    }

    /**
     * Get All Projects in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllProjects($start = 0, $limit = 0, $sort = 'pro_id ASC, pro_slug', $order = 'ASC')
    {
        $crAllProjects = new \CriteriaCompo();
        $crAllProjects = $this->getProjectsCriteria($crAllProjects, $start, $limit, $sort, $order);

        return $this->getAll($crAllProjects);
    }

    /**
     * Get Criteria Projects
     * @param \CriteriaCompo $crProjects
     * @param int            $start
     * @param int            $limit
     * @param string         $sort
     * @param string         $order
     * @return \CriteriaCompo
     */
    private function getProjectsCriteria($crProjects, $start, $limit, $sort, $order)
    {
        $crProjects->setStart($start);
        $crProjects->setLimit($limit);
        $crProjects->setSort($sort);
        $crProjects->setOrder($order);

        return $crProjects;
    }

    /**
     * @public function to update number of translations in table projects
     * @param $proId
     * @return bool
     */
    public function updateProjectTranslations($proId)
    {
        $helper = Helper::getInstance();
        $projectsHandler = $helper->getHandler('Projects');
        $translationsHandler = $helper->getHandler('Translations');
        $crTranslations = new \CriteriaCompo();
        $crTranslations->add(new \Criteria('tra_pro_id', $proId));
        $translationsCount = $translationsHandler->getCount($crTranslations);
        $projectsObj = $projectsHandler->get($proId);
        $projectsObj->setVar('pro_translations', $translationsCount);

        return $projectsHandler->insert($projectsObj);
    }
}
