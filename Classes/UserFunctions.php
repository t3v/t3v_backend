<?php
declare(strict_types=1);

namespace T3v\T3vBackend;

use TYPO3\CMS\Backend\Utility\BackendUtility;

/**
 * The user functions class.
 *
 * This class provides user functions for the usage in TCA definitions.
 *
 * @package T3v\T3vBackend
 */
class UserFunctions
{
    /**
     * Processes the label.
     *
     * @param array $parameters The parameters
     */
    public function processLabel(array &$parameters): void
    {
        if (!($parameters['row']['pid'] ?? 0)) {
            return;
        }

        $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);

        if (!empty($record)) {
            $newTitle = $record['header'];

            if (!empty($record['label']) && $record['label'] !== $newTitle) {
                $newTitle = '[' . $record['label'] . '] ' . substr($newTitle, 0, 30);
            }

            $parameters['title'] = $newTitle;
        }
    }
}
