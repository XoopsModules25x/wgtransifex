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
 * Transifex API wrapper class.
 */
class TransifexLib
{
    public const BASE_URL = 'https://www.transifex.com/api/2/';
    /**
     * @var string
     */
    public $user;
    /**
     * @var string
     */
    public $password;
    /**
     * Verbose debugging for curl (when putting)
     * @var bool
     */
    public $debug = false;

    /**
     * TransifexLib::__construct()
     */
    public function __construct()
    {
    }

    /**
     * TransifexLib::getProject()
     *
     * @return array
     */
    public function getProjects()
    {
        $url = static::BASE_URL . 'projects';

        return $this->_get($url);
    }

    /**
     * TransifexLib::getProject()
     *
     * @param      $project
     * @param bool $details
     * @return array
     */
    public function getProject($project, $details = false)
    {
        $url = static::BASE_URL . 'project/' . $project . '/';
        if ($details) {
            $url .= '?details';
        }

        return $this->_get($url);
    }

    /**
     * TransifexLib::getResources()
     *
     * @param $project
     * @return array
     */
    public function getResources($project)
    {
        $url = static::BASE_URL . 'project/' . $project . '/resources/';

        return $this->_get($url);
    }

    /**
     * TransifexLib::getResource()
     *
     * @param       $project
     * @param mixed $resource
     * @return array
     */
    public function getResource($project, $resource)
    {
        if ($resource) {
            $resource .= '/';
        }
        $url = static::BASE_URL . 'project/' . $project . '/resource/' . $resource;

        return $this->_get($url);
    }

    /**
     * TransifexLib::checkResource()
     *
     * @param       $project
     * @param mixed $resource
     * @return array
     */
    public function checkResource($project, $resource)
    {
        if ($resource) {
            $resource .= '/';
        }
        $url = static::BASE_URL . 'project/' . $project . '/resource/' . $resource;

        return $this->_get($url, true);
    }

    /**
     * TransifexLib::getLanguages()
     * Only the project owner or the project maintainers can perform this action.
     *
     * @param $project
     * @return array
     */
    public function getLanguages($project)
    {
        $url = static::BASE_URL . 'project/' . $project . '/languages/';

        return $this->_get($url);
    }

    /**
     * Only the project owner or the project maintainers can perform this action.
     *
     * @param        $project
     * @param string $language
     * @return array
     */
    public function getLanguage($project, $language)
    {
        $url = static::BASE_URL . 'project/' . $project . '/language/' . $language . '/?details';

        return $this->_get($url);
    }

    /**
     * TransifexLib::getLanguageInfo()
     *
     * @param string $language
     * @return array
     */
    public function getLanguageInfo($language)
    {
        $url = static::BASE_URL . 'language/' . $language . '/';

        return $this->_get($url);
    }

    /**
     * TransifexLib::getTranslations()
     *
     * @param        $project
     * @param string $resource
     * @param string $language
     * @param        $language_source
     * @param bool   $reviewedOnly
     * @return array
     */
    public function getTranslation($project, $resource, $language, $language_source, $reviewedOnly = false)
    {
        if ($language == $language_source) {
            $url = static::BASE_URL . 'project/' . $project . '/resource/' . $resource . '/content/';
        } else {
            $url = static::BASE_URL . 'project/' . $project . '/resource/' . $resource . '/translation/' . $language . '/';
        }
        if ($reviewedOnly) {
            $url .= '?mode=reviewed';
        }

        return $this->_get($url);
    }

    /**
     * TransifexLib::getStats()
     *
     * @param             $project
     * @param string      $resource
     * @param string|null $language
     * @return array
     */
    public function getStats($project, $resource, $language = null)
    {
        if ($language) {
            $language .= '/';
        }
        $url = static::BASE_URL . 'project/' . $project . '/resource/' . $resource . '/stats/' . $language;

        return $this->_get($url);
    }

    /**
     * TransifexLib::putTranslations()
     *
     * @param        $project
     * @param string $resource
     * @param string $language
     * @param string $file
     * @return mixed
     */
    public function putTranslation($project, $resource, $language, $file)
    {
        $url = static::BASE_URL . 'project/' . $project . '/resource/' . $resource . '/translation/' . $language;
        if (\function_exists('curl_file_create') && \function_exists('mime_content_type')) {
            $body = ['file' => \curl_file_create($file, $this->_getMimeType($file), \pathinfo($file, \PATHINFO_BASENAME))];
        } else {
            $body = ['file' => '@' . $file];
        }

        try {
            return $this->_post($url, $body, 'PUT');
        } catch (\RuntimeException $e) {
            /* Handling a very specific exception due to a Transifex bug */
            // Exception is thrown maybe just because the file only has empty translations
            if (false !== mb_strpos($e->getMessage(), "We're not able to extract any string from the file uploaded for language")) {
                $catalog = I18n::loadPo($file);
                unset($catalog['']);
                if (\count($catalog)) {
                    if (0 === \count(\array_filter($catalog))) {
                        // PO file contains empty translations
                        // In that case Transifex throws an error although its not.
                        // Then we could just append one non empty translation to that file and send it again
                        // But apart from successfully sending this file again, it wont affect the remote translations
                        return [
                            'strings_added' => 0,
                            'strings_updated' => 0,
                            'strings_delete' => 0,
                        ];
                    }
                    throw new \RuntimeException(\sprintf('Could not extract any string from %s. Whereas file contains non-empty translation(s) for following key(s): %s.', $file, '"' . \implode('", "', \array_keys(\array_filter($catalog))) . '"'));
                }
                throw new \RuntimeException(\sprintf('Could not extract any string from %s. File seems empty.', $file));
            }
            throw $e;
        }
    }

    /**
     * TransifexLib::putResource()
     *
     * @param        $project
     * @param string $resource
     * @param string $file
     * @return mixed
     */
    public function putResource($project, $resource, $file)
    {
        $url = static::BASE_URL . 'project/' . $project . '/resource/' . $resource . '/content';
        if (\function_exists('curl_file_create')) {
            $body = ['file' => \curl_file_create($file, $this->_getMimeType($file), \pathinfo($file, \PATHINFO_BASENAME))];
        } else {
            $body = ['file' => '@' . $file];
        }

        return $this->_post($url, $body, 'PUT');
    }

    /**
     * TransifexLib::createResource()
     *
     * @param        $project
     * @param string $resource
     * @param string $file
     * @return mixed
     */
    public function createResource($project, $resource, $slug, $i18n_type, $file)
    {
        $url = static::BASE_URL . 'project/' . $project . '/resources';
        $body = [
            'name' => $resource,
            'slug' => $slug,
            'i18n_type' => $i18n_type,
        ];
        if (\function_exists('curl_file_create')) {
            $body['file'] = \curl_file_create($file, $this->_getMimeType($file), \pathinfo($file, \PATHINFO_BASENAME));
        } else {
            $body['file'] = '@' . $file;
        }

        return $this->_post($url, $body, 'POST', $resource);
    }

    /**
     * @param string $file
     * @return string
     */
    protected function _getMimeType($file)
    {
        if (!\function_exists('finfo_open')) {
            if (!\function_exists('mime_content_type')) {
                throw new InternalErrorException('At least one of finfo or \mime_content_type() needs to be available');
            }

            return \mime_content_type($file);
        }
        $finfo = \finfo_open(\FILEINFO_MIME);

        return \finfo_file($finfo, $file);
    }

    /**
     * TransifexLib::_get()
     *
     * @param string $url
     * @param bool   $checkOnly
     * @throws \RuntimeException Exception.
     * @return array
     */
    protected function _get($url, $checkOnly = false)
    {
        $error = false;
        $ch = \curl_init();
        //set the url, number of POST vars, POST data
        \curl_setopt($ch, \CURLOPT_URL, $url);
        \curl_setopt($ch, \CURLOPT_USERPWD, $this->user . ':' . $this->password);
        \curl_setopt($ch, \CURLOPT_CUSTOMREQUEST, 'GET');
        \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, \CURLOPT_CONNECTTIMEOUT, 25);
        \curl_setopt($ch, \CURLOPT_TIMEOUT, 25);
        if ($this->debug) {
            \curl_setopt($ch, \CURLOPT_VERBOSE, true);
        }
        \curl_setopt($ch, \CURLOPT_SSL_VERIFYHOST, false);
        \curl_setopt($ch, \CURLOPT_SSL_VERIFYPEER, false);
        \curl_setopt($ch, \CURLOPT_POST, 1);
        $result = \curl_exec($ch);
        $info = \curl_getinfo($ch);
        if (($errMsg = \curl_error($ch)) || !\in_array((int)$info['http_code'], [200, 201], true)) {
            $error = true;
        }
        \curl_close($ch);
        if ($checkOnly) {
            return (false == $error);
        }
        echo "<br>" . $url;
        if ($error) {
            //echo $url;
            //catch common errors
            switch ((int)$info['http_code']) {
                case 401:
                    throw new \RuntimeException('"' . \_AM_WGTRANSIFEX_READTX_ERROR_API_401 . '"');
                    break;
                case 403:
                    throw new \RuntimeException('"' . \_AM_WGTRANSIFEX_READTX_ERROR_API_403 . '"');
                    break;
                case 404:
                    throw new \RuntimeException('"' . \_AM_WGTRANSIFEX_READTX_ERROR_API_404 . '"');
                    break;
                case 405:
                    throw new \RuntimeException('"' . \_AM_WGTRANSIFEX_READTX_ERROR_API_405 . '"');
                    break;
                case 0:
                default:
                    throw new \RuntimeException('"' . \_AM_WGTRANSIFEX_READTX_ERROR_API . $errMsg . '"');
                    break;
            }
        }

        return \json_decode($result, true);
    }

    /**
     * @param string $url
     * @param mixed  $data
     * @param string $requestType
     * @param bool   $resource
     * @throws \RuntimeException
     * @return mixed
     */
    protected function _post($url, $data, $requestType = 'POST', $resource = false)
    {
        $error = false;
        $ch = \curl_init();
        //\curl_setopt($ch, CURLOPT_URL, Text::insert($url, $this->settings, ['before' => '{', 'after' => '}']));
        \curl_setopt($ch, \CURLOPT_URL, $url);
        \curl_setopt($ch, \CURLOPT_USERPWD, $this->user . ':' . $this->password);
        \curl_setopt($ch, \CURLOPT_CUSTOMREQUEST, $requestType);
        \curl_setopt($ch, \CURLOPT_POST, 1);
        \curl_setopt($ch, \CURLOPT_POSTFIELDS, $data);
        \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, 1);
        \curl_setopt($ch, \CURLOPT_SSL_VERIFYPEER, false);
        if ($this->debug) {
            \curl_setopt($ch, \CURLOPT_VERBOSE, true);
        }
        $result = \curl_exec($ch);
        $info = \curl_getinfo($ch);
        if (($errMsg = \curl_error($ch)) || !\in_array((int)$info['http_code'], [200, 201], true)) {
            $error = true;
        }
        \curl_close($ch);
        if ($error && $resource) {
            throw new \RuntimeException(\_AM_WGTRANSIFEX_READTX_ERROR_API . ': '. $resource . ' - '. $result);
        } else {
            if ($error) {
                throw new \RuntimeException(\_AM_WGTRANSIFEX_READTX_ERROR_API . $errMsg);
            }
        }

        return \json_decode($result, true);
    }
}
