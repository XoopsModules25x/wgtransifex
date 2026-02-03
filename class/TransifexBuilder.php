<?php

declare(strict_types=1);

namespace XoopsModules\Wgtransifex;

/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * @copyright    XOOPS Project https://xoops.org/
 * @license      GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since
 * @author       Goffy - XOOPS Development Team
 */

/**
 * Transifex Php Builder class.
 */
class TransifexBuilder
{
    /**
     * ------------------------------------------------------------
     * Merge Transifex array into local file by key
     * ------------------------------------------------------------
     */
    public function buildByKey(array $transifexData, string $localFile): string
    {
        if (!file_exists($localFile)) {
            throw new RuntimeException('Local file not found: ' . $localFile);
        }

        $content = file_get_contents($localFile);
        foreach ($transifexData as $key => $info) {
            if (isset($info['string'])) {
                $result[$key] = $info['string'];
                $content = str_replace($key, $info['string'], $content);
            }
        }

        return $content;
    }
    /**
     * ------------------------------------------------------------
     * Merge Transifex array into local PHP define file
     * ------------------------------------------------------------
     */
    public function buildPHP(array $transifexData, string $localFile ): string
    {
        if (!file_exists($localFile)) {
            throw new RuntimeException('Local file not found: ' . $localFile);
        }

        $translations = $this->normalizeTransifexData($transifexData);

        $lines = file($localFile);
        $out = [];
        $usedKeys = [];

        $buffer = '';
        $inDefine = false;

        foreach ($lines as $line) {
            // ----------------------------------------------------
            // Start of define (single or multi-line)
            // ----------------------------------------------------
            if (!$inDefine && preg_match('/define\s*\(/', $line)) {
                $inDefine = true;
                $buffer = $line;

                // Single-line define
                if (strpos($line, ');') !== false) {
                    $inDefine = false;
                    $this->processDefineBlock(
                        $buffer,
                        $translations,
                        $usedKeys,
                        $out
                    );
                }

                continue;
            }

            // ----------------------------------------------------
            // Inside multi-line define
            // ----------------------------------------------------
            if ($inDefine) {
                $buffer .= $line;

                if (strpos($line, ');') !== false) {
                    $inDefine = false;
                    $this->processDefineBlock(
                        $buffer,
                        $translations,
                        $usedKeys,
                        $out
                    );
                }

                continue;
            }

            // ----------------------------------------------------
            // Normal line
            // ----------------------------------------------------
            $out[] = $line;
        }

        // Append missing keys
        $out[] = $this->appendMissingDefines($translations, $usedKeys);

        return rtrim(implode('', $out), "\n") . "\n\n";
    }

    /**
     * ------------------------------------------------------------
     * Process a full define(...) block (single or multi-line)
     * ------------------------------------------------------------
     */
    protected function processDefineBlock(
        string $block,
        array  $translations,
        array  &$usedKeys,
        array  &$out
    ): void
    {
        if (preg_match(
            '/define\s*\(\s*([\'"])([^\'"]+)\1\s*,/s',
            $block,
            $m
        )) {
            $key = $m[2];

            if (array_key_exists($key, $translations)) {
                $usedKeys[$key] = true;
                $value = addslashes($translations[$key]);
                $out[] = "define('{$key}', '{$value}');\n";
                return;
            }
        }

        // No replacement → keep original block
        $out[] = $block;
    }

    /**
     * ------------------------------------------------------------
     * Normalize Transifex response
     * KEY => translated string
     * ------------------------------------------------------------
     */
    protected function normalizeTransifexData(array $data): array
    {
        $result = [];

        foreach ($data as $key => $info) {
            if (isset($info['string'])) {
                $result[$key] = $info['string'];
            }
        }

        return $result;
    }

    /**
     * ------------------------------------------------------------
     * Append new defines at end of file
     * ------------------------------------------------------------
     */
    protected function appendMissingDefines(
        array $translations,
        array $usedKeys
    ): string
    {
        $buffer = '';
        $added = false;

        foreach ($translations as $key => $value) {
            if (isset($usedKeys[$key])) {
                continue;
            }

            if ($added === false) {
                $buffer .= "\n// Added by wgTransifex\n";
                $added = true;
            }

            $buffer .= "define('{$key}', '" . addslashes($value) . "');\n";
        }

        return $buffer;
    }
}
