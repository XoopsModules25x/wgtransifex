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
 * Class Object Handler Moduleimages
 */
class ModuleimagesHandler extends \XoopsPersistableObjectHandler
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
	}
    
    /**
	 * @public function getForm
	 * @param bool $action
	 * @return \XoopsThemeForm
	 */
	public function getFormModuleimages($action = false)
	{
		$helper = \XoopsModules\Wgtransifex\Helper::getInstance();
		if (!$action) {
			$action = $_SERVER['REQUEST_URI'];
		}
		// Get Theme Form
		\xoops_load('XoopsFormLoader');
		$form = new \XoopsThemeForm(\_AM_WGTRANSIFEX_ADD_MODULEIMAGES, 'form', $action, 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		// Form Image mimgImage
		$imageTray = new \XoopsFormElementTray(\_AM_WGTRANSIFEX_MODULEIMAGE_IMAGE, '<br>');
        // Form Image mimgImage: Upload new image
        $maxsize = $helper->getConfig('maxsize_image');
        $imageTray->addElement(new \XoopsFormFile('<br>' . \_AM_WGTRANSIFEX_FORM_UPLOAD_NEW, 'mimg_image', $maxsize));
        $imageTray->addElement(new \XoopsFormLabel(\_AM_WGTRANSIFEX_FORM_UPLOAD_SIZE, ($maxsize / 1048576) . ' '  . \_AM_WGTRANSIFEX_FORM_UPLOAD_SIZE_MB));
        $imageTray->addElement(new \XoopsFormLabel(\_AM_WGTRANSIFEX_FORM_UPLOAD_IMG_WIDTH, $helper->getConfig('maxwidth_image') . ' px'));
        $imageTray->addElement(new \XoopsFormLabel(\_AM_WGTRANSIFEX_FORM_UPLOAD_IMG_HEIGHT, $helper->getConfig('maxheight_image') . ' px'));

		$form->addElement($imageTray);
		// To Save
		$form->addElement(new \XoopsFormHidden('op', 'save'));
		$form->addElement(new \XoopsFormButtonTray('', _SUBMIT, 'submit', '', false));
		return $form;
	}

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormDownloadGH($action = false)
    {
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm(\_AM_WGTRANSIFEX_ADD_MODULEIMAGES, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Radio Yes/No mimgOverwrite
        $form->addElement(new \XoopsFormRadioYN(\_AM_WGTRANSIFEX_MODULEIMAGE_OVERWRITE, 'overwrite', 0));
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'download'));
        $form->addElement(new \XoopsFormButtonTray('', _SUBMIT, 'submit', '', false));
        return $form;
    }

}
