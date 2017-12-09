<?php
namespace Andbios\TillManager\Domain\Model;

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

/**
 * Order
 */
class Order extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * number
     *
     * @var int
     */
    protected $number = 0;

    /**
     * clientName
     *
     * @var string
     */
    protected $clientName = '';

    /**
     * date
     *
     * @var \DateTime
     */
    protected $date = null;

    /**
     * products
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Andbios\TillManager\Domain\Model\Product>
     */
    protected $products = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->products = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the number
     *
     * @return int $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the number
     *
     * @param int $number
     * @return void
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Returns the clientName
     *
     * @return string $clientName
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Sets the clientName
     *
     * @param string $clientName
     * @return void
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
    }

    /**
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Adds a Product
     *
     * @param \Andbios\TillManager\Domain\Model\Product $product
     * @return void
     */
    public function addProduct(\Andbios\TillManager\Domain\Model\Product $product)
    {
        $this->products->attach($product);
    }

    /**
     * Removes a Product
     *
     * @param \Andbios\TillManager\Domain\Model\Product $productToRemove The Product to be removed
     * @return void
     */
    public function removeProduct(\Andbios\TillManager\Domain\Model\Product $productToRemove)
    {
        $this->products->detach($productToRemove);
    }

    /**
     * Returns the products
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Andbios\TillManager\Domain\Model\Product> $products
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Sets the products
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Andbios\TillManager\Domain\Model\Product> $products
     * @return void
     */
    public function setProducts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $products)
    {
        $this->products = $products;
    }
}
