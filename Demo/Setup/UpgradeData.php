<?php

namespace Learning\Demo\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Learning\Demo\Model\PostFactory;

class UpgradeData implements UpgradeDataInterface
{
  protected $_postFactory;
  
  public function __construct(PostFactory $postFactory)
  {
    $this->_postFactory = $postFactory;
  }


  public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $content)
  {
    if (version_compare($content->getVersion(), '1.2.0', '<')) {
      $data = [
        'name'         => "How to Create SQL Setup Script in Magento 2",
        'post_content' => "In this article, we will find out how to install and upgrade sql script for module in Magento 2. When you install or upgrade a module, you may need to change the database structure or add some new data for current table. To do this, Magento 2 provide you some classes which you can do all of them.",
        'url_key'      => '/magento-2-module-development/magento-2-how-to-create-sql-setup-script.html',
        'tags'         => 'magento 2,mageplaza helloworld',
        'status'       => 1
      ];
      $post = $this->_postFactory->create();
      $post->addData($data)->save();
    }
  }
}