<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Model;

use Exception;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\TemporaryState\CouldNotSaveException;
use Robert\Labelproduct\Api\LabelRepositoryInterface;
use Robert\Labelproduct\Api\Data\LabelInterfaceFactory;
use Robert\Labelproduct\Model\ResourceModel\Label as ResourceLabel;
use Robert\Labelproduct\Api\Data\LabelInterface;
use Robert\Labelproduct\Api\Data\LabelInterface as Label;

/**
 * Class LabelRepository
 */
class LabelRepository implements LabelRepositoryInterface
{
    /**
     * @var ResourceLabel
     */
    protected $resource;

    /**
     * @var Label
     */
    protected $label;

    /**
     * @param ResourceLabel $resource
     * @param Label $label
     */
    public function __construct(//@codingStandardsIgnoreLine
        ResourceLabel $resource,
        Label $label
    ) {
        $this->resource = $resource;
        $this->label = $label;
    }

    /**
     * Save Label data
     *
     * @param LabelInterface $label
     * @return LabelInterface
     * @throws CouldNotSaveException
     */
    public function save(LabelInterface $label): LabelInterface
    {
        try {
            $this->resource->save($label);
        } catch (Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $label;
    }

    /**
     * Load Label data by Label ID
     *
     * @param string $labelId
     * @return LabelInterface
     * @throws NoSuchEntityException
     */
    public function getById($labelId): LabelInterface
    {
        $label = $this->label;
        $this->resource->load($label, $labelId);

        if (!$label->getId()) {
            throw new NoSuchEntityException(__('The CMS label with the "%1" ID doesn\'t exist.', $labelId));
        }

        return $label;
    }

    /**
     * Delete Label
     *
     * @param LabelInterface $label
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(LabelInterface $label): bool
    {
        try {
            $this->resource->delete($label);
        } catch (Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * Delete Label by ID
     *
     * @param string $labelId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($labelId): bool
    {
        return $this->delete($this->getById($labelId));
    }

    /**
     * Get Label Model
     *
     * @return LabelInterface
     */
    public function getModel(): LabelInterface
    {
        $label = $this->label;
        return $label;
    }
}
