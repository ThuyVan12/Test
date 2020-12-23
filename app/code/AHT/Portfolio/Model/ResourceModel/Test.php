<?php 

namespace AHT\Portfolio\Model\ResourceModel;

class Test extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
        
    }
    public function _construct()
    {
        return $this->_init("portfolio","id");
        
    }

}