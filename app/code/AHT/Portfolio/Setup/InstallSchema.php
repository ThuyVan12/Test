<?php

namespace AHT\Portfolio\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface {

    function install (SchemaSetupInterface $setup,ModuleContextInterface $context ) 
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('portfolio')) {
            $table = $installer->getConnection()->newTable( 
                $installer->getTable('portfolio')
            )
            ->addColumn(
                'id',
                 \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                 null,
                 [
                    'identity' => true,
                    'nullable' => false,
                    'primary' => true,
                    'unsigned' => true,
                 ],
                 'ID'
            )
            ->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [
                    'nullable' => false,
                ],
                'Title'
            )
            -> addColumn(
                'image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [
                    'nullable' => false
                ],
                'Image'
            )
            ->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [
                   ' nullable'=>true

                ],
                'Description'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => true,
                    'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT
                ],
                'Created at'

            )
            ->addColumn(
                'update_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => true,
                    'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE
                ],
                'Update Time'
            )
            -> addColumn(
                'store_view',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [
                    'nullable' => true,
                ],
                'Store View'
            )
            ->setComment('AHT Test Module');
            $installer->getConnection()->createTable($table);

        }
    }

}