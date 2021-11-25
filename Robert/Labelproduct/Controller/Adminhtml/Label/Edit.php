<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Controller\Adminhtml\Label;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Robert\Labelproduct\Api\LabelRepositoryInterface;
use Robert\Labelproduct\Api\Data\LabelInterface;
use Robert\Labelproduct\Controller\Adminhtml\Label;

/**
 * Class Edit
 */
class Edit extends Label implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param LabelRepositoryInterface $labelRepository
     * @param LabelInterface $labelinterface
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        LabelRepositoryInterface $labelRepository,
        LabelInterface $labelinterface
    ) {
        parent::__construct($context, $coreRegistry, $labelRepository);

        $this->resultPageFactory = $resultPageFactory;
        $this->labelmodel = $labelinterface;
    }

    /**
     * Edit label
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        // 1. Get ID
        $id = $this->getRequest()->getParam('label_id');
        $model = $this->labelmodel;

        // 2. Initial checking
        if ($id) {
            $model = $this->labelRepository->getById($id);

            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This label no longer exists.'));
                /** @var Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }

            $this->_coreRegistry->register('newlabels', $model);
        }

        // 5. Build edit form
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Label') : __('New Label'),
            $id ? __('Edit Label') : __('New Label')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Labels'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getName() : __('New Label'));

        return $resultPage;
    }
}
