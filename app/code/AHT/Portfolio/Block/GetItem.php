<?php 

namespace AHT\Portfolio\Block ;

use Magento\Framework\View\Element\Template;

class GetItem extends Template {

    protected $collection;

    public function __construct(
       \Magento\Framework\View\Element\Template\Context $context,
       \AHT\Portfolio\Model\ResourceModel\Test\CollectionFactory $collection
    )
    {
        parent::__construct($context); 
        $this->collection = $collection;
    }

    public function getI()
    {
        $result = $this->collection->create();
        return $result;
    }

}