<?php
/**
 * The `tt_content` TCA override.
 */

use T3v\T3vBackend\UserFunctions;
use T3v\T3vCore\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

// === Variables ===

$namespace = 'T3v';
$extensionKey = 't3v_backend';
$extensionIdentifier = ExtensionUtility::getIdentifier($extensionKey);
$extensionSignature = ExtensionUtility::getSignature($namespace, $extensionKey);
$flexFormsFolder = ExtensionUtility::getFlexFormsFolder($extensionKey);
$lll = ExtensionUtility::getLocallang($extensionKey, 'locallang_tca.xlf');

// === TCA ===

ExtensionManagementUtility::addTCAcolumns(
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
$GLOBALS['TCA']['tt_content']['ctrl']['label_userFunc'] = UserFunctions::class . '->processLabel';

// Adds the `label` field before the `CType` field in the `general` palette:
ExtensionManagementUtility::addFieldsToPalette(
    'tt_content',
    'general',
    'label, --linebreak--',
    'before:CType'
);

// Removes the `subheader` field temporally:
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--palette--;;empty',
    '',
    'replace:subheader'
);

// Adds the `subheader` field back before the `header_link` field in the `headers` palette:
ExtensionManagementUtility::addFieldsToPalette(
    'tt_content',
    'headers',
    '--linebreak--,subheader,--linebreak--',
    'before:header_link'
);

// === T3v Generator ===
