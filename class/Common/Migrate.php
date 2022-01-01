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

use XoopsModules\Wgtransifex\Common;

/**
 * Class Migrate synchronize existing tables with target schema
 *
 * @category  Migrate
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2016 XOOPS Project (https://xoops.org)
 * @license   GNU GPL 2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @link      https://xoops.org
 */

class Migrate extends \Xmf\Database\Migrate
{
    private $renameTables;

    private $renameColumns;

    /**
     * @param \XoopsModules\Wgtransifex\Common\Configurator|null $configurator
     */
    public function __construct(Common\Configurator $configurator = null)
    {
        if (null !== $configurator) {
            $this->renameTables = $configurator->renameTables;
            $this->renameColumns = $configurator->renameColumns;

            $moduleDirName = \basename(\dirname(__DIR__, 2));
            parent::__construct($moduleDirName);
        }
    }

    /**
     * change table prefix if needed
     */
    private function changePrefix()
    {
        foreach ($this->renameTables as $oldName => $newName) {
            if ($this->tableHandler->useTable($oldName) && !$this->tableHandler->useTable($newName)) {
                $this->tableHandler->renameTable($oldName, $newName);
            }
        }
    }

    /**
     * change column name of given table if needed
     */
    private function changeColumnNames()
    {
        foreach ($this->renameColumns as $table => $columns) {
            if ($this->tableHandler->useTable($table)) {
                foreach ($columns as $oldName => $newName) {
                    $attributes = $this->tableHandler->getColumnAttributes($table, $oldName);
                    if ('' != $attributes) {
                        // column exists
                        $this->tableHandler->alterColumn($table, $oldName, $attributes, $newName);
                    }
                }
            }
        }
    }

    /**
     * Change integer IPv4 column to varchar IPv6 capable
     *
     * @param string $tableName  table to convert
     * @param string $columnName column with IP address
     */
    private function convertIPAddresses($tableName, $columnName)
    {
        if ($this->tableHandler->useTable($tableName)) {
            $attributes = $this->tableHandler->getColumnAttributes($tableName, $columnName);
            if (false !== \mb_strpos($attributes, ' int(')) {
                if (false === \mb_strpos($attributes, 'unsigned')) {
                    $this->tableHandler->alterColumn($tableName, $columnName, " bigint(16) NOT NULL  DEFAULT '0' ");
                    $this->tableHandler->update($tableName, [$columnName => "4294967296 + $columnName"], "WHERE $columnName < 0", false);
                }
                $this->tableHandler->alterColumn($tableName, $columnName, " varchar(45)  NOT NULL  DEFAULT '' ");
                $this->tableHandler->update($tableName, [$columnName => "INET_NTOA($columnName)"], '', false);
            }
        }
    }

    /**
     * Move do* columns from newbb_posts to newbb_posts_text table
     */
    private function moveDoColumns()
    {
        $tableName    = 'newbb_posts_text';
        $srcTableName = 'newbb_posts';
        if ($this->tableHandler->useTable($tableName)
            && $this->tableHandler->useTable($srcTableName)) {
            $attributes = $this->tableHandler->getColumnAttributes($tableName, 'dohtml');
            if (false === $attributes) {
                $this->synchronizeTable($tableName);
                $updateTable = $GLOBALS['xoopsDB']->prefix($tableName);
                $joinTable   = $GLOBALS['xoopsDB']->prefix($srcTableName);
                $sql         = "UPDATE `$updateTable` t1 INNER JOIN `$joinTable` t2 ON t1.post_id = t2.post_id \n" . "SET t1.dohtml = t2.dohtml,  t1.dosmiley = t2.dosmiley, t1.doxcode = t2.doxcode\n" . '  , t1.doimage = t2.doimage, t1.dobr = t2.dobr';
                $this->tableHandler->addToQueue($sql);
            }
        }
    }

    /**
     * Perform any upfront actions before synchronizing the schema
     *
     * Some typical uses include
     *   table and column renames
     *   data conversions
     */
    protected function preSyncActions()
    {
        if (\count($this->renameTables) > 0) {
            // change 'bb' table prefix to 'newbb'
            $this->changePrefix();
        }
        if (\count($this->renameColumns) > 0) {
            // change 'bb' table prefix to 'newbb'
            $this->changeColumnNames();
        }

        /*
        // columns dohtml, dosmiley, doxcode, doimage and dobr moved between tables as some point
        $this->moveDoColumns();
        // Convert IP address columns from int to readable varchar(45) for IPv6
        $this->convertIPAddresses('newbb_posts', 'poster_ip');
        $this->convertIPAddresses('newbb_report', 'reporter_ip');
        */
    }
}
