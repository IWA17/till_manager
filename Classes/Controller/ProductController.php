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
 * ProductController
 */
class ProductController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * productRepository
     *
     * @var \Andbios\TillManager\Domain\Repository\ProductRepository
     * @inject
     */
    protected $productRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $products = $this->productRepository->findAll();
        $this->view->assign('products', $products);
    }

    /**
     * action show
     *
     * @param \Andbios\TillManager\Domain\Model\Product $product
     * @return void
     */
    public function showAction(\Andbios\TillManager\Domain\Model\Product $product)
    {
        $this->view->assign('product', $product);
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
     * @param \Andbios\TillManager\Domain\Model\Product $newProduct
     * @return void
     */
    public function createAction(\Andbios\TillManager\Domain\Model\Product $newProduct)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->productRepository->add($newProduct);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Andbios\TillManager\Domain\Model\Product $product
     * @ignorevalidation $product
     * @return void
     */
    public function editAction(\Andbios\TillManager\Domain\Model\Product $product)
    {
        $this->view->assign('product', $product);
    }

    /**
     * action update
     *
     * @param \Andbios\TillManager\Domain\Model\Product $product
     * @return void
     */
    public function updateAction(\Andbios\TillManager\Domain\Model\Product $product)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->productRepository->update($product);
        #$this->redirect('edit', null, null, ['product' => $product->getUid()]);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Andbios\TillManager\Domain\Model\Product $product
     * @return void
     */
    public function deleteAction(\Andbios\TillManager\Domain\Model\Product $product)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->productRepository->remove($product);
        $this->redirect('list');
    }

    /**
     * action export
     *
     * @return void
     */
    public function exportAction()
    {

    }
}
