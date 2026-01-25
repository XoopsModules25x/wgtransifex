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
    public const BASE_URL = 'https://rest.api.transifex.com/';
    private const HEADER_JSON_API = 'application/vnd.api+json';

    /**
     * @var string
     */
    private $organization = '';

    /**
     * @var string
     */
    private $token = '';

    /**
     * Verbose debugging for curl (when putting)
     * @var bool
     */
    public $debug = false;

    /**
     * @var callable
     */
    private $httpClient;

    /**
     * TransifexLib constructor.
     */
    public function __construct()
    {
        $this->httpClient = [$this, 'defaultHttpClient'];
    }

    /**
     * Configure the Transifex credentials.
     */
    public function configure(string $organization, string $token): void
    {
        $this->organization = \trim($organization);
        $this->token = \trim($token);
    }

    /**
     * Inject a custom HTTP client (mainly for unit testing).
     */
    public function setHttpClient(callable $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return array
     */
    public function getProjects()
    {
        $this->ensureConfigured();

        $projects = [];
        $path = 'projects';
        $query = [
            'filter[organization]' => $this->buildOrganizationId(),
//            'page[size]' => 200,
        ];

        do {
            $response = $this->request('GET', $path, $query);
            foreach ($response['data'] ?? [] as $project) {
                $projects[] = $this->normalizeProjectSummary($project);
            }
            $next = $this->parseNextLink($response['links']['next'] ?? null);
            if ($next) {
                $path = $next['path'];
                $query = $next['query'];
            }
        } while ($next);

        return $projects;
    }

    /**
     * @param      $project
     * @param bool $details
     * @param bool $skipMissing
     *
     * @return array|bool
     */
    public function getProject($project, $details = false, $skipMissing = false)
    {
        $this->ensureConfigured();
        $projectSlug = (string)$project;
        $projectId = $this->buildProjectId($projectSlug);

        try {
            $response = $this->request('GET', 'projects/' . \rawurlencode($projectId));
        } catch (\RuntimeException $exception) {
            if ($skipMissing && 404 === $exception->getCode()) {
                return false;
        }

            throw $exception;
        }

        $data = $response['data'] ?? [];
        $attributes = $data['attributes'] ?? [];
        $relationships = $data['relationships'] ?? [];
        $sourceLanguageCode = $relationships['source_language']['data']['id'] ?? '';
        if ($sourceLanguageCode) {
            $sourceLanguageCode = substr($sourceLanguageCode, 2, 10);
        }
        $result = [
            'slug' => $attributes['slug'] ?? $projectSlug,
            'name' => $attributes['name'] ?? '',
            'description' => $attributes['description'] ?? '',
            'archived' => (bool)($attributes['archived'] ?? false),
            'source_language_code' => $sourceLanguageCode,
            'last_updated' => $attributes['datetime_modified'] ?? null,
            'teams' => $this->extractProjectTeams($data),
            'resources' => [],
        ];

        if ($details) {
            $result['resources'] = $this->getResources($projectSlug);
        }

        return $result;
    }

    /**
     * @param $project
     *
     * @return array
     */
    public function getResources($project)
    {
        $this->ensureConfigured();
        $projectSlug = (string)$project;
        $resources = [];
        $path = 'resources';
        $query = [
            'filter[project]' => $this->buildProjectId($projectSlug),
//            'page[size]' => 200,
        ];

        do {
            $response = $this->request('GET', $path, $query);
            foreach ($response['data'] ?? [] as $item) {
                $resources[] = $this->normalizeResource($item, $projectSlug);
            }
            $next = $this->parseNextLink($response['links']['next'] ?? null);
            if ($next) {
                $path = $next['path'];
                $query = $next['query'];
            }
        } while ($next);

        return $resources;
    }

    /**
     * @param       $project
     * @param mixed $resource
     *
     * @return array
     */
    public function getResource($project, $resource)
    {
        $this->ensureConfigured();
        $projectSlug = (string)$project;
        $resourceSlug = (string)$resource;
        $resourceId = $this->buildResourceId($projectSlug, $resourceSlug);

        $response = $this->request('GET', 'resources/' . \rawurlencode($resourceId));

        return $this->normalizeResource($response['data'] ?? [], $projectSlug);
    }

    /**
     * @param       $project
     * @param mixed $resource
     *
     * @return bool
     */
    public function checkResource($project, $resource)
    {
        try {
            $this->getResource($project, $resource);
        } catch (\RuntimeException $exception) {
            if (404 === $exception->getCode()) {
                return false;
        }

            throw $exception;
        }

        return true;
    }

    /**
     * @param $project
     *
     * @return array
     */
    public function getLanguages($project)
    {
        $this->ensureConfigured();
        $projectSlug = (string)$project;
        $languages = [];
        $path = 'project_languages';
        $query = [
            'filter[project]' => $this->buildProjectId($projectSlug),
            'include' => 'language',
            //'page[size]' => 200,
        ];

        do {
            $response = $this->request('GET', $path, $query);
            $included = $this->indexIncluded($response['included'] ?? []);
            foreach ($response['data'] ?? [] as $item) {
                $languages[] = $this->normalizeProjectLanguage($item, $included);
            }
            $next = $this->parseNextLink($response['links']['next'] ?? null);
            if ($next) {
                $path = $next['path'];
                $query = $next['query'];
            }
        } while ($next);

        return $languages;
    }

    /**
     * @param        $project
     * @param string $language
     *
     * @return array
     */
    public function getLanguage($project, $language)
    {
        $this->ensureConfigured();

        return $this->getLanguageInfo($language);
    }

    /**
     * @param string $language
     *
     * @return array
     */
    public function getLanguageInfo($language)
    {
        $this->ensureConfigured();
        $languageId = $this->buildLanguageId((string)$language);
        $response = $this->request('GET', 'languages/' . \rawurlencode($languageId));

        return $response['data']['attributes'] ?? [];
    }

    /**
     * @param        $project
     * @param string $resource
     * @param string $language
     * @param        $language_source
     * @param bool   $reviewedOnly
     *
     * @return array
     */

    /**
     * Get translated text of a resource via Transifex async download API.
     *
     * @param string $project
     * @param string $resource
     * @param string $language
     * @param string $resI18nType
     *
     * @return array{content:string, mimetype:string}
     */
    public function getTranslation(
        string $project,
        string $resource,
        string $language,
        string $resI18nType
    ): array {
        $this->ensureConfigured();

        // start Async-Export
        $body = [
            'data' => [
                'type' => 'resource_translations_async_downloads',
                'attributes' => [
                    'file_type' => 'json',
                ],
                'relationships' => [
                    'resource' => [
                        'data' => [
                            'type' => 'resources',
                            'id'   => $this->buildResourceId($project, $resource),
                        ],
                    ],
                    'language' => [
                        'data' => [
                            'type' => 'languages',
                            'id'   => $this->buildLanguageId($language),
                        ],
                    ],
                ],
            ],
        ];

        $response = $this->request(
            'POST',
            'resource_translations_async_downloads',
            [],
            $body
        );

        // get Job-ID
        $jobId = $response['data']['id'] ?? null;
        if (!$jobId) {
            throw new \RuntimeException('Missing async job ID from Transifex');
        }

        // download translation
        $response = $this->waitForDownload($jobId);

        $content  = '';
        $mimetype = 'text/plain';
        if ('PHP_DEFINE' === $resI18nType) {
            $content = $this->generateDefines($response);
            $mimetype = 'application/x-httpd-php';
        } else {
            $content = $this->generatePlainText($response);
        }

        return [
            'content'  => $content,
            'mimetype' => $mimetype
        ];
    }

    private function waitForDownload(string $jobId, int $timeout = 30)
    {
        $start = \time();

        do {
            $response = $this->request(
                'GET',
                'resource_translations_async_downloads/' . \rawurlencode($jobId)
            );

            if (isset($response)) {
                return $response;
            }

            \usleep(1_000_000); // 1 second
        } while (\time() - $start < $timeout);

        throw new \RuntimeException('Timed out waiting for Transifex download URL');
    }

    /**
     * @param array $translations
     *
     * @return string
     */
    private function generateDefines(array $translations): string {
        $lines = [];
        foreach ($translations as $key => $data) {
            $value = $data['string'] ?? '';

            // Prüfen, ob der Wert ein Single-Quote enthält
            if (strpos($value, "'") !== false) {
                $lines[] = "DEFINE(\"$key\", \"$value\");";
            } else {
                $lines[] = "DEFINE('$key', '$value');";
            }
        }

        return implode("\n", $lines);
    }

    /**
     * @param array $translations
     *
     * @return string
     */
    private function generatePlainText(array $translations): string {
        $lines = [];
        foreach ($translations as $key => $data) {
            $value = $data['string'] ?? '';
            $lines[] = $value;
        }

        return implode("\n", $lines);
    }


    /**
     * @param             $project
     * @param string      $resource
     * @param string|null $language
     *
     * @return array
     */
    public function getStats($project, $resource, $language = null)
    {
        $this->ensureConfigured();
        $projectSlug = (string)$project;
        $resourceSlug = (string)$resource;
        $query = [
            'filter[project]' => $this->buildProjectId($projectSlug),
            'filter[resource]' => $this->buildResourceId($projectSlug, $resourceSlug),
            //'page[size]' => 1,
        ];
        if (null !== $language) {
            $query['filter[language]'] = $this->buildLanguageId((string)$language);
        }

        try {
            $response = $this->request('GET', 'resource_language_stats', $query);
        } catch (Exception $e) {
            return [];
        }


        $data = $response['data'][0]['attributes'] ?? [];

        if (!\is_array($data) || 0 === \count($data)) {
            return [];
        }

        $reviewedPercent = $data['reviewed_percent'] ?? ($data['reviewed_percentage'] ?? 0.0);
        $completed = $data['completed_percent'] ?? ($data['translated_percent'] ?? 0.0);
        $lastTranslator = $data['last_translator'] ?? ($data['last_updated_by'] ?? '');

        return [
            'proofread' => (int)($data['reviewed_strings'] ?? 0),
            'proofread_percentage' => (float)$reviewedPercent,
            'reviewed_percentage' => (float)$reviewedPercent,
            'completed' => (float)$completed,
            'untranslated_words' => (int)($data['untranslated_words'] ?? 0),
            'last_commiter' => (string)$lastTranslator,
            'reviewed' => (int)($data['reviewed_strings'] ?? 0),
            'translated_entities' => (int)($data['translated_strings'] ?? 0),
            'translated_words' => (int)($data['translated_words'] ?? 0),
            'untranslated_entities' => (int)($data['untranslated_strings'] ?? 0),
            'last_update' => $data['last_translation_at'] ?? ($data['datetime_modified'] ?? null),
        ];
    }

    /**
     * @param        $project
     * @param string $resource
     * @param string $language
     * @param string $file
     *
     * @return array
     */
    public function putTranslation($project, $resource, $language, $file)
    {
        $this->ensureConfigured();
        $translationId = $this->buildTranslationId((string)$project, (string)$resource, (string)$language);
        $body = [
            'data' => [
                'id' => $translationId,
                'type' => 'resource_translations',
                'attributes' => [
                    'content' => $this->readFileForUpload($file),
                    'content_encoding' => 'base64',
                ],
            ],
                        ];

        return $this->request('PATCH', 'resource_translations/' . \rawurlencode($translationId), [], $body);
    }

    /**
     * @param        $project
     * @param string $resource
     * @param string $file
     *
     * @return array
     */
    public function putResource($project, $resource, $file)
    {
        $this->ensureConfigured();
        $resourceId = $this->buildResourceId((string)$project, (string)$resource);
        $body = [
            'data' => [
                'id' => $resourceId,
                'type' => 'resources',
                'attributes' => [
                    'content' => $this->readFileForUpload($file),
                    'content_encoding' => 'base64',
                ],
            ],
        ];

        return $this->request('PATCH', 'resources/' . \rawurlencode($resourceId), [], $body);
    }

    /**
     * @param $project
     * @param $resource
     * @param $slug
     * @param $i18n_type
     * @param $file
     *
     * @return array
     */
    public function createResource($project, $resource, $slug, $i18n_type, $file)
    {
        $this->ensureConfigured();
        $body = [
            'data' => [
                'type' => 'resources',
                'attributes' => [
                    'name' => (string)$resource,
                    'slug' => (string)$slug,
                    'i18n_type' => (string)$i18n_type,
                    'content' => $this->readFileForUpload($file),
                    'content_encoding' => 'base64',
                ],
                'relationships' => [
                    'project' => [
                        'data' => [
                            'id' => $this->buildProjectId((string)$project),
                            'type' => 'projects',
                        ],
                    ],
                ],
            ],
        ];

        return $this->request('POST', 'resources', [], $body);
        }

    private function readFileForUpload(string $file): string
    {
        if (!\is_readable($file)) {
            throw new \RuntimeException('File not readable: ' . $file);
        }
        $content = \file_get_contents($file);
        if (false === $content) {
            throw new \RuntimeException('Could not read file: ' . $file);
            }

        return \base64_encode($content);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array  $query
     * @param array|null $body
     *
     * @return array
     */
    protected function request(string $method, string $path, array $query = [], ?array $body = null)
    {
        $url = \rtrim(static::BASE_URL, '/') . '/' . \ltrim($path, '/');
        if ($query) {
            $url .= '?' . \http_build_query($query, '', '&', \PHP_QUERY_RFC3986);
        }

        $headers = [
            'Accept: ' . self::HEADER_JSON_API,
            'Authorization: Bearer ' . $this->token,
        ];
        $payload = null;
        if (null !== $body) {
            $payload = \json_encode($body);
            if (false === $payload) {
                throw new \RuntimeException('Unable to encode request body');
            }
            $headers[] = 'Content-Type: ' . self::HEADER_JSON_API;
        }

        $rawResponse = \call_user_func($this->httpClient, $method, $url, $headers, $payload, $this->debug);
        $status = (int)($rawResponse['status'] ?? 0);
        $responseBody = (string)($rawResponse['body'] ?? '');
        $error = $rawResponse['error'] ?? null;

        if ($status < 200 || $status >= 300) {
            $message = $this->extractErrorMessage($responseBody) ?? ($error ?: 'Unexpected HTTP status: ' . $status);
            throw new \RuntimeException($message, $status);
        }

        if ('' === \trim($responseBody)) {
            return [];
        }

        $decoded = \json_decode($responseBody, true);
        if (\JSON_ERROR_NONE !== \json_last_error()) {
            throw new \RuntimeException('Unable to decode Transifex response: ' . \json_last_error_msg(), $status);
        }

        return $decoded;
    }

    /**
     * Default HTTP client using cURL.
     *
     * @return array{status:int,body:string,error:?(string)}
     */
    private function defaultHttpClient(string $method, string $url, array $headers, ?string $payload, bool $debug): array
    {
        $ch = \curl_init();
        \curl_setopt($ch, \CURLOPT_URL, $url);
        \curl_setopt($ch, \CURLOPT_CUSTOMREQUEST, $method);
        \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, \CURLOPT_CONNECTTIMEOUT, 25);
        \curl_setopt($ch, \CURLOPT_TIMEOUT, 25);
        \curl_setopt($ch, \CURLOPT_HTTPHEADER, $headers);
        if (null !== $payload) {
            \curl_setopt($ch, \CURLOPT_POSTFIELDS, $payload);
        }
        if ($debug) {
            \curl_setopt($ch, \CURLOPT_VERBOSE, true);
        }
        if (strtoupper($method) === 'GET') {
            \curl_setopt($ch, \CURLOPT_FOLLOWLOCATION, true);
            \curl_setopt($ch, \CURLOPT_MAXREDIRS, 5);
        }


        $body = (string)\curl_exec($ch);
        $status = (int)\curl_getinfo($ch, \CURLINFO_HTTP_CODE);
        $error = \curl_error($ch);
        \curl_close($ch);

        return [
            'status' => $status,
            'body' => $body,
            'error' => $error ?: null,
        ];
        }

    private function ensureConfigured(): void
    {
        if ('' === $this->organization || '' === $this->token) {
            throw new \RuntimeException('Transifex credentials are not configured');
            }
        }

    private function buildOrganizationId(): string
    {
        return 'o:' . $this->organization;
    }

    private function buildProjectId(string $projectSlug): string
    {
        return $this->buildOrganizationId() . ':p:' . $projectSlug;
    }

    private function buildResourceId(string $projectSlug, string $resourceSlug): string
    {
        return $this->buildProjectId($projectSlug) . ':r:' . $resourceSlug;
    }

    private function buildTranslationId(string $projectSlug, string $resourceSlug, string $languageCode): string
    {
        return $this->buildResourceId($projectSlug, $resourceSlug) . ':l:' . $languageCode;
    }

    private function buildLanguageId(string $language): string
    {
        return 'l:' . $language;
    }

    private function parseNextLink(?string $next): ?array
    {
        if (empty($next)) {
            return null;
        }

        $parts = \parse_url($next);
        if (false === $parts || !isset($parts['path'])) {
            return null;
        }

        $query = [];
        if (!empty($parts['query'])) {
            \parse_str($parts['query'], $query);
        }

        return [
            'path' => \ltrim($parts['path'], '/'),
            'query' => $query,
        ];
    }

    private function extractErrorMessage(string $body): ?string
    {
        if ('' === \trim($body)) {
            return null;
        }

        $decoded = \json_decode($body, true);
        if (!\is_array($decoded)) {
            return null;
        }
        if (isset($decoded['errors'][0]['detail'])) {
            return (string)$decoded['errors'][0]['detail'];
        }
        if (isset($decoded['error']['message'])) {
            return (string)$decoded['error']['message'];
        }

        return null;
    }

    private function normalizeProjectSummary(array $project): array
    {
        $attributes = $project['attributes'] ?? [];
        $slug = $attributes['slug'] ?? $this->extractSlugFromId($project['id'] ?? '', 'p');

        $relationships = $project['relationships'] ?? [];
        $sourceLanguageCode = $relationships['source_language']['data']['id'] ?? '';
        if ($sourceLanguageCode) {
            $sourceLanguageCode = substr($sourceLanguageCode, 2, 10);
        }
        return [
            'slug' => $slug,
            'name' => $attributes['name'] ?? '',
            'description' => $attributes['description'] ?? '',
            'archived' => (bool)($attributes['archived'] ?? false),
            'source_language_code' => $sourceLanguageCode,
            'last_updated' => $attributes['datetime_modified'] ?? null,
        ];
    }

    private function extractProjectTeams(array $projectData): array
    {
        $teams = $projectData['relationships']['teams']['data'] ?? [];

        return \is_array($teams) ? $teams : [];
    }

    private function normalizeResource(array $resource, string $projectSlug): array
    {
        $attributes = $resource['attributes'] ?? [];

        return [
            'slug' => $attributes['slug'] ?? $this->extractSlugFromId($resource['id'] ?? '', 'r'),
            'name' => $attributes['name'] ?? '',
            'i18n_type' => $attributes['i18n_type'] ?? '',
            'priority' => (int)($attributes['priority'] ?? 0),
            'source_language_code' => '', // not available anymore
            /* categories and metadata are not supported anymore
            'categories' => $this->toArray($attributes['categories'] ?? []),
            'metadata' => $this->toArray($attributes['metadata'] ?? []),
            */
            'project' => $projectSlug,
        ];
    }

    private function normalizeProjectLanguage(array $item, array $included): array
    {
        $languageId = $item['relationships']['language']['data']['id'] ?? '';
        $languageAttributes = $included[$languageId]['attributes'] ?? [];

        return [
            'code' => $languageAttributes['code'] ?? $this->extractSlugFromId($languageId, 'l'),
            'name' => $languageAttributes['name'] ?? ($languageAttributes['local_name'] ?? ''),
        ];
    }

    private function indexIncluded(array $included): array
    {
        $index = [];
        foreach ($included as $item) {
            if (isset($item['id'])) {
                $index[$item['id']] = $item;
            }
        }

        return $index;
    }

    private function extractSlugFromId(string $identifier, string $type): string
    {
        if ('' === $identifier) {
            return '';
        }
        $pattern = '/' . \preg_quote($type, '/') . ':([^:]+)/';
        if (1 === \preg_match($pattern, $identifier, $matches)) {
            return (string)$matches[1];
        }
        $parts = \explode(':', $identifier);

        return (string)\array_pop($parts);
    }

    private function toArray($value): array
    {
        return \is_array($value) ? $value : [];
    }
}
