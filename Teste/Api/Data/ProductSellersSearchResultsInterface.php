<?php

namespace EOtica\Teste\Api\Data;

interface ProductSellersSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * @return \EOtica\Teste\Api\Data\ProductSellersInterface[]
     */
    public function getItems();

    /**
     * @param \EOtica\Teste\Api\Data\ProductSellersInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

