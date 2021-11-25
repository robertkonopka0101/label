<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Controller\Adminhtml\Label;

use Exception;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Robert\Labelproduct\Controller\Adminhtml\Label;
use Robert\Labelproduct\Api\Data\LabelInterface;

/**
 * Class Delete
 */
class Delete extends Label implements HttpPostActionInterface
{
    /**
     * Delete action
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('label_id');

        if ($id) {
            try {
                // init model and delete
                $model = $this->labelRepository->getById($id);
                $this->labelRepository->delete($model);
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the label.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['label_id' => $id]);
            }
        }

        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a label to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
