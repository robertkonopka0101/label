<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Model\ResourceModel;

use Exception;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Robert\Labelproduct\Api\Data\LabelInterface;

/**
 * Class Label
 */
class Label extends AbstractDb
{

    /**
     * @param Context $context
     * @param string $connectionName
     */
    public function __construct(//@codingStandardsIgnoreLine
        Context $context,
        $connectionName = null
    ) {
        parent::__construct($context, $connectionName);
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct(): void//@codingStandardsIgnoreLine
    {
        $this->_init('newlabels', 'label_id');
    }
}
