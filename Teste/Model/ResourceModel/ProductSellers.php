<?php

namespace EOtica\Teste\Model\ResourceModel;

class ProductSellers extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('eotica_teste_product_sellers', 'product_sellers_id');
    }
}

