<?php
declare(strict_types=1);

namespace T3v\T3vBackend\Form\FormDataProvider;

use TYPO3\CMS\Backend\Form\FormDataProviderInterface;

/**
 * The page form data provider class.
 *
 * @package T3v\T3vBackend\Form\FormDataProvider
 */
class PageFormDataProvider implements FormDataProviderInterface
{
    /**
     * The table name of the form data provider.
     */
    public const TABLE_NAME = 'pages';

    /**
     * Adds data to the form data.
     *
     * @param array $result The initialized result
     * @return array The result filled with more data
     */
    public function addData(array $result): array
    {
        if ($result['tableName'] !== $this::TABLE_NAME) {
            return $result;
        }

        return $this->addAuthorData($result);
    }

    /**
     * Adds author data to the result if not already available.
     *
     * @param array $result The initialized result
     * @return array The result filled with author data
     */
    protected function addAuthorData(array $result): array
    {
        if (empty($result['databaseRow']['author'])) {
            $result['databaseRow']['author'] = $GLOBALS['BE_USER']->user['realName'];
        }

        if (empty($result['databaseRow']['author_email'])) {
            $result['databaseRow']['author_email'] = $GLOBALS['BE_USER']->user['email'];
        }

        return $result;
    }
}
