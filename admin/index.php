<?php

declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * wgTransifex module for xoops
 *
 * @copyright      2020 XOOPS Project (https://xooops.org)
 * @license        GPL 2.0 or later
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         Goffy - Email:<webmaster@wedega.com> - Website:<https://wedega.com> / <https://xoops.org>
 */

use XoopsModules\Wgtransifex\{
    Common,
    Helper,
    PackagesHandler,
    ProjectsHandler,
    ResourcesHandler,
    TranslationsHandler,
    SettingsHandler,
    LanguagesHandler,
    RequestsHandler
};

/** @var Helper $helper */
/** @var PackagesHandler $packagesHandler */
/** @var ProjectsHandler $projectsHandler */
/** @var ResourcesHandler $resourcesHandler */
/** @var TranslationsHandler $translationsHandler */
/** @var SettingsHandler $settingsHandler */
/** @var LanguagesHandler $languagesHandler */
/** @var RequestsHandler $requestsHandler */

$moduleDirName = \basename(\dirname(__DIR__));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

require __DIR__ . '/header.php';
// Template Index
$templateMain = 'wgtransifex_admin_index.tpl';
// Count elements
$countProjects = $projectsHandler->getCount();
$countResources = $resourcesHandler->getCount();
$countPackages = $packagesHandler->getCount();
$countTranslations = $translationsHandler->getCount();
$countSettings = $settingsHandler->getCount();
$countLanguages = $languagesHandler->getCount();
$countRequests = $requestsHandler->getCount();
// InfoBox Statistics
/** @var \Xmf\Module\Admin $adminObject */
$adminObject->addInfoBox(\_AM_WGTRANSIFEX_STATISTICS);
// Info elements
$adminObject->addInfoBoxLine(\sprintf('<label>' . \_AM_WGTRANSIFEX_THEREARE_PROJECTS . '</label>', $countProjects));
$adminObject->addInfoBoxLine(\sprintf('<label>' . \_AM_WGTRANSIFEX_THEREARE_RESOURCES . '</label>', $countResources));
$adminObject->addInfoBoxLine(\sprintf('<label>' . \_AM_WGTRANSIFEX_THEREARE_PACKAGES . '</label>', $countPackages));
$adminObject->addInfoBoxLine(\sprintf('<label>' . \_AM_WGTRANSIFEX_THEREARE_TRANSLATIONS . '</label>', $countTranslations));
$adminObject->addInfoBoxLine(\sprintf('<label>' . \_AM_WGTRANSIFEX_THEREARE_REQUESTS . '</label>', $countRequests));
$adminObject->addInfoBoxLine(\sprintf('<label>' . \_AM_WGTRANSIFEX_THEREARE_SETTINGS . '</label>', $countSettings));
$adminObject->addInfoBoxLine(\sprintf('<label>' . \_AM_WGTRANSIFEX_THEREARE_LANGUAGES . '</label>', $countLanguages));
// Upload Folders
$configurator = new Common\Configurator();
if ($configurator->uploadFolders && \is_array($configurator->uploadFolders)) {
    foreach (\array_keys($configurator->uploadFolders) as $i) {
        $folder[] = $configurator->uploadFolders[$i];
    }
}
if (!\function_exists('curl_init')) {
    $adminObject->addConfigError(\_AM_WGTRANSIFEX_NO_CURL);
}
// Uploads Folders Created
foreach (\array_keys($folder) as $i) {
    $adminObject->addConfigBoxLine($folder[$i], 'folder');
    $adminObject->addConfigBoxLine([$folder[$i], '777'], 'chmod');
}

// Render Index
$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('index.php'));
// Test Data
if ($helper->getConfig('displaySampleButton')) {
    \xoops_loadLanguage('admin/modulesadmin', 'system');
    require_once \dirname(__DIR__) . '/testdata/index.php';
    $adminObject->addItemButton(\constant('CO_' . $moduleDirNameUpper . '_ADD_SAMPLEDATA'), '__DIR__ . /../../testdata/index.php?op=load');
    $adminObject->addItemButton(\constant('CO_' . $moduleDirNameUpper . '_SAVE_SAMPLEDATA'), '__DIR__ . /../../testdata/index.php?op=save');
    //    $adminObject->addItemButton(\constant('CO_' . $moduleDirNameUpper . '_EXPORT_SCHEMA'), '__DIR__ . /../../testdata/index.php?op=exportschema', 'add');
    $adminObject->displayButton('left');
}
$GLOBALS['xoopsTpl']->assign('index', $adminObject->displayIndex());


// Deine Transifex-Daten
$apiToken = '1/3a7de1a0e9d23d49d3ebad7fee347f8b2c47cb08';
$organizationSlug = 'xoops';
$projectSlug = 'xoopstube';
$resourceSlug = 'adminphp'; // z. B. 'messages'
$languageCode = 'de_DE'; // Sprache, die du herunterladen willst
$password='Xoops@Germany!01';
$user='XoopsGermany';
// URL für den Download
////    https://rest.api.transifex.com/resource_translations
$url = "https://rest.api.transifex.com/resource_translations/o:$organizationSlug:p:$projectSlug:r:$resourceSlug:l:$languageCode/content/";
$url = "https://rest.api.transifex.com/resource_translations/o:$organizationSlug:p:$projectSlug:r:$resourceSlug:s:2e354ef120752c67afa1b6855aa80c52:l:$languageCode";
echo $url . '<br>';
// cURL-Session initialisieren
$ch = curl_init();

\curl_setopt($ch, \CURLOPT_URL, $url);
// Setze Header für Authentifizierung
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $apiToken",
    "Content-Type: application/vnd.api+json"
]);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




\curl_setopt($ch, \CURLOPT_USERPWD, $user . ':' . $password);
\curl_setopt($ch, \CURLOPT_CUSTOMREQUEST, 'GET');
\curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
\curl_setopt($ch, \CURLOPT_CONNECTTIMEOUT, 25);
\curl_setopt($ch, \CURLOPT_TIMEOUT, 25);
if ($debug) {
    \curl_setopt($ch, \CURLOPT_VERBOSE, true);
}
\curl_setopt($ch, \CURLOPT_SSL_VERIFYHOST, false);
\curl_setopt($ch, \CURLOPT_SSL_VERIFYPEER, false);
\curl_setopt($ch, \CURLOPT_POST, 1);




// Anfrage ausführen
$response = curl_exec($ch);

// Fehlerprüfung
if (curl_errno($ch)) {
    echo 'Fehler: ' . curl_error($ch);
    exit;
}

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Antwort prüfen
if ($httpCode === 200) {
    $data = json_decode($response, true);
    $content = base64_decode($data['data']['attributes']['content']);

    // Speichere die Datei lokal
    $filePath = $languageCode . '_' . $resourceSlug . '.po';
    file_put_contents($filePath, $content);
    echo "Übersetzung erfolgreich heruntergeladen: $filePath\n";
} else {
    echo "Fehler beim Abrufen der Übersetzung. HTTP-Code: $httpCode\n";
    echo $response;
}


// End Test Data
require __DIR__ . '/footer.php';
