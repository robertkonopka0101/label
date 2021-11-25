<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Api;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Robert\Labelproduct\Api\Data\LabelInterface;

/**
 * label CRUD interface.
 * 
 */
interface LabelRepositoryInterface
{
    /**
     * Save label.
     *
     * @param LabelInterface $label
     * @return LabelInterface
     * @throws LocalizedException
     */
    public function save(LabelInterface $label);

    /**
     * Retrieve label by id
     *
     * @param int $labelId
     * @return LabelInterface
     * @throws LocalizedException
     */
    public function getById($labelId);

    /**
     * Delete label.
     *
     * @param LabelInterface $label
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(LabelInterface $label);

    /**
     * Delete label by ID.
     *
     * @param int $labelId
     * @return bool true on success
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById($labelId);
}
