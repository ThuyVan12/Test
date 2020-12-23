<?php

namespace AHT\Portfolio\Model\ResourceModel\Test;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        return $this->_init('AHT\Portfolio\Model\Test', 'AHT\Portfolio\Model\ResourceModel\Test');
        
    }

}