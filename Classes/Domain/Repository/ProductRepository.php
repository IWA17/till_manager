<?php
namespace Andbios\TillManager\Domain\Repository;

    /***
     *
     * This file is part of the "Till Manager" Extension for TYPO3 CMS.
     *
     * For the full copyright and license information, please read the
     * LICENSE.txt file that was distributed with this source code.
     *
     *  (c) 2017 ILBOUDO W ANDRE <w.a.ilboudo@gmail.com>, CodeID
     *
     ***/
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;

/**
 * The repository for Products
 */
class ProductRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function initializeObject()
    {
        $querySettings = $this->objectManager->get(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);
    }

}
