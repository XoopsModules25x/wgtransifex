<?php
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

use Xmf\Request;
use XoopsModules\Wgtransifex;
use XoopsModules\Wgtransifex\Common;
use XoopsModules\Wgtransifex\Constants;

require __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op    = Request::getCmd('op', 'list');
$pkgId = Request::getInt('pkg_id');
switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $start        = Request::getInt('start', 0);
        $limit        = Request::getInt('limit', $helper->getConfig('adminpager'));
        $templateMain = 'wgtransifex_admin_packages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('packages.php'));
        $adminObject->addItemButton(_AM_WGTRANSIFEX_ADD_PACKAGE, 'packages.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $packagesCount = $packagesHandler->getCountPackages();
        $packagesAll   = $packagesHandler->getAllPackages($start, $limit);
        $GLOBALS['xoopsTpl']->assign('packages_count', $packagesCount);
        $GLOBALS['xoopsTpl']->assign('wgtransifex_url', WGTRANSIFEX_URL);
        $GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', WGTRANSIFEX_UPLOAD_URL);
        // Table view packages
        if ($packagesCount > 0) {
            $countOutdated = 0;
            foreach (array_keys($packagesAll) as $i) {
                $package        = $packagesAll[$i]->getValuesPackages();
                $crTranslations = new \CriteriaCompo();
                $crTranslations->add(new \Criteria('tra_pro_id', $packagesAll[$i]->getVar('pkg_pro_id')));
                $crTranslations->add(new \Criteria('tra_lang_id', $packagesAll[$i]->getVar('pkg_lang_id')));
                $translationsCount = $translationsHandler->getCount($crTranslations);
                if ($translationsCount > 0) {
                    $translationsAll = $translationsHandler->getAll($crTranslations);
                    foreach (array_keys($translationsAll) as $t) {
                        if ($packagesAll[$i]->getVar('pkg_date') < $translationsAll[$t]->getVar('tra_last_update')) {
                            $countOutdated++;
                        }
                    }
                }
                $package['outdated'] = ($countOutdated > 0);
                $GLOBALS['xoopsTpl']->append('packages_list', $package);
                unset($package);
            }
            // Display Navigation
            if ($packagesCount > $limit) {
                include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($packagesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', _AM_WGTRANSIFEX_THEREARENT_PACKAGES);
        }
        break;
    case 'new':
        $templateMain = 'wgtransifex_admin_packages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('packages.php'));
        $adminObject->addItemButton(_AM_WGTRANSIFEX_PACKAGES_LIST, 'packages.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $packagesObj = $packagesHandler->create();
        $form        = $packagesObj->getFormPackages();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('packages.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        $pkgName          = Request::getString('pkg_name');
        $pkgProId         = Request::getInt('pkg_pro_id', 0);
        $pkgLangId        = Request::getInt('pkg_lang_id', 0);
        $languagesHandler = $helper->getHandler('Languages');
        $languagesObj     = $languagesHandler->get($pkgLangId);
        //$langCode        = $languagesObj->getVar('lang_code');
        $langFolder = $languagesObj->getVar('lang_folder');
        // Make the destination directory if not exist
        $pkg_path = WGTRANSIFEX_UPLOAD_TRANS_PATH . '/' . $pkgName;
        @mkdir($pkg_path);
        $pkg_path .= '/' . $langFolder;
        clearDir($pkg_path);
        @mkdir($pkg_path);
        $projectsHandler     = $helper->getHandler('Projects');
        $resourcesHandler    = $helper->getHandler('Resources');
        $translationsHandler = $helper->getHandler('Translations');
        $languagesHandler    = $helper->getHandler('Languages');
        $count_ok            = 0;
        $count_err           = 0;
        //read data from table translations
        $crTranslations = new \CriteriaCompo();
        $crTranslations->add(new \Criteria('tra_pro_id', $pkgProId));
        $crTranslations->add(new \Criteria('tra_lang_id', $pkgLangId));
        $translationsCount = $translationsHandler->getCount($crTranslations);
        if ($translationsCount > 0) {
            $crTranslations->setSort('tra_local');
            $crTranslations->setOrder('ASC');
            $translationsAll = $translationsHandler->getAll($crTranslations);
            foreach (array_keys($translationsAll) as $i) {
                $dst_path = $pkg_path;
                $files    = explode('/', $translationsAll[$i]->getVar('tra_local'));
                foreach (array_keys($files) as $f) {
                    if (array_key_last($files) == $f) {
                        $content  = $translationsAll[$i]->getVar('tra_content', 'n');
                        $dst_file = $dst_path . '/' . $files[$f];
                        unlink($dst_file);
                        file_put_contents($dst_file, $content);
                    } else {
                        $dst_path .= '/' . $files[$f];
                        @mkdir($dst_path);
                    }
                }
            }
        } else {
            redirect_header('packages.php?op=list', 5, _AM_WGTRANSIFEX_PACKAGE_ERROR_NODATA);
        }
        $zipcreate = WGTRANSIFEX_UPLOAD_TRANS_PATH . '/' . $pkgName . '/' . $pkgName . '_' . $langFolder . '.zip';
        unlink($zipcreate);
        if (1 == Request::getInt('pkg_zipfile', 0)) {
            $pkg_path = WGTRANSIFEX_UPLOAD_TRANS_PATH . '/' . $pkgName . '/' . $langFolder;
            zip_files($pkg_path, $zipcreate);
        }
        // update table packages
        if ($pkgId > 0) {
            $packagesObj = $packagesHandler->get($pkgId);
        } else {
            $packagesObj = $packagesHandler->create();
        }
        // Set Vars
        $packagesObj->setVar('pkg_name', $pkgName);
        $packagesObj->setVar('pkg_desc', Request::getText('pkg_desc', ''));
        $packagesObj->setVar('pkg_pro_id', $pkgProId);
        $packagesObj->setVar('pkg_lang_id', $pkgLangId);
        $packagesObj->setVar('pkg_zip', $zipcreate);
        $packagesObj->setVar('pkg_date', time());
        $packagesObj->setVar('pkg_submitter', Request::getInt('pkg_submitter', 0));
        $packagesObj->setVar('pkg_status', Constants::STATUS_CREATED);
        // Set Var lang_flag
        include_once XOOPS_ROOT_PATH . '/class/uploader.php';
        $uploader = new \XoopsMediaUploader(
            XOOPS_ROOT_PATH . '/uploads/wgtransifex/logos', $helper->getConfig('mimetypes_image'), $helper->getConfig('maxsize_image'), null, null
        );
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            //$uploader->setPrefix(lang_flag_);
            //$uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if (!$uploader->upload()) {
                $errors = $uploader->getErrors();
                redirect_header('javascript:history.go(-1).php', 3, $errors);
            } else {
                $packagesObj->setVar('pkg_logo', $uploader->getSavedFileName());
            }
        } else {
            $packagesObj->setVar('pkg_logo', Request::getString('pkg_logo'));
        }
        // Insert Data
        if ($packagesHandler->insert($packagesObj)) {
            redirect_header('packages.php?op=list', 2, _AM_WGTRANSIFEX_FORM_OK);
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $packagesObj->getHtmlErrors());
        $form = $packagesObj->getFormPackages();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        $templateMain = 'wgtransifex_admin_packages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('packages.php'));
        $adminObject->addItemButton(_AM_WGTRANSIFEX_ADD_PACKAGE, 'packages.php?op=new', 'add');
        $adminObject->addItemButton(_AM_WGTRANSIFEX_PACKAGES_LIST, 'packages.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $packagesObj = $packagesHandler->get($pkgId);
        $form        = $packagesObj->getFormPackages();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'wgtransifex_admin_packages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('packages.php'));
        $packagesObj = $packagesHandler->get($pkgId);
        $pkgName     = $packagesObj->getVar('pkg_name');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('packages.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($packagesHandler->delete($packagesObj)) {
                redirect_header('packages.php', 3, _AM_WGTRANSIFEX_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $packagesObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new Common\XoopsConfirm(
                ['ok' => 1, 'pkg_id' => $pkgId, 'op' => 'delete'], $_SERVER['REQUEST_URI'], sprintf(_AM_WGTRANSIFEX_FORM_SURE_DELETE, $packagesObj->getVar('pkg_name'))
            );
            $form         = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
}
require __DIR__ . '/footer.php';
/**
 * @param string $dir
 * @param string $pattern
 */
function clearDir($dir, $pattern = '*')
{
    // Find all files and folders matching pattern
    $files = glob($dir . "/$pattern");
    // Interate thorugh the files and folders
    foreach ($files as $file) {
        // if it's a directory then re-call clearDir function to delete files inside this directory
        if (is_dir($file) && !in_array($file, ['..', '.'])) {
            // Remove the directory itself
            clearDir($file, $pattern);
        } elseif ((__FILE__ != $file) && is_file($file)) {
            // Make sure you don't delete the current script
            unlink($file);
        }
    }
    if (is_dir($dir)) {
        rmdir($dir);
    }
}

/**
 * Get Values
 * @param $source
 * @param $destination
 * @return bool
 */
function zip_files($source, $destination)
{
    $zip = new ZipArchive();
    if (true === $zip->open($destination, ZipArchive::CREATE)) {
        $source = realpath($source);
        if (is_dir($source)) {
            $iterator = new RecursiveDirectoryIterator($source);
            $iterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
            $files = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);
            foreach ($files as $file) {
                $file = realpath($file);
                if (is_dir($file)) {
                    $zip->addEmptyDir(str_replace($source . DIRECTORY_SEPARATOR, '', $file . DIRECTORY_SEPARATOR));
                } elseif (is_file($file)) {
                    $zip->addFile($file, str_replace($source . DIRECTORY_SEPARATOR, '', $file));
                }
            }
        } elseif (is_file($source)) {
            $zip->addFile($source, basename($source));
        }
    }
    return $zip->close();
}
