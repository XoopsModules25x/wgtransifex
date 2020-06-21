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
 * Class Object Handler Translations
 */
class TranslationsHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'wgtransifex_translations', Translations::class, 'tra_id', 'tra_pro_id');
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
     * @param int $i field id
     * @param null fields
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
     * @return integer reference to the {@link Get} object
     */
    public function getInsertId()
    {
        return $this->db->getInsertId();
    }

    /**
     * Get Count Translations in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountTranslations($start = 0, $limit = 0, $sort = 'tra_id ASC, tra_pro_id', $order = 'ASC')
    {
        $crCountTranslations = new \CriteriaCompo();
        $crCountTranslations = $this->getTranslationsCriteria($crCountTranslations, $start, $limit, $sort, $order);
        return parent::getCount($crCountTranslations);
    }

    /**
     * Get All Translations in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllTranslations($start = 0, $limit = 0, $sort = 'tra_id ASC, tra_pro_id', $order = 'ASC')
    {
        $crAllTranslations = new \CriteriaCompo();
        $crAllTranslations = $this->getTranslationsCriteria($crAllTranslations, $start, $limit, $sort, $order);
        return parent::getAll($crAllTranslations);
    }

    /**
     * Get Criteria Translations
     * @param        $crTranslations
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    private function getTranslationsCriteria($crTranslations, $start, $limit, $sort, $order)
    {
        $crTranslations->setStart($start);
        $crTranslations->setLimit($limit);
        $crTranslations->setSort($sort);
        $crTranslations->setOrder($order);
        return $crTranslations;
    }
}
