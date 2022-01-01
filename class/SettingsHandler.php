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
 * Class Object Handler Settings
 */
class SettingsHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'wgtransifex_settings', Settings::class, 'set_id', 'set_username');
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
     * Get Count Settings in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountSettings($start = 0, $limit = 0, $sort = 'set_id ASC, set_username', $order = 'ASC')
    {
        $crCountSettings = new \CriteriaCompo();
        $crCountSettings = $this->getSettingsCriteria($crCountSettings, $start, $limit, $sort, $order);

        return $this->getCount($crCountSettings);
    }

    /**
     * Get All Settings in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllSettings($start = 0, $limit = 0, $sort = 'set_id ASC, set_username', $order = 'ASC')
    {
        $crAllSettings = new \CriteriaCompo();
        $crAllSettings = $this->getSettingsCriteria($crAllSettings, $start, $limit, $sort, $order);

        return $this->getAll($crAllSettings);
    }

    /**
     * Get Criteria Settings
     * @param \CriteriaCompo $crSettings
     * @param int            $start
     * @param int            $limit
     * @param string         $sort
     * @param string         $order
     * @return \CriteriaCompo
     */
    private function getSettingsCriteria($crSettings, $start, $limit, $sort, $order)
    {
        $crSettings->setStart($start);
        $crSettings->setLimit($limit);
        $crSettings->setSort($sort);
        $crSettings->setOrder($order);

        return $crSettings;
    }

    /**
     * Get Primary Setting
     * @return array
     */
    public function getPrimarySetting()
    {
        $setting = [];
        $crSettings = new \CriteriaCompo();
        $crSettings->add(new \Criteria('set_primary', 1));
        $crSettings->setLimit(1);
        $settingsAll = $this->getAll($crSettings);
        foreach (\array_keys($settingsAll) as $i) {
            $setting['user'] = $settingsAll[$i]->getVar('set_username');
            $setting['pwd'] = $settingsAll[$i]->getVar('set_password');
        }

        return $setting;
    }

    /**
     * Get Request Setting
     * @return array
     */
    public function getRequestSetting()
    {
        $setting = [];
        $crSettings = new \CriteriaCompo();
        $crSettings->add(new \Criteria('set_request', 1));
        $crSettings->setLimit(1);
        $settingsAll = $this->getAll($crSettings);
        foreach (\array_keys($settingsAll) as $i) {
            $setting['user'] = $settingsAll[$i]->getVar('set_username');
            $setting['pwd'] = $settingsAll[$i]->getVar('set_password');
        }

        return $setting;
    }
}
