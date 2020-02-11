<?php

namespace Learning\Demo\Model\Post;

use Learning\Demo\Model\ResourceModel\Post\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
  /**
   * @var Collection
   */
  protected $collection;

  /**
   * @var array
   */
  protected $loadedData;

  /**
   * @var DataPersistorInterface
   */
  protected $dataPersistor;

  public function __construct(
    $name,
    $primaryFieldName,
    $requestFieldName,
    CollectionFactory $collectionFactory,
    DataPersistorInterface $dataPersistor,
    array $meta = [],
    array $data = []
  )
  {
    $this->collection = $collectionFactory->create();
    $this->dataPersistor = $dataPersistor;
    parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
  }

  public function getData() 
  {
    if (isset($this->loadedData)) {
      return $this->loadedData;
    }

    $items = $this->collection->getItems();

echo 'dataPrivoid::getData.....';
var_dump($items);    

    foreach ($items as $item) {
      $this->loadedData[$item->getId()] = $item->getData();
    }

    $data = $this->dataPersistor->get('learning_demo');
    if (!empty($data)) {
      $post = $this->collection->getNewEmptyItem();
      $post->setData($data);
      $this->loadedData[$post->getId()] = $post->getData();
      $this->dataPersistor->clear('learning_demo');
    }

    return $this->loadedData;
  }
}