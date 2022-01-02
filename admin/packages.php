<?php

declare(strict_types=1);

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

use Xmf\Request;
use Xmf\Module\Admin;
use XoopsModules\Wgtransifex\{
    Common,
    Constants,
    Helper,
    PackagesHandler,
    TranslationsHandler,
    RequestsHandler,
    Transifex,
    TransifexLib
};

/** @var Admin $adminObject */
/** @var Helper $helper */
/** @var PackagesHandler $packagesHandler */
/** @var TranslationsHandler $translationsHandler */
/** @var RequestsHandler $requestsHandler */



require __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op    = Request::getCmd('op', 'list');
$pkgId = Request::getInt('pkg_id');

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $start  = Request::getInt('start');
        $limit  = Request::getInt('limit', $helper->getConfig('adminpager'));
        $sortby = Request::getString('sortby', 'pkg_date');
        $order  = Request::getString('order', 'desc');
        $templateMain = 'wgtransifex_admin_packages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('packages.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_ADD_PACKAGE, 'packages.php?op=new');
        //$adminObject->addItemButton(\_AM_WGTRANSIFEX_PACKAGES_AUTOCREATE, 'packages.php?op=auto_create', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $crPackages = new \CriteriaCompo();
        $crPackages->setSort($sortby);
        $crPackages->setOrder($order);
        $crPackages->setStart($start);
        $crPackages->setLimit($limit);
        $packagesCount = $packagesHandler->getCountPackages();
        $packagesAll = $packagesHandler->getAll($crPackages);
        $GLOBALS['xoopsTpl']->assign('packages_count', $packagesCount);
        $GLOBALS['xoopsTpl']->assign('wgtransifex_url', \WGTRANSIFEX_URL);
        $GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', \WGTRANSIFEX_UPLOAD_URL);
        // Table view packages
        if ($packagesCount > 0) {
            foreach (\array_keys($packagesAll) as $i) {
                $countOutdated = 0;
                $package = $packagesAll[$i]->getValuesPackages();
                $crTranslations = new \CriteriaCompo();
                $crTranslations->add(new \Criteria('tra_pro_id', $packagesAll[$i]->getVar('pkg_pro_id')));
                $crTranslations->add(new \Criteria('tra_lang_id', $packagesAll[$i]->getVar('pkg_lang_id')));
                $translationsCount = $translationsHandler->getCount($crTranslations);
                if ($translationsCount > 0) {
                    $translationsAll = $translationsHandler->getAll($crTranslations);
                    foreach (\array_keys($translationsAll) as $t) {
                        if ($packagesAll[$i]->getVar('pkg_date') < $translationsAll[$t]->getVar('tra_last_update')) {
                            $countOutdated++;
                        }
                    }
                }
                $package['outdated'] = ($countOutdated > 0);
                $GLOBALS['xoopsTpl']->append('packages_list', $package);
                unset($package);
            }
            
            $GLOBALS['xoopsTpl']->assign('sortby_curr', $sortby . '_' . $order);

            // Display Navigation
            if ($packagesCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($packagesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', \_AM_WGTRANSIFEX_THEREARENT_PACKAGES);
        }
        break;
    case 'new':
        $templateMain = 'wgtransifex_admin_packages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('packages.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_PACKAGES_LIST, 'packages.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));

        $proId = Request::getInt('pkg_pro_id');
        $langId = Request::getInt('pkg_lang_id');
        // Form Create
        $packagesObj = $packagesHandler->create();
        $packagesObj->setVar('pkg_pro_id', $proId);
        $packagesObj->setVar('pkg_lang_id', $langId);
        $form = $packagesObj->getFormPackages();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('packages.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        $pkgName = Request::getString('pkg_name');
        $pkgProId = Request::getInt('pkg_pro_id');
        $pkgLangId = Request::getInt('pkg_lang_id');
        $pkgDownload = Request::getInt('pkg_download');

        $projectsHandler = $helper->getHandler('Projects');
        $resourcesHandler = $helper->getHandler('Resources');
        $translationsHandler = $helper->getHandler('Translations');
        $languagesHandler = $helper->getHandler('Languages');

        if ($pkgDownload) {
            $transifex = Transifex::getInstance();
            //read resources
            $result = $transifex->readResources(0, $pkgProId);
            //update table projects
            $crResources = new \CriteriaCompo();
            $crResources->add(new \Criteria('res_pro_id', $pkgProId));
            $resourcesCount = $resourcesHandler->getCount($crResources);
            $projectsObj = $projectsHandler->get($pkgProId);
            $projectsObj->setVar('pro_resources', $resourcesCount);
            $projectsHandler->insert($projectsObj);

            //read translations
            $result = $transifex->readTranslations(0, $pkgProId, $pkgLangId);
            //update table projects
            $crTranslations = new \CriteriaCompo();
            $crTranslations->add(new \Criteria('tra_pro_id', $pkgProId));
            $translationsCount = $translationsHandler->getCount($crTranslations);
            $projectsObj = $projectsHandler->get($pkgProId);
            $projectsObj->setVar('pro_translations', $translationsCount);
            $projectsHandler->insert($projectsObj);
        }

        $languagesObj = $languagesHandler->get($pkgLangId);
        //$langCode   = $languagesObj->getVar('lang_code');
        $langFolder = $languagesObj->getVar('lang_folder');

        // Make the destination directory if not exist
        $pkg_path = \WGTRANSIFEX_UPLOAD_TRANS_PATH . '/' . $pkgName;
        if (!\is_dir($pkg_path) && !\mkdir($pkg_path)) {
            throw new \RuntimeException(\sprintf('Directory "%s" was not created', $pkg_path));
        }
        $pkg_path .= '/' . $langFolder;
        \clearDir($pkg_path);
        if (!\is_dir($pkg_path) && !\mkdir($pkg_path)) {
            throw new \RuntimeException(\sprintf('Directory "%s" was not created', $pkg_path));
        }

        $count_ok = 0;
        $count_err = 0;
        $traDone = 0;
        $traUndone = 0;

        //read data from table translations
        $crTranslations = new \CriteriaCompo();
        $crTranslations->add(new \Criteria('tra_pro_id', $pkgProId));
        $crTranslations->add(new \Criteria('tra_lang_id', $pkgLangId));
        $translationsCount = $translationsHandler->getCount($crTranslations);
        if ($translationsCount > 0) {
            $crTranslations->setSort('tra_local');
            $crTranslations->setOrder('ASC');
            $translationsAll = $translationsHandler->getAll($crTranslations);
            foreach (\array_keys($translationsAll) as $i) {
                $traDone += $translationsAll[$i]->getVar('tra_translated_entities');
                $traUndone += $translationsAll[$i]->getVar('tra_untranslated_entities');
                $dst_path = $pkg_path;
                $files = \explode('/', $translationsAll[$i]->getVar('tra_local'));
                foreach (\array_keys($files) as $f) {
                    end($files);
                    if (key($files) == $f) {
                        $content = $translationsAll[$i]->getVar('tra_content', 'n');
                        $dst_file = $dst_path . '/' . $files[$f];
                        \unlink($dst_file);
                        \file_put_contents($dst_file, $content);
                    } else {
                        $dst_path .= '/' . $files[$f];
                        if (!\mkdir($dst_path) && !\is_dir($dst_path)) {
                            throw new \RuntimeException(\sprintf('Directory "%s" was not created', $dst_path));
                        }
                        chmod($dst_path, 0777);
                    }
                }
            }
        } else {
            \redirect_header('packages.php?op=list', 5, \_AM_WGTRANSIFEX_PACKAGE_ERROR_NODATA);
        }
        $traPercentage = (int)($traDone / ($traDone + $traUndone) * 100);

        $zipcreate = \WGTRANSIFEX_UPLOAD_TRANS_PATH . '/' . $pkgName . '/' . $pkgName . '_' . $langFolder . '.zip';
        \unlink($zipcreate);
        if (1 == Request::getInt('pkg_zipfile')) {
            $pkg_path = \WGTRANSIFEX_UPLOAD_TRANS_PATH . '/' . $pkgName . '/' . $langFolder;
            zipFiles($pkg_path, $zipcreate);
        }

        // update table packages
        if ($pkgId > 0) {
            $packagesObj = $packagesHandler->get($pkgId);
        } else {
            $packagesObj = $packagesHandler->create();
        }
        // Set Vars
        $packagesObj->setVar('pkg_name', $pkgName);
        $packagesObj->setVar('pkg_desc', Request::getText('pkg_desc'));
        $packagesObj->setVar('pkg_pro_id', $pkgProId);
        $packagesObj->setVar('pkg_lang_id', $pkgLangId);
        $packagesObj->setVar('pkg_zip', $zipcreate);
        $packagesObj->setVar('pkg_date', \time());
        $packagesObj->setVar('pkg_submitter', Request::getInt('pkg_submitter'));
        $packagesObj->setVar('pkg_status', Constants::STATUS_CREATED);
        $packagesObj->setVar('pkg_traperc', $traPercentage);
        // Set Var pkg_logo
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $filename = $_FILES['pkg_logo']['name'];
        $imgMimetype = $_FILES['pkg_logo']['type'];
        $imgNameDef = Request::getString('pkg_name');
        $uploaderErrors = '';
        $uploader = new \XoopsMediaUploader(
            \WGTRANSIFEX_UPLOAD_PATH . '/logos/',
            $helper->getConfig('mimetypes_image'),
            $helper->getConfig('maxsize_image'),
            null,
            null
        );
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $extension = \preg_replace('/^.+\.([^.]+)$/sU', '', $filename);
            $imgName = \str_replace(' ', '', $imgNameDef) . '.' . $extension;
            $uploader->setPrefix($imgName);
            $uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if (!$uploader->upload()) {
                $uploaderErrors = $uploader->getErrors();
            } else {
                $savedFilename = $uploader->getSavedFileName();
                $maxwidth = (int)$helper->getConfig('maxwidth_image');
                $maxheight = (int)$helper->getConfig('maxheight_image');
                if ($maxwidth > 0 && $maxheight > 0) {
                    // Resize image
                    $imgHandler = new Common\Resizer();
                    $imgHandler->sourceFile = \WGTRANSIFEX_UPLOAD_PATH . '/logos/' . $savedFilename;
                    $imgHandler->endFile = \WGTRANSIFEX_UPLOAD_PATH . '/logos/' . $savedFilename;
                    $imgHandler->imageMimetype = $imgMimetype;
                    $imgHandler->maxWidth = $maxwidth;
                    $imgHandler->maxHeight = $maxheight;
                    $result = $imgHandler->resizeImage();
                }
                $packagesObj->setVar('pkg_logo', $savedFilename);
            }
        } else {
            if ($filename > '') {
                $uploaderErrors = $uploader->getErrors();
            }
            $packagesObj->setVar('pkg_logo', Request::getString('pkg_logo'));
        }
        // Insert Data
        if ($packagesHandler->insert($packagesObj)) {
            $newPkgId = $pkgId > 0 ? $pkgId : $packagesObj->getNewInsertedIdPackages();
            if ('' !== $uploaderErrors) {
                \redirect_header('packages.php?op=edit&pkg_id=' . $pkgId, 5, $uploaderErrors);
            } else {
                //change status of request, if exist
                $crRequests = new \CriteriaCompo();
                $crRequests->add(new \Criteria('req_pro_id', $pkgProId));
                $crRequests->add(new \Criteria('req_lang_id', $pkgLangId));
                $requestsCount = $requestsHandler->getCount($crRequests);
                if ($translationsCount > 0) {
                    $requestsAll = $requestsHandler->getAll($crRequests);
                    foreach (\array_keys($requestsAll) as $i) {
                        $requestsObj = $requestsHandler->get($requestsAll[$i]->getVar('req_id'));
                        $requestsObj->setVar('req_status', Constants::STATUS_CREATED);
                        $requestsObj->setVar('req_statusdate', \time());
                        $requestsObj->setVar('req_statusuid', $GLOBALS['xoopsUser']->getVar('uid'));
                        $requestsHandler->insert($requestsObj);
                    }
                }
                if (0 == $pkgId) {
                    // Handle notification
                    $pkgName = $packagesObj->getVar('pkg_name');
                    $pkgStatus = $packagesObj->getVar('pkg_status');
                    $tags = [];
                    $tags['ITEM_ID'] = $newPkgId;
                    $tags['ITEM_NAME'] = $pkgName;
                    $tags['ITEM_URL'] = $helper->url('packages.php?op=show&pkg_id=' . $newPkgId);
                    $notificationHandler = \xoops_getHandler('notification');
                    // Event new notification
                    $notificationHandler->triggerEvent('global', 0, 'package_new', $tags);
                }
                \redirect_header('packages.php?op=list', 2, \_AM_WGTRANSIFEX_FORM_OK);
            }
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $packagesObj->getHtmlErrors());
        $form = $packagesObj->getFormPackages();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'auto_create':
        $templateMain = 'wgtransifex_admin_packages.tpl';
        $form = $packagesHandler->getFormAllPackages();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());

        break;
    case 'save_all':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('packages.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        $pkgProIds = Request::getArray('pkgProIds');
        $pkgLangIds = Request::getArray('pkgLangIds');
        $pkgTraPerc = Request::getInt('pkgTraperc', 101);
        $submitter = isset($GLOBALS['xoopsUser']) && \is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->getVar('uid') : 0;
        foreach ($pkgProIds as $pkgProId) {
            $projectsObj = $projectsHandler->get($pkgProId);
            foreach ($pkgLangIds as $pkgLangId) {
                $languagesObj = $languagesHandler->get($pkgLangId);
                $sql = 'SELECT tra_lang_id, Sum(tra_translated_entities) AS sum_translated, Sum(tra_untranslated_entities) AS sum_untranslated ';
                $sql .= 'FROM ' . $GLOBALS['xoopsDB']->prefix('wgtransifex_projects') . ' INNER JOIN ' . $GLOBALS['xoopsDB']->prefix('wgtransifex_translations');
                $sql .= ' ON (pro_id = tra_pro_id) ';
                $sql .= 'WHERE (((tra_pro_id)=' . $pkgProId . ') AND ((tra_lang_id)=' . $pkgLangId . ')) ';
                $sql .= 'GROUP BY tra_lang_id';
                $resTra = $GLOBALS['xoopsDB']->queryF($sql);
                while (list($langId, $traDone, $traUndone) = $xoopsDB->fetchRow($resTra)) {
                    $traPercentage = (int)($traDone / ($traDone + $traUndone) * 100);
                    if ($traPercentage > $pkgTraPerc) {
                        $pkgName = \preg_replace("/[^A-Za-z0-9]/", '', $projectsObj->getVar('pro_name'));
                        $pkgLogo = $projectsObj->getVar('pro_logo');
                        if ('' === $pkgLogo) {
                            $pkgLogo = 'blank.gif';
                        }
                        $langFolder = $languagesObj->getVar('lang_folder');

                        // Make the destination directory if not exist
                        $pkg_path = \WGTRANSIFEX_UPLOAD_TRANS_PATH . '/' . $pkgName;
                        if (!\is_dir($pkg_path) && !\mkdir($pkg_path)) {
                            throw new \RuntimeException(\sprintf('Directory "%s" was not created', $pkg_path));
                        }
                        $pkg_path .= '/' . $langFolder;
                        \clearDir($pkg_path);
                        if (!\is_dir($pkg_path) && !\mkdir($pkg_path)) {
                            throw new \RuntimeException(\sprintf('Directory "%s" was not created', $pkg_path));
                        }

                        $count_ok = 0;
                        $count_err = 0;

                        //read data from table translations
                        $crTranslations = new \CriteriaCompo();
                        $crTranslations->add(new \Criteria('tra_pro_id', $pkgProId));
                        $crTranslations->add(new \Criteria('tra_lang_id', $pkgLangId));
                        $translationsCount = $translationsHandler->getCount($crTranslations);
                        if ($translationsCount > 0) {
                            $crTranslations->setSort('tra_local');
                            $crTranslations->setOrder('ASC');
                            $translationsAll = $translationsHandler->getAll($crTranslations);
                            foreach (\array_keys($translationsAll) as $i) {
                                $dst_path = $pkg_path;
                                $files = \explode('/', $translationsAll[$i]->getVar('tra_local'));
                                foreach (\array_keys($files) as $f) {
                                    end($files);
                                    if (key($files) == $f) {
                                        $content = $translationsAll[$i]->getVar('tra_content', 'n');
                                        $dst_file = $dst_path . '/' . $files[$f];
                                        \unlink($dst_file);
                                        \file_put_contents($dst_file, $content);
                                    } else {
                                        $dst_path .= '/' . $files[$f];
                                        if (!\mkdir($dst_path) && !\is_dir($dst_path)) {
                                            throw new \RuntimeException(\sprintf('Directory "%s" was not created', $dst_path));
                                        }
                                        chmod($dst_path, 0777);
                                    }
                                }
                            }
                            $zipcreate = \WGTRANSIFEX_UPLOAD_TRANS_PATH . '/' . $pkgName . '/' . $pkgName . '_' . $langFolder . '.zip';
                            \unlink($zipcreate);
                            $pkg_path = \WGTRANSIFEX_UPLOAD_TRANS_PATH . '/' . $pkgName . '/' . $langFolder;
                            zipFiles($pkg_path, $zipcreate);

                            $packagesHandler->clearDir($pkg_path);
                            \rmdir($pkg_path);

                            // update table packages
                            $crPackages = new \CriteriaCompo();
                            $crPackages->add(new \Criteria('pkg_pro_id', $pkgProId));
                            $crPackages->add(new \Criteria('pkg_lang_id', $pkgLangId));
                            $packagesCount = $packagesHandler->getCount($crPackages);
                            if ($packagesCount > 0) {
                                $packagesAll = $packagesHandler->getAll($crPackages);
                                foreach (\array_keys($packagesAll) as $p) {
                                    $pkgId = $packagesAll[$p]->getVar('pkg_id');
                                }
                            }
                            unset($crPackages,$packagesAll);
                            if ($pkgId > 0) {
                                $packagesObj = $packagesHandler->get($pkgId);
                                $pkgDesc = Request::getText('pkg_desc');
                            } else {
                                $packagesObj = $packagesHandler->create();
                                $pkgDesc = '';
                            }
                            // Set Vars
                            $packagesObj->setVar('pkg_name', $pkgName);
                            $packagesObj->setVar('pkg_desc', $pkgDesc);
                            $packagesObj->setVar('pkg_pro_id', $pkgProId);
                            $packagesObj->setVar('pkg_lang_id', $pkgLangId);
                            $packagesObj->setVar('pkg_zip', $zipcreate);
                            $packagesObj->setVar('pkg_date', \time());
                            $packagesObj->setVar('pkg_submitter', $submitter);
                            $packagesObj->setVar('pkg_status', Constants::STATUS_CREATED);
                            $packagesObj->setVar('pkg_logo', $pkgLogo);
                            $packagesObj->setVar('pkg_traperc', $traPercentage);
                            // Insert Data
                            if ($packagesHandler->insert($packagesObj)) {
                                $newPkgId = $pkgId > 0 ? $pkgId : $packagesObj->getNewInsertedIdPackages();
                                //change status of request, if exist
                                $crRequests = new \CriteriaCompo();
                                $crRequests->add(new \Criteria('req_pro_id', $pkgProId));
                                $crRequests->add(new \Criteria('req_lang_id', $pkgLangId));
                                $requestsCount = $requestsHandler->getCount($crRequests);
                                $requestsAll = $requestsHandler->getAll($crRequests);
                                foreach (\array_keys($requestsAll) as $i) {
                                    $requestsObj = $requestsHandler->get($requestsAll[$i]->getVar('req_id'));
                                    $requestsObj->setVar('req_status', Constants::STATUS_CREATED);
                                    $requestsObj->setVar('req_statusdate', \time());
                                    $requestsObj->setVar('req_statusuid', $GLOBALS['xoopsUser']->getVar('uid'));
                                    $requestsHandler->insert($requestsObj);
                                }
                                if (0 == $pkgId) {
                                    // Handle notification
                                    $pkgName = $packagesObj->getVar('pkg_name');
                                    $pkgStatus = $packagesObj->getVar('pkg_status');
                                    $tags = [];
                                    $tags['ITEM_ID'] = $newPkgId;
                                    $tags['ITEM_NAME'] = $pkgName;
                                    $tags['ITEM_URL'] = $helper->url('packages.php?op=show&pkg_id=' . $newPkgId);
                                    $notificationHandler = \xoops_getHandler('notification');
                                    // Event new notification
                                    $notificationHandler->triggerEvent('global', 0, 'package_new', $tags);
                                }
                                $count_ok++;
                            }
                        }
                    } else {
                        echo '<br>skip lang:' . $languagesObj->getVar('lang_name') . ' total:' . $traPercentage;
                    }
                }
            }
        }
        if ($count_err > 0) {
            \redirect_header('packages.php?op=list', 2, \_AM_WGTRANSIFEX_PACKAGES_ERROR);
        }
        if ($count_ok > 0) {
            \redirect_header('packages.php?op=list', 2, \_AM_WGTRANSIFEX_FORM_OK);
        }

        // Get Form
        $templateMain = 'wgtransifex_admin_packages.tpl';
        $form = $packagesHandler->getFormAllPackages();
        $GLOBALS['xoopsTpl']->assign('error', 'Unexpected Error');
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        $templateMain = 'wgtransifex_admin_packages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('packages.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_ADD_PACKAGE, 'packages.php?op=new');
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_PACKAGES_LIST, 'packages.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $packagesObj = $packagesHandler->get($pkgId);
        $form = $packagesObj->getFormPackages();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'wgtransifex_admin_packages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('packages.php'));
        $packagesObj = $packagesHandler->get($pkgId);
        $pkgName = $packagesObj->getVar('pkg_name');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('packages.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }

            if ($packagesHandler->delete($packagesObj)) {
                \redirect_header('packages.php', 3, \_AM_WGTRANSIFEX_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $packagesObj->getHtmlErrors());
            }
        } else {
            $customConfirm = new Common\Confirm(
                ['ok' => 1, 'pkg_id' => $pkgId, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_AM_WGTRANSIFEX_FORM_SURE_DELETE, $packagesObj->getVar('pkg_name'))
            );
            $form = $customConfirm->getFormConfirm();
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
    $files = \glob($dir . "/$pattern", GLOB_NOSORT);

    // Interate thorugh the files and folders
    foreach ($files as $file) {
        // if it's a directory then re-call clearDir function to delete files inside this directory
        if (\is_dir($file) && !\in_array($file, ['..', '.'], true)) {
            // Remove the directory itself
            clearDir($file, $pattern);
        } elseif ((__FILE__ != $file) && is_file($file)) {
            // Make sure you don't delete the current script
            \unlink($file);
        }
    }

    if (\is_dir($dir)) {
        \rmdir($dir);
    }
}

/**
 * Get Values
 * @param $source
 * @param $destination
 * @return bool
 */
function zipFiles($source, $destination)
{
    $zip = new ZipArchive();

    if (true === $zip->open($destination, ZipArchive::CREATE)) {
        $source = \realpath($source);
        if (\is_dir($source)) {
            $iterator = new RecursiveDirectoryIterator($source);
            $iterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
            $files = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);
            foreach ($files as $file) {
                $filepath = \realpath($file->getPathname());
                if (\is_dir($filepath)) {
                    $zip->addEmptyDir(\str_replace($source . DIRECTORY_SEPARATOR, '', $filepath . DIRECTORY_SEPARATOR));
                } elseif (\is_file($filepath)) {
                    $zip->addFile($filepath, \str_replace($source . DIRECTORY_SEPARATOR, '', $filepath));
                }
            }
        } elseif (\is_file($source)) {
            $zip->addFile($source, \basename($source));
        }
    }

    return $zip->close();
}
