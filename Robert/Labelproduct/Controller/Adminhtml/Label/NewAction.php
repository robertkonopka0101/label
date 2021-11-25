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
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Robert\Labelproduct\Api\LabelRepositoryInterface;
use Robert\Labelproduct\Controller\Adminhtml\Label;

/**
 * Class NewAction
 */
class NewAction extends Label implements HttpGetActionInterface
{
    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param ForwardFactory $resultForwardFactory
     * @param LabelRepositoryInterface $labelRepository
     */
    public function __construct(//@codingStandardsIgnoreLine
        Context $context,
        Registry $coreRegistry,
        ForwardFactory $resultForwardFactory,
        LabelRepositoryInterface $labelRepository
    ) {
        parent::__construct($context, $coreRegistry, $labelRepository);

        $this->resultForwardFactory = $resultForwardFactory;
    }

    /**
     * Create new label
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        /** @var Forward $resultForward */
        $resultForward = $this->resultForwardFactory->create();

        return $resultForward->forward('edit');
    }
}
