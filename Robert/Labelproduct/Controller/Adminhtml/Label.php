<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Registry;
use Robert\Labelproduct\Api\LabelRepositoryInterface;

/**
 * Abstract Class Label
 */
abstract class Label extends Action
{
    public const ADMIN_RESOURCE = 'Robert_Labelproduct::label';

    /**
     * Core registry
     *
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * label Repository
     *
     * @var LabelRepositoryInterface
     */
    protected $labelRepository;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param LabelRepositoryInterface $labelRepository
     */
    public function __construct(Context $context, Registry $coreRegistry, LabelRepositoryInterface $labelRepository)//@codingStandardsIgnoreLine
    {
        parent::__construct($context);

        $this->_coreRegistry = $coreRegistry;
        $this->labelRepository = $labelRepository;
    }

    /**
     * Init page
     *
     * @param Page $resultPage
     * @return Page
     */
    protected function initPage($resultPage): Page
    {
        $resultPage->setActiveMenu('Robert_Labelproduct::newlabels')
            ->addBreadcrumb(__('Labels'), __('Labels'))
            ->addBreadcrumb(__('Labels'), __('Labels'));

        return $resultPage;
    }
}
