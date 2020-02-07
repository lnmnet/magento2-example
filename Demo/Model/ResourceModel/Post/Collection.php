<?php

namespace Learning\Demo\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
  protected $_idFieldName = 'post_id';
  protected $_eventPrefix = 'learning_demo_post_collection';
  protected $_eventObject = 'post_collection';

  protected function _construct()
  {
    $this->_init('Learning\Demo\Model\Post', 'Learning\Demo\Model\ResourceModel\Post');
  }
}