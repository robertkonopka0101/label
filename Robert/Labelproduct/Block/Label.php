<?php

/**
 * @author      Robert Konopka <robcikwe@o2.pl>
 * @category    Robert/Labelproduct
 * @package     Robert
 * @date        2021
 * @copyright   Copyright (C) 2021 Robert Konopka
 */

namespace Robert\Labelproduct\Block;

use Magento\Framework\View\Element\Template;
use Robert\Labelproduct\Model\LabelRepository;
use Robert\Labelproduct\Model\ResourceModel\Label\Collection;

/**
 * Class Label
 */
class Label extends Template
{
    /**
     * @return void
     */
    protected function __construct(\Magento\Framework\View\Element\Template\Context $context, LabelRepository $labelrepo, Collection $collection, array $data = [])//@codingStandardsIgnoreLine
    {
        parent::__construct($context, $data);

        $this->labelRepo = $labelrepo;
        $this->collection = $collection;
    }

    public function getLabels() {
      
      $kolekcja = $this->collection;

      return $kolekcja;
    }

    public function getRepo() {

      $labelRepos = $this->labelRepo;

      return $labelRepos;
    }
}
