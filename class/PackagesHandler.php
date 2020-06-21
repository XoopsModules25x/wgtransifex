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

/**
 * Class Object Handler Packages
 */
class PackagesHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     * @param \XoopsDatabase $db
     */

    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'wgtransifex_packages', Packages::class, 'pkg_id', 'pkg_name');
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
     * @param int        $i field id
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
     * Get Count Packages in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */

    public function getCountPackages($start = 0, $limit = 0, $sort = 'pkg_id ASC, pkg_name', $order = 'ASC')
    {
        $crCountPackages = new \CriteriaCompo();

        $crCountPackages = $this->getPackagesCriteria($crCountPackages, $start, $limit, $sort, $order);

        return $this->getCount($crCountPackages);
    }

    /**
     * Get All Packages in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */

    public function getAllPackages($start = 0, $limit = 0, $sort = 'pkg_id ASC, pkg_name', $order = 'ASC')
    {
        $crAllPackages = new \CriteriaCompo();

        $crAllPackages = $this->getPackagesCriteria($crAllPackages, $start, $limit, $sort, $order);

        return $this->getAll($crAllPackages);
    }

    /**
     * Get Criteria Packages
     * @param        $crPackages
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */

    private function getPackagesCriteria($crPackages, $start, $limit, $sort, $order)
    {
        $crPackages->setStart($start);

        $crPackages->setLimit($limit);

        $crPackages->setSort($sort);

        $crPackages->setOrder($order);

        return $crPackages;
    }
}
