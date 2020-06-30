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
 * @author         Goffy - Email:<webmaster@wedega.com> - Website:<https://wedega.com> / <https://xoops.org>
 */

use XoopsModules\Wgtransifex;

/**
 * Class Object Handler Languages
 */
class LanguagesHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'wgtransifex_languages', Languages::class, 'lang_id', 'lang_name');
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
     * Get Count Languages in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountLanguages($start = 0, $limit = 0, $sort = 'lang_name', $order = 'ASC')
    {
        $crCountLanguages = new \CriteriaCompo();
        $crCountLanguages = $this->getLanguagesCriteria($crCountLanguages, $start, $limit, $sort, $order);
        return $this->getCount($crCountLanguages);
    }

    /**
     * Get All Languages in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllLanguages($start = 0, $limit = 0, $sort = 'lang_name', $order = 'ASC')
    {
        $crAllLanguages = new \CriteriaCompo();
        $crAllLanguages = $this->getLanguagesCriteria($crAllLanguages, $start, $limit, $sort, $order);
        return $this->getAll($crAllLanguages);
    }

    /**
     * Get Criteria Languages
     * @param        $crLanguages
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    private function getLanguagesCriteria($crLanguages, $start, $limit, $sort, $order)
    {
        $crLanguages->setStart($start);
        $crLanguages->setLimit($limit);
        $crLanguages->setSort($sort);
        $crLanguages->setOrder($order);
        return $crLanguages;
    }

    /**
     * Get primary language
     * @return array
     */
    public function getPrimaryLang()
    {
        $crLanguages = new \CriteriaCompo();
        $crLanguages->add(new \Criteria('lang_primary', 1));
        $languagesAll = $this->getAll($crLanguages);
        $primary = 0;
        foreach (\array_keys($languagesAll) as $i) {
            $primary = $languagesAll[$i]->getVar('lang_id');
        }
        return $primary;
    }

    /**
     * Reset all language to primary none
     * @return bool
     */
    public function resetPrimary()
    {
        $sql = 'UPDATE `' . $GLOBALS['xoopsDB']->prefix('wgtransifex_languages') . "` SET `lang_primary` = '0'";
        $GLOBALS['xoopsDB']->queryF($sql);

        return true;
    }
}
