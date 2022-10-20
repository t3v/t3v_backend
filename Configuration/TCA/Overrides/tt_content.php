<?php
/**
 * The `tt_content` TCA override.
 *
 * @noinspection PhpFullyQualifiedNameUsageInspection
 */

defined('TYPO3') or die();

// === Variables ===

$namespace = 'T3v';
$extensionKey = 't3v_backend';
$extensionIdentifier = \T3v\T3vCore\Utility\ExtensionUtility::getIdentifier($extensionKey);
$extensionSignature = \T3v\T3vCore\Utility\ExtensionUtility::getSignature($namespace, $extensionKey);
$flexFormsFolder = \T3v\T3vCore\Utility\ExtensionUtility::getFlexFormsFolder($extensionKey);
$lll = \T3v\T3vCore\Utility\ExtensionUtility::getLocallang($extensionKey, 'locallang_tca.xlf');

// === TCA ===

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    [
        'label' => [
            'label' => $lll . 'tt_content.label',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => 50,
                'max' => 255
            ],
            'l10n_mode' => 'prefixLangTitle',
            'exclude' => true
        ]
   ]
);

$GLOBALS['TCA']['tt_content']['ctrl']['label'] = 'header';
$GLOBALS['TCA']['tt_content']['ctrl']['label_userFunc'] = \T3v\T3vBackend\UserFunctions::class . '->processLabel';

// Adds the `label` field before the `CType` field in the `general` palette:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tt_content',
    'general',
    'label, --linebreak--',
    'before:CType'
);

// === T3v Generator ===
