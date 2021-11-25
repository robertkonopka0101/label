<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

/**
 * Class Label
 */
class Label extends Container
{
    /**
     * @return void
     */
    protected function _construct(): void//@codingStandardsIgnoreLine
    {
        parent::_construct();

        $this->_labelGroup = 'Robert_Labelproduct';
        $this->_controller = 'adminhtml_label';
        $this->_headerText = __('Labels');
        $this->_addButtonLabel = __('Add New Label');
    }
}
