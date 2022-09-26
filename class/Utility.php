<?php

declare(strict_types=1);

namespace XoopsModules\Wgtransifex;

/*
 Utility Class Definition

 You may not change or alter any portion of this comment or credits of
 supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit
 authors.

 This program is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Module:  wgtransifex
 *
 * @license      http://www.fsf.org/copyleft/gpl.html GNU public license
 * @copyright    https://xoops.org 2001-2017 &copy; XOOPS Project
 * @author       ZySpec <owners@zyspec.com>
 * @author       Mamba <mambax7@gmail.com>
 * @since
 */

use XoopsModules\Wgtransifex\Common;

/**
 * Class Utility
 */
class Utility extends Common\SysUtility
{
    //--------------- Custom module methods -----------------------------
    /**
     * @param $about
     * @return string
     */
    public static function makeDonationForm($about)
    {
        $donationform = [
            0   => '<form name="donation" id="donation" action="http://www.txmodxoops.org/modules/xdonations/" method="post" onsubmit="return xoopsFormValidate_donation();">',
            1   => '<table class="outer" cellspacing="1" width="100%"><tbody><tr><th colspan="2">'
                   . \_AM_WGTRANSIFEX_ABOUT_MAKE_DONATION
                   . '</th></tr><tr align="left" valign="top"><td class="head"><div class="xoops-form-element-caption-required"><span class="caption-text">'
                   . \_AM_WGTRANSIFEX_DONATION_AMOUNT
                   . '</span><span class="caption-marker">*</span></div></td><td class="even"><select size="1" name="item[A][amount]" id="item[A][amount]" title="Donation Amount"><option value="5">5.00 EUR</option><option value="10">10.00 EUR</option><option value="20">20.00 EUR</option><option value="40">40.00 EUR</option><option value="60">60.00 EUR</option><option value="80">80.00 EUR</option><option value="90">90.00 EUR</option><option value="100">100.00 EUR</option><option value="200">200.00 EUR</option></select></td></tr><tr align="left" valign="top"><td class="head"></td><td class="even"><input class="formButton" name="submit" id="submit" value="'
                   . \_SUBMIT
                   . '" title="'
                   . \_SUBMIT
                   . '" type="submit"></td></tr></tbody></table>',
            2   => '<input name="op" id="op" value="createinvoice" type="hidden"><input name="plugin" id="plugin" value="donations" type="hidden"><input name="donation" id="donation" value="1" type="hidden"><input name="drawfor" id="drawfor" value="Chronolabs Co-Operative" type="hidden"><input name="drawto" id="drawto" value="%s" type="hidden"><input name="drawto_email" id="drawto_email" value="%s" type="hidden"><input name="key" id="key" value="%s" type="hidden"><input name="currency" id="currency" value="EUR" type="hidden"><input name="weight_unit" id="weight_unit" value="kgs" type="hidden"><input name="item[A][cat]" id="item[A][cat]" value="XDN%s" type="hidden"><input name="item[A][name]" id="item[A][name]" value="Donation for %s" type="hidden"><input name="item[A][quantity]" id="item[A][quantity]" value="1" type="hidden"><input name="item[A][shipping]" id="item[A][shipping]" value="0" type="hidden"><input name="item[A][handling]" id="item[A][handling]" value="0" type="hidden"><input name="item[A][weight]" id="item[A][weight]" value="0" type="hidden"><input name="item[A][tax]" id="item[A][tax]" value="0" type="hidden"><input name="return" id="return" value="http://www.txmodxoops.org/modules/xdonations/success.php" type="hidden"><input name="cancel" id="cancel" value="http://www.txmodxoops.org/modules/xdonations/success.php" type="hidden"></form>',
            'D' => '',
            3   => '',
            4   => '<!-- Start Form Validation JavaScript //-->
<script type="text/javascript">
<!--//
function xoopsFormValidate_donation() { var myform = window.document.donation; 
var hasSelected = false; var selectBox = myform.item[A][amount];for (i = 0; i < selectBox.options.length; i++ ) { if (selectBox.options[i].selected === true && selectBox.options[i].value != \'\') { hasSelected = true; break; } }if (!hasSelected) { window.alert("Please enter Donation Amount"); selectBox.focus(); return false; }return true;
}
//--></script>
<!-- End Form Validation JavaScript //-->',
        ];
        $paypalform   = [
            0 => '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">',
            1 => '<input name="cmd" value="_s-xclick" type="hidden">',
            2 => '<input name="hosted_button_id" value="%s" type="hidden">',
            3 => '<img alt="" src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" height="1" border="0" width="1">',
            4 => '<input src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!" border="0" type="image">',
            5 => '</form>',
        ];
        for ($key = 0; $key <= 4; ++$key) {
            switch ($key) {
                case 2:
                    $donationform[$key] = \sprintf(
                        $donationform[$key],
                        $GLOBALS['xoopsConfig']['sitename'] . ' - ' . ('' != $GLOBALS['xoopsUser']->getVar('name') ? $GLOBALS['xoopsUser']->getVar('name') . ' [' . $GLOBALS['xoopsUser']->getVar('uname') . ']' : $GLOBALS['xoopsUser']->getVar('uname')),
                        $GLOBALS['xoopsUser']->getVar('email'),
                        XOOPS_LICENSE_KEY,
                        \mb_strtoupper($GLOBALS['xoopsModule']->getVar('dirname')),
                        \mb_strtoupper($GLOBALS['xoopsModule']->getVar('dirname')) . ' ' . $GLOBALS['xoopsModule']->getVar('name')
                    );
                    break;
            }
        }
        $aboutRes = '';
        $istart   = mb_strpos($about, $paypalform[0], 1);
        $iend     = mb_strpos($about, $paypalform[5], $istart + 1) + \mb_strlen($paypalform[5]) - 1;
        $aboutRes .= mb_substr($about, 0, $istart - 1);
        $aboutRes .= \implode("\n", $donationform);
        $aboutRes .= mb_substr($about, $iend + 1, \mb_strlen($about) - $iend - 1);

        return $aboutRes;
    }

    /**
     * @param $str
     *
     * @return string
     */
    public static function ucFirstAndToLower($str)
    {
        return \ucfirst(\mb_strtolower(\trim($str)));
    }

    //------------------------------------

    /**
     * Get the number of languages from the sub categories of a category or sub topics of or topic
     * @param $mytree
     * @param $languages
     * @param $entries
     * @param $cid
     * @return int
     */
    public static function numbersOfEntries($mytree, $languages, $entries, $cid)
    {
        $count = 0;
        if (\in_array($cid, $languages, true)) {
            $child = $mytree->getAllChild($cid);
            foreach (\array_keys($entries) as $i) {
                if ($entries[$i]->getVar('lang_id') == $cid) {
                    $count++;
                }
                foreach (\array_keys($child) as $j) {
                    if ($entries[$i]->getVar('lang_id') == $j) {
                        $count++;
                    }
                }
            }
        }

        return $count;
    }

    /**
     * Get clean text of status
     * @param $status
     * @return string
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case Constants::STATUS_OFFLINE:
                $status_text = \_AM_WGTRANSIFEX_STATUS_OFFLINE;
                break;
            case Constants::STATUS_NONE:
                $status_text = \_AM_WGTRANSIFEX_STATUS_NONE;
                break;
            case Constants::STATUS_SUBMITTED:
                $status_text = \_AM_WGTRANSIFEX_STATUS_SUBMITTED;
                break;
            case Constants::STATUS_READTX:
                $status_text = \_AM_WGTRANSIFEX_STATUS_READTX;
                break;
            case Constants::STATUS_READTXNEW:
                $status_text = \_AM_WGTRANSIFEX_STATUS_READTXNEW;
                break;
            case Constants::STATUS_ARCHIVED:
                $status_text = \_AM_WGTRANSIFEX_STATUS_ARCHIVED;
                break;
            case Constants::STATUS_OUTDATED:
                $status_text = \_AM_WGTRANSIFEX_STATUS_OUTDATED;
                break;
            case Constants::STATUS_BROKEN:
                $status_text = \_AM_WGTRANSIFEX_STATUS_BROKEN;
                break;
            case Constants::STATUS_APPROVED:
                $status_text = \_AM_WGTRANSIFEX_STATUS_APPROVED;
                break;
            case Constants::STATUS_LOCAL:
                $status_text = \_AM_WGTRANSIFEX_STATUS_LOCAL;
                break;
            case Constants::STATUS_DELETEDTX:
                $status_text = \_AM_WGTRANSIFEX_STATUS_DELETEDTX;
                break;
            case -1:
            default:
                $status_text = 'missing status text'; /* this should not be */
                break;
        }

        return $status_text;
    }

    /**
     * Add content as meta tag to template
     * @param $content
     */
    public static function metaKeywords($content)
    {
        global $xoopsTpl, $xoTheme;
        $myts    = \MyTextSanitizer::getInstance();
        $content = $myts->undoHtmlSpecialChars($myts->displayTarea($content));
        if (isset($xoTheme) && \is_object($xoTheme)) {
            $xoTheme->addMeta('meta', 'keywords', \strip_tags($content));
        } else {    // Compatibility for old Xoops versions
            $xoopsTpl->assign('xoops_meta_keywords', \strip_tags($content));
        }
    }

    /**
     * Add content as meta description to template
     * @param $content
     */
    public static function metaDescription($content)
    {
        global $xoopsTpl, $xoTheme;
        $myts    = \MyTextSanitizer::getInstance();
        $content = $myts->undoHtmlSpecialChars($myts->displayTarea($content));
        if (isset($xoTheme) && \is_object($xoTheme)) {
            $xoTheme->addMeta('meta', 'description', \strip_tags($content));
        } else {    // Compatibility for old Xoops versions
            $xoopsTpl->assign('xoops_meta_description', \strip_tags($content));
        }
    }
}
