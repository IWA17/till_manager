<?php
namespace Andbios\TillManager\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author ILBOUDO W ANDRE <w.a.ilboudo@gmail.com>
 */
class OrderTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Andbios\TillManager\Domain\Model\Order
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Andbios\TillManager\Domain\Model\Order();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNumberReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberForIntSetsNumber()
    {
        $this->subject->setNumber(12);

        self::assertAttributeEquals(
            12,
            'number',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getClientNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClientName()
        );
    }

    /**
     * @test
     */
    public function setClientNameForStringSetsClientName()
    {
        $this->subject->setClientName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clientName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDate()
        );
    }

    /**
     * @test
     */
    public function setDateForDateTimeSetsDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'date',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getProductsReturnsInitialValueForProduct()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getProducts()
        );
    }

    /**
     * @test
     */
    public function setProductsForObjectStorageContainingProductSetsProducts()
    {
        $product = new \Andbios\TillManager\Domain\Model\Product();
        $objectStorageHoldingExactlyOneProducts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneProducts->attach($product);
        $this->subject->setProducts($objectStorageHoldingExactlyOneProducts);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneProducts,
            'products',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addProductToObjectStorageHoldingProducts()
    {
        $product = new \Andbios\TillManager\Domain\Model\Product();
        $productsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $productsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($product));
        $this->inject($this->subject, 'products', $productsObjectStorageMock);

        $this->subject->addProduct($product);
    }

    /**
     * @test
     */
    public function removeProductFromObjectStorageHoldingProducts()
    {
        $product = new \Andbios\TillManager\Domain\Model\Product();
        $productsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $productsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($product));
        $this->inject($this->subject, 'products', $productsObjectStorageMock);

        $this->subject->removeProduct($product);
    }
}
