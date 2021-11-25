<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Model;

use Robert\Labelproduct\Api\Data\LabelInterface;
use Robert\Labelproduct\Model\ResourceModel\Label as LabelResource;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Label
 */
class Label extends AbstractModel implements LabelInterface, IdentityInterface
{
    /**
     * label cache tag
     */
    protected const CACHE_TAG = 'labels_b';


    /**#@-*/
    protected $_cacheTag = self::CACHE_TAG;//@codingStandardsIgnoreLine

    /**
     * Construct.
     *
     * @return void
     */
    protected function _construct()//@codingStandardsIgnoreLine
    {
        $this->_init(LabelResource::class);
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities(): array
    {
        return [
            self::CACHE_TAG . '_' . $this->getId()
        ];
    }

    /**
     * Retrieve label id
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getData(LabelInterface::LABEL_ID);
    }

    /**
     * Retrieve label name
     *
     * @return string|null
     */
    public function getLabelText(): ?string
    {
        return $this->getData(LabelInterface::LABEL_TEXT);
    }

    /**
     * Retrieve label parent id
     *
     * @return int|null
     */
    public function getOptions(): ?int
    {
        return $this->getData(LabelInterface::OPTIONS);
    }

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return LabelInterface
     */
    public function setId($id): LabelInterface
    {
        return $this->setData(LabelInterface::LABEL_ID, $id);
    }

    /**
     * Set name
     *
     * @param string $labeltext
     *
     * @return LabelInterface
     */
    public function setLabelText($labeltext): LabelInterface
    {
        return $this->setData(LabelInterface::LABEL_TEXT, $labeltext);
    }

    /**
     * Set Options
     *
     * @param int $options
     *
     * @return LabelInterface
     */
    public function setOptions($options): LabelInterface
    {
        return $this->setData(LabelInterface::OPTIONS, $options);
    }
}
