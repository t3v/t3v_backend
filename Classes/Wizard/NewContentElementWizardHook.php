<?php
declare(strict_types=1);

namespace T3v\T3vBackend\Wizard;

use TYPO3\CMS\Backend\Controller\ContentElement\NewContentElementController;
use TYPO3\CMS\Backend\Wizard\NewContentElementWizardHookInterface;

/**
 * The new content element wizard hook class.
 *
 * @package T3v\T3vBackend\Wizard
 */
class NewContentElementWizardHook implements NewContentElementWizardHookInterface
{
    /**
     * Manipulates the wizard items.
     *
     * @param array $wizardItems The wizard items
     * @param NewContentElementController $parentObject The parent object
     */
    public function manipulateWizardItems(&$wizardItems, &$parentObject): void
    {
        $commonElements = [];
        $contentObjects = [];
        $gridElements = [];
        $customElements = [];
        $formElements = [];
        $specialElements = [];
        $legacyElements = [];

        foreach ($wizardItems as $key => $value) {
            if (strpos($key, 'common') !== false) {
                $commonElements[] = $key;
            }

            if (strpos($key, 'contentObject') !== false) {
                $contentObjects[] = $key;
            }

            if (strpos($key, 'gridelement') !== false) {
                $gridElements[] = $key;
            }

            if (strpos($key, 'custom') !== false) {
                $customElements[] = $key;
            }

            if (strpos($key, 'form') !== false) {
                $formElements[] = $key;
            }

            if (strpos($key, 'special') !== false) {
                $specialElements[] = $key;
            }

            if (strpos($key, 'legacy') !== false) {
                $legacyElements[] = $key;
            }
        }

        if (!empty($legacyElements)) { // Moves the legacy elements to the top:
            foreach (array_reverse($legacyElements) as $legacyElement) {
                $this->moveWizardItemToTop($wizardItems, $legacyElement);
            }
        }

        if (!empty($specialElements)) { // Moves the special elements to the top:
            foreach (array_reverse($specialElements) as $specialElement) {
                $this->moveWizardItemToTop($wizardItems, $specialElement);
            }
        }

        if (!empty($formElements)) { // Moves the form elements to the top:
            foreach (array_reverse($formElements) as $formElement) {
                $this->moveWizardItemToTop($wizardItems, $formElement);
            }
        }

        if (!empty($customElements)) { // Moves the custom elements to the top:
            foreach (array_reverse($customElements) as $customElement) {
                $this->moveWizardItemToTop($wizardItems, $customElement);
            }
        }

        if (!empty($gridElements)) { // Moves the grid elements to the top:
            foreach (array_reverse($gridElements) as $gridElement) {
                $this->moveWizardItemToTop($wizardItems, $gridElement);
            }
        }

        if (!empty($contentObjects)) { // Moves the content objects to the top:
            foreach (array_reverse($contentObjects) as $contentObject) {
                $this->moveWizardItemToTop($wizardItems, $contentObject);
            }
        }

        if (!empty($commonElements)) { // Moves the common elements to the top:
            foreach (array_reverse($commonElements) as $commonElement) {
                $this->moveWizardItemToTop($wizardItems, $commonElement);
            }
        }
    }

    /**
     * Moves a wizard item to the top.
     *
     * @param array $wizardItems The wizard items
     * @param string $key The key of the wizard item
     */
    protected function moveWizardItemToTop(array &$wizardItems, string $key): void
    {
        $temp = [$key => $wizardItems[$key]];

        unset($wizardItems[$key]);

        $wizardItems = array_merge($temp, $wizardItems);
    }

    /**
     * Moves a wizard item to the bottom.
     *
     * @param array $wizardItems The wizard items
     * @param string $key The key of the wizard item
     */
    protected function moveWizardItemToBottom(array &$wizardItems, string $key): void
    {
        $value = $wizardItems[$key];

        unset($wizardItems[$key]);

        $wizardItems[$key] = $value;
    }
}
