<?php

namespace EOtica\Teste\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ProductSellersRepositoryInterface
{

    /**
     * Save product_sellers
     * @param \EOtica\Teste\Api\Data\ProductSellersInterface $productSellers
     * @return \EOtica\Teste\Api\Data\ProductSellersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \EOtica\Teste\Api\Data\ProductSellersInterface $productSellers
    );

    /**
     * Retrieve product_sellers
     * @param string $productSellersId
     * @return \EOtica\Teste\Api\Data\ProductSellersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($productSellersId);

    /**
     * Retrieve product_sellers matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \EOtica\Teste\Api\Data\ProductSellersSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete product_sellers
     * @param \EOtica\Teste\Api\Data\ProductSellersInterface $productSellers
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \EOtica\Teste\Api\Data\ProductSellersInterface $productSellers
    );

    /**
     * Delete product_sellers by ID
     * @param string $productSellersId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($productSellersId);
}

