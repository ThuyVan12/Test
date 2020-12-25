<?php

namespace AHT\Portfolio\Model\ResourceModel\Test;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

     /**

     * @var string $_idFieldName

     */

    protected $_idFieldName = 'id';

    public function _construct()
    {
        return $this->_init('AHT\Portfolio\Model\Test', 'AHT\Portfolio\Model\ResourceModel\Test');

    }

    protected function _initSelect()
    {
        $this->addFilterToMap('id', 'portfolio.id');
        // parent::_initSelect();
        $this->getSelect()
            ->from(['portfolio' => $this->getMainTable()])
            ->join('portfolio_store',
                'portfolio.id = portfolio_store.id',
                [
                    'store_id'
                ]);
        return $this;
    }

}
