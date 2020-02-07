<?php

namespace Learning\Demo\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements IdentityInterface
{
  const CACHE_TAG = 'learning_demo_post';
  protected $_cacheTag = 'learning_demo_post';
  protected $_eventPrefix = 'learning_demo_post';

  protected function _construct()
  {
    $this->_init('Learning\Demo\Model\ResourceModel\Post');
  }

  public function getIdentities()
  {
    return [self::CACHE_TAG . '_' . $this->getId()];
  }

  public function getDefaultValues()
  {
    $values = [];

    return $values;
  }
}