<?php

namespace EOtica\Teste\Model\Data;

use EOtica\Teste\Api\Data\ProductSellersInterface;

class ProductSellers extends \Magento\Framework\Api\AbstractExtensibleObject implements ProductSellersInterface
{

    /**
     * @return string|null
     */
    public function getProductSellersId()
    {
        return $this->_get(self::PRODUCT_SELLERS_ID);
    }

    /**
     * @param string $productSellersId
     * @return \EOtica\Teste\Api\Data\ProductSellersInterface
     */
    public function setProductSellersId($productSellersId)
    {
        return $this->setData(self::PRODUCT_SELLERS_ID, $productSellersId);
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * @param string $name
     * @return \EOtica\Teste\Api\Data\ProductSellersInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @return \EOtica\Teste\Api\Data\ProductSellersExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @param \EOtica\Teste\Api\Data\ProductSellersExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \EOtica\Teste\Api\Data\ProductSellersExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * @return string|null
     */
    public function getPhone()
    {
        return $this->_get(self::PHONE);
    }

    /**
     * @param string $phone
     * @return \EOtica\Teste\Api\Data\ProductSellersInterface
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * @return string|null
     */
    public function getProductId()
    {
        return $this->_get(self::PRODUCT_ID);
    }

    /**
     * @param string $productId
     * @return \EOtica\Teste\Api\Data\ProductSellersInterface
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }
}

