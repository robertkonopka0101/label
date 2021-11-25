<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Model\ResourceModel\Label;

use Magento\Store\Model\Store;
use Magento\Framework\DataObject;
use Robert\Labelproduct\Api\Data\LabelInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection as AbstractCollectionDb;
use Robert\Labelproduct\Model\ResourceModel\Label as LabelResource;
use Robert\Labelproduct\Model\Label;

/**
 * Class Collection
 */
class Collection extends AbstractCollectionDb
{
    /**
     * @var string
     */
    protected $_idFieldName = 'label_id';//@codingStandardsIgnoreLine

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct(): void//@codingStandardsIgnoreLine
    {
        $this->_init(Label::class, LabelResource::class);
    }

    /**
     * Returns pairs label_id - label_text
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return $this->_toOptionArray('label_id', 'label_text');
    }
}
