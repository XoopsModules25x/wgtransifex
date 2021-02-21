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
     * @param \CriteriaCompo $crPackages
     * @param int            $start
     * @param int            $limit
     * @param string         $sort
     * @param string         $order
     * @return \CriteriaCompo|int
     */
    private function getPackagesCriteria($crPackages, $start, $limit, $sort, $order)
    {
        $crPackages->setStart($start);
        $crPackages->setLimit($limit);
        $crPackages->setSort($sort);
        $crPackages->setOrder($order);

        return $crPackages;
    }

    /**
     * @public function getForm
     * @param bool|string $action
     * @return \XoopsThemeForm
     */
    public function getFormAllPackages($action = false)
    {
        $helper = Helper::getInstance();
        $projectsHandler = $helper->getHandler('Projects');
        //$resourcesHandler = $helper->getHandler('Resources');
        $languagesHandler = $helper->getHandler('Languages');
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }

        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm(\_AM_WGTRANSIFEX_PACKAGES_AUTOCREATE, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');

        // Form Table projects
        $pkgProjectsSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_PACKAGE_PRO_ID, 'pkgProIds', 0, 10, true);
        $crProjects = new \CriteriaCompo();
        $crProjects->add(new \Criteria('pro_status', Constants::STATUS_READTX));
        $crProjects->add(new \Criteria('pro_status', Constants::STATUS_READTXNEW), 'OR');
        $crProjects->add(new \Criteria('pro_status', Constants::STATUS_OUTDATED), 'OR');
        $pkgProjectsSelect->addOptionArray($projectsHandler->getList($crProjects));
        $form->addElement($pkgProjectsSelect, true);
        // Form Table languages
        $langId = $languagesHandler->getPrimaryLang();
        $pkgLangIdsSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_PACKAGE_LANG_ID, 'pkgLangIds', $langId, 10, true);
        $crLanguages = new \CriteriaCompo();
        $crLanguages->add(new \Criteria('lang_online', 1));
        $crLanguages->setSort('lang_name');
        $pkgLangIdsSelect->addOptionArray($languagesHandler->getList($crLanguages));
        $form->addElement($pkgLangIdsSelect, true);
        // Form Table percentage
        $trapercSelect = new \XoopsFormSelect(\_AM_WGTRANSIFEX_PACKAGE_TRAPERC_MIN, 'pkgTraperc', 75);
        for ($i = 10; $i <= 100; $i = $i+5) {
            $trapercSelect->addOption($i, $i . '%');
        }
        $form->addElement($trapercSelect, true);
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'save_all'));
        $form->addElement(new \XoopsFormButtonTray('', \_SUBMIT, 'submit', '', false));

        return $form;
    }

    /**
     * @public function getForm
     * @param bool|string $action
     * @param string      $pkgFilterText
     * @return \XoopsThemeForm
     */
    public function getFormFilterPackages($action = false, $pkgFilterText = '')
    {
        $helper = Helper::getInstance();
        $projectsHandler = $helper->getHandler('Projects');
        //$resourcesHandler = $helper->getHandler('Resources');
        $languagesHandler = $helper->getHandler('Languages');
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }

        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsSimpleForm('', 'formFilterIndex', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        $searchTray = new \XoopsFormElementTray(\_AM_WGTRANSIFEX_PACKAGE_SEARCH . ': ', '&nbsp;');
        // Form Table projects
        $searchTray->addElement(new \XoopsFormText('', 'pkgFilterText', 50, 255, $pkgFilterText), true);
        $searchTray->addElement(new \XoopsFormButton('', 'submit', \_SEARCH, 'submit'));
        $searchTray->addElement(new \XoopsFormButton('', 'cancel', \_CANCEL, 'submit'));
        $form->addElement($searchTray);
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'search'));


        return $form;
    }

    /**
     * @param string $dir
     * @param string $pattern
     */
    public function clearDir($dir, $pattern = '*')
    {
        // Find all files and folders matching pattern
        $files = glob($dir . "/$pattern");
        // Interate thorugh the files and folders
        foreach ($files as $file) {
            // if it's a directory then re-call clearDir function to delete files inside this directory
            if (\is_dir($file) && !\in_array($file, ['..', '.'])) {
                // Remove the directory itself
                $this->clearDir($file, $pattern);
            } elseif ((__FILE__ != $file) && is_file($file)) {
                // Make sure you don't delete the current script
                \unlink($file);
            }
        }
        if (\is_dir($dir)) {
            \rmdir($dir);
        }
    }
}
