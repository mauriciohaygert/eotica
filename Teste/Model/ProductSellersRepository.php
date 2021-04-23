<?php

declare(strict_types=1);

namespace EOtica\Teste\Model;

use EOtica\Teste\Api\Data\ProductSellersInterfaceFactory;
use EOtica\Teste\Api\Data\ProductSellersSearchResultsInterfaceFactory;
use EOtica\Teste\Api\ProductSellersRepositoryInterface;
use EOtica\Teste\Model\ResourceModel\ProductSellers as ResourceProductSellers;
use EOtica\Teste\Model\ResourceModel\ProductSellers\CollectionFactory as ProductSellersCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class ProductSellersRepository implements ProductSellersRepositoryInterface
{

    protected $extensibleDataObjectConverter;
    protected $resource;

    protected $productSellersCollectionFactory;

    protected $searchResultsFactory;

    private $storeManager;

    protected $productSellersFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;

    protected $dataProductSellersFactory;


    /**
     * @param ResourceProductSellers $resource
     * @param ProductSellersFactory $productSellersFactory
     * @param ProductSellersInterfaceFactory $dataProductSellersFactory
     * @param ProductSellersCollectionFactory $productSellersCollectionFactory
     * @param ProductSellersSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceProductSellers $resource,
        ProductSellersFactory $productSellersFactory,
        ProductSellersInterfaceFactory $dataProductSellersFactory,
        ProductSellersCollectionFactory $productSellersCollectionFactory,
        ProductSellersSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->productSellersFactory = $productSellersFactory;
        $this->productSellersCollectionFactory = $productSellersCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataProductSellersFactory = $dataProductSellersFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    public function save(
        \EOtica\Teste\Api\Data\ProductSellersInterface $productSellers
    ) {
        /* if (empty($productSellers->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $productSellers->setStoreId($storeId);
        } */
        
        $productSellersData = $this->extensibleDataObjectConverter->toNestedArray(
            $productSellers,
            [],
            \EOtica\Teste\Api\Data\ProductSellersInterface::class
        );
        
        $productSellersModel = $this->productSellersFactory->create()->setData($productSellersData);
        
        try {
            $this->resource->save($productSellersModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the productSellers: %1',
                $exception->getMessage()
            ));
        }
        return $productSellersModel->getDataModel();
    }

    public function get($productSellersId)
    {
        $productSellers = $this->productSellersFactory->create();
        $this->resource->load($productSellers, $productSellersId);
        if (!$productSellers->getId()) {
            throw new NoSuchEntityException(__('product_sellers with id "%1" does not exist.', $productSellersId));
        }
        return $productSellers->getDataModel();
    }

    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->productSellersCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \EOtica\Teste\Api\Data\ProductSellersInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    public function delete(
        \EOtica\Teste\Api\Data\ProductSellersInterface $productSellers
    ) {
        try {
            $productSellersModel = $this->productSellersFactory->create();
            $this->resource->load($productSellersModel, $productSellers->getProductSellersId());
            $this->resource->delete($productSellersModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the product_sellers: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    public function deleteById($productSellersId)
    {
        return $this->delete($this->get($productSellersId));
    }
}

