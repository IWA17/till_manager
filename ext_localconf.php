<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Andbios.TillManager',
            'Tillmanager',
            [
                'Product' => 'list, show, new, create, edit, update, delete, export',
                'Order' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Product' => 'create, update, delete, ',
                'Order' => 'create, update, delete'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    tillmanager {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('till_manager') . 'Resources/Public/Icons/user_plugin_tillmanager.svg
                        title = LLL:EXT:till_manager/Resources/Private/Language/locallang_db.xlf:tx_till_manager_domain_model_tillmanager
                        description = LLL:EXT:till_manager/Resources/Private/Language/locallang_db.xlf:tx_till_manager_domain_model_tillmanager.description
                        tt_content_defValues {
                            CType = list
                            list_type = tillmanager_tillmanager
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
