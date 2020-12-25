<?php  

namespace AHT\Portfolio\Block;

class GetStore extends \Magento\Framework\View\Element\Template {

    protected $_storeManager;    

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Store\Model\StoreManagerInterface $storeManager,  
              
        array $data = []
    )
    {        
        $this->_storeManager = $storeManager;        
        parent::__construct($context, $data);
    }

    public function getStoreId()
    {
        return $this->_storeManager->getStore()->getId();
    }
}
