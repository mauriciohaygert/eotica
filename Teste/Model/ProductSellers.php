<?php

namespace EOtica\Teste\Model;

use EOtica\Teste\Api\Data\ProductSellersInterface;
use EOtica\Teste\Api\Data\ProductSellersInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class ProductSellers extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'eotica_teste_product_sellers';
    protected $dataObjectHelper;

    protected $product_sellersDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ProductSellersInterfaceFactory $product_sellersDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \EOtica\Teste\Model\ResourceModel\ProductSellers $resource
     * @param \EOtica\Teste\Model\ResourceModel\ProductSellers\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ProductSellersInterfaceFactory $product_sellersDataFactory,
        DataObjectHelper $dataObjectHelper,
        \EOtica\Teste\Model\ResourceModel\ProductSellers $resource,
        \EOtica\Teste\Model\ResourceModel\ProductSellers\Collection $resourceCollection,
        array $data = []
    ) {
        $this->product_sellersDataFactory = $product_sellersDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * @return ProductSellersInterface
     */
    public function getDataModel()
    {
        $product_sellersData = $this->getData();
        
        $product_sellersDataObject = $this->product_sellersDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $product_sellersDataObject,
            $product_sellersData,
            ProductSellersInterface::class
        );
        
        return $product_sellersDataObject;
    }
}

