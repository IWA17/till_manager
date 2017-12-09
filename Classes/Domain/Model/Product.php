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
 * Product
 */
class Product extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * code
     *
     * @var string
     */
    protected $code = '';

    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * price
     *
     * @var int
     */
    protected $price = 0;

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Returns the code
     *
     * @return string $code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets the code
     *
     * @param string $code
     * @return void
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the price
     *
     * @return int $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price
     *
     * @param int $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
