<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Block\Adminhtml\Label\Edit;

use Magento\Backend\Block\Widget\Context;
use Robert\Labelproduct\Api\LabelRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var LabelRepositoryInterface
     */
    protected $labelRepository;

    /**
     * @param Context $context
     * @param LabelRepositoryInterface $labelRepository
     */
    public function __construct(
        Context $context,
        LabelRepositoryInterface $labelRepository
    ) {
        $this->context = $context;
        $this->labelRepository = $labelRepository;
    }

    /**
     * Return label ID
     *
     * @return int|null
     */
    public function getLabelId(): ?int
    {
        try {
            $this->context->getRequest()->getParam('label_id');
        } catch (NoSuchEntityException $e) {
        }

        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl($route = '', $params = []): string
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
