<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Model\ResourceModel\Label\Grid;

use Robert\Labelproduct\Model\ResourceModel\Label\Collection as LabelCollection;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 */
class Collection extends AbstractCollection
{

    protected function _construct() {
        $this->_init('Robert\Labelproduct\Model\Label', 'Robert\Labelproduct\Model\ResourceModel\Label');  
    }
}
