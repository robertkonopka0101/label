<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Block\Adminhtml\Label\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @inheritDoc
     */
    public function getButtonData()
    {
        $data = [];

        if ($this->getLabelId()) {
            $data = [
                'label' => __('Delete Label'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\', {"data": {}})',
                  'sort_order' => 20,
                ];
        }

        return $data;
    }

    /**
     * URL to send delete request.
     *
     * @return string
     */
    public function getDeleteUrl(): string
    {
        return $this->getUrl('*/*/delete', ['label_id' => $this->getLabelId()]);
    }
}
