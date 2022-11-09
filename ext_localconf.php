<?php
declare(strict_types=1);

/**
 * The local extension configuration.
 */

use T3v\T3vCore\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

(static function () {
    // === Variables ===

    $extensionKey = 't3v_backend';
    $tsConfigFolder = ExtensionUtility::getTSConfigFolder($extensionKey);

    // === TSconfig ===

    ExtensionManagementUtility::addPageTSConfig("<INCLUDE_TYPOSCRIPT: source=\"$tsConfigFolder/Page.tsconfig\">");

    // === T3v Generator ===
})();
