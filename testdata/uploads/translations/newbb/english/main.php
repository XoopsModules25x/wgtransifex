<?php

if (\defined('NEWBB_MAIN_DEFINED')) {
    return;
}
\define('NEWBB_MAIN_DEFINED', true);

\define('_MD_NEWBB_ERROR', 'Error');
\define('_MD_NEWBB_SELFORUM', 'Select a Forum');
\define('_MD_NEWBB_THIS_FILE_WAS_ATTACHED_TO_THIS_POST', 'Attached file:');
\define('_MD_NEWBB_ALLOWED_EXTENSIONS', 'Allowed extensions');
\define('_MD_NEWBB_MAX_FILESIZE', 'Maximum file size');
\define('_MD_NEWBB_ATTACHMENT', 'Attach file');
\define('_MD_NEWBB_FILESIZE', 'Size');
\define('_MD_NEWBB_HITS', 'Hits');
\define('_MD_NEWBB_GROUPS', 'Groups:');
\define('_MD_NEWBB_DEL_ONE', 'Delete only this post');
\define('_MD_NEWBB_DEL_RELATED', 'Delete all posts in this topic');
\define('_MD_NEWBB_MARK_ALL_FORUMS', 'Mark all forums');
\define('_MD_NEWBB_MARK_ALL_TOPICS', 'Mark all topics');
\define('_MD_NEWBB_MARK_UNREAD', 'unread');
\define('_MD_NEWBB_MARK_READ', 'read');
\define('_MD_NEWBB_ALL_FORUM_MARKED', 'All forums marked');
\define('_MD_NEWBB_ALL_TOPIC_MARKED', 'All topics marked');
\define('_MD_NEWBB_BOARD_DISCLAIMER', 'Forum Disclaimer');
//index.php
\define('_MD_NEWBB_ADMINCP', 'Admin Panel');
\define('_MD_NEWBB_FORUM', 'Forum');
\define('_MD_NEWBB_WELCOME', 'Welcome to %s Forum.');
\define('_MD_NEWBB_TOPICS', 'Topics');
\define('_MD_NEWBB_POSTS', 'Posts');
\define('_MD_NEWBB_DIGESTS', 'Digests');
\define('_MD_NEWBB_LASTPOST', 'Last Post');
\define('_MD_NEWBB_MODERATOR', 'Moderator');
\define('_MD_NEWBB_NEWPOSTS', 'New posts');
\define('_MD_NEWBB_NONEWPOSTS', 'No new posts');
\define('_MD_NEWBB_PRIVATEFORUM', 'Inactive Forum');
\define('_MD_NEWBB_BY', 'by'); // Posted by
\define('_MD_NEWBB_TOSTART', 'To start viewing messages, select the forum that you want to visit from the list below.');
\define('_MD_NEWBB_TOTALTOPICSC', 'Total Topics: ');
\define('_MD_NEWBB_TOTALPOSTSC', 'Total Posts: ');
\define('_MD_NEWBB_TOTALUSER', 'Total Users: ');
\define('_MD_NEWBB_TIMENOW', 'The time now is %s');
\define('_MD_NEWBB_USER_LASTVISIT', 'Your last visit: %s');
\define('_MD_NEWBB_USER_LASTPOST', 'Your last post: %s');
\define('_MD_NEWBB_USER_NOLASTPOST', 'You have not posted yet');
\define('_MD_NEWBB_USER_TOPICS', 'Your Topics: %s');
\define('_MD_NEWBB_USER_POSTS', 'Posts: %s');
\define('_MD_NEWBB_USER_DIGESTS', 'Digests: %s');
\define('_MD_NEWBB_VIEW_NEWPOSTS', 'View New Posts');
\define('_MD_NEWBB_ADVSEARCH', 'Advanced Search');
\define('_MD_NEWBB_POSTEDON', 'Posted on: ');
\define('_MD_NEWBB_SUBJECT', 'Subject');
\define('_MD_NEWBB_INACTIVEFORUM_NEWPOSTS', 'Inactive forum with new posts');
\define('_MD_NEWBB_INACTIVEFORUM_NONEWPOSTS', 'Inactive forum without new posts');
\define('_MD_NEWBB_SUBFORUMS', 'Subforums');
\define('_MD_NEWBB_MAINFORUMOPT', 'Main Options');
\define('_MD_NEWBB_PENDING_POSTS_FOR_AUTH', 'Posts pending approval:');
\define('_MD_NEWBB_TODAYTOPICSC', 'Today Topics: ');
\define('_MD_NEWBB_TODAYPOSTSC', 'Today Posts: ');
\define('_MD_NEWBB_TOTALDIGESTSC', 'Total Digests: ');
//page_header.php
\define('_MD_NEWBB_MODERATEDBY', 'Moderated by');
\define('_MD_NEWBB_SEARCH', 'Search');
\define('_MD_NEWBB_FORUMINDEX', 'Forum Index');
\define('_MD_NEWBB_POSTNEW', 'New Topic');
\define('_MD_NEWBB_REGTOPOST', 'Register To Post');
//search.php
\define('_MD_NEWBB_SEARCHALLFORUMS', 'Search All Forums');
\define('_MD_NEWBB_FORUMC', 'Forum');
\define('_MD_NEWBB_AUTHORC', 'Author:');
\define('_MD_NEWBB_SORTBY', 'Sort by');
\define('_MD_NEWBB_DATE', 'Date');
\define('_MD_NEWBB_TOPIC', 'Topic');
\define('_MD_NEWBB_POST2', 'Post');
\define('_MD_NEWBB_USERNAME', 'Username');
\define('_MD_NEWBB_BODY', 'Body');
\define('_MD_NEWBB_SINCE', 'Since');
//viewforum.php
\define('_MD_NEWBB_REPLIES', 'Replies');
\define('_MD_NEWBB_POSTER', 'Poster');
\define('_MD_NEWBB_VIEWS', 'Views');
\define('_MD_NEWBB_MORETHAN', 'New posts [ Popular ]');
\define('_MD_NEWBB_MORETHAN2', 'No New posts [ Popular ]');
\define('_MD_NEWBB_TOPICSHASATT', 'Topic has Attachments');
\define('_MD_NEWBB_TOPICHASPOLL', 'Topic has a Poll');
\define('_MD_NEWBB_TOPICLOCKED', 'Topic is Locked');
\define('_MD_NEWBB_LEGEND', 'Legend');
\define('_MD_NEWBB_NEXTPAGE', 'Next Page');
\define('_MD_NEWBB_SORTEDBY', 'Sorted by');
\define('_MD_NEWBB_TOPICTITLE', 'Topic title');
\define('_MD_NEWBB_NUMBERREPLIES', 'Number of replies');
\define('_MD_NEWBB_TOPICPOSTER', 'Topic poster');
\define('_MD_NEWBB_TOPICTIME', 'Publish time');
\define('_MD_NEWBB_LASTPOSTTIME', 'Last post time');
\define('_MD_NEWBB_ASCENDING', 'Ascending order');
\define('_MD_NEWBB_DESCENDING', 'Descending order');
\define('_MD_NEWBB_FROMLASTHOURS', 'From last %s hours');
\define('_MD_NEWBB_FROMLASTDAYS', 'From last %s days');
\define('_MD_NEWBB_THELASTYEAR', 'From the last year');
\define('_MD_NEWBB_BEGINNING', 'From the beginning');
\define('_MD_NEWBB_SEARCHTHISFORUM', 'Search This Forum');
\define('_MD_NEWBB_TOPIC_SUBJECTC', 'Topic Prefix:');
\define('_MD_NEWBB_RATINGS', 'Ratings');
//Pemission table
\define('_MD_NEWBB_CAN_ACCESS', 'You <strong>can</strong> access the forum.<br>');
\define('_MD_NEWBB_CANNOT_ACCESS', 'You <strong>cannot</strong> access the forum.<br>');
\define('_MD_NEWBB_CAN_POST', 'You <strong>can</strong> start a new topic.<br>');
\define('_MD_NEWBB_CANNOT_POST', 'You <strong>cannot</strong> start a new topic.<br>');
\define('_MD_NEWBB_CAN_VIEW', 'You <strong>can</strong> view topic.<br>');
\define('_MD_NEWBB_CANNOT_VIEW', 'You <strong>cannot</strong> view topic.<br>');
\define('_MD_NEWBB_CAN_REPLY', 'You <strong>can</strong> reply to posts.<br>');
\define('_MD_NEWBB_CANNOT_REPLY', 'You <strong>cannot</strong> reply to posts.<br>');
\define('_MD_NEWBB_CAN_EDIT', 'You <strong>can</strong> edit your posts.<br>');
\define('_MD_NEWBB_CANNOT_EDIT', 'You <strong>cannot</strong> edit your posts.<br>');
\define('_MD_NEWBB_CAN_DELETE', 'You <strong>can</strong> delete your posts.<br>');
\define('_MD_NEWBB_CANNOT_DELETE', 'You <strong>cannot</strong> delete your posts.<br>');
\define('_MD_NEWBB_CAN_ADDPOLL', 'You <strong>can</strong> add new polls.<br>');
\define('_MD_NEWBB_CANNOT_ADDPOLL', 'You <strong>cannot</strong> add new polls.<br>');
\define('_MD_NEWBB_CAN_VOTE', 'You <strong>can</strong> vote in polls.<br>');
\define('_MD_NEWBB_CANNOT_VOTE', 'You <strong>cannot</strong> vote in polls.<br>');
\define('_MD_NEWBB_CAN_ATTACH', 'You <strong>can</strong> attach files to posts.<br>');
\define('_MD_NEWBB_CANNOT_ATTACH', 'You <strong>cannot</strong> attach files to posts.<br>');
\define('_MD_NEWBB_CAN_NOAPPROVE', 'You <strong>can</strong> post without approval.<br>');
\define('_MD_NEWBB_CANNOT_NOAPPROVE', 'You <strong>cannot</strong> post without approval.<br>');
\define('_MD_NEWBB_CAN_TYPE', 'You <strong>can</strong> use topic type.<br>');
\define('_MD_NEWBB_CANNOT_TYPE', 'You <strong>cannot</strong> use topic type.<br>');
\define('_MD_NEWBB_CAN_HTML', 'You <strong>can</strong> use HTML syntax.<br>');
\define('_MD_NEWBB_CANNOT_HTML', 'You <strong>cannot</strong> use HTML syntax.<br>');
\define('_MD_NEWBB_CAN_UPLOAD', 'You <strong>can</strong> upload.<br>');
\define('_MD_NEWBB_CANNOT_UPLOAD', 'You <strong>cannot</strong> upload.<br>');
\define('_MD_NEWBB_CAN_SIGNATURE', 'You <strong>can</strong> use signature.<br>');
\define('_MD_NEWBB_CANNOT_SIGNATURE', 'You <strong>cannot</strong> use signature.<br>');
\define('_MD_NEWBB_CAN_PDF', 'You <strong>can</strong> create PDF files.<br>');
\define('_MD_NEWBB_CANNOT_PDF', 'You <strong>cannot</strong> create PDF files.<br>');
\define('_MD_NEWBB_CAN_PRINT', 'You <strong>can</strong> get print page.<br>');
\define('_MD_NEWBB_CANNOT_PRINT', 'You <strong>cannot</strong> get print page.<br>');
/*
\define('_MD_NEWBB_CAN_ACCESS', 'You <strong>can</strong> access the forum.<br>');
\define('_MD_NEWBB_CANNOT_ACCESS', 'You <strong>cannot</strong> access the forum.<br>');
\define('_MD_NEWBB_CAN_POST', 'You <strong>can</strong> start a new topic.<br>');
\define('_MD_NEWBB_CANNOT_POST', 'You <strong>cannot</strong> start a new topic.<br>');
\define('_MD_NEWBB_CAN_VIEW', 'You <strong>can</strong> view topic.<br>');
\define('_MD_NEWBB_CANNOT_VIEW', 'You <strong>cannot</strong> view topic.<br>');
\define('_MD_NEWBB_CAN_REPLY', 'You <strong>can</strong> reply to posts.<br>');
\define('_MD_NEWBB_CANNOT_REPLY', 'You <strong>cannot</strong> reply to posts.<br>');
\define('_MD_NEWBB_CAN_EDIT', 'You <strong>can</strong> edit your posts.<br>');
\define('_MD_NEWBB_CANNOT_EDIT', 'You <strong>cannot</strong> edit your posts.<br>');
\define('_MD_NEWBB_CAN_DELETE', 'You <strong>can</strong> delete your posts.<br>');
\define('_MD_NEWBB_CANNOT_DELETE', 'You <strong>cannot</strong> delete your posts.<br>');
\define('_MD_NEWBB_CAN_ADDPOLL', 'You <strong>can</strong> add new polls.<br>');
\define('_MD_NEWBB_CANNOT_ADDPOLL', 'You <strong>cannot</strong> add new polls.<br>');
\define('_MD_NEWBB_CAN_VOTE', 'You <strong>can</strong> vote in polls.<br>');
\define('_MD_NEWBB_CANNOT_VOTE', 'You <strong>cannot</strong> vote in polls.<br>');
\define('_MD_NEWBB_CAN_ATTACH', 'You <strong>can</strong> attach files to posts.<br>');
\define('_MD_NEWBB_CANNOT_ATTACH', 'You <strong>cannot</strong> attach files to posts.<br>');
\define('_MD_NEWBB_CAN_NOAPPROVE', 'You <strong>can</strong> post without approval.<br>');
\define('_MD_NEWBB_CANNOT_NOAPPROVE', 'You <strong>cannot</strong> post without approval.<br>');
\define('_MD_NEWBB_CAN_TYPE', 'You <strong>can</strong> use topic type.<br>');
\define('_MD_NEWBB_CANNOT_TYPE', 'You <strong>cannot</strong> use topic type.<br>');
\define('_MD_NEWBB_CAN_HTML', 'You <strong>can</strong> use HTML syntax.<br>');
\define('_MD_NEWBB_CANNOT_HTML', 'You <strong>cannot</strong> use HTML syntax.<br>');
\define('_MD_NEWBB_CAN_UPLOAD', 'You <strong>can</strong> upload.<br>');
\define('_MD_NEWBB_CANNOT_UPLOAD', 'You <strong>cannot</strong> upload.<br>');
\define('_MD_NEWBB_CAN_SIGNATURE', 'You <strong>can</strong> use signature.<br>');
\define('_MD_NEWBB_CANNOT_SIGNATURE', 'You <strong>cannot</strong> use signature.<br>');
\define('_MD_NEWBB_CAN_PDF', 'You <strong>can</strong> create PDF files.<br>');
\define('_MD_NEWBB_CANNOT_PDF', 'You <strong>cannot</strong> create PDF files.<br>');
\define('_MD_NEWBB_CAN_PRINT', 'You <strong>can</strong> get print page.<br>');
\define('_MD_NEWBB_CANNOT_PRINT', 'You <strong>cannot</strong> get print page.<br>');
*/
\define('_MD_NEWBB_IMTOPICS', 'Important Topics');
\define('_MD_NEWBB_NOTIMTOPICS', 'Forum Topics');
\define('_MD_NEWBB_FORUMOPTION', 'Forum options');
\define('_MD_NEWBB_VAUP', 'View all unreplied posts');
\define('_MD_NEWBB_VANP', 'View all new posts');
\define('_MD_NEWBB_UNREPLIED', 'unreplied topics');
\define('_MD_NEWBB_UNREAD', 'unread topics');
\define('_MD_NEWBB_ALL', 'all topics');
\define('_MD_NEWBB_ALLPOSTS', 'all posts');
\define('_MD_NEWBB_VIEW', 'View');
//viewtopic.php
\define('_MD_NEWBB_AUTHOR', 'Author');
\define('_MD_NEWBB_LOCKTOPIC', 'Lock this topic');
\define('_MD_NEWBB_UNLOCKTOPIC', 'Unlock this topic');
\define('_MD_NEWBB_UNSTICKYTOPIC', 'Make this topic UnSticky');
\define('_MD_NEWBB_STICKYTOPIC', 'Make this topic Sticky');
\define('_MD_NEWBB_DIGESTTOPIC', 'Make this topic as Digest');
\define('_MD_NEWBB_UNDIGESTTOPIC', 'Make this topic as UnDigest');
\define('_MD_NEWBB_MERGETOPIC', 'Merge this topic');
\define('_MD_NEWBB_MOVETOPIC', 'Move this topic');
\define('_MD_NEWBB_DELETETOPIC', 'Delete this topic');
// irmtfan add restore to viewtopic
\define('_MD_NEWBB_RESTORETOPIC', 'Restore this topic');
\define('_MD_NEWBB_TOP', 'Top');
\define('_MD_NEWBB_BOTTOM', 'Bottom');
\define('_MD_NEWBB_PREVTOPIC', 'Previous Topic');
\define('_MD_NEWBB_NEXTTOPIC', 'Next Topic');
\define('_MD_NEWBB_GROUP', 'Group:');
\define('_MD_NEWBB_QUICKREPLY', 'Quick Reply');
\define('_MD_NEWBB_POSTREPLY', 'Post Reply');
\define('_MD_NEWBB_PRINTTOPICS', 'Print Topic');
\define('_MD_NEWBB_PRINT', 'Print');
\define('_MD_NEWBB_REPORT', 'Report');
\define('_MD_NEWBB_PM', 'PM');
\define('_MD_NEWBB_EMAIL', 'Email');
\define('_MD_NEWBB_WWW', 'WWW');
\define('_MD_NEWBB_AIM', 'AIM');
\define('_MD_NEWBB_YIM', 'YIM');
\define('_MD_NEWBB_MSNM', 'MSNM');
\define('_MD_NEWBB_ICQ', 'ICQ');
\define('_MD_NEWBB_PRINT_TOPIC_LINK', 'URL for this discussion');
\define('_MD_NEWBB_ADDTOLIST', 'Add to your Contact List');
\define('_MD_NEWBB_TOPICOPT', 'Topic options');
\define('_MD_NEWBB_VIEWMODE', 'View mode');
\define('_MD_NEWBB_NEWEST', 'Newest First');
\define('_MD_NEWBB_OLDEST', 'Oldest First');
\define('_MD_NEWBB_FORUMSEARCH', 'Search Forum');
\define('_MD_NEWBB_RATED', 'Rated:');
\define('_MD_NEWBB_RATE', 'Rate Thread');
\define('_MD_NEWBB_RATEDESC', 'Rate this Thread');
\define('_MD_NEWBB_RATING', 'Vote now');
\define('_MD_NEWBB_RATE1', 'Terrible');
\define('_MD_NEWBB_RATE2', 'Bad');
\define('_MD_NEWBB_RATE3', 'Average');
\define('_MD_NEWBB_RATE4', 'Good');
\define('_MD_NEWBB_RATE5', 'Excellent');
\define('_MD_NEWBB_TOPICOPTION', 'Topic options');
\define('_MD_NEWBB_KARMA_REQUIREMENT', 'Your personal karma %s does not reach the required karma %s. <br> Please try later.');
\define('_MD_NEWBB_REPLY_REQUIREMENT', 'To view this post, you must login and reply first.');
\define('_MD_NEWBB_TOPICOPTIONADMIN', 'Topic Admin options');
\define('_MD_NEWBB_POLLOPTIONADMIN', 'Poll Admin options');
\define('_MD_NEWBB_EDITPOLL', 'Edit this Poll');
\define('_MD_NEWBB_DELETEPOLL', 'Delete this Poll');
\define('_MD_NEWBB_RESTARTPOLL', 'Restart this Poll');
\define('_MD_NEWBB_ADDPOLL', 'Add Poll');
\define('_MD_NEWBB_QUICKREPLY_EMPTY', 'Enter a quick reply here');
\define('_MD_NEWBB_LEVEL', 'Level :');
\define('_MD_NEWBB_HP', 'HP :');
\define('_MD_NEWBB_HP_DESC', 'HP - is determined by your average posts per day.');
\define('_MD_NEWBB_MP', 'MP :');
\define('_MD_NEWBB_MP_DESC', 'MP - is determined by your join date related to your post count.');
\define('_MD_NEWBB_EXP', 'EXP :');
\define('_MD_NEWBB_EXP_DESC', 'EXP - goes up each time you post, and when you get to 100%, you gain a level and the EXP drops to 0 again.');
\define('_MD_NEWBB_BROWSING', 'Browsing this Thread:');
\define('_MD_NEWBB_POSTTONEWS', 'Send this post to a news Story');
\define('_MD_NEWBB_EXCEEDTHREADVIEW', 'Post count exceeds the threshold for thread mode<br>Changing to flat mode');
//forumform.inc
\define('_MD_NEWBB_QUOTE', 'Quote');
\define('_MD_NEWBB_VIEW_REQUIRE', 'View requirements');
\define('_MD_NEWBB_REQUIRE_KARMA', 'Karma');
\define('_MD_NEWBB_REQUIRE_REPLY', 'Reply');
\define('_MD_NEWBB_REQUIRE_NULL', 'No requirement');
\define('_MD_NEWBB_SELECT_FORMTYPE', 'Select your desired form type');
\define('_MD_NEWBB_FORM_COMPACT', 'Compact');
\define('_MD_NEWBB_FORM_DHTML', 'DHTML');
// ERROR messages
\define('_MD_NEWBB_ERRORFORUM', 'ERROR: Forum not selected!');
\define('_MD_NEWBB_ERRORPOST', 'ERROR: Post not selected!');
\define('_MD_NEWBB_NORIGHTTOVIEW', 'You don\'t have the right to view this topic.');
\define('_MD_NEWBB_NORIGHTTOPOST', 'You don\'t have the right to post in this forum.');
\define('_MD_NEWBB_NORIGHTTOEDIT', 'You don\'t have the right to edit in this forum.');
\define('_MD_NEWBB_NORIGHTTOREPLY', 'You don\'t have the right to reply in this forum.');
\define('_MD_NEWBB_NORIGHTTOACCESS', 'You don\'t have the right to access this forum.');
\define('_MD_NEWBB_ERRORTOPIC', 'ERROR: Topic not selected!');
\define('_MD_NEWBB_ERRORCONNECT', 'ERROR: Could not connect to the forums database.');
\define('_MD_NEWBB_ERROREXIST', 'ERROR: The forum you selected does not exist. Please go back and try again.');
\define('_MD_NEWBB_ERROROCCURED', 'An Error Occured');
\define('_MD_NEWBB_COULDNOTQUERY', 'Could not query the forums database.');
\define('_MD_NEWBB_FORUMNOEXIST', 'Error - The forum/topic you selected does not exist. Please go back and try again.');
\define('_MD_NEWBB_USERNOEXIST', 'That user does not exist.  Please go back and search again.');
\define('_MD_NEWBB_COULDNOTREMOVE', 'Error - Could not remove posts from the database!');
\define('_MD_NEWBB_COULDNOTREMOVETXT', 'Error - Could not remove post texts!');
\define('_MD_NEWBB_TIMEISUP', 'You\'ve reached the time limit for editing your post.');
\define('_MD_NEWBB_TIMEISUPDEL', 'You\'ve reached the time limit for deleting your post.');
//reply.php
\define('_MD_NEWBB_ON', 'on'); //Posted on
\define('_MD_NEWBB_USERWROTE', '%s wrote:'); // %s is username
\define('_MD_NEWBB_RE', 'Re');
//post.php
\define('_MD_NEWBB_EDITNOTALLOWED', 'You\'re not allowed to edit this post!');
\define('_MD_NEWBB_EDITEDBY', 'Edited by');
\define('_MD_NEWBB_ANONNOTALLOWED', 'Anonymous users are not allowed to post.<br>Please register.');
\define('_MD_NEWBB_THANKSSUBMIT', 'Thanks for your submission!');
\define('_MD_NEWBB_REPLYPOSTED', 'A reply to your topic has been posted.');
\define('_MD_NEWBB_HELLO', 'Hello %s,');
\define('_MD_NEWBB_URRECEIVING', 'You are receiving this email because a message you posted on %s forums has been replied to.'); // %s is your site name
\define('_MD_NEWBB_CLICKBELOW', 'Click on the link below to view the thread:');
\define('_MD_NEWBB_WAITFORAPPROVAL', 'Thank you. Your post will be approved before publication.');
\define('_MD_NEWBB_POSTING_LIMITED', 'Why not take a break and come back in %d sec');
//forumform.inc
\define('_MD_NEWBB_NAMEMAIL', 'Name/Email:');
\define('_MD_NEWBB_LOGOUT', 'Logout');
\define('_MD_NEWBB_REGISTER', 'Register');
\define('_MD_NEWBB_SUBJECTC', 'Subject:');
\define('_MD_NEWBB_MESSAGEICON', 'Message Icon:');
\define('_MD_NEWBB_MESSAGEC', 'Message:');
\define('_MD_NEWBB_ALLOWEDHTML', 'Allowed HTML:');
\define('_MD_NEWBB_OPTIONS', 'Options:');
\define('_MD_NEWBB_POSTANONLY', 'Post Anonymously');
\define('_MD_NEWBB_DOSMILEY', 'Enable Smiley');
\define('_MD_NEWBB_DOXCODE', 'Enable Xoops Code');
\define('_MD_NEWBB_DOBR', 'Enable line break (Suggest to turn off if HTML enabled)');
\define('_MD_NEWBB_DOHTML', 'Enable html tags');
\define('_MD_NEWBB_NEWPOSTNOTIFY', 'Notify me of new posts in this thread');
\define('_MD_NEWBB_ATTACHSIG', 'Attach Signature');
\define('_MD_NEWBB_POST', 'Post');
\define('_MD_NEWBB_SUBMIT', 'Submit');
\define('_MD_NEWBB_CANCELPOST', 'Cancel Post');
\define('_MD_NEWBB_REMOVE', 'Remove');
\define('_MD_NEWBB_UPLOAD', 'Upload');
// forumuserpost.php
\define('_MD_NEWBB_ADD', 'Add');
\define('_MD_NEWBB_REPLY', 'Reply');
// topicmanager.php
\define('_MD_NEWBB_VIEWTHETOPIC', 'View the topic');
\define('_MD_NEWBB_RETURNTOTHEFORUM', 'Return to the forum');
\define('_MD_NEWBB_RETURNFORUMINDEX', 'Return to the forum index');
\define('_MD_NEWBB_ERROR_BACK', 'Error - Please go back and try again.');
\define('_MD_NEWBB_GOTONEWFORUM', 'View the updated topic');
\define('_MD_NEWBB_TOPICDELETE', 'The topic has been deleted.');
// irmtfan add restore to viewtopic
\define('_MD_NEWBB_TOPICRESTORE', 'The topic has been restored.');
\define('_MD_NEWBB_TOPICMERGE', 'The topic has been merged.');
\define('_MD_NEWBB_TOPICMOVE', 'The topic has been moved.');
\define('_MD_NEWBB_TOPICLOCK', 'The topic has been locked.');
\define('_MD_NEWBB_TOPICUNLOCK', 'The topic has been unlocked.');
\define('_MD_NEWBB_TOPICSTICKY', 'The topic has been Stickyed.');
\define('_MD_NEWBB_TOPICUNSTICKY', 'The topic has been unStickyed.');
\define('_MD_NEWBB_TOPICDIGEST', 'The topic has been Digested.');
\define('_MD_NEWBB_TOPICUNDIGEST', 'The topic has been unDigested.');
\define('_MD_NEWBB_DELETE', 'Delete');
\define('_MD_NEWBB_MOVE', 'Move');
\define('_MD_NEWBB_MERGE', 'Merge');
\define('_MD_NEWBB_LOCK', 'Lock');
\define('_MD_NEWBB_UNLOCK', 'unLock');
\define('_MD_NEWBB_STICKY', 'Sticky');
\define('_MD_NEWBB_UNSTICKY', 'unSticky');
\define('_MD_NEWBB_DIGEST', 'Digest');
\define('_MD_NEWBB_UNDIGEST', 'unDigest');
\define('_MD_NEWBB_DESC_DELETE', 'Once you press the delete button at the bottom of this form the topic you have selected, and all its related posts, will be <strong>permanently</strong> removed.');
// irmtfan add restore to viewtopic
\define('_MD_NEWBB_DESC_RESTORE', 'Once you press the restore button at the bottom of this form the topic you have selected, and all its related posts, will be restored.');
\define('_MD_NEWBB_DESC_MOVE', 'Once you press the move button at the bottom of this form the topic you have selected, and its related posts, will be moved to the forum you have selected.');
\define('_MD_NEWBB_DESC_MERGE', 'Once you press the merge button at the bottom of this form the topic you have selected, and its related posts, will be merged to the topic you have selected.<br><strong>The destination topic ID must be smaller than current one</strong>.');
\define('_MD_NEWBB_DESC_LOCK', 'Once you press the lock button at the bottom of this form the topic you have selected will be locked. You may unlock it at a later time if you like.');
\define('_MD_NEWBB_DESC_UNLOCK', 'Once you press the unlock button at the bottom of this form the topic you have selected will be unlocked. You may lock it again at a later time if you like.');
\define('_MD_NEWBB_DESC_STICKY', 'Once you press the Sticky button at the bottom of this form the topic you have selected will be Stickyed. You may unSticky it again at a later time if you like.');
\define('_MD_NEWBB_DESC_UNSTICKY', 'Once you press the unSticky button at the bottom of this form the topic you have selected will be unStickyed. You may Sticky it again at a later time if you like.');
\define('_MD_NEWBB_DESC_DIGEST', 'Once you press the Digest button at the bottom of this form the topic you have selected will be Digested. You may unDigest it again at a later time if you like.');
\define('_MD_NEWBB_DESC_UNDIGEST', 'Once you press the unDigest button at the bottom of this form the topic you have selected will be unDigested. You may Digest it again at a later time if you like.');
\define('_MD_NEWBB_MERGETOPICTO', 'Merge Topic To:');
\define('_MD_NEWBB_MOVETOPICTO', 'Move Topic To:');
\define('_MD_NEWBB_NOFORUMINDB', 'No Forums in DB');
// delete.php
\define('_MD_NEWBB_DELNOTALLOWED', 'Sorry, but you\'re not allowed to delete this post.');
\define('_MD_NEWBB_AREUSUREDEL', 'Are you sure you want to delete this post and all its child posts?');
\define('_MD_NEWBB_POSTSDELETED', 'Selected post and all its child posts deleted.');
\define('_MD_NEWBB_POSTDELETED', 'Selected post deleted.');
\define('_MD_NEWBB_POSTFIRSTWITHREPLYNODELETED', 'The start posting can not be deleted if there are already answers<br>do this, delete the whole topic.');
// definitions moved from global.
\define('_MD_NEWBB_THREAD', 'Thread');
\define('_MD_NEWBB_FROM', 'From');
\define('_MD_NEWBB_JOINED', 'Joined');
\define('_MD_NEWBB_ONLINE', 'Online');
\define('_MD_NEWBB_OFFLINE', 'Offline');
\define('_MD_NEWBB_FLAT', 'Flat');
// online.php
\define('_MD_NEWBB_USERS_ONLINE', 'Users Online:');
\define('_MD_NEWBB_ANONYMOUS_USERS', 'Anonymous Users');
\define('_MD_NEWBB_REGISTERED_USERS', 'Registered Users: ');
\define('_MD_NEWBB_BROWSING_FORUM', 'Users browsing forum');
\define('_MD_NEWBB_TOTAL_ONLINE', 'Total %d Users Online.');
\define('_MD_NEWBB_ADMINISTRATOR', 'Administrator');
\define('_MD_NEWBB_NO_SUCH_FILE', 'File does not exist!');
//\define('_MD_NEWBB_ERROR_UPATEATTACHMENT', 'Error occur when updating attachment');
// ratethread.php
\define('_MD_NEWBB_CANTVOTEOWN', 'You cannot vote on the topic you submitted.<br>All votes are logged and reviewed.');
\define('_MD_NEWBB_VOTEONCE', 'Please do not vote for the same topic more than once.');
\define('_MD_NEWBB_VOTEAPPRE', 'Your vote is appreciated.');
\define('_MD_NEWBB_THANKYOU', 'Thank you for taking the time to vote here at %s'); // %s is your site name
\define('_MD_NEWBB_VOTES', 'Votes');
\define('_MD_NEWBB_NOVOTERATE', 'You did not rate this Topic');
// polls.php
\define('_MD_NEWBB_POLL_DBUPDATED', 'Database Updated Successfully!');
\define('_MD_NEWBB_POLL_POLLCONF', 'Polls Configuration');
\define('_MD_NEWBB_POLL_POLLSLIST', 'Polls List');
\define('_MD_NEWBB_POLL_AUTHOR', 'Author of this poll');
\define('_MD_NEWBB_POLL_DISPLAYBLOCK', 'Display in block?');
\define('_MD_NEWBB_POLL_POLLQUESTION', 'Poll Question');
\define('_MD_NEWBB_POLL_VOTERS', 'Total voters');
\define('_MD_NEWBB_POLL_VOTES', 'Total votes');
\define('_MD_NEWBB_POLL_EXPIRATION', 'Expiration');
\define('_MD_NEWBB_POLL_EXPIRED', 'Expired');
\define('_MD_NEWBB_POLL_VIEWLOG', 'View log');
\define('_MD_NEWBB_POLL_CREATNEWPOLL', 'Create new poll');
\define('_MD_NEWBB_POLL_POLLDESC', 'Poll description');
\define('_MD_NEWBB_POLL_DISPLAYORDER', 'Display order');
\define('_MD_NEWBB_POLL_ALLOWMULTI', 'Allow multiple selections?');
\define('_MD_NEWBB_POLL_NOTIFY', 'Notify the poll author when expired?');
\define('_MD_NEWBB_POLL_POLLOPTIONS', 'Options');
\define('_MD_NEWBB_POLL_EDITPOLL', 'Edit poll');
\define('_MD_NEWBB_POLL_FORMAT', 'Format: yyyy-mm-dd hh:mm:ss');
\define('_MD_NEWBB_POLL_CURRENTTIME', 'Current time is %s');
\define('_MD_NEWBB_POLL_EXPIREDAT', 'Expired at %s');
\define('_MD_NEWBB_POLL_RESTART', 'Restart this poll');
\define('_MD_NEWBB_POLL_ADDMORE', 'Add more options');
\define('_MD_NEWBB_POLL_RUSUREDEL', 'Are you sure you want to delete this poll and all its comments?');
\define('_MD_NEWBB_POLL_RESTARTPOLL', 'Restart poll');
\define('_MD_NEWBB_POLL_RESET', 'Reset all logs for this poll?');
\define('_MD_NEWBB_POLL_ADDPOLL', 'Add Poll');
\define('_MD_NEWBB_POLLMODULE_ERROR', 'xoopspoll module not available for use');
//report.php
\define('_MD_NEWBB_REPORTED', 'Thank you for reporting this post/thread! A moderator will look into your report shortly.');
\define('_MD_NEWBB_REPORT_ERROR', 'Error occurred while sending the report.');
\define('_MD_NEWBB_REPORT_TEXT', 'Report message:');
\define('_MD_NEWBB_PDF', 'Create PDF from Post');
\define('_MD_NEWBB_PDF_PAGE', 'Page %s');
//print.php
\define('_MD_NEWBB_COMEFROM', 'This Post was from:');
//viewpost.php
\define('_MD_NEWBB_VIEWALLPOSTS', 'All Posts');
\define('_MD_NEWBB_VIEWTOPIC', 'Topic');
\define('_MD_NEWBB_VIEWFORUM', 'Forum');
\define('_MD_NEWBB_COMPACT', 'Compact');
\define('_MD_NEWBB_MENU_SELECT', 'Selection');
\define('_MD_NEWBB_MENU_HOVER', 'Hover');
\define('_MD_NEWBB_MENU_CLICK', 'Click');
\define('_MD_NEWBB_WELCOME_SUBJECT', '%s has joined the forum');
\define('_MD_NEWBB_WELCOME_MESSAGE', 'Hi, %s has joined you. Let\'s start ...');
\define('_MD_NEWBB_VIEWNEWPOSTS', 'View new posts');
\define('_MD_NEWBB_INVALID_SUBMIT', 'Invalid submission. You could have exceeded session time. Please re-submit or make a backup of your post and login to resubmit if necessary.');
\define('_MD_NEWBB_ACCOUNT', 'Account');
\define('_MD_NEWBB_NAME', 'Name');
\define('_MD_NEWBB_PASSWORD', 'Password');
\define('_MD_NEWBB_LOGIN', 'Login');
\define('_MD_NEWBB_APPROVE', 'Approve');
\define('_MD_NEWBB_RESTORE', 'Restore');
\define('_MD_NEWBB_SPLIT_ONE', 'Split');
\define('_MD_NEWBB_SPLIT_TREE', 'Split all children');
\define('_MD_NEWBB_SPLIT_ALL', 'Split all');
\define('_MD_NEWBB_TYPE_ADMIN', 'Admin mode');
\define('_MD_NEWBB_TYPE_VIEW', 'View mode');
\define('_MD_NEWBB_TYPE_PENDING', 'Pending');
\define('_MD_NEWBB_TYPE_DELETED', 'Deleted');
\define('_MD_NEWBB_TYPE_SUSPEND', 'Suspension');
\define('_MD_NEWBB_DBUPDATED', 'Database Updated Successfully!');
\define('_MD_NEWBB_SUSPEND_SUBJECT', 'User %s is suspended for %d days');
\define('_MD_NEWBB_SUSPEND_TEXT', 'User %s is suspended for %d days due to:<br>[quote]%s[/quote]<br><br>The suspension is valid till %s');
\define('_MD_NEWBB_SUSPEND_UID', 'User ID');
\define('_MD_NEWBB_SUSPEND_IP', 'IP suspended (full address/net mask)');
\define('_MD_NEWBB_SUSPEND_DURATION', 'Suspension duration (Days)');
\define('_MD_NEWBB_SUSPEND_DESC', 'Suspension reason');
\define('_MD_NEWBB_SUSPEND_LIST', 'Suspension list');
\define('_MD_NEWBB_SUSPEND_START', 'Start');
\define('_MD_NEWBB_SUSPEND_EXPIRE', 'End');
\define('_MD_NEWBB_SUSPEND_SCOPE', 'Scope');
\define('_MD_NEWBB_SUSPEND_MANAGEMENT', 'Suspension management');
\define('_MD_NEWBB_SUSPEND_NOACCESS', 'Your ID or IP has been suspended');
\define('_MD_NEWBB_TYPE', 'Topic type');
\define('_MD_NEWBB_SEENOTGUEST', "<span style='color:#ff0000;'><strong>Link only for registered users</strong></span>");
\define('_MD_NEWBB_REPORTSUBJECT', 'A contribution has been reported');
\define('_MD_NEWBB_GOTOLASTPOST', 'Go to last post');
\define('_MD_NEWBB_EDITEDMSG', 'Reason:');
\define('_MD_NEWBB_DELEDEDMSG', 'Reason for deleting<br><small>(If a reason is provided, the user will receive a message)</small>:');
\define('_MD_NEWBB_DELEDEDMSG_SUBJECT', 'Deletion of your article');
\define('_MD_NEWBB_DELEDEDMSG_BODY', 'Hello %s,
your post in the forum

%s
was deleted by me
As justification, I am taking the following information on:

%s

With best greetings
%s
-------------------------
Please do not reply to this message!
%s
%s');
\define('_MD_NEWBB_FORUMHOME', 'Board index');
\define('_MD_NEWBB_SEEWAITREPORT', "There were <span style='color:#ff0000;'> <strong>%s</strong> Contributions reported </span>");
\define('_MD_NEWBB_PDF_SUBJECT', 'Title: ');
\define('_MD_NEWBB_PDF_TOPIC', 'Post: ');
\define('_MD_NEWBB_PDF_AUTHOR', 'Author: ');
\define('_MD_NEWBB_PDF_DATE', 'Date: ');
\define('_MD_NEWBB_PDF_URL', 'Link to Post: ');
\define('_MD_NEWBB_PAGE', 'Site: ');
\define('_MD_NEWBB_NOTOPIC', 'No Posts');
\define('_MD_NEWBB_NORSS_DATA', 'No data to display');
\define('_MD_NEWBB_STATS', 'Statistics');
\define('_MD_NEWBB_POSTTIME', 'posted on');
// 4.2
\define('_MD_NEWBB_ADVERTISING_BLOCK', '<br>Here you could place your Ad!<br>Please contact us to learn more about it.');
\define('_MD_NEWBB_ADVERTISING_USER', 'Advertisement');
\define('_MD_NEWBB_SHARE_FACEBOOK', 'Facebook');
\define('_MD_NEWBB_SHARE_TWITTER', 'Twitter');
\define('_MD_NEWBB_SHARE_GOOGLEPLUS', 'Google Plus');
\define('_MD_NEWBB_SHARE_LINKEDIN', 'Linkedin');
\define('_MD_NEWBB_SHARE_STUMBLEUPON', 'Stumbleupon');
\define('_MD_NEWBB_SHARE_FRIENDFEED', 'FriendFeed');
\define('_MD_NEWBB_SHARE_REDDIT', 'Reddit');
\define('_MD_NEWBB_SHARE_DELICIOUS', 'Del.icio.us');
\define('_MD_NEWBB_SHARE_DIGG', 'Digg');
\define('_MD_NEWBB_SHARE_TECHNORATI', 'Technorati');
\define('_MD_NEWBB_SHARE_MRWONG', 'Mr. Wong');
//4.3
\define('_MD_NEWBB_GO', 'Go');
\define('_MD_NEWBB_SEEUSERDATA', 'See User information');
\define('_MD_NEWBB_MAXKB', 'File is too big (max %s Kb possible).');
\define('_MD_NEWBB_UPLOAD_ERRNODEF', 'undefined Error');
\define('_MD_NEWBB_MAXUPLOADFILEINI', 'The uploaded file exceeds the upload_max_filesize directive in php.ini.');
\define('_MD_NEWBB_MAXPIC', 'Images at the max. Size %s X %s pixels.');
\define('_MD_NEWBB_SEARCHDISABLED', 'The search is disabled and can not be used.');
// irmtfan added messages
\define('_MD_NEWBB_HIDEUSERDATA', 'Hide User information');
\define('_MD_NEWBB_HIDE', 'Hide');
\define('_MD_NEWBB_SEE', 'See');
// votepolls.php - irmtfan
\define('_MD_NEWBB_POLL_NOOPTION', 'You must choose an option !!');
\define('_MD_NEWBB_SEARCHTOPIC', 'Search Topic');
\define('_MD_NEWBB_SHOWSEARCH', 'Show results:');
\define('_MD_NEWBB_SEARCHPOSTTEXT', 'Posts text');
\define('_MD_NEWBB_SELECT_STARTLAG', 'Start lag of selected text');
\define('_MD_NEWBB_SELECT_STARTLAG_DESC', 'Select text from X characters before the first keyword');
\define('_MD_NEWBB_SELECT_LENGTH', 'Length of selected text');
\define('_MD_NEWBB_SELECT_HTML', 'Strip all html from result?');
\define('_MD_NEWBB_SELECT_EXCLUDE', 'Exclude these tags:');
\define('_MD_NEWBB_SELECT_TAG', 'Tag');
\define('_MD_NEWBB_NORIGHTTOPDF', 'You don\'t have the right to create PDF in this forum.');
\define('_MD_NEWBB_NORIGHTTOPRINT', 'You don\'t have the right to get print in this forum.');
// irmtfan for new block system
\define('_MD_NEWBB_TOPICHASNOTPOLL', 'Topic hasnot poll');
\define('_MD_NEWBB_VOTED', 'Voted topics');
\define('_MD_NEWBB_UNVOTED', 'Unvoted topics');
\define('_MD_NEWBB_VIEWED', 'Viewed topics');
\define('_MD_NEWBB_UNVIEWED', 'Unviewed topics');
\define('_MD_NEWBB_REPLIED', 'Replied topics');
\define('_MD_NEWBB_READ', 'Read topics');
\define('_MD_NEWBB_POLL_POLL', 'Poll');
\define('_MD_NEWBB_PAGENAV_DISPLAY', 'Display of navigation');
// Automatic forum creation during registration
\define('_MD_NEWBB_AUTO_CREATE_EMAIL', 'Email');
\define('_MD_NEWBB_AUTO_CREATE_AVATARS', 'Avatar');
\define('_MD_NEWBB_AUTO_CREATE_ABOUT', '');
\define('_MD_NEWBB_NO_SELECTION', 'Selection required');

\define('_MD_NEWBB_FORUMDESCRIPTION', 'Forum Description:');

\define('_MD_NEWBB_PDF_PAGE2', 'page');
\define('_MD_NEWBB_PDF_META_DIR', 'ltr');
