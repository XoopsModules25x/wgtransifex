<?php

if (defined('NEWBB_ADMIN_DEFINED')) {
    return;
}
define('NEWBB_ADMIN_DEFINED', true);

//%%%%%%    File Name  index.php       %%%%%
define('_AM_NEWBB_FORUMCONF', 'Forum Configuration');
define('_AM_NEWBB_ADDAFORUM', 'Add a Forum');
define('_AM_NEWBB_SYNCFORUM', 'Sync Forum');
define('_AM_NEWBB_REORDERFORUM', 'Reorder');
define('_AM_NEWBB_FORUM_MANAGER', 'Forums');
define('_AM_NEWBB_PRUNE_TITLE', 'Prune');
define('_AM_NEWBB_CATADMIN', 'Categories');
define('_AM_NEWBB_GENERALSET', 'Module Settings');
define('_AM_NEWBB_MODULEADMIN', 'Module Admin:');
define('_AM_NEWBB_HELP', 'Help');
define('_AM_NEWBB_ABOUT', 'About');
define('_AM_NEWBB_BOARDSUMMARY', 'Board Statistic');
define('_AM_NEWBB_PENDING_POSTS_FOR_AUTH', 'Posts pending authorization');
define('_AM_NEWBB_POSTID', 'Post ID');
define('_AM_NEWBB_POSTDATE', 'Post Date');
define('_AM_NEWBB_POSTER', 'Poster');
define('_AM_NEWBB_TOPICS', 'Topics');
define('_AM_NEWBB_SHORTSUMMARY', 'Board Summary');
define('_AM_NEWBB_TOTALPOSTS', 'Total Posts');
define('_AM_NEWBB_TOTALTOPICS', 'Total Topics');
define('_AM_NEWBB_TOTALVIEWS', 'Total Views');
define('_AM_NEWBB_BLOCKS', 'Blocks');
define('_AM_NEWBB_SUBJECT', 'Subject');
define('_AM_NEWBB_APPROVE', 'Approve Post');
define('_AM_NEWBB_APPROVETEXT', 'Content of this Posting');
define('_AM_NEWBB_POSTAPPROVED', 'Post has been approved');
define('_AM_NEWBB_POSTNOTAPPROVED', 'Post has NOT been approved');
define('_AM_NEWBB_POSTSAVED', 'Post has been saved');
define('_AM_NEWBB_POSTNOTSAVED', 'Post has NOT been saved');
define('_AM_NEWBB_TOPICAPPROVED', 'Topic has been approved');
define('_AM_NEWBB_TOPICNOTAPPROVED', 'Topic has NOT been approved');
define('_AM_NEWBB_TOPICID', 'Topic ID');
define('_AM_NEWBB_ORPHAN_TOPICS_FOR_AUTH', 'Unapproved topics authorization');
define('_AM_NEWBB_DEL_ONE', 'Delete only this post');
define('_AM_NEWBB_POSTSDELETED', 'Selected post deleted.');
define('_AM_NEWBB_NOAPPROVEPOST', 'There are presently no posts waiting for approval.');
define('_AM_NEWBB_SUBJECTC', 'Subject:');
define('_AM_NEWBB_MESSAGEICON', 'Message Icon:');
define('_AM_NEWBB_MESSAGEC', 'Message:');
define('_AM_NEWBB_CANCELPOST', 'Cancel Post');
define('_AM_NEWBB_GOTOMOD', 'Go to module');
define('_AM_NEWBB_PREFERENCES', 'Module preferences');
define('_AM_NEWBB_POLLMODULE', 'Xoops Poll Module');
define('_AM_NEWBB_POLL_OK', 'Ready for use');
define('_AM_NEWBB_GDLIB', 'GD library:');
define('_AM_NEWBB_AUTODETECTED', 'Autodetected: ');
define('_AM_NEWBB_AVAILABLE', 'Available');
define('_AM_NEWBB_NOTAVAILABLE', '<span style="color:#ff0000;">is not available. </span>');
define('_AM_NEWBB_NOTWRITABLE', '<span style="color:#ff0000;">Not writable</span>');
define('_AM_NEWBB_IMAGEMAGICK', 'ImageMagicK:');
define('_AM_NEWBB_IMAGEMAGICK_NOTSET', 'Not set');
define('_AM_NEWBB_ATTACHPATH', 'Path for attachment storage');
define('_AM_NEWBB_THUMBPATH', 'Path for attached image thumbs');
//define('_AM_NEWBB_RSSPATH', "Path for RSS feed");
define('_AM_NEWBB_REPORT', 'Reported posts');
define('_AM_NEWBB_REPORT_PENDING', 'Pending report');
define('_AM_NEWBB_REPORT_PROCESSED', 'Processed report');
define('_AM_NEWBB_CREATETHEDIR', 'Create it');
define('_AM_NEWBB_SETMPERM', 'Set the permission');
define('_AM_NEWBB_DIRCREATED', 'The directory has been created');
define('_AM_NEWBB_DIRNOTCREATED', 'The directory can not be created');
define('_AM_NEWBB_PERMSET', 'The permission has been set');
define('_AM_NEWBB_PERMNOTSET', 'The permission can not be set');
define('_AM_NEWBB_DIGEST', 'Send New Digest');
define('_AM_NEWBB_DIGEST_HELP_1', 'Allows you to create and send notifications about digest topics.');
define('_AM_NEWBB_DIGEST_HELP_2', 'Create a newsletter is possible only after the topic is marked as \'Digest\'.');
define('_AM_NEWBB_DIGEST_HELP_3', 'The dispatch is made only to users signed up for notification of digest topics.');
define('_AM_NEWBB_DIGEST_HELP_4', 'After creating and sending, do not delete the created messages. Otherwise they will be generated again.');
define('_AM_NEWBB_DIGEST_HELP_AUTO_DIGEST',
       'To configure the automatic creation and distribution of Digest topics, you need to create a cron task on your server.<br>For example: * NIX systems: <strong>0 6 * * * wget --post-data \'foo=bar\' https://example.com/modules/newbb/digest.php</strong><br>In this example, the script will run every day at 6.00 and check if there are any new Digest topics. If they are not found, mailing will not be done.<br>If for any reason you do not have the opportunity to create a task, then it is possible to create and make the dispatch on this page manually by clicking on the button above.<br>Please note that it is not recommended to delete created mailings, otherwise they will be created and sent again.');
//define('_AM_NEWBB_DIGEST_PAST', '<span style="color:red;">Should be sent out %d minutes ago</span>');
//define('_AM_NEWBB_DIGEST_NEXT', 'Need to send out in %d minutes');
//define('_AM_NEWBB_DIGEST_ARCHIVE', 'Digest archive');
define('_AM_NEWBB_DIGEST_SENT', 'Digest processed');
define('_AM_NEWBB_DIGEST_NOT_SENT', 'Digest not sent');
define('_AM_NEWBB_DIGEST_FAILED', 'No new digest topics');
define('_AM_NEWBB_DIGEST_CONFIRM', 'Create and send new digest?');
// admin_forum_manager.php
define('_AM_NEWBB_NAME', 'Name');
define('_AM_NEWBB_CREATEFORUM', 'Create Forum');
define('_AM_NEWBB_EDIT', 'Edit');
define('_AM_NEWBB_CLEAR', 'Clear');
define('_AM_NEWBB_DELETE', 'Delete');
define('_AM_NEWBB_ADD', 'Add');
define('_AM_NEWBB_MOVE', 'Move');
define('_AM_NEWBB_ORDER', 'Order');
define('_AM_NEWBB_TWDAFAP', 'Note: This will remove the forum and all posts in it.<br><br>WARNING: Are you sure you want to delete this Forum?');
define('_AM_NEWBB_FORUMREMOVED', 'Forum Removed.');
define('_AM_NEWBB_CREATENEWFORUM', 'Create a New Forum');
define('_AM_NEWBB_EDITTHISFORUM', 'Editing Forum:');
define('_AM_NEWBB_SET_FORUMORDER', 'Set Forum Position:');
define('_AM_NEWBB_ALLOWPOLLS', 'Allow Polls:');
define('_AM_NEWBB_ATTACHMENT_SIZE', 'Max Size in KB`s:');
define('_AM_NEWBB_ALLOWED_EXTENSIONS', "Allowed Extensions:<span style='font-size: xx-small; font-weight: normal; display: block;'>'*' indicates no limititations.<br> Extensions delimited by '|'</span>");
define('_AM_NEWBB_ALLOW_ATTACHMENTS', 'Allow Attachments:');
define('_AM_NEWBB_ALLOWHTML', 'Allow HTML:');
define('_AM_NEWBB_YES', 'Yes');
define('_AM_NEWBB_NO', 'No');
// irmtfan remove define('_AM_NEWBB_ALLOWSIGNATURES', "Allow Signatures:");
define('_AM_NEWBB_HOTTOPICTHRESHOLD', 'Hot Topic Threshold:');
//define('_AM_NEWBB_POSTPERPAGE', "Posts per Page:<span style='font-size: xx-small; font-weight: normal; display: block;'>(This is the number of posts<br> per topic that will be<br> displayed per page.)</span>");
//define('_AM_NEWBB_TOPICPERFORUM', "Topics per Forum:<span style='font-size: xx-small; font-weight: normal; display: block;'>(This is the number of topics<br> per forum that will be<br> displayed per page.)</span>");
//define('_AM_NEWBB_SHOWNAME', "Replace user's name with real name:");
//define('_AM_NEWBB_SHOWICONSPANEL', "Show icons panel:");
//define('_AM_NEWBB_SHOWSMILIESPANEL', "Show smilies panel:");
define('_AM_NEWBB_MODERATOR_REMOVE', 'Remove current moderators');
define('_AM_NEWBB_MODERATOR_ADD', 'Add moderators');
// admin_cat_manager.php
define('_AM_NEWBB_SETCATEGORYORDER', 'Set Category Position:');
define('_AM_NEWBB_ACTIVE', 'Active');
define('_AM_NEWBB_INACTIVE', 'Inactive');
define('_AM_NEWBB_STATE', 'Status:');
define('_AM_NEWBB_CATEGORYDESC', 'Category Description:');
define('_AM_NEWBB_SHOWDESC', 'Show Description?');
define('_AM_NEWBB_IMAGE', 'Image:');
//define('_AM_NEWBB_SPONSORIMAGE', 'Sponsor Image:');
define('_AM_NEWBB_SPONSORLINK', 'Sponsor Link:');
define('_AM_NEWBB_DELCAT', 'Delete Category');
define('_AM_NEWBB_WAYSYWTDTTAL', 'Note: This will NOT remove the forums under the category, you must do that via the Edit Forum section.<br><br>WARNING: Are you sure you want to delete this Category?');
//%%%%%%        File Name  admin_forums.php           %%%%%
define('_AM_NEWBB_FORUMNAME', 'Forum Name:');
define('_AM_NEWBB_FORUMDESCRIPTION', 'Forum Description:<br><span style="font-size:xx-small;font-weight:normal;display:block;">The description will be shown on the main page of the forum with a # of characters you define in the Preferences.</span>');
define('_AM_NEWBB_MODERATOR', 'Moderator(s):');
define('_AM_NEWBB_REMOVE', 'Remove');
define('_AM_NEWBB_CATEGORY', 'Category:');
define('_AM_NEWBB_DATABASEERROR', 'Database Error');
define('_AM_NEWBB_CATEGORYUPDATED', 'Category Updated.');
define('_AM_NEWBB_EDITCATEGORY', 'Editing Category:');
define('_AM_NEWBB_CATEGORYTITLE', 'Category Title:');
define('_AM_NEWBB_CATEGORYCREATED', 'Category Created.');
define('_AM_NEWBB_CREATENEWCATEGORY', 'Create a New Category');
define('_AM_NEWBB_FORUMCREATED', 'Forum Created.');
define('_AM_NEWBB_ACCESSLEVEL', 'Global Access Level:');
define('_AM_NEWBB_CATEGORY1', 'Category');
define('_AM_NEWBB_FORUMUPDATE', 'Forum Settings Updated');
define('_AM_NEWBB_FORUM_ERROR', 'ERROR: Forum Setting Error');
define('_AM_NEWBB_CLICKBELOWSYNC', 'Clicking the button below will sync up your forums and topics pages with the correct data from the database. Use this section whenever you notice flaws in the topics and forums lists.');
define('_AM_NEWBB_SYNCHING', 'Synchronizing forum index and topics (This may take a while)');
define('_AM_NEWBB_CATEGORYDELETED', 'Category deleted.');
define('_AM_NEWBB_MOVE2CAT', 'Move to category:');
define('_AM_NEWBB_MAKE_SUBFORUM_OF', 'Make a sub forum of:');
define('_AM_NEWBB_MSG_FORUM_MOVED', 'Forum moved!');
define('_AM_NEWBB_MSG_ERR_FORUM_MOVED', 'Failed to move forum.');
define('_AM_NEWBB_SELECT', '< Select >');
define('_AM_NEWBB_MOVETHISFORUM', 'Move this Forum');
define('_AM_NEWBB_MERGE', 'Merge');
define('_AM_NEWBB_MERGETHISFORUM', 'Merge this Forum');
define('_AM_NEWBB_MERGETO_FORUM', 'Merge this forum to:');
define('_AM_NEWBB_MSG_FORUM_MERGED', 'Forum merged!');
define('_AM_NEWBB_MSG_ERR_FORUM_MERGED', 'Failed to merge forum.');
//%%%%%%        File Name  admin_forum_reorder.php           %%%%%
define('_AM_NEWBB_REORDERID', 'ID');
define('_AM_NEWBB_REORDERTITLE', 'Title');
define('_AM_NEWBB_REORDERWEIGHT', 'Position');
define('_AM_NEWBB_SETFORUMORDER', 'Set Forum Ordering');
define('_AM_NEWBB_BOARDREORDER', 'The Forum has been reordered to your specification');
// admin_permission.php
define('_AM_NEWBB_PERMISSIONS_TO_THIS_FORUM', 'Topic permissions for this Forum');
define('_AM_NEWBB_CAT_ACCESS', 'Category access');
define('_AM_NEWBB_CAN_ACCESS', 'Can access forum');
define('_AM_NEWBB_CAN_VIEW', 'Can view topic content');
define('_AM_NEWBB_CAN_POST', 'Can start new topics');
define('_AM_NEWBB_CAN_REPLY', 'Can reply');
define('_AM_NEWBB_CAN_EDIT', 'Can edit own post');
define('_AM_NEWBB_CAN_DELETE', 'Can delete own post');
define('_AM_NEWBB_CAN_ADDPOLL', 'Can add poll');
define('_AM_NEWBB_CAN_VOTE', 'Can vote');
define('_AM_NEWBB_CAN_ATTACH', 'Can use attachment');
define('_AM_NEWBB_CAN_NOAPPROVE', 'Can post directly');
define('_AM_NEWBB_CAN_TYPE', 'Can use topic type');
define('_AM_NEWBB_CAN_HTML', 'Can use and disable/enable HTML in posts'); //irmtfan revised
define('_AM_NEWBB_CAN_SIGNATURE', 'Can use and disable/enable signature. Default is set in profile module.'); //irmtfan revised
define('_AM_NEWBB_ACTION', 'Action');
define('_AM_NEWBB_PERM_TEMPLATE', 'Set default permission template');
define('_AM_NEWBB_PERM_TEMPLATE_DESC', 'Edit the following permission template so that it can be applied to a forum or a couple of forums');
define('_AM_NEWBB_PERM_FORUMS', 'Select forums');
define('_AM_NEWBB_PERM_TEMPLATE_CREATED', 'Permission template has been created');
define('_AM_NEWBB_PERM_TEMPLATE_ERROR', 'Error occurs during permission template creation');
define('_AM_NEWBB_PERM_TEMPLATEAPP', 'Apply default permission');
define('_AM_NEWBB_PERM_TEMPLATE_APPLIED', 'Default permissions have been applied to forums');
define('_AM_NEWBB_PERM_ACTION', 'Permission management tools');
define('_AM_NEWBB_PERM_ACTION_HELP', 'Allows you to set the access rights for each function and group');
define('_AM_NEWBB_PERM_ACTION_HELP_TEMPLAT', 'Allows you to create an access rights template for automatic installation when creating a forum.');
define('_AM_NEWBB_PERM_ACTION_HELP_APPLY', 'Allows you to apply a permission template to already created forums.');
define('_AM_NEWBB_PERM_SETBYGROUP', 'Set permissions directly by group');
// admin_forum_prune.php
define('_AM_NEWBB_PRUNE_RESULTS_TITLE', 'Prune Results');
define('_AM_NEWBB_PRUNE_RESULTS_TOPICS', 'Pruned Topics');
define('_AM_NEWBB_PRUNE_RESULTS_POSTS', 'Pruned Posts');
define('_AM_NEWBB_PRUNE_RESULTS_FORUMS', 'Pruned Forums');
define('_AM_NEWBB_PRUNE_STORE', 'Store posts in this forum instead of deleting them');
define('_AM_NEWBB_PRUNE_ARCHIVE', 'Save a copy of posts to Archive');
define('_AM_NEWBB_PRUNE_FORUMSELERROR', 'You forgot to select forum(s) to prune');
define('_AM_NEWBB_PRUNE_DAYS', 'Remove topics without replies in:');
define('_AM_NEWBB_PRUNE_FORUMS', 'Forums to be pruned');
define('_AM_NEWBB_PRUNE_STICKY', 'Keep Sticky topics');
define('_AM_NEWBB_PRUNE_DIGEST', 'Keep Digest topics');
define('_AM_NEWBB_PRUNE_LOCK', 'Keep Locked topics');
define('_AM_NEWBB_PRUNE_HOT', 'Keep topics with more than this number of replies');
define('_AM_NEWBB_PRUNE_SUBMIT', 'Ok');
define('_AM_NEWBB_PRUNE_RESET', 'Reset');
define('_AM_NEWBB_PRUNE_YES', 'Yes');
define('_AM_NEWBB_PRUNE_NO', 'No');
define('_AM_NEWBB_PRUNE_WEEK', 'A Week');
define('_AM_NEWBB_PRUNE_2WEEKS', 'Two Weeks');
define('_AM_NEWBB_PRUNE_MONTH', 'A Month');
define('_AM_NEWBB_PRUNE_2MONTH', 'Two Months');
define('_AM_NEWBB_PRUNE_4MONTH', 'Four Months');
define('_AM_NEWBB_PRUNE_YEAR', 'A Year');
define('_AM_NEWBB_PRUNE_2YEARS', '2 Years');
// About.php constants
define('_AM_NEWBB_AUTHOR_INFO', 'Author Information');
define('_AM_NEWBB_AUTHOR_NAME', 'Author');
define('_AM_NEWBB_AUTHOR_WEBSITE', 'Author\'s website');
define('_AM_NEWBB_AUTHOR_EMAIL', 'Author\'s email');
define('_AM_NEWBB_AUTHOR_CREDITS', 'Credits');
define('_AM_NEWBB_MODULE_INFO', 'Module Development Information');
define('_AM_NEWBB_MODULE_STATUS', 'Status');
define('_AM_NEWBB_MODULE_DEMO', 'Demo Site');
define('_AM_NEWBB_MODULE_SUPPORT', 'Official support site');
define('_AM_NEWBB_MODULE_BUG', 'Report a bug for this module');
define('_AM_NEWBB_MODULE_FEATURE', 'Suggest a new feature for this module');
define('_AM_NEWBB_MODULE_DISCLAIMER', 'Disclaimer');
define('_AM_NEWBB_AUTHOR_WORD', 'The Author\'s Word');
define('_AM_NEWBB_BY', 'By');
define('_AM_NEWBB_AUTHOR_WORD_EXTRA', 'Extra words by module Author');
// admin_report.php
define('_AM_NEWBB_REPORTADMIN', 'Reported posts manager');
define('_AM_NEWBB_REPORTADMIN_HELP', 'Allows you to view and process the user\'s appeal to messages from other users who appeared to them not to comply with forum rules, etc.');
define('_AM_NEWBB_PROCESSEDREPORT', 'View processed reports');
define('_AM_NEWBB_PROCESSREPORT', 'View new reports');
define('_AM_NEWBB_REPORTTITLE', 'Report title');
define('_AM_NEWBB_REPORTEXTRA', 'Extra');
define('_AM_NEWBB_REPORTPOST', 'Report post');
define('_AM_NEWBB_REPORTTEXT', 'Report text');
define('_AM_NEWBB_REPORTMEMO', 'Process memo');
// admin_report.php
define('_AM_NEWBB_DIGESTADMIN', 'Digest manager');
define('_AM_NEWBB_DIGESTCONTENT', 'Digest content');
// admin_votedata.php
define('_AM_NEWBB_VOTE_RATINGINFOMATION', 'Voting Information');
define('_AM_NEWBB_VOTE_TOTALVOTES', 'Total votes: ');
define('_AM_NEWBB_VOTE_REGUSERVOTES', 'Registered User Votes: %s');
define('_AM_NEWBB_VOTE_ANONUSERVOTES', 'Anonymous User Votes: %s');
define('_AM_NEWBB_VOTE_USER', 'User');
define('_AM_NEWBB_VOTE_IP', 'IP Address');
define('_AM_NEWBB_VOTE_USERAVG', 'Average User Rating');
define('_AM_NEWBB_VOTE_TOTALRATE', 'Total Rating');
define('_AM_NEWBB_VOTE_DATE', 'Submitted');
define('_AM_NEWBB_VOTE_RATING', 'Rating');
define('_AM_NEWBB_VOTE_NOREGVOTES', 'No Registered User Votes');
define('_AM_NEWBB_VOTE_NOUNREGVOTES', 'No Unregistered User Votes');
define('_AM_NEWBB_VOTEDELETED', 'Voting data deleted.');
define('_AM_NEWBB_VOTE_ID', 'ID');
define('_AM_NEWBB_VOTE_FILETITLE', 'Thread Title');
define('_AM_NEWBB_VOTE_DISPLAYVOTES', 'Voting Data Information');
define('_AM_NEWBB_VOTE_NOVOTES', 'No User Votes to display');
define('_AM_NEWBB_VOTE_DELETE', 'No User Votes to delete');
define('_AM_NEWBB_VOTE_DELETEDSC', '<strong>Deletes</strong> the selected voting information from the database.');
// admin_type_manager.php
define('_AM_NEWBB_TYPE_ADD', 'Add types');
define('_AM_NEWBB_TYPE_ADD_ERR', 'Error. Add types');
define('_AM_NEWBB_TYPE_TEMPLATE', 'Type template');
define('_AM_NEWBB_TYPE_TEMPLATE_ERR', 'Error. Set template order');
define('_AM_NEWBB_TYPE_TEMPLATE_APPLY', 'Apply template');
define('_AM_NEWBB_TYPE_FORUM', 'Type per forum');
define('_AM_NEWBB_TYPE_FORUM_ERR', 'Error. It is necessary to choose a forum and not a category.');
define('_AM_NEWBB_TYPE_NAME', 'Type name');
define('_AM_NEWBB_TYPE_COLOR', 'Color');
define('_AM_NEWBB_TYPE_DESCRIPTION', 'Description');
define('_AM_NEWBB_TYPE_ORDER', 'Order');
define('_AM_NEWBB_TYPE_LIST', 'Type list');
define('_AM_NEWBB_TODEL_TYPE', 'Are you sure to delete the types: [%s]?');
define('_AM_NEWBB_TYPE_EDITFORUM_DESC', 'The data have not been saved yet. You must submit to save it.');
define('_AM_NEWBB_TYPE_ORDER_DESC', 'To activate a type for a forum, a value greater than 0 is required for \'type_order\'; In other words, a type will be inactive for a forum if \'type_order\' is set to 0.');
define('_AM_NEWBB_TYPE_HELP', ' of forums, to highlight forum topics. Example: <strong style="color:#0000ff;">[Important]</strong>, <strong style="color:#ff0000;">[ATTENTION]</strong> etc.');
// admin_synchronization.php
define('_AM_NEWBB_SYNC_TYPE_FORUM', 'Forum Data');
define('_AM_NEWBB_SYNC_TYPE_TOPIC', 'Topic Data');
define('_AM_NEWBB_SYNC_TYPE_POST', 'Post Data');
define('_AM_NEWBB_SYNC_TYPE_USER', 'User Data');
define('_AM_NEWBB_SYNC_TYPE_STATS', 'Stats Info');
define('_AM_NEWBB_SYNC_TYPE_MISC', 'MISC');
define('_AM_NEWBB_SYNC_ITEMS', 'Items for each loop: ');
define('_AM_NEWBB_ALLOW_SUBJECT_PREFIX', 'Allow Thread prefixes?');
define('_AM_NEWBB_ALLOW_SUBJECT_PREFIX_DESC', 'This allows for prefixes that are added to the topic name.');
define('_AM_NEWBB_GROUPMOD_TITLE', 'Add moderators per group');
define('_AM_NEWBB_GROUPMOD_TITLEDESC', 'Allows you to enter, users of certain groups as moderators');
define('_AM_NEWBB_GROUPMOD_ALLFORUMS', 'All forums');
define('_AM_NEWBB_GROUPMOD_ADDMOD', 'Moderators have been successfully registered.');
define('_AM_NEWBB_GROUPMOD_ERRMOD', 'You have an Error!');
// added in V 4.3
define('_AM_NEWBB_UPLOAD', 'Maximum Upload each file :');
define('_AM_NEWBB_MEMLIMITTOLARGE', 'Attention! Value \'memory_limit\' to PHP.INI less than \'post_max_size\'');
define('_AM_NEWBB_MEMLIMITOK', 'Files can be uploaded with a maximum size of %s.');
// irmtfan add messages
define('_AM_NEWBB_REPORTSAVE', 'Selected Reports have been processed successfully');
define('_AM_NEWBB_REPORTDELETE', 'Selected Reports have been deleted from database successfully');
define('_AM_NEWBB_REPORTNOTSELECT', 'No Report is selected!');
define('_AM_NEWBB_SYNC_TYPE_READ', 'Read Data');
define('_AM_NEWBB_DATABASEUPDATED', 'Database Updated Successfully!');
define('_AM_NEWBB_CAN_PDF', 'Can create PDF files');
define('_AM_NEWBB_CAN_PRINT', 'Can get print page');
//4.33
define('_AM_NEWBB_INDEX_PAGE', 'Index Page');
//5.0
define('_AM_NEWBB_UPGRADEFAILED0', "Update failed - couldn't rename field '%s'");
define('_AM_NEWBB_UPGRADEFAILED1', "Update failed - couldn't add new fields");
define('_AM_NEWBB_UPGRADEFAILED2', "Update failed - couldn't rename table '%s'");
define('_AM_NEWBB_ERROR_COLUMN', 'Could not create column in database : %s');
define('_AM_NEWBB_ERROR_BAD_XOOPS', 'This module requires XOOPS %s+ (%s installed)');
define('_AM_NEWBB_ERROR_BAD_PHP', 'This module requires PHP version %s+ (%s installed)');
define('_AM_NEWBB_ERROR_TAG_REMOVAL', 'Could not remove tags from Tag Module');

// Help tab
define('_AM_NEWBB_HELP_CATEGORY_TAB',
       'To create a category, use the button above and fill in all the fields on the form.<br>By default, category images are located: /modules/newbb/assets/images/category/<br>Sponsor link should be written in the following format: https://xoops.org/modules/newbb/ newBB Support. First the link, then the sponsor\'s name or other text.');
define('_AM_NEWBB_HELP_FORUM_TAB',
       'To create and manage the forums use the buttons with the right<br>To create the forum, use the \'Create forum\' button. Then fill in all the fields of the form. You can also create a subforum.<br>To move the forum between categories, use the \'Move\' button. Follow the further instructions.<br>To merge forums, use the \'Merge\' button. Follow the further instructions.<br>If you have an access rights template, then you can apply it to the forum you are creating.');
define('_AM_NEWBB_HELP_PERMISSION_TAB',
       '<strong>When setting permissions, be careful.</strong><br>After you install and apply the settings, you will automatically go to the next permissions tab.<br>Also here it is possible to create a default access rights template and apply it either to one forum or to all forums.');
define('_AM_NEWBB_HELP_ORDER_TAB', 'Allows you to set the order of categories and forums relative to each other.<br>The order (Weight) is set to 0 - top, 99 (and further) - bottom.');
define('_AM_NEWBB_HELP_PRUNE_TAB', 'Allows you to clear forums from empty themes, obsolete themes, etc.<br>Also you can not delete topics that you want to clear, but transfer them to a specially created category \'Archive\' or any other.');
define('_AM_NEWBB_HELP_REPORT_TAB',
       'Allows you to process reports that users send to you if they believe that the message on the forum does not comply with forum rules or ethical rules.<br>You can review the report and take action in relation to the message, the author, etc.<br>When a user sends a message, moderators and administrators are notified by e-mail.');
define('_AM_NEWBB_HELP_VOTE_TAB', 'If you have the voting function enabled, here you can see the results of the voting.<br>This vote is not associated with other XOOPS modules.');
define('_AM_NEWBB_HELP_TYPE_TAB',
       'Allows you to create tags for highlighting themes. For example:<br><strong style="color:#0000ff;">[Important]</strong> <strong>Topic Title</strong><br><strong style="color:#ff0000;">[ATTENTION]</strong> <strong>Topic Title</strong><br>You can set theme types when creating a theme on the user side.');
define('_AM_NEWBB_HELP_GROUPMOD_TAB',
       'Allows you to install users of certain groups as moderators for the entire module, and for individual categories and forums.<br>It is recommended to create separate groups of moderators, for more convenient management of moderators.<br>You can also assign specific users to moderators when creating a forum.');
define('_AM_NEWBB_HELP_SYNC_TAB', 'If you notice a problem with the message dates, the appearance of blank messages, etc. Here you can synchronize and correct forum data and topics');

define('_AM_NEWBB_FORUM_DESC_LENGTH', 'Forum Description Length');
define('_AM_NEWBB_FORUM_DESC_LENGTH_DESC', 'The Forum description shown on the main page will be truncated to # of characters you set here. A full description will be shown on the forum page.');

//PDF
define('_AM_NEWBB_INDEX_PDF_PAGE', 'If you want to use the PDF creation function, use <a href="https://github.com/XoopsModules25x/publisher/issues/30#issuecomment-231551905" target="_blank">instruction</a>.');
