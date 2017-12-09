<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Andbios.TillManager',
            'Tillmanager',
            'Till Manager'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('till_manager', 'Configuration/TypoScript', 'Till Manager');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tillmanager_domain_model_product', 'EXT:till_manager/Resources/Private/Language/locallang_csh_tx_tillmanager_domain_model_product.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tillmanager_domain_model_product');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tillmanager_domain_model_order', 'EXT:till_manager/Resources/Private/Language/locallang_csh_tx_tillmanager_domain_model_order.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tillmanager_domain_model_order');

    }
);
