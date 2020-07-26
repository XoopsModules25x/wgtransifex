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
 * @copyright module for xoops
 * @license   GPL 2.0 or later
 * @package   wggallery
 * @since     1.0
 * @min_xoops 2.5.7
 * @author    Wedega - Email:<webmaster@wedega.com> - Website:<https://wedega.com>
 * @version   $Id: 1.0 main.php 1 Mon 2018-03-19 10:04:56Z XOOPS Project (www.xoops.org) $
 */

// defines for state
\define('_CO_WGGALLERY_STATE_OFFLINE', 'Offline');
\define('_CO_WGGALLERY_STATE_ONLINE', 'Online');
\define('_CO_WGGALLERY_STATE_APPROVAL', 'Waiting for approval');
// General
\define('_CO_WGGALLERY_NONE', 'None');
\define('_CO_WGGALLERY_BACK', 'Go back');
\define('_CO_WGGALLERY_ALL', 'All');
\define('_CO_WGGALLERY_UPDATE', 'Update');
\define('_CO_WGGALLERY_EXEC', 'Execute');
\define('_CO_WGGALLERY_DOWNLOAD', 'Download');
\define('_CO_WGGALLERY_DOWNLOAD_ALB', 'Download album');
\define('_CO_WGGALLERY_DATE', 'Date');
\define('_CO_WGGALLERY_SUBMITTER', 'Submitter');
\define('_CO_WGGALLERY_WEIGHT', 'Weight');
\define('_CO_WGGALLERY_COMMENT', 'comment');
\define('_CO_WGGALLERY_COMMENTS', 'comments');
\define('_CO_WGGALLERY_VIEWS', 'Views');
\define('_CO_WGGALLERY_RATING', 'Rating');
// Forms
\define('_CO_WGGALLERY_FORM_UPLOAD', 'Upload file');
\define('_CO_WGGALLERY_FORM_IMAGE_PATH', 'Files in %s ');
\define('_CO_WGGALLERY_FORM_ACTION', 'Action');
\define('_CO_WGGALLERY_FORM_EDIT', 'Modification');
\define('_CO_WGGALLERY_FORM_TOGGLE_SELECT', 'select/unselect all');
\define('_CO_WGGALLERY_FORM_IMAGEPICKER', 'Select an image');
\define('_CO_WGGALLERY_FORM_SUBMIT_SUBMITUPLOAD', 'Submit and goto images upload');
\define('_CO_WGGALLERY_FORM_SUBMIT_WMTEST', 'Submit and show test image');
\define('_CO_WGGALLERY_FORM_ERROR_INVALIDID', 'Invalid Id');
\define('_CO_WGGALLERY_FORM_OK', 'Successfully saved');
\define('_CO_WGGALLERY_FORM_DELETE_OK', 'Successfully deleted');
\define('_CO_WGGALLERY_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>"); //default xoops confirm
\define('_CO_WGGALLERY_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
\define('_CO_WGGALLERY_FORM_DELETE', 'Delete'); //wggallery xoops confirm
\define('_CO_WGGALLERY_FORM_DELETE_SURE', 'Do you really want to delete?'); //wggallery xoops confirm
\define('_CO_WGGALLERY_FORM_ERROR_RESETUSAGE1', 'Error when reseting usage of a watermark');
\define('_CO_WGGALLERY_FORM_ERROR_RESETUSAGE2', 'Error when reseting watermark usage in albums');
\define('_CO_WGGALLERY_FORM_ERROR_ALBPID', 'Error: parent albums not found');
\define('_CO_WGGALLERY_FORM_OK_APPROVE', 'Successfully saved album. You will be forwarded to approve the images');
// There aren't
\define('_CO_WGGALLERY_THEREARENT_ALBUMS', 'Currently there are no albums available');
\define('_CO_WGGALLERY_THEREARENT_IMAGES', 'Currently there are no images available');
// fine uploader
\define('_CO_WGGALLERY_FU_SUBMIT', 'Submitting image: ');
\define('_CO_WGGALLERY_FU_SUBMITTED', 'Image successfully checked, please upload');
\define('_CO_WGGALLERY_FU_UPLOAD', 'Upload image: ');
\define('_CO_WGGALLERY_FU_FAILED', 'Errors occured during uploading the images');
\define('_CO_WGGALLERY_FU_SUCCEEDED', 'Successfully uploaded all images');
// Album buttons
\define('_CO_WGGALLERY_ALBUM_ADD', 'Add Album');
\define('_CO_WGGALLERY_ALBUM_EDIT', 'Edit Album');
// Elements of collections
\define('_CO_WGGALLERY_COLL_TITLE', 'Available collections');
\define('_CO_WGGALLERY_COLL_ALBUMS', 'Show sub albums');
// Elements of Album
\define('_CO_WGGALLERY_ALBUMS_TITLE', 'Gallery of albums');
\define('_CO_WGGALLERY_ALBUMS_COUNT', 'Number of albums');
\define('_CO_WGGALLERY_ALBUM', 'Album');
\define('_CO_WGGALLERY_ALBUMS', 'Albums');
\define('_CO_WGGALLERY_ALBUMS_DESC', 'wgGallery is a XOOPS module for presenting images in albums and categories');
\define('_CO_WGGALLERY_ALBUM_COLL', 'Collection');
\define('_CO_WGGALLERY_ALBUM_NB_COLL', 'album(s) in this collection');
\define('_CO_WGGALLERY_ALBUM_NB_IMAGES', 'image(s) in this album');
\define('_CO_WGGALLERY_ALBUM_NO_IMAGES', 'Album contains no images');
\define('_CO_WGGALLERY_ALBUM_ID', 'Id');
\define('_CO_WGGALLERY_ALBUM_PID', 'Parent collection');
\define('_CO_WGGALLERY_ALBUM_ISCOLL', 'Album is collection');
\define('_CO_WGGALLERY_ALBUM_NAME', 'Name');
\define('_CO_WGGALLERY_ALBUM_DESC', 'Description');
\define('_CO_WGGALLERY_ALBUM_IMAGE', 'Album image');
\define('_CO_WGGALLERY_ALBUM_IMGTYPE', 'Source for album image');
\define('_CO_WGGALLERY_ALBUM_USE_EXIST', 'Use an image of album as album image');
\define('_CO_WGGALLERY_ALBUM_IMGID', 'Existing images in this album');
\define('_CO_WGGALLERY_ALBUM_USE_UPLOADED', 'Use an uploaded image as album image');
\define('_CO_WGGALLERY_ALBUM_CREATE_GRID', 'Create a grid');
\define('_CO_WGGALLERY_ALBUM_CROP_IMAGE', 'Crop image');
\define('_CO_WGGALLERY_ALBUM_FORM_UPLOAD_IMAGE', 'Upload a new image');
\define('_CO_WGGALLERY_ALBUM_STATE', 'State');
\define('_CO_WGGALLERY_ALBUM_DELETE_DESC', 'Attention: All images linked to this album will also be deleted');
\define('_CO_WGGALLERY_ALBUM_SELECT', 'Select album');
\define('_CO_WGGALLERY_ALBUM_SELECT_DESC', 'Please select album for uploading images');
\define('_CO_WGGALLERY_ALBUMS_SHOW', 'Show all albums');
\define('_CO_WGGALLERY_ALBUMS_SORT', 'Sorting of albums');
\define('_CO_WGGALLERY_ALBUM_SORT_SHOWHIDE', 'Click to show/hide the sub items');
\define('_CO_WGGALLERY_ALBUM_IMAGE_ERRORNOTFOUND', 'Error: album image not found');
\define('_CO_WGGALLERY_ALBUMS_ERRNOTFOUND', 'Error: Image not found (Image-Id %s)');
// album image handler
\define('_CO_WGGALLERY_ALBUM_IH_APPLY', 'Apply');
\define('_CO_WGGALLERY_ALBUM_IH_IMAGE_EDIT', 'Edit album image');
\define('_CO_WGGALLERY_ALBUM_IH_CURRENT', 'Current');
\define('_CO_WGGALLERY_ALBUM_IH_GRID4', 'Use 4 images');
\define('_CO_WGGALLERY_ALBUM_IH_GRID6', 'Use 6 images');
\define('_CO_WGGALLERY_ALBUM_IH_GRID_SRC1', 'Select image 1');
\define('_CO_WGGALLERY_ALBUM_IH_GRID_SRC2', 'Select image 2');
\define('_CO_WGGALLERY_ALBUM_IH_GRID_SRC3', 'Select image 3');
\define('_CO_WGGALLERY_ALBUM_IH_GRID_SRC4', 'Select image 4');
\define('_CO_WGGALLERY_ALBUM_IH_GRID_SRC5', 'Select image 5');
\define('_CO_WGGALLERY_ALBUM_IH_GRID_SRC6', 'Select image 6');
\define('_CO_WGGALLERY_ALBUM_IH_GRID_CREATE', 'Create grid');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_CREATE', 'Create image');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_MOVE', 'Move');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_ZOOMIN', 'Zoom in');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_ZOOMOUT', 'Zomm out');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_MOVE_LEFT', 'Move left');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_MOVE_RIGHT', 'Move right');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_MOVE_UP', 'Move up');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_MOVE_DOWN', 'Move down');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_FLIP_HORIZONTAL', 'Flip horizontal');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_FLIP_VERTICAL', 'Flip vertical');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_ASPECTRATIO', 'Aspect ratio');
\define('_CO_WGGALLERY_ALBUM_IH_CROP_ASPECTRATIO_FREE', 'Free');
// Image add/edit/show
\define('_CO_WGGALLERY_IMAGE_ADD', 'Add image');
\define('_CO_WGGALLERY_IMAGE_EDIT', 'Edit image');
\define('_CO_WGGALLERY_IMAGE_SHOW', 'Show image');
// Elements of Image
\define('_CO_WGGALLERY_IMAGE', 'Image');
\define('_CO_WGGALLERY_IMAGES', 'Images');
\define('_CO_WGGALLERY_IMAGES_TITLE', 'Gallery of images of ');
\define('_CO_WGGALLERY_IMAGES_COUNT', 'Number of images');
\define('_CO_WGGALLERY_IMAGES_ALBUMSHOW', 'Show Album');
\define('_CO_WGGALLERY_IMAGES_INDEX', 'Show Images Index');
\define('_CO_WGGALLERY_IMAGES_UPLOAD', 'Upload Images');
\define('_CO_WGGALLERY_IMAGE_MANAGE', 'Image management');
\define('_CO_WGGALLERY_IMAGE_MANAGE_DESC', 'Resort your images by drag & drop');
\define('_CO_WGGALLERY_IMAGE_ID', 'Id');
\define('_CO_WGGALLERY_IMAGE_TITLE', 'Title');
\define('_CO_WGGALLERY_IMAGE_DESC', 'Description');
\define('_CO_WGGALLERY_IMAGE_NAME', 'Name');
\define('_CO_WGGALLERY_IMAGE_NAMEORIG', 'Original name');
\define('_CO_WGGALLERY_IMAGE_NAMELARGE', 'Name of large image');
\define('_CO_WGGALLERY_IMAGE_MIMETYPE', 'Mimetype');
\define('_CO_WGGALLERY_IMAGE_SIZE', 'Size');
\define('_CO_WGGALLERY_IMAGE_RES', 'Resolution');
\define('_CO_WGGALLERY_IMAGE_RESX', 'Resx');
\define('_CO_WGGALLERY_IMAGE_RESY', 'Resy');
\define('_CO_WGGALLERY_IMAGE_DOWNLOADS', 'Downloads');
\define('_CO_WGGALLERY_IMAGE_RATINGLIKES', 'Ratinglikes');
\define('_CO_WGGALLERY_IMAGE_VOTES', 'Votes');
\define('_CO_WGGALLERY_IMAGE_ALBID', 'Albums');
\define('_CO_WGGALLERY_IMAGE_STATE', 'State');
\define('_CO_WGGALLERY_IMAGE_IP', 'Ip');
\define('_CO_WGGALLERY_IMAGE_RESIZE', 'Resize image to following size:');
\define('_CO_WGGALLERY_IMAGE_THUMB', 'Thumb image');
\define('_CO_WGGALLERY_IMAGE_MEDIUM', 'Medium image');
\define('_CO_WGGALLERY_IMAGE_LARGE', 'Large image');
\define('_CO_WGGALLERY_IMAGE_ALL', 'All images');
\define('_CO_WGGALLERY_IMAGE_EXIF', 'Exif-data');
\define('_CO_WGGALLERY_IMAGE_ROTATE_LEFT', 'Rotate left');
\define('_CO_WGGALLERY_IMAGE_ROTATE_RIGHT', 'Rotate right');
\define('_CO_WGGALLERY_IMAGE_ROTATED', 'Image succesfully rotated');
\define('_CO_WGGALLERY_IMAGE_ROTATE_ERROR', 'Error when rotating image');
\define('_CO_WGGALLERY_IMAGE_ERRORUNLINK', 'Error deleting image: the image was deleted in the database, but an error occured when deleting the image himself');
// Watermark add/edit
\define('_CO_WGGALLERY_WATERMARK_ADD', 'Add Watermark');
\define('_CO_WGGALLERY_WATERMARK_EDIT', 'Edit Watermark');
// Elements of Watermark
\define('_CO_WGGALLERY_WATERMARK', 'Watermark');
\define('_CO_WGGALLERY_WATERMARKS', 'Watermarks');
\define('_CO_WGGALLERY_WATERMARK_ID', 'Id');
\define('_CO_WGGALLERY_WATERMARK_PREVIEW', 'Preview');
\define('_CO_WGGALLERY_WATERMARK_NAME', 'Name');
\define('_CO_WGGALLERY_WATERMARK_TYPE', 'Type');
\define('_CO_WGGALLERY_WATERMARK_TYPETEXT', 'Use text');
\define('_CO_WGGALLERY_WATERMARK_TYPEIMAGE', 'Use an image');
\define('_CO_WGGALLERY_WATERMARK_POSITION', 'Position');
\define('_CO_WGGALLERY_WATERMARK_POSTOPLEFT', 'Top left');
\define('_CO_WGGALLERY_WATERMARK_POSTOPRIGHT', 'Top right');
\define('_CO_WGGALLERY_WATERMARK_POSTOPCENTER', 'Top center');
\define('_CO_WGGALLERY_WATERMARK_POSMIDDLELEFT', 'Middle left');
\define('_CO_WGGALLERY_WATERMARK_POSMIDDLERIGHT', 'Middle right');
\define('_CO_WGGALLERY_WATERMARK_POSMIDDLECENTER', 'Middle center');
\define('_CO_WGGALLERY_WATERMARK_POSBOTTOMLEFT', 'Bottom left');
\define('_CO_WGGALLERY_WATERMARK_POSBOTTOMRIGHT', 'Bottom right');
\define('_CO_WGGALLERY_WATERMARK_POSBOTTOMCENTER', 'Bottom center');
\define('_CO_WGGALLERY_WATERMARK_USAGENONE', 'Currently not used');
\define('_CO_WGGALLERY_WATERMARK_USAGEALL', 'Use in all albums');
\define('_CO_WGGALLERY_WATERMARK_USAGESINGLE', 'Defined in each album seperately');
\define('_CO_WGGALLERY_WATERMARK_MARGIN', 'Margin');
\define('_CO_WGGALLERY_WATERMARK_MARGINLR', 'Left/right');
\define('_CO_WGGALLERY_WATERMARK_MARGINTB', 'Top/bottom');
\define('_CO_WGGALLERY_WATERMARK_IMAGE', 'Image');
\define('_CO_WGGALLERY_FORM_UPLOAD_IMAGE_WATERMARKS', 'Image in uploads images');
\define('_CO_WGGALLERY_WATERMARK_TEXT', 'Text');
\define('_CO_WGGALLERY_WATERMARK_FONT', 'Font');
\define('_CO_WGGALLERY_WATERMARK_FONTFAMILY', 'Font-Family');
\define('_CO_WGGALLERY_WATERMARK_FONTSIZE', 'Fontsize');
\define('_CO_WGGALLERY_WATERMARK_COLOR', 'Color');
\define('_CO_WGGALLERY_WATERMARK_USAGE', 'Usage');
\define('_CO_WGGALLERY_WATERMARK_TARGET', 'Kind of images for adding watermark');
\define('_CO_WGGALLERY_WATERMARK_TARGET_A', 'Add to all');
\define('_CO_WGGALLERY_WATERMARK_TARGET_M', 'Add to medium');
\define('_CO_WGGALLERY_WATERMARK_TARGET_L', 'Add to large');
// Elements of categories
\define('_CO_WGGALLERY_CAT', 'Category');
\define('_CO_WGGALLERY_CATS', 'Categories');
\define('_CO_WGGALLERY_CATS_SELECT', 'Select categories');
// Elements of Tags
\define('_CO_WGGALLERY_TAG', 'Tag');
\define('_CO_WGGALLERY_TAGS', 'Tags');
\define('_CO_WGGALLERY_TAGS_ENTER', 'Enter tags (please use #)');
// Permissions
\define('_CO_WGGALLERY_PERMS_GLOBAL', 'Permissions global');
\define('_CO_WGGALLERY_PERMS_GLOBAL_USECOLL', 'Permissions global to use album collections');
\define('_CO_WGGALLERY_PERMS_GLOBAL_USECOLL_DESC', '<ul><li>User are allowed to combine several albums into an album collection</li></ul>');
\define('_CO_WGGALLERY_PERMS_GLOBAL_SUBMITALL', 'Permissions global to submit/edit all albums');
\define('_CO_WGGALLERY_PERMS_GLOBAL_SUBMITALL_DESC', 'Groups which should have permissions to <ul><li>create albums</li><li>edit all albums</li><li>approve all albums</li><li>upload images to all albums</li><li>approve all images</li></ul>');
\define('_CO_WGGALLERY_PERMS_GLOBAL_SUBMITOWN', 'Permissions global to submit/edit own albums without approvement');
\define('_CO_WGGALLERY_PERMS_GLOBAL_SUBMITOWN_DESC', 'Groups which should have permissions to <ul><li>create albums</li><li>edit own albums</li><li>upload images to own albums</li></ul>');
\define('_CO_WGGALLERY_PERMS_GLOBAL_SUBMITAPPR', 'Permissions global to submit/edit own albums only with approvement');
\define('_CO_WGGALLERY_PERMS_GLOBAL_SUBMITAPPR_DESC', 'Groups which should have permissions to <ul><li>create albums</li><li>edit own albums</li><li>upload images to own albums</li></ul>');
\define('_CO_WGGALLERY_PERMS_GLOBAL_DESC', '<ul>
                                                <li>' . _CO_WGGALLERY_PERMS_GLOBAL_USECOLL . ': ' . _CO_WGGALLERY_PERMS_GLOBAL_USECOLL_DESC . '<br></li>
                                                <li>' . _CO_WGGALLERY_PERMS_GLOBAL_SUBMITALL . ': ' . _CO_WGGALLERY_PERMS_GLOBAL_SUBMITALL_DESC . '<br></li>
                                                <li>' . _CO_WGGALLERY_PERMS_GLOBAL_SUBMITOWN . ': ' . _CO_WGGALLERY_PERMS_GLOBAL_SUBMITOWN_DESC . '<br></li>
                                                <li>' . _CO_WGGALLERY_PERMS_GLOBAL_SUBMITAPPR . ': ' . _CO_WGGALLERY_PERMS_GLOBAL_SUBMITAPPR_DESC . '<br></li>
                                           </ul>');
\define('_CO_WGGALLERY_PERMS_ALB_VIEW', 'Permissions to view');
\define('_CO_WGGALLERY_PERMS_ALB_VIEW_DESC', 'Groups which should have permissions to view an album');
\define('_CO_WGGALLERY_PERMS_ALB_DLFULLALB', 'Permissions to download full album');
\define('_CO_WGGALLERY_PERMS_ALB_DLFULLALB_DESC', 'Groups which should have permissions to download the full album at once');
\define('_CO_WGGALLERY_PERMS_ALB_DLIMAGE_LARGE', 'Permissions to view/download large images');
\define('_CO_WGGALLERY_PERMS_ALB_DLIMAGE_LARGE_DESC', 'Groups which should have permissions to view and download large images');
\define('_CO_WGGALLERY_PERMS_ALB_DLIMAGE_MEDIUM', 'Permissions to view/download medium images');
\define('_CO_WGGALLERY_PERMS_ALB_DLIMAGE_MEDIUM_DESC', 'Groups which should have permissions to view and download medium images');
\define('_CO_WGGALLERY_PERMS_NOTSET', 'No permission set');
\define('_CO_WGGALLERY_PERMS_NODOWNLOAD', 'You have no permission to download');
// exif
\define('_CO_WGGALLERY_EXIF', 'Exif data original file');
\define('_CO_WGGALLERY_EXIF_ALL', 'Show all');
\define('_CO_WGGALLERY_EXIF_FILENAME', 'File name');
\define('_CO_WGGALLERY_EXIF_FILEDATETIME', 'File date');
\define('_CO_WGGALLERY_EXIF_FILESIZE', 'File size');
\define('_CO_WGGALLERY_EXIF_MIMETYPE', 'Mimetype');
\define('_CO_WGGALLERY_EXIF_CAMERA', 'Camera brand');
\define('_CO_WGGALLERY_EXIF_MODEL', 'Model');
\define('_CO_WGGALLERY_EXIF_EXPTIME', 'Exposure time');
\define('_CO_WGGALLERY_EXIF_FOCALLENGTH', 'Focal Length');
\define('_CO_WGGALLERY_EXIF_DATETIMEORIG', 'Date time original');
\define('_CO_WGGALLERY_EXIF_ISO', 'ISO Speed');
\define('_CO_WGGALLERY_EXIF_LENSMAKE', 'Lens brand');
\define('_CO_WGGALLERY_EXIF_LENSMODEL', 'Lens model');
// ---------------- Misc ----------------
\define('_CO_WGGALLERY_MAINTAINEDBY', 'Maintained By');
\define('_CO_WGGALLERY_MAINTAINEDBY_DESC', 'Allow url of support site or community');

$moduleDirName      = \basename(\dirname(\dirname(__DIR__)));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

//Sample Data
\define('CO_' . $moduleDirNameUpper . '_' . 'ADD_SAMPLEDATA', 'Import Sample Data (will delete ALL current data)');
\define('CO_' . $moduleDirNameUpper . '_' . 'SAMPLEDATA_SUCCESS', 'Sample Date uploaded successfully');
\define('CO_' . $moduleDirNameUpper . '_' . 'SAVE_SAMPLEDATA', 'Export Tables to YAML');
\define('CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON', 'Show Sample Button?');
\define('CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON_DESC', 'If yes, the "Add Sample Data" button will be visible to the Admin. It is Yes as a default for first installation.');
\define('CO_' . $moduleDirNameUpper . '_' . 'EXPORT_SCHEMA', 'Export DB Schema to YAML');
\define('CO_' . $moduleDirNameUpper . '_' . 'EXPORT_SCHEMA_SUCCESS', 'Export DB Schema to YAML was a success');
\define('CO_' . $moduleDirNameUpper . '_' . 'EXPORT_SCHEMA_ERROR', 'ERROR: Export of DB Schema to YAML failed');

//Menu
\define('CO_' . $moduleDirNameUpper . '_' . 'ADMENU_MIGRATE', 'Migrate');
\define('CO_' . $moduleDirNameUpper . '_' . 'FOLDER_YES', 'Folder "%s" exist');
\define('CO_' . $moduleDirNameUpper . '_' . 'FOLDER_NO', 'Folder "%s" does not exist. Create the specified folder with CHMOD 777.');
\define('CO_' . $moduleDirNameUpper . '_' . 'SHOW_DEV_TOOLS', 'Show Development Tools Button?');
\define('CO_' . $moduleDirNameUpper . '_' . 'SHOW_DEV_TOOLS_DESC', 'If yes, the "Migrate" Tab and other Development tools will be visible to the Admin.');
\define('CO_' . $moduleDirNameUpper . '_' . 'ADMENU_FEEDBACK', 'Feedback');

//Latest Version Check
\define('CO_' . $moduleDirNameUpper . '_' . 'NEW_VERSION', 'New Version: ');
\define('CO_' . $moduleDirNameUpper . '_' . 'ERROR_BAD_XOOPS', 'You need minimul version %s (your current version is %s)');
