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
 * @copyright   XOOPS Project (https://xoops.org)
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      mamba <mambax7@gmail.com>
 */
trait FilesManagement
{
    /**
     * Function responsible for checking if a directory exists, we can also write in and create an index.html file
     *
     * @param string $folder The full path of the directory to check
     *
     * @throws \RuntimeException
     */
    public static function createFolder($folder)
    {
        try {
            if (!\file_exists($folder)) {
                if (!\is_dir($folder) && !\mkdir($folder) && !\is_dir($folder)) {
                    throw new \RuntimeException(\sprintf('Unable to create the %s directory', $folder));
                }
                file_put_contents($folder . '/index.html', '<script>history.go(-1);</script>');
            }
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), '<br>';
        }
    }

    /**
     * @param $file
     * @param $folder
     * @return bool
     */
    public static function copyFile($file, $folder)
    {
        return \copy($file, $folder);
    }

    /**
     * @param $src
     * @param $dst
     */
    public static function recurseCopy($src, $dst)
    {
        $dir = \opendir($src);
        //        @mkdir($dst);
        if (!@\mkdir($dst) && !\is_dir($dst)) {
            throw new \RuntimeException('The directory ' . $dst . ' could not be created.');
        }
        while (false !== ($file = \readdir($dir))) {
            if (('.' !== $file) && ('..' !== $file)) {
                if (\is_dir($src . '/' . $file)) {
                    self::recurseCopy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    \copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        \closedir($dir);
    }

    /**
     * Copy a file, or recursively copy a folder and its contents
     * @param string $source Source path
     * @param string $dest   Destination path
     * @return      bool     Returns true on success, false on failure
     * @author      Aidan Lister <aidan@php.net>
     * @version     1.0.1
     * @link        http://aidanlister.com/2004/04/recursively-copying-directories-in-php/
     */
    public static function xcopy($source, $dest)
    {
        // Check for symlinks
        if (\is_link($source)) {
            return \symlink(\readlink($source), $dest);
        }
        // Simple copy for a file
        if (\is_file($source)) {
            return \copy($source, $dest);
        }
        // Make destination directory
        if (!\is_dir($dest)) {
            if (!\mkdir($dest) && !\is_dir($dest)) {
                throw new \RuntimeException(\sprintf('Directory "%s" was not created', $dest));
            }
        }
        // Loop through the folder
        $dir = \dir($source);
        if (@\is_dir($dir)) {
            while (false !== $entry = $dir->read()) {
                // Skip pointers
                if ('.' === $entry || '..' === $entry) {
                    continue;
                }
                // Deep copy directories
                self::xcopy("$source/$entry", "$dest/$entry");
            }
            // Clean up
            $dir->close();
        }
        return true;
    }

    /**
     * Remove files and (sub)directories
     *
     * @param string $src source directory to delete
     *
     * @return bool true on success
     * @uses \Xmf\Module\Helper::isUserAdmin()
     *
     * @uses \Xmf\Module\Helper::getHelper()
     */
    public static function deleteDirectory($src)
    {
        // Only continue if user is a 'global' Admin
        if (!($GLOBALS['xoopsUser'] instanceof \XoopsUser) || !$GLOBALS['xoopsUser']->isAdmin()) {
            return false;
        }
        $success = true;
        // remove old files
        $dirInfo = new \SplFileInfo($src);
        // validate is a directory
        if ($dirInfo->isDir()) {
            $fileList = \array_diff(\scandir($src, \SCANDIR_SORT_NONE), ['..', '.']);
            foreach ($fileList as $k => $v) {
                $fileInfo = new \SplFileInfo("{$src}/{$v}");
                if ($fileInfo->isDir()) {
                    // recursively handle subdirectories
                    if (!$success = self::deleteDirectory($fileInfo->getRealPath())) {
                        break;
                    }
                } else {
                    // delete the file
                    if (!($success = \unlink($fileInfo->getRealPath()))) {
                        break;
                    }
                }
            }
            // now delete this (sub)directory if all the files are gone
            if ($success) {
                $success = \rmdir($dirInfo->getRealPath());
            }
        } else {
            // input is not a valid directory
            $success = false;
        }
        return $success;
    }

    /**
     * Recursively remove directory
     *
     * @todo currently won't remove directories with hidden files, should it?
     *
     * @param string $src directory to remove (delete)
     *
     * @return bool true on success
     */
    public static function rrmdir($src)
    {
        // Only continue if user is a 'global' Admin
        if (!($GLOBALS['xoopsUser'] instanceof \XoopsUser) || !$GLOBALS['xoopsUser']->isAdmin()) {
            return false;
        }
        // If source is not a directory stop processing
        if (!\is_dir($src)) {
            return false;
        }
        $success = true;
        // Open the source directory to read in files
        $iterator = new \DirectoryIterator($src);
        foreach ($iterator as $fObj) {
            if ($fObj->isFile()) {
                $filename = $fObj->getPathname();
                $fObj     = null; // clear this iterator object to close the file
                if (!\unlink($filename)) {
                    return false; // couldn't delete the file
                }
            } elseif (!$fObj->isDot() && $fObj->isDir()) {
                // Try recursively on directory
                self::rrmdir($fObj->getPathname());
            }
        }
        $iterator = null;   // clear iterator Obj to close file/directory
        return \rmdir($src); // remove the directory & return results
    }

    /**
     * Recursively move files from one directory to another
     *
     * @param string $src  - Source of files being moved
     * @param string $dest - Destination of files being moved
     *
     * @return bool true on success
     */
    public static function rmove($src, $dest)
    {
        // Only continue if user is a 'global' Admin
        if (!($GLOBALS['xoopsUser'] instanceof \XoopsUser) || !$GLOBALS['xoopsUser']->isAdmin()) {
            return false;
        }
        // If source is not a directory stop processing
        if (!\is_dir($src)) {
            return false;
        }
        // If the destination directory does not exist and could not be created stop processing
        if (!\is_dir($dest) && !\mkdir($dest) && !\is_dir($dest)) {
            return false;
        }
        // Open the source directory to read in files
        $iterator = new \DirectoryIterator($src);
        foreach ($iterator as $fObj) {
            if ($fObj->isFile()) {
                \rename($fObj->getPathname(), "{$dest}/" . $fObj->getFilename());
            } elseif (!$fObj->isDot() && $fObj->isDir()) {
                // Try recursively on directory
                self::rmove($fObj->getPathname(), "{$dest}/" . $fObj->getFilename());
                //                rmdir($fObj->getPath()); // now delete the directory
            }
        }
        $iterator = null;   // clear iterator Obj to close file/directory
        return \rmdir($src); // remove the directory & return results
    }

    /**
     * Recursively copy directories and files from one directory to another
     *
     * @param string $src  - Source of files being moved
     * @param string $dest - Destination of files being moved
     *
     * @return bool true on success
     * @uses \Xmf\Module\Helper::isUserAdmin()
     *
     * @uses \Xmf\Module\Helper::getHelper()
     */
    public static function rcopy($src, $dest)
    {
        // Only continue if user is a 'global' Admin
        if (!($GLOBALS['xoopsUser'] instanceof \XoopsUser) || !$GLOBALS['xoopsUser']->isAdmin()) {
            return false;
        }
        // If source is not a directory stop processing
        if (!\is_dir($src)) {
            return false;
        }
        // If the destination directory does not exist and could not be created stop processing
        if (!\is_dir($dest) && !\mkdir($dest) && !\is_dir($dest)) {
            return false;
        }
        // Open the source directory to read in files
        $iterator = new \DirectoryIterator($src);
        foreach ($iterator as $fObj) {
            if ($fObj->isFile()) {
                \copy($fObj->getPathname(), "{$dest}/" . $fObj->getFilename());
            } elseif (!$fObj->isDot() && $fObj->isDir()) {
                self::rcopy($fObj->getPathname(), "{$dest}/" . $fObj->getFilename());
            }
        }
        return true;
    }
}
