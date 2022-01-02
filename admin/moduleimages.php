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
use XoopsModules\Wggithub\Github\GithubClient;
use XoopsModules\Wgtransifex;
use XoopsModules\Wgtransifex\{
    Common
};

require __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op = Request::getCmd('op', 'list');

$activeWgGithub = (bool)\xoops_isActiveModule('wggithub');

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'wgtransifex_admin_moduleimages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('moduleimages.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_ADD_MODULEIMAGES, 'moduleimages.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url_logos', \WGTRANSIFEX_UPLOAD_URL . '/logos/');
        $GLOBALS['xoopsTpl']->assign('activeWgGithub', $activeWgGithub);

        // Table view packages
        $logosDirectory = \WGTRANSIFEX_UPLOAD_PATH . '/logos/';
        $images_list = XoopsLists::getImgListAsArray($logosDirectory);

        if (\count($images_list) > 0) {
            natcasesort($images_list);
            foreach ($images_list as $logo) {
                if ('blank.gif' !== $logo && 'blank.png' !== $logo ) {
                    list($width, $height, $type, $attr) = \getimagesize($logosDirectory . $logo);
                    $image = ['name' => $logo, 'src' => $logo, 'width' => $width, 'height' => $height];
                    $GLOBALS['xoopsTpl']->append('images_list', $image);
                }
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', \_AM_WGTRANSIFEX_THEREARENT_MODULEIMAGES);
        }
        break;
    case 'new':
        $templateMain = 'wgtransifex_admin_moduleimages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('moduleimages.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_MODULEIMAGES_LIST, 'moduleimages.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form
        $form = $moduleimagesHandler->getFormModuleimages();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('moduleimages.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        // Set Var mimg_image
        include_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $filename       = $_FILES['mimg_image']['name'];
        $imgMimetype    = $_FILES['mimg_image']['type'];
        $logosDirectory = \WGTRANSIFEX_UPLOAD_PATH . '/logos/';
        $uploaderErrors = '';
        $uploader = new \XoopsMediaUploader($logosDirectory,
            $helper->getConfig('mimetypes_image'),
            $helper->getConfig('maxsize_image'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if (!$uploader->upload()) {
                $uploaderErrors = $uploader->getErrors();
            } else {
                $savedFilename = $uploader->getSavedFileName();
                $maxwidth  = (int)$helper->getConfig('maxwidth_image');
                $maxheight = (int)$helper->getConfig('maxheight_image');
                if ($maxwidth > 0 && $maxheight > 0) {
                    // Resize image
                    $imgHandler                = new Wgtransifex\Common\Resizer();
                    $imgHandler->sourceFile    = $logosDirectory . $savedFilename;
                    $imgHandler->endFile       = $logosDirectory . $savedFilename;
                    $imgHandler->imageMimetype = $imgMimetype;
                    $imgHandler->maxWidth      = $maxwidth;
                    $imgHandler->maxHeight     = $maxheight;
                    $result                    = $imgHandler->resizeImage();
                }
            }
        }
        // Insert Data
        if ('' !== $uploaderErrors) {
            \redirect_header('moduleimages.php?op=edit&mimg_id=' . $mimgId, 5, $uploaderErrors);
        } else {
            \redirect_header('moduleimages.php?op=list', 2, \_AM_WGTRANSIFEX_FORM_OK);
        }
        break;
    case 'delete':
        $templateMain = 'wgtransifex_admin_moduleimages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('moduleimages.php'));
        $imageName = Request::getString('img_name');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('moduleimages.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if (\unlink(\WGTRANSIFEX_UPLOAD_PATH . '/logos/' . $imageName)) {
                \redirect_header('moduleimages.php', 3, \_AM_WGTRANSIFEX_FORM_DELETE_OK);
            } else {
                \redirect_header('moduleimages.php', 3, \_AM_WGTRANSIFEX_FORM_DELETE_ERROR);
            }
        } else {
            $customConfirm = new Common\Confirm(
                ['ok' => 1, 'name' => $imageName, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_AM_WGTRANSIFEX_FORM_SURE_DELETE, $imageName)
            );
            $form = $customConfirm->getFormConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
    case 'github':
        $templateMain = 'wgtransifex_admin_moduleimages.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('moduleimages.php'));
        $adminObject->addItemButton(\_AM_WGTRANSIFEX_MODULEIMAGES_LIST, 'moduleimages.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form
        $form = $moduleimagesHandler->getFormDownloadGH();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'download':
        $githubClient = XoopsModules\Wggithub\Github\GithubClient::getInstance();
        $files = $githubClient->getRepositoryContent('XoopsModules25x', 'moduleimages');
        $logosDirectory = \WGTRANSIFEX_UPLOAD_PATH . '/logos/';
        $overwrite = Request::getBool('overwrite');
        if (!$overwrite) {
            $images_list = XoopsLists::getImgListAsArray(\WGTRANSIFEX_UPLOAD_PATH . '/logos/');
        }
        if ($files) {
            foreach ($files as $file) {
                $source = $file['download_url'];
                $dest   = $logosDirectory . $file['name'];
                $save = false;
                if ($overwrite) {
                    $save = true;
                } else {
                    if (!\in_array($file['name'], $images_list)) {
                        $save = true;
                    }
                }
                if ($save) {
                    \unlink($dest);
                    \file_put_contents($dest, \file_get_contents($source));
                }
            }
            \redirect_header('moduleimages.php?op=list', 2, \_AM_WGTRANSIFEX_MODULEIMAGE_READGH_SUCCESS);
        } else {
            \redirect_header('moduleimages.php?op=list', 2, \_AM_WGTRANSIFEX_MODULEIMAGE_READGH_ERROR_API);
        }
        break;
}
require __DIR__ . '/footer.php';
