<?php

namespace EOtica\Teste\Api\Data;

interface ProductSellersInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const PRODUCT_SELLERS_ID = 'product_sellers_id';
    const NAME = 'name';
    const PHONE = 'phone';
    const PRODUCT_ID = 'product_id';

    /**
     * @return string|null
     */
    public function getProductSellersId();

    /**
     * @param string $productSellersId
     * @return \EOtica\Teste\Api\Data\ProductSellersInterface
     */
    public function setProductSellersId($productSellersId);

    /**
     * @return string|null
     */
    public function getName();

    /**
     * @param string $name
     * @return \EOtica\Teste\Api\Data\ProductSellersInterface
     */
    public function setName($name);

    /**
     * @return \EOtica\Teste\Api\Data\ProductSellersExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * @param \EOtica\Teste\Api\Data\ProductSellersExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \EOtica\Teste\Api\Data\ProductSellersExtensionInterface $extensionAttributes
    );

    /**
     * @return string|null
     */
    public function getPhone();

    /**
     * @param string $phone
     * @return \EOtica\Teste\Api\Data\ProductSellersInterface
     */
    public function setPhone($phone);

    /**
     * @return string|null
     */
    public function getProductId();

    /**
     * @param string $productId
     * @return \EOtica\Teste\Api\Data\ProductSellersInterface
     */
    public function setProductId($productId);
}

