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
 * @version        $Id: 1.0 admin.php 1 Mon 2018-03-19 10:04:52Z XOOPS Project (www.xoops.org) $
 */
require_once __DIR__ . '/common.php';

// ---------------- Admin Index ----------------
define('_AM_WGGALLERY_STATISTICS', 'Statistics');
// There are
define('_AM_WGGALLERY_THEREARE_ALBUMS', "There are <span class='bold'>%s</span> albums in the database");
define('_AM_WGGALLERY_THEREARE_IMAGES', "There are <span class='bold'>%s</span> images in the database");
define('_AM_WGGALLERY_THEREARE_GALLERYTYPES', "There are <span class='bold'>%s</span> gallery types in the database");
define('_AM_WGGALLERY_THEREARE_ALBUMTYPES', "There are <span class='bold'>%s</span> album types in the database");
define('_AM_WGGALLERY_THEREARE_WATERMARKS', "There are <span class='bold'>%s</span> watermarks in the database");
define('_AM_WGGALLERY_THEREARE_CATEGORIES', "There are <span class='bold'>%s</span> categories in the database");
// There aren't
define('_AM_WGGALLERY_THEREARENT_GALLERYTYPES', "There aren't gallery types! For initialization/reset goto 'Maintenance' => 'Maintain gallerytypes' and click on button 'Set default settings'");
define('_AM_WGGALLERY_THEREARENT_ALBUMTYPES', "There aren't album types! For initialization/reset goto 'Maintenance' => 'Maintain albumtypes' and click on button 'Set default settings'");
define('_AM_WGGALLERY_THEREARENT_WATERMARKS', 'Currently there are no watermarks defined!');
define('_AM_WGGALLERY_THEREARENT_CATEGORIES', "There aren't categories!");
// ---------------- Admin Files ----------------
// Buttons
define('_AM_WGGALLERY_ADD_ALBUM', 'Add New Album');
define('_AM_WGGALLERY_ADD_IMAGE', 'Add New Image');
define('_AM_WGGALLERY_ADD_GALLERYTYPE', 'Add New Gallery Type');
define('_AM_WGGALLERY_ADD_ALBUMTYPE', 'Add New Album Type');
define('_AM_WGGALLERY_ADD_CATEGORY', 'Add New Category');
// Lists
define('_AM_WGGALLERY_ALBUMS_LIST', 'List of Albums');
define('_AM_WGGALLERY_ALBUMS_APPROVE', 'Albums waiting for approving');
define('_AM_WGGALLERY_IMAGES_LIST', 'List of Images');
define('_AM_WGGALLERY_IMAGES_APPROVE', 'Images waiting for approving');
define('_AM_WGGALLERY_GALLERYTYPES_LIST', 'List of Gallery types');
define('_AM_WGGALLERY_ALBUMTYPES_LIST', 'List of Album types');
define('_AM_WGGALLERY_WATERMARKS_LIST', 'List of Watermarks');
define('_AM_WGGALLERY_CATEGORIES_LIST', 'List of Categories');
// Album
define('_AM_WGGALLERY_ALBUM_IMGNAME', "Name of album image (if '" . _CO_WGGALLERY_ALBUM_USE_UPLOADED . "')");
define('_AM_WGGALLERY_ALBUM_IMGID', "ID of album image (if '" . _CO_WGGALLERY_ALBUM_IMGID . "')");
//Categories
define('_AM_WGGALLERY_EDIT_CATEGORY', 'Edit category');
define('_AM_WGGALLERY_CAT_ID', 'Id');
define('_AM_WGGALLERY_CAT_TEXT', 'Category text');
define('_AM_WGGALLERY_CAT_EXIF', 'Exif name for category');
define('_AM_WGGALLERY_CAT_ALBUM', 'Use category for albums');
define('_AM_WGGALLERY_CAT_IMAGE', 'Use category for images');
define('_AM_WGGALLERY_CAT_SEARCH', 'Use category for search');
define('_AM_WGGALLERY_CAT_ERROR_CHANGE', 'Error when changing option');
// Elements of Gallerytype
define('_AM_WGGALLERY_GT_AT_ID', 'Id');
define('_AM_WGGALLERY_GT_AT_PRIMARY', 'Primary');
define('_AM_WGGALLERY_GT_AT_PRIMARY_1', 'Currently primary');
define('_AM_WGGALLERY_GT_AT_PRIMARY_0', 'Currently not primary');
define('_AM_WGGALLERY_GT_AT_PRIMARY_SET', 'Set to primary');
define('_AM_WGGALLERY_GT_AT_NAME', 'Name');
define('_AM_WGGALLERY_GT_AT_CREDITS', 'Credits');
define('_AM_WGGALLERY_GT_AT_TEMPLATE', 'Template');
define('_AM_WGGALLERY_GT_AT_OPTIONS', 'Option');
define('_AM_WGGALLERY_GT_AT_DATE', 'Date');
// Gallerytype add/edit
define('_AM_WGGALLERY_GALLERYTYPE_ADD', 'Add Gallerytype');
define('_AM_WGGALLERY_GALLERYTYPE_EDIT', 'Edit Gallerytype');
// Elements of Gallery options
define('_AM_WGGALLERY_OPTION_GT_SET', 'Set options for selected gallerytype');
define('_AM_WGGALLERY_OPTION_GT_SOURCE', 'Slideshow source');
define('_AM_WGGALLERY_OPTION_GT_SOURCE_DESC',
       "Pay attention: if the user do not have to download large images the source will be automatically reduce to medium for this user in order to avoid unallowed download by right mouse click.<br>User with right to download large images will also see large images, if you have selected 'large'.");
define('_AM_WGGALLERY_OPTION_GT_SOURCE_PREVIEW', 'Preview source');
define('_AM_WGGALLERY_OPTION_GT_SOURCE_LARGE', 'large images');
define('_AM_WGGALLERY_OPTION_GT_SOURCE_MEDIUM', 'medium images');
define('_AM_WGGALLERY_OPTION_GT_SOURCE_THUMB', 'thumbs');
// jssor
define('_AM_WGGALLERY_OPTION_GT_ARROWS', 'Type of arrows');
define('_AM_WGGALLERY_OPTION_GT_BULLETS', 'Type of bullets');
define('_AM_WGGALLERY_OPTION_GT_BULLETS_DESC', 'Do not use bullets together with Thumbnails');
define('_AM_WGGALLERY_OPTION_GT_THUMBNAILS', 'Type of thumbnail list');
define('_AM_WGGALLERY_OPTION_GT_LOADINGS', 'Type of loading symbol');
define('_AM_WGGALLERY_OPTION_GT_AUTOPLAY', 'Autoplay');
define('_AM_WGGALLERY_OPTION_GT_PLAYOPTIONS', 'Play options');
define('_AM_WGGALLERY_OPTION_GT_PLAYOPTION_1', 'play continuously');
define('_AM_WGGALLERY_OPTION_GT_PLAYOPTION_2', 'stop at last slide');
define('_AM_WGGALLERY_OPTION_GT_PLAYOPTION_4', 'stop on click');
define('_AM_WGGALLERY_OPTION_GT_PLAYOPTION_8', 'stop on user navigation (click on arrow/bullet/thumbnail, swipe slide, press keyboard left, right arrow key)');
define('_AM_WGGALLERY_OPTION_GT_PLAYOPTION_12', 'stop on click or user navigation');
define('_AM_WGGALLERY_OPTION_GT_FILLMODE', 'Options for fill mode');
define('_AM_WGGALLERY_OPTION_GT_FILLMODE_0', 'Stretch');
define('_AM_WGGALLERY_OPTION_GT_FILLMODE_1', 'contain (keep aspect ratio and put all inside slide)');
define('_AM_WGGALLERY_OPTION_GT_FILLMODE_2', 'cover (keep aspect ratio and cover whole slide)');
define('_AM_WGGALLERY_OPTION_GT_FILLMODE_4', 'actual size');
define('_AM_WGGALLERY_OPTION_GT_FILLMODE_5', 'contain for large image and actual size for small image');
define('_AM_WGGALLERY_OPTION_GT_SLIDERTYPE', 'Slideshow type');
define('_AM_WGGALLERY_OPTION_GT_SLIDERTYPE_1', 'Defined size');
define('_AM_WGGALLERY_OPTION_GT_SLIDERTYPE_2', 'Full template width');
// define('_AM_WGGALLERY_OPTION_GT_SLIDERTYPE_3', 'Full window');
define('_AM_WGGALLERY_OPTION_GT_MAXWIDTH', 'Max image width');
define('_AM_WGGALLERY_OPTION_GT_MAXWIDTH_DESC', "Define max image width for image container in pixel. Not valid for '" . _AM_WGGALLERY_OPTION_GT_SLIDERTYPE_2 . "'");
define('_AM_WGGALLERY_OPTION_GT_MAXHEIGHT', 'Max image height');
define('_AM_WGGALLERY_OPTION_GT_MAXHEIGHT_DESC', "Define max image height for image container in pixel. Not valid for '" . _AM_WGGALLERY_OPTION_GT_SLIDERTYPE_2 . "'");
define('_AM_WGGALLERY_OPTION_GT_ORIENTATION', 'Orientation');
define('_AM_WGGALLERY_OPTION_GT_ORIENTATION_H', 'Horizontal');
define('_AM_WGGALLERY_OPTION_GT_ORIENTATION_V', 'Vertical');
define('_AM_WGGALLERY_OPTION_GT_TRANSORDER', 'Transition order');
define('_AM_WGGALLERY_OPTION_GT_TRANSORDER_RANDOM', 'Random');
define('_AM_WGGALLERY_OPTION_GT_TRANSORDER_INORDER', 'In order of list');
define('_AM_WGGALLERY_OPTION_GT_SHOWTHUMBSDOTS', 'Show thumbs or dots');
define('_AM_WGGALLERY_OPTION_GT_SHOWTHUMBS', 'Show thumbs');
define('_AM_WGGALLERY_OPTION_GT_SHOWDOTS', 'Show dots');
define('_AM_WGGALLERY_OPTION_GT_SLIDESHOWSPEED', 'Slideshow speed');
define('_AM_WGGALLERY_OPTION_GT_SLIDESHOWSPEED_DESC', 'Interval in milliseconds before displaying the next image');
define('_AM_WGGALLERY_OPTION_GT_PLAYOPTION_DESC', 'Automatically start slideshow when opened');
define('_AM_WGGALLERY_OPTION_GT_ROWHEIGHT', 'Row height');
define('_AM_WGGALLERY_OPTION_GT_LASTROW', 'Last row');
define('_AM_WGGALLERY_OPTION_GT_LASTROW_DESC', 'Should the last row be justified to full width of row');
define('_AM_WGGALLERY_OPTION_GT_MARGINS', 'Margin between the images');
define('_AM_WGGALLERY_OPTION_GT_OUTERBORDER', 'Outer margin of image container');
define('_AM_WGGALLERY_OPTION_GT_RANDOMIZE', 'Show image in random order');
define('_AM_WGGALLERY_OPTION_GT_SLIDESHOW', 'Show slideshow');
define('_AM_WGGALLERY_OPTION_GT_SLIDESHOW_OPTIONS', 'Slideshow options (not all option apply to each colorbox style):');
define('_AM_WGGALLERY_OPTION_GT_COLORBOXSTYLE', 'Colorbox style');
define('_AM_WGGALLERY_OPTION_GT_TRANSEFFECT', 'Transition effect');
define('_AM_WGGALLERY_OPTION_GT_SPEEDOPEN', 'Speed for opening slideshow');
define('_AM_WGGALLERY_OPTION_GT_AUTOOPEN', 'Open slidehow modal automatically');
define('_AM_WGGALLERY_OPTION_GT_SLIDESHOWTYPE', 'Slideshow type');
define('_AM_WGGALLERY_OPTION_GT_BUTTTONCLOSE', 'Show close button');
define('_AM_WGGALLERY_OPTION_GT_NAVBAR', 'Show navbar with thumbs');
define('_AM_WGGALLERY_OPTION_GT_SHOW_1', 'Show always');
define('_AM_WGGALLERY_OPTION_GT_SHOW_2', 'Show the navbar only when the screen width is greater than 768 pixels');
define('_AM_WGGALLERY_OPTION_GT_SHOW_3', 'Show the navbar only when the screen width is greater than 992 pixels');
define('_AM_WGGALLERY_OPTION_GT_SHOW_4', 'Show the navbar only when the screen width is greater than 1200 pixels');
define('_AM_WGGALLERY_OPTION_GT_TOOLBAR', 'Show toolbar');
define('_AM_WGGALLERY_OPTION_GT_TOOLBARZOOM', 'Show zoom buttons in toolbar');
define('_AM_WGGALLERY_OPTION_GT_TOOLBARDOWNLOAD', 'Show download buttons in toolbar');
define('_AM_WGGALLERY_OPTION_GT_TOOLBARDOWNLOAD_DESC', 'If you enable this option, always the source file will be downloaded. Pay attention: this ingore the permissions set in the album settings.');
define('_AM_WGGALLERY_OPTION_GT_FULLSCREEN', 'Switch to full screen when starting slideshow');
define('_AM_WGGALLERY_OPTION_GT_TRANSDURATION', 'Transition speed');
define('_AM_WGGALLERY_OPTION_GT_TRANSDURATION_DESC', 'Period of animation in milliseconds between 2 images');
define('_AM_WGGALLERY_OPTION_GT_INDEXIMG', 'Type of image  on index page');
define('_AM_WGGALLERY_OPTION_GT_INDEXIMGHEIGHT', 'Image height');
define('_AM_WGGALLERY_OPTION_GT_SHOWLABEL', 'Show image index (Image {current} of {total}%)');
define('_AM_WGGALLERY_OPTION_GT_LCLSKIN', 'Style commands');
define('_AM_WGGALLERY_OPTION_GT_ANIMTIME', 'Animation speed');
define('_AM_WGGALLERY_OPTION_GT_ANIMTIME_DESC', 'Time for animaton (e.g. resize image) between two images in millisecunds');
define('_AM_WGGALLERY_OPTION_GT_LCLCOUNTER', 'Show counter');
define('_AM_WGGALLERY_OPTION_GT_LCLPROGRESSBAR', 'Show progress bar');
define('_AM_WGGALLERY_OPTION_GT_LCLMAXWIDTH', 'Max gallery width (in % of window)');
define('_AM_WGGALLERY_OPTION_GT_LCLMAXHEIGTH', 'Max gallery height (in % of window)');
define('_AM_WGGALLERY_OPTION_GT_BACKGROUND', 'Background');
define('_AM_WGGALLERY_OPTION_GT_BACKHEIGHT', 'Background height');
define('_AM_WGGALLERY_OPTION_GT_BORDER', 'Border');
define('_AM_WGGALLERY_OPTION_GT_BORDERWIDTH', 'Width');
define('_AM_WGGALLERY_OPTION_GT_BORDERCOLOR', 'Color');
define('_AM_WGGALLERY_OPTION_GT_BORDERPADDING', 'Padding');
define('_AM_WGGALLERY_OPTION_GT_BORDERRADIUS', 'Radius');
define('_AM_WGGALLERY_OPTION_GT_SHADOW', 'Show shadow');
define('_AM_WGGALLERY_OPTION_GT_LCLDATAPOSITION', 'Data position');
define('_AM_WGGALLERY_OPTION_GT_LCLDATAPOSITION_UNDER', 'Under');
define('_AM_WGGALLERY_OPTION_GT_LCLDATAPOSITION_OVER', 'Over');
define('_AM_WGGALLERY_OPTION_GT_LCLDATAPOSITION_RSIDE', 'Right side');
define('_AM_WGGALLERY_OPTION_GT_LCLDATAPOSITION_LSIDE', 'Left side');
define('_AM_WGGALLERY_OPTION_GT_LCLDATAPOSITION_DESC', "Please note lightbox uses a smart system automatically switching to '" . _AM_WGGALLERY_OPTION_GT_LCLDATAPOSITION_OVER . "' as soon element becomes too small because of long texts or tiny window.");
define('_AM_WGGALLERY_OPTION_GT_LCLCMDPOSITION', 'Command position');
define('_AM_WGGALLERY_OPTION_GT_LCLCMDPOSITION_INNER', 'Inner');
define('_AM_WGGALLERY_OPTION_GT_LCLCMDPOSITION_OUTER', 'Outer');
define('_AM_WGGALLERY_OPTION_GT_LCLCMDPOSITION_DESC', "Please note lightbox will automatically switch to '" . _AM_WGGALLERY_OPTION_GT_LCLCMDPOSITION_OUTER . "' if inner commands are too wide for the represented element");
define('_AM_WGGALLERY_OPTION_GT_LCLTHUMBSWIDTH', 'Thumbs width (in pixel)');
define('_AM_WGGALLERY_OPTION_GT_LCLTHUMBSHEIGTH', 'Thumbs height (in pixel)');
define('_AM_WGGALLERY_OPTION_GT_LCLFULLSCREEN', "Show command 'Fullscreeen'");
define('_AM_WGGALLERY_OPTION_GT_LCLFSIMGBEHAVIOUR', 'Fullscreen image behavior');
define('_AM_WGGALLERY_OPTION_GT_LCLFSIMGBEHAVIOUR_FIT', 'fit - image will be completely visible (eventually leaving spaces on edges)');
define('_AM_WGGALLERY_OPTION_GT_LCLFSIMGBEHAVIOUR_FILL', 'fill - image will always fill the screen (a portion could be eventually hidden)');
define('_AM_WGGALLERY_OPTION_GT_LCLFSIMGBEHAVIOUR_SMART', "smart - LC Lightbox uses 'fit' mode and switches to 'fill' only if images aspect ratio is similar to available space");
define('_AM_WGGALLERY_OPTION_GT_LCLSOCIALS', "Show command 'Socials'");
define('_AM_WGGALLERY_OPTION_GT_LCLSOCIALS_FB', 'Facebook App ID');
define('_AM_WGGALLERY_OPTION_GT_LCLSOCIALS_FB_DESC', 'Remember to add Facebook SDK in your website');
define('_AM_WGGALLERY_OPTION_GT_LCLDOWNLOAD', "Show command 'Download'");
define('_AM_WGGALLERY_OPTION_GT_LCLRCLICK', 'Disable right mouse click');
define('_AM_WGGALLERY_OPTION_GT_LCLTOGGLETXT', "Show toggle command 'Text'");
define('_AM_WGGALLERY_OPTION_GT_LCLNAVBTNPOS', 'Position of nav buttons');
define('_AM_WGGALLERY_OPTION_GT_LCLNAVBTNPOS_N', 'Normal');
define('_AM_WGGALLERY_OPTION_GT_LCLNAVBTNPOS_M', 'Middle');
define('_AM_WGGALLERY_OPTION_GT_LCLSLIDESHOW', "Show command 'Play'");

// Albumtype add/edit
define('_AM_WGGALLERY_ALBUMTYPE_ADD', 'Add Albumtype');
define('_AM_WGGALLERY_ALBUMTYPE_EDIT', 'Edit Albumtype');
// options  of Albumtypes
define('_AM_WGGALLERY_OPTION_AT_SET', 'Set options for selected album type');
define('_AM_WGGALLERY_OPTION_AT_SETINFO', 'The settings for album types will be used for index page and album blocks');
define('_AM_WGGALLERY_OPTION_AT_HOVER', 'Hover effect');
define('_AM_WGGALLERY_OPTION_AT_NB_COLS_ALB', 'Number of columns for album list');
define('_AM_WGGALLERY_OPTION_AT_NB_COLS_CAT', 'Number of columns for category list');
// common options
define('_AM_WGGALLERY_OPTION_OPACITIY', 'Opacity');
define('_AM_WGGALLERY_OPTION_SHOWTITLE', 'Show title');
define('_AM_WGGALLERY_OPTION_SHOWDESCR', 'Show description');
define('_AM_WGGALLERY_OPTION_CSS', 'Select css for style');
define('_AM_WGGALLERY_OPTION_SHOWSUBMITTER', 'Show submitter');
// Maintenance
define('_AM_WGGALLERY_MAINTENANCE_ALBUM_SELECT', 'Select album');
define('_AM_WGGALLERY_MAINTENANCE_EXECUTE_DR', 'Delete and reset');
define('_AM_WGGALLERY_MAINTENANCE_EXECUTE_R', 'Set default settings');
define('_AM_WGGALLERY_MAINTENANCE_EXECUTE_RIL', 'Resize all large images');
define('_AM_WGGALLERY_MAINTENANCE_EXECUTE_RIM', 'Resize all medium images');
define('_AM_WGGALLERY_MAINTENANCE_EXECUTE_RIT', 'Resize all thumbs');
define('_AM_WGGALLERY_MAINTENANCE_EXECUTE_DUI', 'Delete unused images');
define('_AM_WGGALLERY_MAINTENANCE_EXECUTE_DUI_SHOW', 'Show list of unused images');
define('_AM_WGGALLERY_MAINTENANCE_SUCCESS_RESET', 'Successfully reset: ');
define('_AM_WGGALLERY_MAINTENANCE_SUCCESS_CREATE', 'Successfully created: ');
define('_AM_WGGALLERY_MAINTENANCE_SUCCESS_RESIZE', 'Successfully resized: %s times resized for %t images');
define('_AM_WGGALLERY_MAINTENANCE_SUCCESS_DELETE', 'Successfully deleted: ');
define('_AM_WGGALLERY_MAINTENANCE_ERROR_RESET', 'Error when reseting: ');
define('_AM_WGGALLERY_MAINTENANCE_ERROR_CREATE', 'Error when creating: ');
define('_AM_WGGALLERY_MAINTENANCE_ERROR_DELETE', 'Error when deleting: ');
define('_AM_WGGALLERY_MAINTENANCE_ERROR_RESIZE', 'Error when resizing: ');
define('_AM_WGGALLERY_MAINTENANCE_ERROR_READDIR', 'Error when reading directory: ');
define('_AM_WGGALLERY_MAINTENANCE_TYP', 'Typ of maintenance');
define('_AM_WGGALLERY_MAINTENANCE_DESC', 'Description');
define('_AM_WGGALLERY_MAINTENANCE_RESULTS', 'Results');
define('_AM_WGGALLERY_MAINTENANCE_GT', 'Maintain gallerytypes');
define('_AM_WGGALLERY_MAINTENANCE_GT_DESC', 'Delete gallerytypes not supported anymore and/or reset all gallerytypes to default values');
define('_AM_WGGALLERY_MAINTENANCE_GT_SURERESET', 'All existing gallery settings will be updated to default settings. Do you want to continue?');
define('_AM_WGGALLERY_MAINTENANCE_GT_SUREDELETE', 'All existing gallerytypes (settings included) will be deleted and replaced by current gallerytypes. Do you want to continue?');
define('_AM_WGGALLERY_MAINTENANCE_AT', 'Maintain albumtypes');
define('_AM_WGGALLERY_MAINTENANCE_AT_DESC', 'Delete albumtypes not supported anymore and/or reset all albumtypes to default values');
define('_AM_WGGALLERY_MAINTENANCE_AT_SURERESET', 'All existing album settings will be updated to default albumtypes. Do you want to continue?');
define('_AM_WGGALLERY_MAINTENANCE_AT_SUREDELETE', 'All existing albumtypes (settings included) will be deleted and replaced by current albumtypes. Do you want to continue?');
define('_AM_WGGALLERY_MAINTENANCE_RESIZE', 'Resize images');
define('_AM_WGGALLERY_MAINTENANCE_RESIZE_DESC', 'Resize images or thumbs to max height corresponding module preferences.<br>Current settings:<ul>
<li>large: max width %lw px / max height %lh px</li>
<li>medium: max width %mw px / max height %mh px</li>
<li>thumb: max width %tw px / max height %th px</li>
</ul>');
define('_AM_WGGALLERY_MAINTENANCE_RESIZE_INFO', 'Resizing of "large images" is only possible if original image is available!');
define('_AM_WGGALLERY_MAINTENANCE_RESIZE_SELECT', 'Select kind of images for resizing');
define('_AM_WGGALLERY_MAINTENANCE_DELETE_UNUSED', 'Cleanup image directory');
define('_AM_WGGALLERY_MAINTENANCE_DELETE_UNUSED_DESC', 'All currently unused images from following directories will be deleted:<ul>
<li>%p/albums/</li>
<li>%p/large/</li>
<li>%p/medium/</li>
<li>%p/thumbs/</li>
<li>%p/temp/</li>
</ul>');
define('_AM_WGGALLERY_MAINTENANCE_DELETE_INVALID', "Delete invalid items in table 'images'");
define('_AM_WGGALLERY_MAINTENANCE_DELETE_INVALID_DESC', "Delete invalid items in table 'images', e.g. item was created, but something went wrong during upload");
define('_AM_WGGALLERY_MAINTENANCE_DELETE_INVALID_IMG', 'Invalid item: img_id ');
define('_AM_WGGALLERY_MAINTENANCE_DELETE_UNUSED_NONE', 'No unused images found');
define('_AM_WGGALLERY_MAINTENANCE_DUI_SUREDELETE', 'All currently unused album images will be deleted! Do you want to continue?');
define('_AM_WGGALLERY_MAINTENANCE_WATERMARK', 'Add watermarks to an album later');
define('_AM_WGGALLERY_MAINTENANCE_WATERMARK_DESC', 'Add watermarks to a selected album.<br>Attention: existing watermarks will be not removed.<br>If there are already watermarks on, an additional watermark will be added to images.');
define('_AM_WGGALLERY_MAINTENANCE_IMGDIR', 'Broken items image to directory');
define('_AM_WGGALLERY_MAINTENANCE_IMGDIR_DESC', 'Items of table images are searched, where the image is not in the upload directory.');
define('_AM_WGGALLERY_MAINTENANCE_IMGALB', 'Broken items image to albums');
define('_AM_WGGALLERY_MAINTENANCE_IMGALB_DESC', 'Items of table images are searched, where the parent album is not existing (anymore).');
define('_AM_WGGALLERY_MAINTENANCE_ITEM_SEARCH', 'Search items');
define('_AM_WGGALLERY_MAINTENANCE_IMG_SEARCHOK', 'No broken items image found');
define('_AM_WGGALLERY_MAINTENANCE_IMG_CLEAN', 'Clean broken items');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_SYSTEM', 'System checks');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_SYSTEMDESC', 'Checks whether php settings are compatibe with your module settings');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_RESULTS', 'Result of system checks');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_TYPE', "Check PHP setting '%s'");
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MS_DESC', 'Module setting allows %s Bytes');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_PMS_INFO', 'Sets max size of post data allowed');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_PMS_DESC', 'Max file size for post: %s (%b Bytes)');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_FU_INFO', 'Whether or not to allow HTTP file uploads');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_FU_DESC', 'File upload allowes: ');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_UMF_INFO', 'Sets max size for file upload');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_UMF_DESC', 'Max file size for file upload: %s (%b Bytes)');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_ML_INFO1', 'Sets the maximum amount of memory in bytes that a script is allowed to allocate');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_ML_INFO2', 'If you have problems with uploading big pictures then increase this value');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_ML_DESC', 'Max memory limit: %s (%b Bytes)');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MS_ERROR1', 'Please reduce module setting or increase php setting');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MS_ERROR2', 'Please turn php setting on');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MS_ERROR3', 'memory_limit must be higher than upload_max_filesize and higher than post_max_size');
define('_AM_WGGALLERY_MAINTENANCE_READ_EXIF', 'Read Exif-data');
define('_AM_WGGALLERY_MAINTENANCE_READ_EXIF_DESC', 'Read and save exif data for all images once again');
define('_AM_WGGALLERY_MAINTENANCE_READ_EXIF_READ', 'Read missing exif data');
define('_AM_WGGALLERY_MAINTENANCE_READ_EXIF_READALL', 'Read all exif data again');
define('_AM_WGGALLERY_MAINTENANCE_READ_EXIF_SUCCESS', 'Successfully read exif');
define('_AM_WGGALLERY_MAINTENANCE_READ_EXIF_ERROR', 'Error when reading exif');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_SPACE', 'Check used space in upload directory');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_SPACE_DESC', 'Following upload directories will be checked in order to get used space:<ul>
<li>%p/albums/</li>
<li>%p/large/</li>
<li>%p/medium/</li>
<li>%p/thumbs/</li>
<li>%p/temp/</li>
</ul>');
define('_AM_WGGALLERY_MAINTENANCE_ERROR_SOURCE', 'Error - necessary sourcefile not found: ');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MT', 'Check mimetypes');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MT_DESC', 'Check image table for:<ul>
<li>invalid mimetypes</li>
<li>mimetypes not allowed according module preferences</li>
</ul>');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MT_SEARCH', 'Search invalid mimetypes');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MT_CLEAN', 'Clean invalid mimetypes');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MT_SUCCESS', '%s mimetype of %t are valid');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MT_SUCCESSOK', 'Mimetype valid');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MT_ERROR', 'Invalid mimetype');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MT_SAVESUCCESS', 'Mimetype successfully changed');
define('_AM_WGGALLERY_MAINTENANCE_CHECK_MT_SAVEERROR', 'Error when saving mimetype');
define('_AM_WGGALLERY_MAINTENANCE_INVALIDRATE', 'Cleaning ratings/likes');
define('_AM_WGGALLERY_MAINTENANCE_INVALIDRATE_DESC', 'Delete ratings/likes, where the image is not existing anymore');
define('_AM_WGGALLERY_MAINTENANCE_INVALIDRATE_NUM', '%e of %s ratings are invalid');
define('_AM_WGGALLERY_MAINTENANCE_INVALIDRATE_RESULT', '%s of %t ratings cleaned');
define('_AM_WGGALLERY_MAINTENANCE_INVALIDCATS', 'Cleaning used categories');
define('_AM_WGGALLERY_MAINTENANCE_INVALIDCATS_DESC', 'Delete category in albums and images, if category is not existing anymore');
define('_AM_WGGALLERY_MAINTENANCE_INVALIDCATS_RESULT', '%t items have been cleaned');
// Import
define('_AM_WGGALLERY_IMPORT', 'Import data and files from other gallery modules');
define('_AM_WGGALLERY_IMPORT_LIST', 'List of supported modules');
define('_AM_WGGALLERY_IMPORT_SUPPORT', 'Supported modules for import');
define('_AM_WGGALLERY_IMPORT_SUP_INSTALLED', 'module is installed');
define('_AM_WGGALLERY_IMPORT_SUP_NOTINSTALLED', 'module is not installed');
define('_AM_WGGALLERY_IMPORT_FOUND', 'Search result');
define('_AM_WGGALLERY_IMPORT_READ', 'Read module data');
define('_AM_WGGALLERY_IMPORT_EXEC', 'Import data and files');
define('_AM_WGGALLERY_IMPORT_NUMALB', 'Number of albums');
define('_AM_WGGALLERY_IMPORT_NUMIMG', 'Number of images');
define('_AM_WGGALLERY_IMPORT_INFO_SIZE', 'Attention: the images will be not resized corrensponding modul preferences. If you want to resize then use "Maintenance" after import.');
define('_AM_WGGALLERY_IMPORT_ERR', 'Import data is only possible when album and image tables are empty');
define('_AM_WGGALLERY_IMPORT_ERR_ALBEXIST', 'There are already albums existing');
define('_AM_WGGALLERY_IMPORT_ERR_IMGEXIST', 'There are already images existing');
define('_AM_WGGALLERY_IMPORT_SUCCESS', '%a albums and %i images successfully imported');
define('_AM_WGGALLERY_IMPORT_ERROR', 'An error occured during import');

define('_AM_WGGALLERY_MAINTENANCE_DELETE_EXIF', 'Delete Exif-data');
define('_AM_WGGALLERY_MAINTENANCE_EXIF_CURRENT', 'Currently missing exif-data: %c of %t images');
define('_AM_WGGALLERY_MAINTENANCE_DELETE_EXIF_SUCCESS', 'Exif-data successfully deleted');
define('_AM_WGGALLERY_MAINTENANCE_DELETE_EXIF_ERROR', 'Error when deleting Exif-data');

define('_AM_WGGALLERY_PERMS_ALBDEFAULT', 'Default permissions new album');
define('_AM_WGGALLERY_PERMS_ALBDEFAULT_DESC', 'Define the default permissions for creation of a new album');
