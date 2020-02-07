<?php

namespace Learning\Demo\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{
  public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
  {    
    $tableName = 'learning_demo_post';
    $installer = $setup;
    $installer->startSetup();

    if (!$installer->tableExists($tableName)) {
      $table = $installer->getConnection()->newTable($installer->getTable($tableName))
        ->addColumn('post_id', Table::TYPE_INTEGER, null, ['identity' => true, 'nullable' => false, 'primary'  => true, 'unsigned' => true], 'Post ID')
        ->addColumn('name', Table::TYPE_TEXT, 255, ['nullable' => false ], 'Post Name')
        ->addColumn('url_key', Table::TYPE_TEXT, 255, [], 'Post Url Key')
        ->addColumn('post_content', Table::TYPE_TEXT, '64k', [], 'Post Content')
        ->addColumn('tags', Table::TYPE_TEXT, 255, [], 'Post Tags')
        ->addColumn('status', Table::TYPE_INTEGER, 1, [], 'Post Status')
        ->addColumn('featured_image', Table::TYPE_TEXT, 255, [], 'Post Featured Image')
        ->addColumn('created_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'defalut' => Table::TIMESTAMP_INIT], 'Created At')
        ->addColumn('updated_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'defalut' => Table::TIMESTAMP_INIT], 'Updated At')
        ->setComment('Post Table');
    }

    $installer->getConnection()->createTable($table);

    // $installer->getConnection()->addIndex(
    //   $installer->getTable($tableName),
    //   $setup->getIdxName($installer->getTable($tableName), ['name', 'url_key', 'post_content', 'tags', 'featured_image'], AdapterInterface::INDEX_TYPE_FULLTEXT),
    //   ['name', 'url_key', 'post_content', 'tags', 'featured_image'],
    //   AdapterInterface::INDEX_TYPE_FULLTEXT
    // );

    $installer->endSetup();
  }
}