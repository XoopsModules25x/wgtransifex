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
 * wgGallery module for xoops
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        wggallery
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         Wedega - Email:<webmaster@wedega.com> - Website:<https://wedega.com>
 * @version        $Id: 1.0 main.php 1 Mon 2018-03-19 10:04:56Z XOOPS Project (www.xoops.org) $
 */
require_once __DIR__ . '/common.php';

// ---------------- Main ----------------
define('_MA_WGGALLERY_INDEX', 'Home');
define('_MA_WGGALLERY_TITLE', 'wgGallery');
define('_MA_WGGALLERY_DESC', 'This module is a picture gallery for XOOPS');
define('_MA_WGGALLERY_INDEX_DESC', "Welcome to the homepage of your new module wgGallery!<br>
As you can see, you have created a page with a list of links at the top to navigate between the pages of your module. This description is only visible on the homepage of this module, the other pages you will see the content you created when you built this module with the module TDMCreate, and after creating new content in admin of this module. In order to expand this module with other resources, just add the code you need to extend the functionality of the same. The files are grouped by type, from the header to the footer to see how divided the source code.<br><br>If you see this message, it is because you have not created content for this module. Once you have created any type of content, you will not see this message.<br><br>If you liked the module TDMCreate and thanks to the long process for giving the opportunity to the new module to be created in a moment, consider making a donation to keep the module TDMCreate and make a donation using this button <a href='http://www.txmodxoops.org/modules/xdonations/index.php' title='Donation To Txmod Xoops'><img src='https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif' alt='Button Donations'></a><br>Thanks!<br><br>Use the link below to go to the admin and create content.");
define('_MA_WGGALLERY_NO_PDF_LIBRARY', 'Libraries TCPDF not there yet, upload them in root/Frameworks');
define('_MA_WGGALLERY_NO', 'No');
// ---------------- Contents ----------------
//Colorbox and Lightbox
define('_MA_WGGALLERY_CURRENT_LABEL', 'image {current} of {total}');
// Colorbox
define('_MA_WGGALLERY_COLORBOX_CLOSE', 'close');
define('_MA_WGGALLERY_COLORBOX_PREVIOUS', 'previous');
define('_MA_WGGALLERY_COLORBOX_NEXT', 'next');
define('_MA_WGGALLERY_COLORBOX_SLIDESHOWSTART', 'start slideshow');
define('_MA_WGGALLERY_COLORBOX_SLIDESHOWSTOP', 'stop slideshow');
// LC_Lightbox lite
define('_MA_WGGALLERY_LCL_CLOSE', 'close');
define('_MA_WGGALLERY_LCL_PREVIOUS', 'previous');
define('_MA_WGGALLERY_LCL_NEXT', 'next');
define('_MA_WGGALLERY_LCL_PLAY', 'play');
define('_MA_WGGALLERY_LCL_COUNTER', 'counter');
define('_MA_WGGALLERY_LCL_FULLSCREEN', 'fullscreen');
define('_MA_WGGALLERY_LCL_TXT_TOGGLE', 'toggle text');
define('_MA_WGGALLERY_LCL_DOWNLOAD', 'download');
define('_MA_WGGALLERY_LCL_THUMBS_TOGGLE', 'toggle thumbs');
define('_MA_WGGALLERY_LCL_SOCIALS', 'socials');
// Admin link
define('_MA_WGGALLERY_ADMIN', 'Admin');
// ---------------- Errors ----------------
define('_MA_WGGALLERY_FAILSAVEIMG_MEDIUM', 'Error when creating medium image: %s');
define('_MA_WGGALLERY_FAILSAVEIMG_THUMBS', 'Error when creating thumb image: %s');
define('_MA_WGGALLERY_FAILSAVEWM_MEDIUM', 'Error when adding watermark to medium image: %s (reason: %g)');
define('_MA_WGGALLERY_FAILSAVEWM_LARGE', 'Error when adding watermark to large image: %s (reason: %g)');
define('_MA_WGGALLERY_ERROR_NO_IMAGE_SET', "You didn't specify the image. Please select the album first");
// search
define('_MA_WGGALLERY_SEARCH', 'Search image by specific criterias');
define('_MA_WGGALLERY_SEARCH_CATS', 'Search for categories');
define('_MA_WGGALLERY_SEARCH_TEXT', 'Search text');
define('_MA_WGGALLERY_SEARCH_SUBM', 'Search from specific submitter');
define('_MA_WGGALLERY_SEARCH_CATS_DESC', 'Images and albums will be selected, if they are connected to one of the selcted categories. If an album is connected to one of these categories then all images of the album will be shown, even if the image itself is not linked to the category.');
define('_MA_WGGALLERY_SEARCH_TEXT_DESC',
       'Images and albums will be selected, if the name, description, name of the category or one of the tags contains this text. If an album is connected to one of these categories then all images of the album will be shown, even if the image itself is not linked to the category.');
define('_MA_WGGALLERY_SEARCH_SUBM_DESC', 'Images and albums will be selected, if they are submitted by selected user.');
define('_MA_WGGALLERY_SEARCH_ERROR_NO_FILTER', 'Please select minimum one of the filters!');
define('_MA_WGGALLERY_SEARCH_RESULT', 'Result of your search');
define('_MA_WGGALLERY_SEARCH_NO_RESULT', 'No images found');
define('_MA_WGGALLERY_SEARCH_ACT', 'Search for user activities');
define('_MA_WGGALLERY_SEARCH_ACT_DOWNLOADS', 'Most downloads');
define('_MA_WGGALLERY_SEARCH_ACT_VIEWS', 'Most views');
define('_MA_WGGALLERY_SEARCH_ACT_RATINGS', 'Best rated');
define('_MA_WGGALLERY_SEARCH_ACT_VOTES', 'Most votes');
// ---------------- Ratings ----------------
define('_MA_WGGALLERY_RATING_CURRENT_1', 'Rating: %c / %m (%t rating totally)');
define('_MA_WGGALLERY_RATING_CURRENT_X', 'Rating: %c / %m (%t ratings totally)');
define('_MA_WGGALLERY_RATING_CURRENT_SHORT_1', '%c (%t rating)');
define('_MA_WGGALLERY_RATING_CURRENT_SHORT_X', '%c (%t ratings)');
define('_MA_WGGALLERY_RATING1', '1 of 5');
define('_MA_WGGALLERY_RATING2', '2 of 5');
define('_MA_WGGALLERY_RATING3', '3 of 5');
define('_MA_WGGALLERY_RATING4', '4 of 5');
define('_MA_WGGALLERY_RATING5', '5 of 5');
define('_MA_WGGALLERY_RATING_10_1', '1 of 10');
define('_MA_WGGALLERY_RATING_10_2', '2 of 10');
define('_MA_WGGALLERY_RATING_10_3', '3 of 10');
define('_MA_WGGALLERY_RATING_10_4', '4 of 10');
define('_MA_WGGALLERY_RATING_10_5', '5 of 10');
define('_MA_WGGALLERY_RATING_10_6', '6 of 10');
define('_MA_WGGALLERY_RATING_10_7', '7 of 10');
define('_MA_WGGALLERY_RATING_10_8', '8 of 10');
define('_MA_WGGALLERY_RATING_10_9', '9 of 10');
define('_MA_WGGALLERY_RATING_10_10', '10 of 10');
define('_MA_WGGALLERY_RATING_VOTE_BAD', 'Invalid vote');
// define('_MA_WGGALLERY_RATING_VOTE_ALREADY', 'You have already voted');
define('_MA_WGGALLERY_RATING_VOTE_THANKS', 'Thank you for rating');
define('_MA_WGGALLERY_RATING_NOPERM', "Sorry, you don't have permission to rate items");
define('_MA_WGGALLERY_RATING_LIKE', 'Like');
define('_MA_WGGALLERY_RATING_DISLIKE', 'Dislike');
define('_MA_WGGALLERY_ERROR_CREATE_ZIP', 'Error: Zip-archive could not be created');
