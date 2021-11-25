<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Api\Data;

/**
 * label interface.
 *
 */
interface LabelInterface
{
    /**
     * Constants for keys of data array.
     */
    public const LABEL_ID = 'label_id';
    public const LABEL_TEXT = 'label_text';
    public const OPTIONS = 'options';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get label text
     *
     * @return string
     */
    public function getLabelText();

    /**
     * Get options
     *
     * @return int
     */
    public function getOptions();

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return LabelInterface
     */
    public function setId($id);

    /**
     * Set Label Text
     *
     * @param string $labelText
     *
     * @return LabelInterface
     */
    public function setLabelText($labelText);

    /**
     * Set options
     *
     * @param string $options
     *
     * @return LabelInterface
     */
    public function setOptions($options);
}
