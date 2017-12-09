<?php
namespace Andbios\TillManager\Controller;

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
 * OrderController
 */
class OrderController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * orderRepository
     *
     * @var \Andbios\TillManager\Domain\Repository\OrderRepository
     * @inject
     */
    protected $orderRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $orders = $this->orderRepository->findAll();
        $this->view->assign('orders', $orders);
    }

    /**
     * action show
     *
     * @param \Andbios\TillManager\Domain\Model\Order $order
     * @return void
     */
    public function showAction(\Andbios\TillManager\Domain\Model\Order $order)
    {
        $this->view->assign('order', $order);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \Andbios\TillManager\Domain\Model\Order $newOrder
     * @return void
     */
    public function createAction(\Andbios\TillManager\Domain\Model\Order $newOrder)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->add($newOrder);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Andbios\TillManager\Domain\Model\Order $order
     * @ignorevalidation $order
     * @return void
     */
    public function editAction(\Andbios\TillManager\Domain\Model\Order $order)
    {
        $this->view->assign('order', $order);
    }

    /**
     * action update
     *
     * @param \Andbios\TillManager\Domain\Model\Order $order
     * @return void
     */
    public function updateAction(\Andbios\TillManager\Domain\Model\Order $order)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->update($order);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Andbios\TillManager\Domain\Model\Order $order
     * @return void
     */
    public function deleteAction(\Andbios\TillManager\Domain\Model\Order $order)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->remove($order);
        $this->redirect('list');
    }
}
