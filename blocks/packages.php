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
 * @copyright     2020 XOOPS Project (https://xooops.org)
 * @license        GPL 2.0 or later
 * @package        wgtransifex
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         Goffy - Email:<webmaster@wedega.com> - Website:<https://wedega.com> / <https://xoops.org>
 */

use XoopsModules\Wgtransifex;
use XoopsModules\Wgtransifex\Helper;
use XoopsModules\Wgtransifex\Constants;

include_once XOOPS_ROOT_PATH . '/modules/wgtransifex/include/common.php';

/**
 * Function show block
 * @param  $options 
 * @return array
 */
function b_wgtransifex_packages_show($options)
{
	include_once XOOPS_ROOT_PATH . '/modules/wgtransifex/class/packages.php';
	$myts = MyTextSanitizer::getInstance();
	$GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', WGTRANSIFEX_UPLOAD_URL);
    $GLOBALS['xoopsTpl']->assign('modPathIconFlags', WGTRANSIFEX_IMAGE_URL . '/flags/');
	$block            = [];
	$typeBlock        = $options[0];
	$limit            = $options[1];
	//$lenghtTitle = $options[2];
	$helper           = Helper::getInstance();
	$packagesHandler  = $helper->getHandler('Packages');
    $languagesHandler = $helper->getHandler('Languages');
	\array_shift($options);
	\array_shift($options);
	\array_shift($options);

    $crPackages = new \CriteriaCompo();
	switch($typeBlock) {
		case 'last':
		default:
			// For the block: packages last
			$crPackages->setSort( 'pkg_date' );
			$crPackages->setOrder( 'DESC' );
		break;
		case 'new':
			// For the block: packages new
			$crPackages->add( new \Criteria( 'pkg_date', \strtotime(date(\_SHORTDATESTRING)), '>=' ) );
			$crPackages->add( new \Criteria( 'pkg_date', \strtotime(date(\_SHORTDATESTRING))+86400, '<=' ) );
			$crPackages->setSort( 'pkg_date' );
			$crPackages->setOrder( 'ASC' );
		break;
		case 'hits':
			// For the block: packages hits
			$crPackages->setSort( 'pkg_hits' );
			$crPackages->setOrder( 'DESC' );
		break;
		case 'top':
			// For the block: packages top
			$crPackages->add( new \Criteria( 'pkg_date', \strtotime(date(\_SHORTDATESTRING))+86400, '<=' ) );
			$crPackages->setSort( 'pkg_top' );
			$crPackages->setOrder( 'ASC' );
		break;
		case 'random':
			// For the block: packages random
			$crPackages->add( new \Criteria( 'pkg_date', \strtotime(date(\_SHORTDATESTRING))+86400, '<=' ) );
			$crPackages->setSort( 'RAND()' );
		break;
	}

	$crPackages->setLimit( $limit );
	$packagesAll = $packagesHandler->getAll($crPackages);
	unset($crPackages);
	if (\count($packagesAll) > 0) {
		foreach(\array_keys($packagesAll) as $i) {
			$block[$i]['name']      = $myts->htmlSpecialChars($packagesAll[$i]->getVar('pkg_name'));
            $languagesObj           = $languagesHandler->get($packagesAll[$i]->getVar('pkg_lang_id'));
			$block[$i]['lang_flag'] = $languagesObj->getVar('lang_flag');
            $block[$i]['logo']      = $packagesAll[$i]->getVar('pkg_logo');
		}
	}

	return $block;

}

/**
 * Function edit block
 * @param  $options 
 * @return string
 */
function b_wgtransifex_packages_edit($options)
{
	include_once \XOOPS_ROOT_PATH . '/modules/wgtransifex/class/packages.php';
	$helper = Helper::getInstance();
	$packagesHandler = $helper->getHandler('Packages');
	$GLOBALS['xoopsTpl']->assign('wgtransifex_upload_url', \WGTRANSIFEX_UPLOAD_URL);
	$form = \_MB_WGTRANSIFEX_DISPLAY;
	$form .= "<input type='hidden' name='options[0]' value='".$options[0]."' />";
	$form .= "<input type='text' name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' />&nbsp;<br>";
	$form .= \_MB_WGTRANSIFEX_TITLE_LENGTH . " : <input type='text' name='options[2]' size='5' maxlength='255' value='" . $options[2] . "' /><br><br>";
	\array_shift($options);
	\array_shift($options);
	\array_shift($options);

	$crPackages = new \CriteriaCompo();
	$crPackages->add( new \Criteria( 'pkg_id', 0, '!=' ) );
	$crPackages->setSort( 'pkg_id' );
	$crPackages->setOrder( 'ASC' );
	$packagesAll = $packagesHandler->getAll($crPackages);
	unset($crPackages);
	$form .= \_MB_WGTRANSIFEX_PACKAGES_TO_DISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
	$form .= "<option value='0' " . (in_array(0, $options) == false ? '' : "selected='selected'") . '>' . \_MB_WGTRANSIFEX_ALL_PACKAGES . '</option>';
	foreach(\array_keys($packagesAll) as $i) {
		$pkg_id = $packagesAll[$i]->getVar('pkg_id');
		$form .= "<option value='" . $pkg_id . "' " . (in_array($pkg_id, $options) == false ? '' : "selected='selected'") . '>' . $packagesAll[$i]->getVar('pkg_name') . '</option>';
	}
	$form .= '</select>';

	return $form;

}
