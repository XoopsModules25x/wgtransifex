<?php

namespace XoopsModules\Wgtransifex\Common;

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Class to compare current DB table structure with sql/mysql.sql
 *
 * @category  Migrate Helper
 * @author    Goffy <webmmaster@wedega.com>
 * @copyright 2021 XOOPS Project (https://xoops.org)
 * @license   GNU GPL 2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @link      https://xoops.org
 */

class MigrateHelper
{

    /**
     * @var string
     */
    private $fileYaml;

    /**
     * @var string
     */
    private $fileSql;


    /**
     * @param string $fileSql
     * @param string $fileYaml
     */
    public function __construct(string $fileSql, string $fileYaml)
    {
        $this->fileSql = $fileSql;
        $this->fileYaml = $fileYaml;
    }

    /**
     * Create a yaml file based on a sql file
     *
     * @param null
     * @return bool
     */
    public function createSchemaFromSqlfile(): bool
    {
        if (!\file_exists($this->fileSql)) {
            \xoops_error('Error: Sql file not found!');
            return false;
        }

        $tables    = [];
        $schema    = [];
        $tableName = '';

        // read sql file
        $lines = \file($this->fileSql);

        // remove unnecessary lines
        foreach ($lines as $key => $value) {
            $line = \trim($value);
            // remove blank lines
            if ('' === $line) {
                unset($lines[$key]);
            }
            // remove comment lines
            if ('#' === \substr($line, 0, 1)) {
                unset($lines[$key]);
            }
        }

        $skip = true;
        $skipWords = ['CREATE DATABASE ', 'CREATE VIEW ', 'INSERT INTO ', 'SELECT ', 'DELETE ', 'UPDATE ', 'ALTER ', 'DROP '];
        $options = '';
        // read remaining lines line by line and create new schema
        foreach ($lines as $key => $value) {
            $line = \trim($value);
            foreach ($skipWords as $skipWord) {
                if ($skipWord === \mb_strtoupper(\substr($line, 0, \strlen($skipWord)))) {
                    $skip = true;
                }
            }
            if ('CREATE TABLE' === \mb_strtoupper(\substr($line, 0, 12))) {
                $skip = false;
                $options = '';
                // start table definition
                $tableName = $this->getTableName ($line);
                $tables[$tableName] = [];
                $tables[$tableName]['options'] = '';
                $tables[$tableName]['columns'] = [];
                $tables[$tableName]['keys'] = [];
            } else {
                if (false == $skip) {
                    if (')' === \mb_strtoupper(\substr($line, 0, 1))) {
                        // end of table definition
                        // get options
                        $this->getOptions($line, $options);
                        $tables[$tableName]['options'] = $options;
                    } elseif ('ENGINE ' === \mb_strtoupper(\substr($line, 0, 7))) {
                        $this->getOptions($line, $options);
                        $tables[$tableName]['options'] = $options;
                    } elseif ('DEFAULT CHARSET ' === \mb_strtoupper(\substr($line, 0, 16))) {
                        $this->getOptions($line, $options);
                        $tables[$tableName]['options'] = $options;
                    } else {
                        // get keys and fields
                        switch (\mb_strtoupper(\substr($line, 0, 3))) {
                            case 'KEY':
                            case 'PRI':
                            case 'UNI':
                                $tables[$tableName]['keys'][] = $this->getKey($line);
                                break;
                            case 'else':
                            default:
                                $columns = $this->getColumns($line);
                                $tables[$tableName]['columns'][] = $columns;
                                break;
                        }
                    }
                }
            }
        }

        // create array for new schema
        $level1 = \str_repeat(' ', 4);
        $level2 = \str_repeat(' ', 8);
        $level3 = \str_repeat(' ', 12);

        foreach ($tables as $tkey => $table) {
            $schema[] = "{$tkey}:\n";
            foreach ($table as $lkey => $line) {
                if ('keys' == $lkey) {
                    $schema[] = $level1 . "keys:\n";
                    foreach ($line as $kkey => $kvalue) {
                        foreach ($kvalue as $kkey2 => $kvalue2) {
                            $schema[] = $level2 . $kkey2 . ":\n";
                            $schema[] = $level3 . 'columns: ' . $kvalue2['columns'] . "\n";
                            $schema[] = $level3 . 'unique: ' . $kvalue2['unique'] . "\n";
                        }
                    }
                } elseif ('options' == $lkey) {
                    $schema[] = $level1 . 'options: ' . $line . "\n";
                } else {
                    $schema[] = $level1 . 'columns: ' . "\n";
                    foreach ($line as $kkey => $kvalue) {
                        $schema[] = $level2 . '-' . "\n";
                        foreach ($kvalue as $kkey2 => $kvalue2) {
                            $schema[] = $level3 . $kkey2 . ": " . $kvalue2 . "\n";
                        }
                    }
                }
            }
        }

        // create new file and write schema array into this file
        $myfile = \fopen($this->fileYaml, "w");
        if (false == $myfile || \is_null($myfile)) {
            \xoops_error('Error: Unable to open sql file!');
            return false;
        }
        foreach ($schema as $line) {
            \fwrite($myfile, $line);
        }
        \fclose($myfile);

        return true;

    }

    /**
     * Extract table name from given line
     *
     * @param  string $line
     * @return string|bool
     */
    private function getTableName (string $line)
    {

        $arrLine = \explode( '`', $line);
        if (\count($arrLine) > 0) {
            return $arrLine[1];
        }

        return false;

    }

    /**
     * Extract columns/fields of table from given line
     *
     * @param string $line
     * @return array|bool
     */
    private function getColumns (string $line)
    {

        $columns = [];

        $arrCol = \explode( ' ', \trim($line));
        if (\count($arrCol) > 0) {
            $name = \str_replace(['`'], '', $arrCol[0]);
        } else {
            return false;
        }
        $attributes = \trim(\str_replace([$name, '`', ','], '', $line));

        $columns['name'] = $name;
        // update quotes
        if (\strpos($attributes, "''") > 0) {
            $attributes = \trim(\str_replace("''", "''''''''" , $attributes));
        } elseif (\strpos($attributes, "'") > 0) {
            $attributes = \trim(\str_replace("'", "''" , $attributes));
        }
        $columns['attributes'] = "' " . $attributes . " '";

        return $columns;

    }

    /**
     * Extract options of table from given line
     *
     * @param string $line
     * @param string $options
     * @return void
     */
    private function getOptions (string $line, string &$options): void
    {

        $lineText = \trim(\str_replace([')', ';'], '', $line));
        // remove all existing '
        $options = \str_replace("'", '', $options);
        if ('' != $options) {
            $options .= ' ';
        }
        $options = "'" . $options . $lineText . "'";

    }

    /**
     * Extract keys of table from given line
     *
     * @param string $line
     * @return array
     */
    private function getKey (string $line)
    {

        $key = [];

        if (\strpos($line, 'RIMARY') > 0) {
            $key['PRIMARY'] = [];
            $fields = \substr($line, 13, \strlen($line) - 13);
            $key['PRIMARY']['columns'] = \str_replace(['`', '),', ')'], '', $fields);
            $key['PRIMARY']['unique'] = 'true';
        } else {
            $unique = 'false';
            if (\strpos($line, 'NIQUE') > 0) {
                $unique = 'true';
            }
            $line = \trim(\str_replace(['UNIQUE KEY', 'KEY'], '', $line));
            $arrName = \explode('(', $line);
            if (\count($arrName) > 0) {
                $name = \str_replace(['`', ' '], '', $arrName[0]);
                $columns = \str_replace(['`', '),', ')'], '', $arrName[1]);
                if ('' == $name) {
                    $name = $columns;
                }
                if (\strpos($name,' ') > 0) {
                    $name = "'" . $name . "'";
                }
                $key[$name] = [];
                if (\strpos($columns,' ') > 0) {
                    $columns = "'" . $columns . "'";
                }
                $key[$name]['columns'] = $columns;
                $key[$name]['unique'] = $unique;
            }
        }
        return $key;
    }
}
