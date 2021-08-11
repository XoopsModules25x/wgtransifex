<?php

declare(strict_types=1);

/**
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @since           2.5.9
 * @author          Michael Beck (aka Mamba)
 */

use Xmf\Database\TableLoad;
use Xmf\Request;
use Xmf\Yaml;
use XoopsModules\Wgtransifex\{
    Common,
    Helper,
    Utility
};

require \dirname(__DIR__, 3) . '/include/cp_header.php';
require \dirname(__DIR__) . '/preloads/autoloader.php';
$op = Request::getCmd('op', '');
$moduleDirName = \basename(\dirname(__DIR__));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);
$helper = Helper::getInstance();
// Load language files
$helper->loadLanguage('common');
switch ($op) {
    case 'load':
        if (Request::hasVar('ok', 'REQUEST') && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('../admin/index.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            wgLoadSampleData();
        } else {
            xoops_cp_header();
            xoops_confirm(['ok' => 1, 'op' => 'load'], 'index.php', \sprintf(\constant('CO_' . $moduleDirNameUpper . '_' . 'ADD_SAMPLEDATA_OK')), \constant('CO_' . $moduleDirNameUpper . '_' . 'CONFIRM'), true);
            xoops_cp_footer();
        }
        break;
    case 'save':
        saveSampleData();
        break;
}
// XMF TableLoad for SAMPLE data
function loadSampleData()
{
    global $xoopsConfig;
    $moduleDirName = \basename(\dirname(__DIR__));
    $moduleDirNameUpper = \mb_strtoupper($moduleDirName);
    $utility = new Utility();
    $configurator = new Common\Configurator();
    $tables = Helper::getHelper($moduleDirName)->getModule()->getInfo('tables');
    $language = 'english/';
    if (\is_dir(__DIR__ . '/' . $xoopsConfig['language'])) {
        $language = $xoopsConfig['language'] . '/';
    }
    // load module tables
    foreach ($tables as $table) {
        echo "<br>".$table;
        $tabledata = Yaml::readWrapped($language . $table . '.yml');
        TableLoad::truncateTable($table);
        TableLoad::loadTableFromArray($table, $tabledata);
    }
    // load permissions
    $table = 'group_permission';
    $tabledata = Yaml::readWrapped($language . $table . '.yml');
    $mid = Helper::getHelper($moduleDirName)->getModule()->getVar('mid');
    loadTableFromArrayWithReplace($table, $tabledata, 'gperm_modid', $mid);
    //  ---  COPY test folder files ---------------
    if (\is_array($configurator->copyTestFolders) && \count($configurator->copyTestFolders) > 0) {
        //        $file =  \dirname(__DIR__) . '/testdata/images/';
        foreach (\array_keys($configurator->copyTestFolders) as $i) {
            $src = $configurator->copyTestFolders[$i][0];
            $dest = $configurator->copyTestFolders[$i][1];
            $utility::rcopy($src, $dest);
        }
    }
    \redirect_header('../admin/index.php', 1, \constant('CO_' . $moduleDirNameUpper . '_' . 'SAMPLEDATA_SUCCESS'));
}

function saveSampleData()
{
    global $xoopsConfig;
    $configurator = new Common\Configurator();
    $moduleDirName = \basename(\dirname(__DIR__));
    $moduleDirNameUpper = \mb_strtoupper($moduleDirName);
    $tables = Helper::getHelper($moduleDirName)->getModule()->getInfo('tables');
    $languageFolder = __DIR__ . '/' . $xoopsConfig['language'];
    if (!\file_exists($languageFolder . '/')) {
        Utility::createFolder($languageFolder . '/');
    }
    $exportFolder = $languageFolder . '/Exports-' . \date('Y-m-d-H-i-s') . '/';
    Utility::createFolder($exportFolder);
    // save module tables
    foreach ($tables as $table) {
        TableLoad::saveTableToYamlFile($table, $exportFolder . $table . '.yml');
    }
    // save permissions
    $criteria = new \CriteriaCompo();
    $criteria->add(new \Criteria('gperm_modid', Helper::getHelper($moduleDirName)->getModule()->getVar('mid')));
    $skipColumns[] = 'gperm_id';
    TableLoad::saveTableToYamlFile('group_permission', $exportFolder . 'group_permission.yml', $criteria, $skipColumns);
    unset($criteria);
    //  ---  COPY test folder files ---------------
    if (\is_array($configurator->copyTestFolders) && \count($configurator->copyTestFolders) > 0) {
        foreach (\array_keys($configurator->copyTestFolders) as $i) {
            $src = $configurator->copyTestFolders[$i][1];
            $dest = $configurator->copyTestFolders[$i][0];
            Utility::rcopy($src, $dest);
        }
    }
    \redirect_header('../admin/index.php', 1, \constant('CO_' . $moduleDirNameUpper . '_' . 'SAMPLEDATA_SUCCESS'));
}

function exportSchema()
{
    $moduleDirName = \basename(\dirname(__DIR__));
    $moduleDirNameUpper = \mb_strtoupper($moduleDirName);

    try {
        // TODO set exportSchema
        //        $migrate = new Wgtransifex\Migrate($moduleDirName);
        //        $migrate->saveCurrentSchema();
        //
        //        \redirect_header('../admin/index.php', 1, \constant('CO_' . $moduleDirNameUpper . '_' . 'EXPORT_SCHEMA_SUCCESS'));
    } catch (\Throwable $e) {
        exit(\constant('CO_' . $moduleDirNameUpper . '_' . 'EXPORT_SCHEMA_ERROR'));
    }
}

/**
 * loadTableFromArrayWithReplace
 *
 * @param string $table  value with should be used insead of original value of $search
 *
 * @param array  $data   array of rows to insert
 *                       Each element of the outer array represents a single table row.
 *                       Each row is an associative array in 'column' => 'value' format.
 * @param string $search name of column for which the value should be replaced
 * @param        $replace
 * @return int number of rows inserted
 */
function loadTableFromArrayWithReplace($table, $data, $search, $replace)
{
    /** @var \XoopsDatabase */
    $db = \XoopsDatabaseFactory::getDatabaseConnection();
    $prefixedTable = $db->prefix($table);
    $count = 0;
    $sql = 'DELETE FROM ' . $prefixedTable . ' WHERE `' . $search . '`=' . $db->quote($replace);
    $db->queryF($sql);
    foreach ($data as $row) {
        $insertInto = 'INSERT INTO ' . $prefixedTable . ' (';
        $valueClause = ' VALUES (';
        $first = true;
        foreach ($row as $column => $value) {
            if ($first) {
                $first = false;
            } else {
                $insertInto .= ', ';
                $valueClause .= ', ';
            }
            $insertInto .= $column;
            if ($search === $column) {
                $valueClause .= $db->quote($replace);
            } else {
                $valueClause .= $db->quote($value);
            }
        }
        $sql = $insertInto . ') ' . $valueClause . ')';
        $result = $db->queryF($sql);
        if (false !== $result) {
            ++$count;
        }
    }

    return $count;
}


/**
 * wgLoadSampleData
 * load data from yaml file without using xmf/yaml
 *
 * @return void
 */
function wgLoadSampleData()
{
    global $xoopsConfig;
    $moduleDirName = \basename(\dirname(__DIR__));
    $moduleDirNameUpper = \mb_strtoupper($moduleDirName);
    $utility = new Utility();
    $configurator = new Common\Configurator();
    $tables = Helper::getHelper($moduleDirName)->getModule()->getInfo('tables');
    $language = 'english/';
    if (\is_dir(__DIR__ . '/' . $xoopsConfig['language'])) {
        $language = $xoopsConfig['language'] . '/';
    }
    // load module tables
    foreach ($tables as $table) {
        //echo "<br>".$table;
        $handle = fopen($language . $table . '.yml', "r");
        if ($handle) {
            $columns = [];
            $values = [];
            $fields = 0;
            $lines = 0;
            //delete all data
            $sql = 'DELETE FROM `' . $GLOBALS['xoopsDB']->prefix($table) . '`;';
            $result = $GLOBALS['xoopsDB']->queryF($sql);
            while (($line = fgets($handle)) !== false) {
                // process the line read.
                $lines++;
                if ("-\n" == $line) {
                    if (\count($values) > 0) {
                        //store previous values
                        $sql = 'INSERT INTO `' . $GLOBALS['xoopsDB']->prefix($table) . '` (';
                        $sql .= \implode(', ', $columns);
                        $sql .= ') VALUE ';
                        $sql .= '( ' . \implode(', ', $values) . '),';
                        $sql = \substr($sql, 0, - 1) . ';';
                        $result = $GLOBALS['xoopsDB']->queryF($sql);
                        $fields = 1;
                    }
                    //reset for next
                    $values = [];
                } else {
                    $posDelimiter = \strpos($line, ':');
                    if (0 == $fields) {
                        $columns[] = \trim(\substr($line, 1, $posDelimiter - 1));
                    }
                    $value = \trim(\substr($line, $posDelimiter + 2), "\t\n");
                    //remove existing quotes
                    if ("'" == \substr($value, 0, 1) || '"' == \substr($value, 0, 1)) {
                        $value = \substr($value, 1, - 1);
                    }

                    $value = \str_replace("''", "'", $value);
                    if (0 == \strpos($value, "'")) {
                        $value = "'" . $value . "'";
                    } elseif (0 == \strpos($value, '"')) {
                        $value = '"' . $value . '"';
                    } elseif (\strpos($value, '\"') > 0) {
                        $value = '"' . $value . '"';
                    } elseif (\strpos($value, '"') > 0) {
                        $value = \str_replace('"', '\"', $value);
                        if (\strpos($value, "\'") > 0) {
                            $value = \str_replace("'", "\'", $value);
                        }
                        $value = '"' . $value . '"';
                    } elseif (\strpos($value, "\'") > 0) {
                        $value = \str_replace("'", "\'", $value);
                        $value = "'" . $value . "'";
                    } elseif (\strpos($value, '"') > 0) {
                        if (0 == \strpos($value, "\'")) {
                            $value = \str_replace("'", "\'", $value);
                        }
                        $value = "'" . $value . "'";
                    } elseif (\strpos($value, "'") > 0) {
                        $value = '"' . $value . '"';
                    } else {
                        $value = "'" . $value . "'";
                    }
                    $values[] = $value;
                }
            }
            fclose($handle);
        } else {
            echo 'error opening the file';
        }
        //add last item
        if ($lines > 1 && \count($values) > 0) {
            //store previous values
            $sql = 'INSERT INTO `' . $GLOBALS['xoopsDB']->prefix($table) . '` (';
            $sql .= \implode(', ', $columns);
            $sql .= ') VALUE ';
            $sql .= '( ' . \implode(', ', $values) . '),';
            $sql = \substr($sql, 0, - 1) . ';';
            $result = $GLOBALS['xoopsDB']->queryF($sql);
        }
    }
    // load permissions
    $table = 'group_permission';
    $tabledata = Yaml::readWrapped($language . $table . '.yml');
    $mid = Helper::getHelper($moduleDirName)->getModule()->getVar('mid');
    loadTableFromArrayWithReplace($table, $tabledata, 'gperm_modid', $mid);
    //  ---  COPY test folder files ---------------
    if (\is_array($configurator->copyTestFolders) && \count($configurator->copyTestFolders) > 0) {
        //        $file =  \dirname(__DIR__) . '/testdata/images/';
        foreach (\array_keys($configurator->copyTestFolders) as $i) {
            $src = $configurator->copyTestFolders[$i][0];
            $dest = $configurator->copyTestFolders[$i][1];
            $utility::rcopy($src, $dest);
        }
    }
    \redirect_header('../admin/index.php', 1, \constant('CO_' . $moduleDirNameUpper . '_' . 'SAMPLEDATA_SUCCESS'));
}
