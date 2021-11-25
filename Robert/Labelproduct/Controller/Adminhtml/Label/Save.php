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
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Robert\Labelproduct\Api\LabelRepositoryInterface;
use Robert\Labelproduct\Controller\Adminhtml\Label as LabelController;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Robert\Labelproduct\Model\Label;

/**
 * Class Save
 */
class Save extends LabelController implements HttpPostActionInterface
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param DataPersistorInterface $dataPersistor
     * @param LabelRepositoryInterface $labelRepository
     * @param Label $labelinterface
     */
    public function __construct(//@codingStandardsIgnoreLine
        Context $context,
        Registry $coreRegistry,
        DataPersistorInterface $dataPersistor,
        LabelRepositoryInterface $labelRepository,
        Label $labelinterface
    ) {
        parent::__construct($context, $coreRegistry, $labelRepository);

        $this->dataPersistor = $dataPersistor;
        $this->labelmodel = $labelinterface;
    }

    /**
     * Save action
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if ($data) {

            if (empty($data['label_id'])) {
                $data['label_id'] = null;
            }

            $id = $this->getRequest()->getParam('label_id');
            $model = $this->labelRepository->getModel();

            if ($id) {
                try {
                    $model = $this->labelRepository->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This label no longer exists.'));

                    return $resultRedirect->setPath('*/*/');
                }
            }

            $model->setData($data);

            try {
                $this->labelRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the label.'));
                $this->dataPersistor->clear('newlabels');

                return $this->processLabelReturn($model, $data, $resultRedirect);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the label.'));
            }

            $this->dataPersistor->set('newlabels', $data);

            return $resultRedirect->setPath('*/*/edit', ['label_id' => $id]);
        }

        return $resultRedirect->setPath('*/*/');
    }

    /**
     * Process and set the label return
     *
     * @param Label $model
     * @param array $data
     * @param ResultInterface $resultRedirect
     *
     * @return ResultInterface
     */
    private function processLabelReturn($model, $data, $resultRedirect)
    {
        $redirect = $data['back'] ?? 'close';

        if ($redirect === 'continue') {
            $resultRedirect->setPath('*/*/edit', ['label_id' => $model->getId()]);
        } elseif ($redirect === 'close') {
            $resultRedirect->setPath('*/*/');
        }

        return $resultRedirect;
    }
}
