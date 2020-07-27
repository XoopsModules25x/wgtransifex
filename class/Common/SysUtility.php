<?php

namespace XoopsModules\Wgtransifex\Common;

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
 *
 * @category        Module
 * @author          XOOPS Development Team <https://xoops.org>
 * @copyright       {@link https://xoops.org/ XOOPS Project}
 * @license       GNU GPL2orlater(https://www.gnu.org/licenses/gpl-2.0.html)
 */

use XoopsModules\Wgtransifex;
use XoopsModules\Wgtransifex\Helper;

/**
 * Class SysUtility
 */
class SysUtility
{
    use VersionChecks; //checkVerXoops, checkVerPhp Traits
    use ServerStats; // getServerStats Trait
    use FilesManagement; // Files Management Trait

    //--------------- Common module methods -----------------------------

    /**
     * Access the only instance of this class
     *
     * @return SysUtility
     *
     */
    public static function getInstance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * @param $text
     * @param $form_sort
     * @return string
     */
    public static function selectSorting($text, $form_sort)
    {
        global $start, $order, $file_cat, $sort, $xoopsModule;

        $select_view   = '';
        $moduleDirName = basename(dirname(__DIR__, 2));
        /** @var Helper $helper */
        $helper = Helper::getInstance();

        //$pathModIcon16 = XOOPS_URL . '/modules/' . $moduleDirName . '/' . $helper->getConfig('modicons16');
        $pathModIcon16 = $helper->url($helper->getModule()->getInfo('modicons16'));

        $select_view = '<form name="form_switch" id="form_switch" action="' . Request::getString('REQUEST_URI', '', 'SERVER') . '" method="post"><span style="font-weight: bold;">' . $text . '</span>';
        //$sorts =  $sort ==  'asc' ? 'desc' : 'asc';
        if ($form_sort == $sort) {
            $sel1 = 'asc' === $order ? 'selasc.png' : 'asc.png';
            $sel2 = 'desc' === $order ? 'seldesc.png' : 'desc.png';
        } else {
            $sel1 = 'asc.png';
            $sel2 = 'desc.png';
        }
        $select_view .= '  <a href="' . Request::getString('SCRIPT_NAME', '', 'SERVER') . '?start=' . $start . '&sort=' . $form_sort . '&order=asc"><img src="' . $pathModIcon16 . '/' . $sel1 . '" title="ASC" alt="ASC"></a>';
        $select_view .= '<a href="' . Request::getString('SCRIPT_NAME', '', 'SERVER') . '?start=' . $start . '&sort=' . $form_sort . '&order=desc"><img src="' . $pathModIcon16 . '/' . $sel2 . '" title="DESC" alt="DESC"></a>';
        $select_view .= '</form>';

        return $select_view;
    }

    /***************Blocks***************/
    /**
     * @param array $cats
     * @return string
     */
    public static function blockAddCatSelect($cats)
    {
        $cat_sql = '';
        if (is_array($cats) && !empty($cats)) {
            $cat_sql = '(' . current($cats);
            array_shift($cats);
            foreach ($cats as $cat) {
                $cat_sql .= ',' . $cat;
            }
            $cat_sql .= ')';
        }

        return $cat_sql;
    }

    /**
     * @param $content
     */
    public static function metaKeywords($content)
    {
        global $xoopsTpl, $xoTheme;
        $myts    = \MyTextSanitizer::getInstance();
        $content = $myts->undoHtmlSpecialChars($myts->displayTarea($content));
        if (null !== $xoTheme && is_object($xoTheme)) {
            $xoTheme->addMeta('meta', 'keywords', strip_tags($content));
        } else {    // Compatibility for old Xoops versions
            $xoopsTpl->assign('xoops_metaKeywords', strip_tags($content));
        }
    }

    /**
     * @param $content
     */
    public static function metaDescription($content)
    {
        global $xoopsTpl, $xoTheme;
        $myts    = \MyTextSanitizer::getInstance();
        $content = $myts->undoHtmlSpecialChars($myts->displayTarea($content));
        if (null !== $xoTheme && is_object($xoTheme)) {
            $xoTheme->addMeta('meta', 'description', strip_tags($content));
        } else {    // Compatibility for old Xoops versions
            $xoopsTpl->assign('xoops_metaDescription', strip_tags($content));
        }
    }

    /**
     * @param $tableName
     * @param $columnName
     *
     * @return array
     */
    public static function enumerate($tableName, $columnName)
    {
        $table = $GLOBALS['xoopsDB']->prefix($tableName);

        //    $result = $GLOBALS['xoopsDB']->query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
        //        WHERE TABLE_NAME = '" . $table . "' AND COLUMN_NAME = '" . $columnName . "'")
        //    || exit ($GLOBALS['xoopsDB']->error());

        $sql    = 'SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "' . $table . '" AND COLUMN_NAME = "' . $columnName . '"';
        $result = $GLOBALS['xoopsDB']->query($sql);
        if (!$result) {
            exit($GLOBALS['xoopsDB']->error());
        }

        $row      = $GLOBALS['xoopsDB']->fetchBoth($result);
        $enumList = explode(',', str_replace("'", '', substr($row['COLUMN_TYPE'], 5, - 6)));
        return $enumList;
    }


    /**
     * @param array|string $tableName
     * @param int          $id_field
     * @param int          $id
     *
     * @return mixed
     */
    public static function cloneRecord($tableName, $id_field, $id)
    {
        $new_id = false;
        $table  = $GLOBALS['xoopsDB']->prefix($tableName);
        // copy content of the record you wish to clone
        $sql = "SELECT * FROM $table WHERE $id_field='$id' ";
        $tempTable = $GLOBALS['xoopsDB']->fetchArray($GLOBALS['xoopsDB']->query($sql), MYSQLI_ASSOC);
        if (!$tempTable) {
            exit($GLOBALS['xoopsDB']->error());
        }
        // set the auto-incremented id's value to blank.
        unset($tempTable[$id_field]);
        // insert cloned copy of the original  record
        $sql    = "INSERT INTO $table (" . implode(', ', array_keys($tempTable)) . ") VALUES ('" . implode("', '", array_values($tempTable)) . "')";
        $result = $GLOBALS['xoopsDB']->queryF($sql);
        if (!$result) {
            exit($GLOBALS['xoopsDB']->error());
        }
        // Return the new id
        $new_id = $GLOBALS['xoopsDB']->getInsertId();

        return $new_id;
    }
    /**
     * truncateHtml can truncate a string up to a number of characters while preserving whole words and HTML tags
     * www.gsdesign.ro/blog/cut-html-string-without-breaking-the-tags
     * www.cakephp.org
     *
     * @param string $text         String to truncate.
     * @param int    $length       Length of returned string, including ellipsis.
     * @param string $ending       Ending to be appended to the trimmed string.
     * @param bool   $exact        If false, $text will not be cut mid-word
     * @param bool   $considerHtml If true, HTML tags would be handled correctly
     *
     * @return string Trimmed string.
     */
    public static function truncateHtml($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true)
    {
        if ($considerHtml) {
            // if the plain text is shorter than the maximum length, return the whole text
            if (mb_strlen(\preg_replace('/<.*?' . '>/', '', $text)) <= $length) {
                return $text;
            }
            // splits all html-tags to scanable lines
            \preg_match_all('/(<.+?' . '>)?([^<>]*)/s', $text, $lines, \PREG_SET_ORDER);
            $total_length = mb_strlen($ending);
            $open_tags = [];
            $truncate = '';
            foreach ($lines as $line_matchings) {
                // if there is any html-tag in this line, handle it and add it (uncounted) to the output
                if (!empty($line_matchings[1])) {
                    // if it's an "empty element" with or without xhtml-conform closing slash
                    if (\preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                        // do nothing
                        // if tag is a closing tag
                    } elseif (\preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                        // delete tag from $open_tags list
                        $pos = \array_search($tag_matchings[1], $open_tags, true);
                        if (false !== $pos) {
                            unset($open_tags[$pos]);
                        }
                        // if tag is an opening tag
                    } elseif (\preg_match('/^<\s*([^\s>!]+).*?' . '>$/s', $line_matchings[1], $tag_matchings)) {
                        // add tag to the beginning of $open_tags list
                        \array_unshift($open_tags, \mb_strtolower($tag_matchings[1]));
                    }
                    // add html-tag to $truncate'd text
                    $truncate .= $line_matchings[1];
                }
                // calculate the length of the plain text part of the line; handle entities as one character
                $content_length = mb_strlen(\preg_replace('/&[0-9a-z]{2,8};|&#\d{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
                if ($total_length + $content_length > $length) {
                    // the number of characters which are left
                    $left = $length - $total_length;
                    $entities_length = 0;
                    // search for html entities
                    if (\preg_match_all('/&[0-9a-z]{2,8};|&#\d{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, \PREG_OFFSET_CAPTURE)) {
                        // calculate the real length of all entities in the legal range
                        foreach ($entities[0] as $entity) {
                            if ($left >= $entity[1] + 1 - $entities_length) {
                                $left--;
                                $entities_length += mb_strlen($entity[0]);
                            } else {
                                // no more characters left
                                break;
                            }
                        }
                    }
                    $truncate .= mb_substr($line_matchings[2], 0, $left + $entities_length);
                    // maximum lenght is reached, so get off the loop
                    break;
                }
                $truncate .= $line_matchings[2];
                $total_length += $content_length;
                // if the maximum length is reached, get off the loop
                if ($total_length >= $length) {
                    break;
                }
            }
        } else {
            if (mb_strlen($text) <= $length) {
                return $text;
            }
            $truncate = mb_substr($text, 0, $length - mb_strlen($ending));
        }
        // if the words shouldn't be cut in the middle...
        if (!$exact) {
            // ...search the last occurance of a space...
            $spacepos = \mb_strrpos($truncate, ' ');
            if (isset($spacepos)) {
                // ...and cut the text in this position
                $truncate = mb_substr($truncate, 0, $spacepos);
            }
        }
        // add the defined ending to the text
        if ($truncate != '') {
            $truncate .= $ending;
        }
        if ($considerHtml) {
            // close all unclosed html-tags
            foreach ($open_tags as $tag) {
                $truncate .= '</' . $tag . '>';
            }
        }

        return $truncate;
    }

    /**
     * @param \Xmf\Module\Helper $helper
     * @param array|null         $options
     * @return \XoopsFormDhtmlTextArea|\XoopsFormEditor
     */
    public static function getEditor($helper = null, $options = null)
    {
        /** @var Wgtransifex\Helper $helper */
        if (null === $options) {
            $options = [];
            $options['name'] = 'Editor';
            $options['value'] = 'Editor';
            $options['rows'] = 10;
            $options['cols'] = '100%';
            $options['width'] = '100%';
            $options['height'] = '400px';
        }
        $isAdmin = $helper->isUserAdmin();
        if (\class_exists('XoopsFormEditor')) {
            if ($isAdmin) {
                $descEditor = new \XoopsFormEditor(\ucfirst($options['name']), $helper->getConfig('editorAdmin'), $options, $nohtml = false, $onfailure = 'textarea');
            } else {
                $descEditor = new \XoopsFormEditor(\ucfirst($options['name']), $helper->getConfig('editorUser'), $options, $nohtml = false, $onfailure = 'textarea');
            }
        } else {
            $descEditor = new \XoopsFormDhtmlTextArea(\ucfirst($options['name']), $options['name'], $options['value'], '100%', '100%');
        }
        //        $form->addElement($descEditor);
        return $descEditor;
    }

    /**
     * @param $fieldname
     * @param $table
     *
     * @return bool
     */
    public static function fieldExists($fieldname, $table)
    {
        global $xoopsDB;
        $result = $xoopsDB->queryF("SHOW COLUMNS FROM   $table LIKE '$fieldname'");

        return ($xoopsDB->getRowsNum($result) > 0);
    }

    /**
     * Function responsible for checking if a directory exists, we can also write in and create an index.html file
     *
     * @param string $folder The full path of the directory to check
     */
    public static function prepareFolder($folder)
    {
        try {
            if (!@mkdir($folder) && !is_dir($folder)) {
                throw new \RuntimeException(sprintf('Unable to create the %s directory', $folder));
            }
            file_put_contents($folder . '/index.html', '<script>history.go(-1);</script>');
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n", '<br>';
        }
    }

    /**
     * Rewrite all url
     *
     * @param string $module module name
     * @param array  $array  array
     * @param string $type   type
     * @return null|string    string replacement for any blank case
     */
    public static function rewriteUrl($module, $array, $type = 'content')
    {
        $comment = '';
        $helper = Helper::getInstance();
        $lenght_id = $helper->getConfig('lenght_id');
        $rewrite_url = $helper->getConfig('rewrite_url');
        if (0 != $lenght_id) {
            $id = $array['content_id'];
            while (mb_strlen($id) < $lenght_id) {
                $id = '0' . $id;
            }
        } else {
            $id = $array['content_id'];
        }
        if (isset($array['topic_alias']) && $array['topic_alias']) {
            $topic_name = $array['topic_alias'];
        } else {
            $topic_name = self::filter(xoops_getModuleOption('static_name', $module));
        }
        switch ($rewrite_url) {
            case 'none':
                if ($topic_name) {
                    $topic_name = 'topic=' . $topic_name . '&amp;';
                }
                $rewrite_base = '/modules/';
                $page = 'page=' . $array['content_alias'];

                return XOOPS_URL . $rewrite_base . $module . '/' . $type . '.php?' . $topic_name . 'id=' . $id . '&amp;' . $page . $comment;
                break;
            case 'rewrite':
                if ($topic_name) {
                    $topic_name .= '/';
                }
                $rewrite_base = xoops_getModuleOption('rewrite_mode', $module);
                $rewrite_ext = xoops_getModuleOption('rewrite_ext', $module);
                $module_name = '';
                if (xoops_getModuleOption('rewrite_name', $module)) {
                    $module_name = xoops_getModuleOption('rewrite_name', $module) . '/';
                }
                $page = $array['content_alias'];
                $type .= '/';
                $id .= '/';
                if ('content/' === $type) {
                    $type = '';
                }
                if ('comment-edit/' === $type || 'comment-reply/' === $type || 'comment-delete/' === $type) {
                    return XOOPS_URL . $rewrite_base . $module_name . $type . $id . '/';
                }

                return XOOPS_URL . $rewrite_base . $module_name . $type . $topic_name . $id . $page . $rewrite_ext;
                break;
            case 'short':
                if ($topic_name) {
                    $topic_name .= '/';
                }
                $rewrite_base = xoops_getModuleOption('rewrite_mode', $module);
                $rewrite_ext = xoops_getModuleOption('rewrite_ext', $module);
                $module_name = '';
                if (xoops_getModuleOption('rewrite_name', $module)) {
                    $module_name = xoops_getModuleOption('rewrite_name', $module) . '/';
                }
                $page = $array['content_alias'];
                $type .= '/';
                if ('content/' === $type) {
                    $type = '';
                }
                if ('comment-edit/' === $type || 'comment-reply/' === $type || 'comment-delete/' === $type) {
                    return XOOPS_URL . $rewrite_base . $module_name . $type . $id . '/';
                }

                return XOOPS_URL . $rewrite_base . $module_name . $type . $topic_name . $page . $rewrite_ext;
                break;
        }

        return null;
    }

    /**
     * Replace all escape, character, ... for display a correct url
     *
     * @param string $url  string to transform
     * @param string $type string replacement for any blank case
     * @return string
     */
    public static function filter($url, $type = '')
    {
        // Get regular expression from module setting. default setting is : `[^a-z0-9]`i
        $helper = Helper::getInstance();
        $regular_expression = $helper->getConfig('regular_expression');
        $url = \strip_tags($url);
        $url .= \preg_replace("`\[.*\]`U", '', $url);
        $url .= \preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $url);
        $url .= htmlentities($url, ENT_COMPAT, 'utf-8');
        $url .= \preg_replace('`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', "\1", $url);
        $url .= \preg_replace([$regular_expression, '`[-]+`'], '-', $url);

        return '' == $url ? $type : \mb_strtolower(\trim($url, '-'));
    }
}
