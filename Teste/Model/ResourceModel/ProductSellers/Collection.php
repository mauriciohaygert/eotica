<?php

namespace EOtica\Teste\Model\ResourceModel\ProductSellers;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'product_sellers_id';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \EOtica\Teste\Model\ProductSellers::class,
            \EOtica\Teste\Model\ResourceModel\ProductSellers::class
        );
    }
}

