<?php
//
// Thanks Tom (http://www.wf-projects.com), for correcting the Engligh language package
if (defined('NEWBB_MODINFO_DEFINED')) {
    return;
}
define('NEWBB_MODINO_DEFINED', true);
// Module Info
// The name of this module
define('_MI_NEWBB_NAME', 'Forum');
// A brief description of this module
define('_MI_NEWBB_DESC', 'XOOPS Community Bulletin Board');
// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWBB_BLOCK_TOPIC_POST', 'Recent Replied Topics. It Will drop (use advance topic renderer block)'); // irmtfan
define('_MI_NEWBB_BLOCK_TOPIC', 'Recent Topics. It Will drop (use advance topic renderer block)'); // irmtfan
define('_MI_NEWBB_BLOCK_POST', 'Recent Posts');
define('_MI_NEWBB_BLOCK_AUTHOR', 'Authors');
define('_MI_NEWBB_BLOCK_TAG_CLOUD', 'Tag Cloud');
define('_MI_NEWBB_BLOCK_TAG_TOP', 'Top Tags');
// Names of admin menu items
define('_MI_NEWBB_ADMENU_INDEX', 'Index');
define('_MI_NEWBB_ADMENU_CATEGORY', 'Categories');
define('_MI_NEWBB_ADMENU_FORUM', 'Forums');
define('_MI_NEWBB_ADMENU_PERMISSION', 'Permissions');
define('_MI_NEWBB_ADMENU_BLOCK', 'Blocks');
define('_MI_NEWBB_ADMENU_ORDER', 'Order');
define('_MI_NEWBB_ADMENU_SYNC', 'Sync forums');
define('_MI_NEWBB_ADMENU_PRUNE', 'Prune');
define('_MI_NEWBB_ADMENU_REPORT', 'Reports');
define('_MI_NEWBB_ADMENU_DIGEST', 'Digest');
define('_MI_NEWBB_ADMENU_VOTE', 'Votes');
define('_MI_NEWBB_ADMENU_TYPE', 'Topic types');
define('_MI_NEWBB_ADMENU_ABOUT', 'About');
//config options
//define('_MI_NEWBB_DO_DEBUG', 'Debug Mode');
//define('_MI_NEWBB_DO_DEBUG_DESC', 'Display error message');
define('_MI_NEWBB_DO_REWRITE', 'SEO-URL enabled');
define('_MI_NEWBB_DO_REWRITE_DESC', 'rewrites the URL, you need mod_rewrite and a. htaccess see readme.htaccess');
//define('_MI_NEWBB_IMG_SET', 'Image Set');
//define('_MI_NEWBB_IMG_SET_DESC', 'Select the Image Set to use');
//define('_MI_NEWBB_THEMESET', 'Theme set');
//define('_MI_NEWBB_THEMESET_DESC', "Module-wide, select '' . _NONE . '' will use site-wide theme");
define('_MI_NEWBB_DIR_ATTACHMENT', 'Attachments physical path.');
define('_MI_NEWBB_DIR_ATTACHMENT_DESC',
       "Physical path only needs to be set from your xoops root and not before, for example you may have attachments uploaded to www.yoururl.com/uploads/newbb the path entered would then be '/uploads/newbb' never include a trailing slash '/' the thumbnails path becomes '/uploads/newbb/thumbs'");
define('_MI_NEWBB_PATH_MAGICK', 'Path for ImageMagick');
define('_MI_NEWBB_PATH_MAGICK_DESC', "Usually it is '/usr/bin/X11'. Leave it BLANK if you do not have ImageMagicK installed or for autodetecting.");
define('_MI_NEWBB_SUBFORUM_DISPLAY', 'Display Mode of subforums on index page');
define('_MI_NEWBB_SUBFORUM_DISPLAY_DESC', 'Choose one of the methods to display subforums');
define('_MI_NEWBB_SUBFORUM_EXPAND', 'Expand');
define('_MI_NEWBB_SUBFORUM_COLLAPSE', 'Collapse');
define('_MI_NEWBB_SUBFORUM_HIDDEN', 'Hidden');
define('_MI_NEWBB_POST_EXCERPT', 'Post excerpt on forum page');
define('_MI_NEWBB_POST_EXCERPT_DESC', 'Length of post excerpt by mouse over. 0 for no excerpt.');
define('_MI_NEWBB_PATH_NETPBM', 'Path for Netpbm');
define('_MI_NEWBB_PATH_NETPBM_DESC', 'Usually it is \'/usr/bin\'. Leave it BLANK if you do not have Netpbm installed or  for autodetecting.');
define('_MI_NEWBB_IMAGELIB', 'Select the Image library to use');
define('_MI_NEWBB_IMAGELIB_DESC', 'Select which Image library to use for creating Thumbnails. Leave AUTO for automatic choice.');
define('_MI_NEWBB_MAX_IMG_WIDTH', 'Maximum Image Width');
define('_MI_NEWBB_MAX_IMG_WIDTH_DESC', 'Sets the maximum allowed <strong>Width</strong> size of an uploaded image otherwise thumbnail will be used. <br >Input 0 if you do not want to create thumbnails.');
define('_MI_NEWBB_MAX_IMG_HEIGHT', 'Maximum height of an image');
define('_MI_NEWBB_MAX_IMG_HEIGHT_DESC', 'Sets the maximum allowed height of an uploaded image.');
define('_MI_NEWBB_MAX_IMAGE_WIDTH', 'Maximum Image Width for creating thumbnail');
define('_MI_NEWBB_MAX_IMAGE_WIDTH_DESC', 'Sets the maximum width of an uploaded image to create thumbnail. <br >Image with width larger than the value will not use thumbnail.');
define('_MI_NEWBB_MAX_IMAGE_HEIGHT', 'Maximum Image Height for creating thumbnail');
define('_MI_NEWBB_MAX_IMAGE_HEIGHT_DESC', 'Sets the maximum height of an uploaded image to create thumbnail. <br >Image with height larger than the value will not use thumbnail.');
define('_MI_NEWBB_SHOW_DIS', 'Show Disclaimer On');
define('_MI_NEWBB_DISCLAIMER', 'Disclaimer');
define('_MI_NEWBB_DISCLAIMER_DESC', 'Enter your Disclaimer that will be shown for the above selected option.');
define('_MI_NEWBB_DISCLAIMER_TEXT', 'The forum contains a lot of posts with a lot of usefull information. <br><br>In order to keep the number of double-posts to a minimum, we would like to ask you to use the forum search before posting your questions here.');
define('_MI_NEWBB_NONE', 'None');
define('_MI_NEWBB_POST', 'Post');
define('_MI_NEWBB_REPLY', 'Reply');
define('_MI_NEWBB_OP_BOTH', 'Both');
define('_MI_NEWBB_WOL_ENABLE', 'Enable Who\'s Online');
define('_MI_NEWBB_WOL_ENABLE_DESC', 'Enable Who\'s Online Block shown below the Index page and the Forum pages');
define('_MI_NEWBB_NULL', 'disable');
define('_MI_NEWBB_TEXT', 'text');
define('_MI_NEWBB_GRAPHIC', 'graphic');
define('_MI_NEWBB_USERLEVEL', 'HP/MP/EXP Level Mode');
define('_MI_NEWBB_USERLEVEL_DESC',
       '<strong>HP</strong>  is determined by your average posts per day.<br><strong>MP</strong>  is determined by your join date related to your post count.<br><strong>EXP</strong> goes up each time you post, and when you get to 100%, you gain a level and the EXP drops to 0 again.');
define('_MI_NEWBB_RSS_ENABLE', 'Enable RSS Feed');
define('_MI_NEWBB_RSS_ENABLE_DESC', 'Enable RSS Feed, edit options below for maximum Items and Description length');
define('_MI_NEWBB_RSS_MAX_ITEMS', 'RSS Max. Items');
define('_MI_NEWBB_RSS_MAX_DESCRIPTION', 'RSS Max. Description Length');
define('_MI_NEWBB_RSS_UTF8', 'RSS Encoding with UTF-8');
define('_MI_NEWBB_RSS_UTF8_DESCRIPTION', "'UTF-8' will be used if enabled otherwise '' . _CHARSET . '' will be used.");
define('_MI_NEWBB_RSS_CACHETIME', 'RSS Feed cache time');
define('_MI_NEWBB_RSS_CACHETIME_DESCRIPTION', 'Cache time for re-generating RSS feed, in minutes.');
define('_MI_NEWBB_MEDIA_ENABLE', 'Enable Media Features');
define('_MI_NEWBB_MEDIA_ENABLE_DESC', 'Display attached Images directly in the post.');
//define('_MI_NEWBB_USERBAR_ENABLE', 'Enable Userbar');
//define('_MI_MEWBB_USERBAR_ENABLE_DESC', 'Display the expand Userbar: Profile, PM, ICQ, MSN, etc...');
define('_MI_NEWBB_GROUPBAR_ENABLE', 'Enable Group bar');
define('_MI_NEWBB_GROUPBAR_ENABLE_DESC', 'Display the Groups of the User in the Post info field.');
define('_MI_NEWBB_RATING_ENABLE', 'Enable Rating Function');
define('_MI_NEWBB_RATING_ENABLE_DESC', 'Allow Topic Rating');
//define('_MI_NEWBB_VIEWMODE', 'View Mode of the Threads');
//define('_MI_NEWBB_VIEWMODE_DESC', 'To override the General Settings of viewmode within threads, set to NONE in order to switch feature off');
//define('_MI_NEWBB_COMPACT', 'Compact');
//define('_MI_NEWBB_MENUMODE', 'Default Menu Mode');
//define('_MI_NEWBB_MENUMODE_DESC', "'SELECT' - select options,'HOVER' - may slow down IE,'CLICK' - requires JAVASCRIPT");
define('_MI_NEWBB_REPORTMOD_ENABLE', 'Report a Post');
define('_MI_NEWBB_REPORTMOD_ENABLE_DESC', 'User can report posts to Moderator(s), for any reason, which enables Moderator(s) to take action');
define('_MI_NEWBB_SHOW_JUMPBOX', 'Show Jumpbox');
define('_MI_NEWBB_SHOW_JUMPBOX_DESC', 'If Enabled, a drop-down menu will allow users to jump to another forum from a forum or topic');
define('_MI_NEWBB_SHOW_PERMISSIONTABLE', 'Show Permission Table');
define('_MI_NEWBB_SHOW_PERMISSIONTABLE_DESC', 'Setting YES will display user\'s right');
define('_MI_NEWBB_EMAIL_DIGEST', 'Email post digest');
define('_MI_NEWBB_EMAIL_DIGEST_DESC', 'Set time period for sending post digest to users<br><strong>Note:</strong> To enable this feature, read <a href="/modules/newbb/admin/admin_digest.php">recommendations</a> on setting up.');
define('_MI_NEWBB_EMAIL_NONE', 'No email');
define('_MI_NEWBB_EMAIL_DAILY', 'Daily');
define('_MI_NEWBB_EMAIL_WEEKLY', 'Weekly');
define('_MI_NEWBB_SHOW_IP', 'Show user IP');
define('_MI_NEWBB_SHOW_IP_DESC', 'Setting YES will show users IP to moderators');
define('_MI_NEWBB_ENABLE_KARMA', 'Enable karma requirement');
define('_MI_NEWBB_ENABLE_KARMA_DESC', 'This allows user to set a karma requirement for other users reading his/her post');
define('_MI_NEWBB_KARMA_OPTIONS', 'Karma options for post');
define('_MI_NEWBB_KARMA_OPTIONS_DESC', "Use ', ' as delimiter for multi-options.");
define('_MI_NEWBB_SINCE_OPTIONS', "'Since' options for creating a selection box in 'viewform.php', 'list.topic.php' and 'search.php'");
define('_MI_NEWBB_SINCE_OPTIONS_DESC', 'Positive value for days and negative value for hours. Use ", " as delimiter for multi-options. (0=From the beginning) (365=From the last year)');
define('_MI_NEWBB_SINCE_DEFAULT', "'Since' default value in selection box");
define('_MI_NEWBB_SINCE_DEFAULT_DESC', 'Default value in the selection box if not specified by users. Positive value for days and negative value for hours. (0=From the beginning) (365=From the last year)');
//define('_MI_NEWBB_MODERATOR_HTML', 'Allow HTML tags for moderators');
//define('_MI_NEWBB_MODERATOR_HTML_DESC', 'This option allows only moderators to use HTML in post subject');
define('_MI_NEWBB_USER_ANONYMOUS', 'Allow registered users to post anonymously');
define('_MI_NEWBB_USER_ANONYMOUS_DESC', 'This allows a logged in user to post anonymously');
define('_MI_NEWBB_ANONYMOUS_PRE', 'Prefix for anonymous user');
define('_MI_NEWBB_ANONYMOUS_PRE_DESC', 'This will add a prefix to the anonymous username while posting');
define('_MI_NEWBB_REQUIRE_REPLY', 'Allow requiring reply to read a post');
define('_MI_NEWBB_REQUIRE_REPLY_DESC', 'This feature forces readers to reply to the original posters post before being able to read the original');
define('_MI_NEWBB_EDIT_TIMELIMIT', 'Time limit for edit a post');
define('_MI_NEWBB_EDIT_TIMELIMIT_DESC', 'Set a Time limit for user editing their own post. In minutes, 0 for no limit');
define('_MI_NEWBB_DELETE_TIMELIMIT', 'Time limit for deleting a Post');
define('_MI_NEWBB_DELETE_TIMELIMIT_DESC', 'Set a Time limit for user deleting thier own post. In minutes, 0 for no limit');
define('_MI_NEWBB_POST_TIMELIMIT', 'Time limit for consecutively posting');
define('_MI_NEWBB_POST_TIMELIMIT_DESC', 'Set a Time limit for consecutively posting. In seconds, 0 for no limit');
define('_MI_RECORDEDIT_TIMELIMIT', 'Timelimit for recording edit info');
define('_MI_RECORDEDIT_TIMELIMIT_DESC', 'Set a Timelimit for waiving recording edit info. In minutes, 0 for no limit');
define('_MI_NEWBB_SHOW_REALNAME', 'Show Real Name');
define('_MI_NEWBB_SHOW_REALNAME_DESC', 'Replace username with user\'s real name.');
define('_MI_NEWBB_CACHE_ENABLE', 'Enable Cache');
define('_MI_NEWBB_CACHE_ENABLE_DESC', 'Store some intermediate results in session to save queries');
define('_MI_NEWBB_QUICKREPLY_ENABLE', 'Enable Quick reply');
define('_MI_NEWBB_QUICKREPLY_ENABLE_DESC', 'This will enable the Quick reply form');
define('_MI_NEWBB_POSTSPERPAGE', 'Posts per Page');
define('_MI_NEWBB_POSTSPERPAGE_DESC', 'The maximum number of posts that will be displayed per page');
define('_MI_NEWBB_POSTSFORTHREAD', 'Maximum posts for thread view mode');
define('_MI_NEWBB_POSTSFORTHREAD_DESC', 'Flat mode will be used if post count exceeds the number');
define('_MI_NEWBB_TOPICSPERPAGE', 'Topics per Page');
define('_MI_NEWBB_TOPICSPERPAGE_DESC', 'The maximum number of topics that will be displayed per page');
//define('_MI_NEWBB_IMG_TYPE', 'Image Type');
//define('_MI_NEWBB_IMG_TYPE_DESC', 'Select the image type of buttons in the forum.<br>- png: for high speed server<br>- gif: for normal speed<br>- auto: gif for IE and png for other browsers');
//define('_MI_NEWBB_PNGFORIE_ENABLE', 'Enable PNG hack');
//define('_MI_NEWBB_PNGFORIE_ENABLE_DESC', 'The hack to allow PNG transparency attribute with IE');
//define('_MI_NEWBB_FORM_OPTIONS', 'Form Options');
//define('_MI_NEWBB_FORM_OPTIONS_DESC', 'Form options that users can choose when posting/editing/replying.');
//define('_MI_NEWBB_FORM_COMPACT', 'Compact');
//define('_MI_NEWBB_FORM_DHTML', 'DHTML');
define('_MI_NEWBB_MAGICK', 'ImageMagick');
define('_MI_NEWBB_NETPBM', 'Netpbm');
define('_MI_NEWBB_GD1', 'GD1 Library');
define('_MI_NEWBB_GD2', 'GD2 Library');
define('_MI_NEWBB_AUTO', 'AUTO');
define('_MI_NEWBB_WELCOMEFORUM', 'Forum for welcoming new user');
define('_MI_NEWBB_WELCOMEFORUM_DESC', 'A profile post will be published when a user visits Forum module for the first time');
define('_MI_NEWBB_PERMCHECK_ONDISPLAY', 'Check permission');
define('_MI_NEWBB_PERMCHECK_ONDISPLAY_DESC', 'Check permission for edit on display page');
define('_MI_NEWBB_USERMODERATE', 'Enable user moderation');
define('_MI_NEWBB_USERMODERATE_DESC', 'Forum moderator can suspend a specific user for a specific time period in the forum');
// RMV-NOTIFY
// Notification event descriptions and mail templates
define('_MI_NEWBB_THREAD_NOTIFY', 'Thread');
define('_MI_NEWBB_THREAD_NOTIFYDSC', 'Notification options that apply to the current thread.');
define('_MI_NEWBB_FORUM_NOTIFY', 'Forum');
define('_MI_NEWBB_FORUM_NOTIFYDSC', 'Notification options that apply to the current forum.');
define('_MI_NEWBB_GLOBAL_NOTIFY', 'Global');
define('_MI_NEWBB_GLOBAL_NOTIFYDSC', 'Global forum notification options.');
define('_MI_NEWBB_THREAD_NEWPOST_NOTIFY', 'New Post');
define('_MI_NEWBB_THREAD_NEWPOST_NOTIFYCAP', 'Notify me of new posts in the current thread.');
define('_MI_NEWBB_THREAD_NEWPOST_NOTIFYDSC', 'Receive notification when a new message is posted in the current thread.');
define('_MI_NEWBB_THREAD_NEWPOST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New post in thread');
define('_MI_NEWBB_FORUM_NEWTHREAD_NOTIFY', 'New Thread');
define('_MI_NEWBB_FORUM_NEWTHREAD_NOTIFYCAP', 'Notify me of new topics in the current forum.');
define('_MI_NEWBB_FORUM_NEWTHREAD_NOTIFYDSC', 'Receive notification when a new thread is started in the current forum.');
define('_MI_NEWBB_FORUM_NEWTHREAD_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New thread in forum');
define('_MI_NEWBB_GLOBAL_NEWFORUM_NOTIFY', 'New Forum');
define('_MI_NEWBB_GLOBAL_NEWFORUM_NOTIFYCAP', 'Notify me when a new forum is created.');
define('_MI_NEWBB_GLOBAL_NEWFORUM_NOTIFYDSC', 'Receive notification when a new forum is created.');
define('_MI_NEWBB_GLOBAL_NEWFORUM_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New forum');
define('_MI_NEWBB_GLOBAL_NEWPOST_NOTIFY', 'New Post');
define('_MI_NEWBB_GLOBAL_NEWPOST_NOTIFYCAP', 'Notify me of any new posts.');
define('_MI_NEWBB_GLOBAL_NEWPOST_NOTIFYDSC', 'Receive notification when any new message is posted.');
define('_MI_NEWBB_GLOBAL_NEWPOST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New post');
define('_MI_NEWBB_FORUM_NEWPOST_NOTIFY', 'New Post');
define('_MI_NEWBB_FORUM_NEWPOST_NOTIFYCAP', 'Notify me of any new posts in the current forum.');
define('_MI_NEWBB_FORUM_NEWPOST_NOTIFYDSC', 'Receive notification when any new message is posted in the current forum.');
define('_MI_NEWBB_FORUM_NEWPOST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New post in forum');
define('_MI_NEWBB_GLOBAL_NEWFULLPOST_NOTIFY', 'New Post (Full Text)');
define('_MI_NEWBB_GLOBAL_NEWFULLPOST_NOTIFYCAP', 'Notify me of any new posts (include full text in message).');
define('_MI_NEWBB_GLOBAL_NEWFULLPOST_NOTIFYDSC', 'Receive full text notification when any new message is posted.');
define('_MI_NEWBB_GLOBAL_NEWFULLPOST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New post (full text)');
define('_MI_NEWBB_GLOBAL_DIGEST_NOTIFY', 'Digest');
define('_MI_NEWBB_GLOBAL_DIGEST_NOTIFYCAP', 'Notify me of post digest.');
define('_MI_NEWBB_GLOBAL_DIGEST_NOTIFYDSC', 'Receive digest notification.');
define('_MI_NEWBB_GLOBAL_DIGEST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : post digest');
// FOR installation
define('_MI_NEWBB_INSTALL_CAT_TITLE', 'Category Test');
define('_MI_NEWBB_INSTALL_CAT_DESC', 'Category for test.');
define('_MI_NEWBB_INSTALL_FORUM_NAME', 'Forum Test');
define('_MI_NEWBB_INSTALL_FORUM_DESC', 'Forum for test.');
define('_MI_NEWBB_INSTALL_POST_SUBJECT', 'Congratulations! The forum is working.');
define('_MI_NEWBB_INSTALL_POST_TEXT', '
    Welcome to ' . htmlspecialchars($GLOBALS['xoopsConfig']['sitename'], ENT_QUOTES) . ' forum.
    Feel free to register and login to start your topics.

    If you have any question concerning NewBB usage, please visit your local support site or [url=https://xoops.org/modules/newbb/]XOOPS Support Site[/url].

    ------- Example rules ----------

    Forum Rules

    1. Each participant of the Forum bears full responsibility for the information posted at the Forum. The Administration of the Forum is not responsible for the content of any topics and/or individual messages, except for messages posted by the administration.

    2. You agree not to post on the forum and not send offensive, threatening, libelous messages, pornography, incitement to national hatred, messages degrading religious feelings or inciting hatred (racial, social or any other) against the members of the forum, and other messages.

    Attempts to post such messages may lead to your disconnection from the forum (and your provider will be notified).
    Moderators have access to the IP addresses of all messages, which makes such a policy possible.

    3. You agree not to publish materials in violation of copyright, not to send SPAM to the forum participants, not to use the forum for the distribution of advertisements of extraneous nature, the installation of pyramid schemes and other illegal commercial activities.

    4. You agree not to engage in deliberate imitation-provocative activities on the forum:
    - bluff (persistent withdrawal of the discussion aside without explanation);
    - cartouches (a long mutual throwing of collateral counter-arguments without discussing the topic on the merits and ignoring the other participants in the discussion);
    - open or veiled ohayvaniem COB, CPE or individual people (criticism must be correct and reasoned);
    - manipulation of the minds of readers with the help of text techniques NLP;
    - etc.
    Corresponding messages will be moved to a separate section, or immediately deleted.

    5. Our forum is designed to discuss events and opinions, but not to discuss the people who expressed these views.
    To "clarify the relationship" it is recommended to use "Personal Messages".
    Public "clarification of relations" are allowed only in the corresponding section, and only with the observance of ethical standards.
    There is no duplication of messages, except for important administration messages in all forums. Other identical messages are deleted.

    6. Take care that the design of messages does not create difficulties when viewing. Avoid excessive citation. It is not recommended extensive citation of Internet sources, which can be given a hyperlink.
    Do not neglect the preview of the message before publishing.
    If necessary, edit your messages.

    7. You acknowledge that:
    - the opinion of the forum administration may not coincide with the opinion of the authors of the messages;
    - the administration has the right to remove any information from the forum pages if, in its opinion, the messages carrying this information violate these Rules;
    - messages that violate these rules may be erased without notice to their authors, and accounts of these authors may be removed from the lists of the forum, if such violations are allowed in the future.

    8. Moderation policy:

    8.1. Off-topics are highlighted in separate topics, with cross-references.
    The request to participants to adhere to this rule: if you want to discuss the side branch - open a new topic and give cross-references.

    8.2. Phrases with violation of ethical standards are removed entirely; in their place is inserted * censored *, or <deleted>, or <The message is deleted as contradicting the spirit and subject of our forum, in which in the honor of good manners and respect for the interlocutor>

    8.3. Flood and "clarifying the relationship" with ethical compliance: either deleted or transferred to the appropriate section (at the discretion of the moderator).
    Themes from the corresponding section can be deleted two weeks after the last replica in this topic.

    8.4. To those who regularly violate the rules of our forum, the translation can be applied to "pre-moderation" (all messages of such participants get to the forum only after their approval by the moderator).

    The information on sanctions for participants will be placed in the appropriate section.

    9. Discussion of the actions of moderators and the administration of the forum is allowed only in a certain section and only in the correct form (that is politely and with the justification of their point of view).

    For the solution of everyday questions on moderation, please contact the moderators and administrators via private messages.

    All questions, suggestions and comments on the forum should be posted in the appropriate section, or sent to administrators via private messages or by e-mail.

    10. As a user you are aware of the fact that the information you enter will be stored in the host\'s database. Check which information about you is publicly available by clicking on the "profile" link.
    Although this information will not be disclosed to third parties without your permission, the administration of the forums can not be responsible for the actions of hackers, which can lead to unauthorized access to it.
    Consider this feature of information exchange on the Internet.

    The forum automatically uses cookies to store information on your computer. These cookies do not contain any information from your input and serve only to improve the quality of the forums. Your e-mail address is used only to confirm your registration, inform you of new messages and password (and to send a new password if you forget the current one).

    The use of the Forum is evidence of your consent to these Rules.
    ');
define('_MI_NEWBB_ADMENU_GROUPMOD', 'Group moderate');
//define('_MI_NEWBB_SUBJECT_PREFIX', 'Add a prefix to the topic subject');
//define('_MI_NEWBB_SUBJECT_PREFIX_DESC', 'Sets a prefix, such as [SOLVED] at the beginning of the subject. For more options please use one ', ' as the separator. NONE is no prefix.');
//define('_MI_NEWBB_SUBJECT_PREFIX_DEFAULT',
//       "<span style='color:#00CC00;'> [solved] </span> <span style='color:#00CC00;'> [done] </span> <span style='color:#FF0000;'> [request] </span> , <span style='color:#FF0000;'> [bug report] </span> <span style='color:#FF0000;'> [unsolved] </span>");
//define('_MI_NEWBB_SUBJECT_PREFIX_LEVEL', 'Permissions for use of prefixes');
//define('_MI_NEWBB_SUBJECT_PREFIX_LEVEL_DESC', 'The group (s) select the prefixes to use it.');
//define('_MI_NEWBB_SPL_DISABLE', 'disabled');
//define('_MI_NEWBB_SPL_ANYONE', 'each');
//define('_MI_NEWBB_SPL_MEMBER', 'Members');
//define('_MI_NEWBB_SPL_MODERATOR', 'Moderators');
//define('_MI_NEWBB_SPL_ADMIN', 'Administrators');
define('_MI_NEWBB_STATISTIK_ENABLE', 'Enable Stats');
define('_MI_NEWBB_STATISTIK_ENABLE_DESC', 'The stats will be shown in your forum at the bottom of each forum/topic');
//4.05
define('_MI_NEWBB_SHOW_INFOBOX', 'Show Infobox');
define('_MI_NEWBB_SHOW_INFOBOX_DESC', 'Infobox contains information about the user (joining date, number of posts,...)');
define('_MI_NEWBB_INFOBOX_NONE', 'No');
define('_MI_NEWBB_INFOBOX_HIDDEN', 'Yes, collapsed');
define('_MI_NEWBB_INFOBOX_SHOW', 'Yes, expanded');
define('_MI_NEWBB_SHOW_SOCIALLINKS', 'Show social links');
define('_MI_NEWBB_SHOW_SOCIALLINKS_DESC', 'Show sharing buttons on the bottom of each post');
//4.2
define('_MI_NEWBB_PAGENAV_DISPLAY', 'Display of navigation');
define('_MI_NEWBB_PAGENAV_DISPLAY_DESC', 'Shows the page number in the corresponding hardware mode');
define('_MI_NEWBB_PAGENAV_NUMBER', 'as numbers');
define('_MI_NEWBB_PAGENAV_IMAGE', 'as small images');
define('_MI_NEWBB_PAGENAV_SELECT', 'as select box');
define('_MI_NEWBB_ADVERTISING', 'Show Advertising');
define('_MI_NEWBB_ADVERTISING_DESC', 'shows a commercial break after the 2nd Thread. <a href="/modules/system/admin.php?fct=banners">Managing Banners</a>');
define('_MI_NEWBB_USERATTACH_ENABLE', 'Display attachments only for registered users');
define('_MI_NEWBB_USERATTACH_ENABLE_DESC', 'shows attachments in the forum only after logging in.');
// 4.3
define('_MI_NEWBB_BLOCK_LIST_TOPIC', 'Render a list of topics');
// 5.0
define('_MI_NEWBB_POLL_MODULE', 'Poll module');
define('_MI_NEWBB_POLL_MODULE_DESC', 'XoopsPoll or clone. Leave blank to disable.');

//Help
define('_MI_NEWBB_HELP', 'Help');
define('_MI_NEWBB_DIRNAME', basename(dirname(dirname(__DIR__))));
define('_MI_NEWBB_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
define('_MI_NEWBB_BACK_2_ADMIN', 'Back to Administration of ');
define('_MI_NEWBB_OVERVIEW', 'Overview');

//define('_MI_NEWBB_HELP_DIR', __DIR__);

//help multi-page
define('_MI_NEWBB_HELP_DISCLAIMER', 'Disclaimer');
define('_MI_NEWBB_LICENSE', 'License');
define('_MI_NEWBB_SUPPORT', 'Support');

// Message when you first log in to the forum
define('_MI_NEWBB_WELCOMEFORUM_MESSAGE', 'Enter a message for the first time you logged in');
define('_MI_NEWBB_WELCOMEFORUM_MESSAGE_DESC', 'The message will be published in the first user message when the user first logs on to the Forum');
define('_MI_NEWBB_WELCOMEFORUM_DESC_MESSAGE', '
Since the forum works in real time, it is impossible to verify or confirm the accuracy of the information placed here. Remember that the forum administration does not actively monitor and is not responsible for the messages sent. Administration does not guarantee the accuracy, completeness and correctness of the content of any message. Any communication reflects the author\'s point of view, which does not necessarily coincide with the point of view of the administration of the forum or organization associated with this forum. Any user who finds a provocative message can inform the forum administration about this. In this case, the message will be reviewed and, if the administration deems it necessary, deleted. However, do not forget that this process takes time and treat it with understanding.
');
define('_MI_NEWBB_FORUM_DESC_LENGTH', 'Forum Description Length');
define('_MI_NEWBB_FORUM_DESC_LENGTH_DESC', 'The Forum description shown on the main page will be truncated to # of characters you set here. A full description will be shown on the forum page.');

define('_MI_NEWBB_ADMENU_MIGRATE', 'Migrate');
define('_MI_NEWBB_SHOW_DEV_TOOLS', 'Show Development Tools Button?');
define('_MI_NEWBB_SHOW_DEV_TOOLS_DESC', 'If yes, the "Migrate" Tab and other Development tools will be visible to the Admin.');
