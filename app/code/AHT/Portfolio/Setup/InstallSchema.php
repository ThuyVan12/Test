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
            );
            $installer->getConnection()->createTable($table);

            $table = $installer->getConnection()->newTable(
                $installer->getTable('portfolio_store')
                )
                ->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true, 
                        'unsigned' => true, 
                        'nullable' => false, 
                        'primary' => true
                    ],
                    'Portfolio Id'
                    )

                ->addColumn(
                    'store_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    [
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'Store Id'
                    )
                ->addForeignKey(
                    $installer->getFkName('portfolio_store', 'id', 'portfolio', 'id'),
                    'id',
                    $installer->getTable('portfolio'),
                    'id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE)
                ->addForeignKey(
                    $installer->getFkName('portfolio_store', 'store_id', 'store', 'store_id'),
                    'store_id',
                    $installer->getTable('store'),
                    'store_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE)
                ->setComment('portfolio Store');
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
        }
    }

}