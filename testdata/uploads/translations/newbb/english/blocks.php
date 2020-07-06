<?php
//
// Blocks
if (defined('NEWBB_BLOCKS_DEFINED')) {
    return;
}
define('NEWBB_BLOCKS_DEFINED', true);

define('_MB_NEWBB_FORUM', 'Forum');
define('_MB_NEWBB_TOPIC', 'Topic');
define('_MB_NEWBB_RPLS', 'Replies');
define('_MB_NEWBB_VIEWS', 'Views');
define('_MB_NEWBB_LPOST', 'Last Post');
define('_MB_NEWBB_VSTFRMS', 'Forums');
define('_MB_NEWBB_DISPLAY', 'Number of posts: ');
define('_MB_NEWBB_DISPLAYMODE', 'Display mode: ');
define('_MB_NEWBB_DISPLAYMODE_FULL', 'Full');
define('_MB_NEWBB_DISPLAYMODE_COMPACT', 'Compact');
define('_MB_NEWBB_DISPLAYMODE_LITE', 'Lite');
define('_MB_NEWBB_FORUMLIST', 'Allowed forum list: ');
define('_MB_NEWBB_ALLTOPICS', 'Topics');
define('_MB_NEWBB_ALLPOSTS', 'Posts');
define('_MB_NEWBB_CRITERIA', 'Display criteria');
define('_MB_NEWBB_CRITERIA_TOPIC', 'Topics');
define('_MB_NEWBB_CRITERIA_POST', 'Posts');
define('_MB_NEWBB_CRITERIA_TIME', 'Most recent');
define('_MB_NEWBB_CRITERIA_TITLE', 'Post title');
define('_MB_NEWBB_CRITERIA_TEXT', 'Post text');
define('_MB_NEWBB_CRITERIA_VIEWS', 'Most views');
define('_MB_NEWBB_CRITERIA_REPLIES', 'Most replies');
define('_MB_NEWBB_CRITERIA_DIGEST', 'Newest digest');
define('_MB_NEWBB_CRITERIA_STICKY', 'Newest sticky');
define('_MB_NEWBB_CRITERIA_DIGESTS', 'Most digests');
define('_MB_NEWBB_CRITERIA_STICKYS', 'Most sticky topics');
define('_MB_NEWBB_TIME', 'Time period');
define('_MB_NEWBB_TIME_DESC', 'Positive for days and negative for hours');
define('_MB_NEWBB_TITLE', 'Title');
define('_MB_NEWBB_AUTHOR', 'Author');
define('_MB_NEWBB_COUNT', 'Count');
define('_MB_NEWBB_INDEXNAV', 'Display Navigator');
define('_MB_NEWBB_TITLE_LENGTH', 'Title/Post length');
// 4.3
// added by irmtfan
define('_MB_NEWBB_CRITERIA_DESC', 'you can select multiple criterias and they parsed in WHERE claus by AND. eg: sticky AND unreplied topics. null = all ');
define('_MB_NEWBB_CRITERIA_SORT_DESC', 'Note: Newest/Oldest Most/Least should be set in Order by');
define('_MB_NEWBB_DISPLAYMODE_DESC', 'Display selected items of topic in block IF topic has them AND user has the right access');
define('_MB_NEWBB_CRITERIA_ORDER', 'Order by');
define('_MB_NEWBB_TITLE_LENGTH_DESC', 'Length of topic title excerpt in block. 0 for show the whole title and no excerpt.');
define('_MB_NEWBB_POST_EXCERPT', 'Post text excerpt in block');
define('_MB_NEWBB_POST_EXCERPT_DESC', 'Length of post text excerpt by mouse over on topic title in block. 0 for dont show post text.');
