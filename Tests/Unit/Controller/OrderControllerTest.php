<?php
namespace Andbios\TillManager\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author ILBOUDO W ANDRE <w.a.ilboudo@gmail.com>
 */
class OrderControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Andbios\TillManager\Controller\OrderController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Andbios\TillManager\Controller\OrderController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllOrdersFromRepositoryAndAssignsThemToView()
    {

        $allOrders = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $orderRepository = $this->getMockBuilder(\Andbios\TillManager\Domain\Repository\OrderRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $orderRepository->expects(self::once())->method('findAll')->will(self::returnValue($allOrders));
        $this->inject($this->subject, 'orderRepository', $orderRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('orders', $allOrders);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenOrderToView()
    {
        $order = new \Andbios\TillManager\Domain\Model\Order();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('order', $order);

        $this->subject->showAction($order);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenOrderToOrderRepository()
    {
        $order = new \Andbios\TillManager\Domain\Model\Order();

        $orderRepository = $this->getMockBuilder(\Andbios\TillManager\Domain\Repository\OrderRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $orderRepository->expects(self::once())->method('add')->with($order);
        $this->inject($this->subject, 'orderRepository', $orderRepository);

        $this->subject->createAction($order);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenOrderToView()
    {
        $order = new \Andbios\TillManager\Domain\Model\Order();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('order', $order);

        $this->subject->editAction($order);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenOrderInOrderRepository()
    {
        $order = new \Andbios\TillManager\Domain\Model\Order();

        $orderRepository = $this->getMockBuilder(\Andbios\TillManager\Domain\Repository\OrderRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $orderRepository->expects(self::once())->method('update')->with($order);
        $this->inject($this->subject, 'orderRepository', $orderRepository);

        $this->subject->updateAction($order);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenOrderFromOrderRepository()
    {
        $order = new \Andbios\TillManager\Domain\Model\Order();

        $orderRepository = $this->getMockBuilder(\Andbios\TillManager\Domain\Repository\OrderRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $orderRepository->expects(self::once())->method('remove')->with($order);
        $this->inject($this->subject, 'orderRepository', $orderRepository);

        $this->subject->deleteAction($order);
    }
}
