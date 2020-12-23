<?php 

namespace AHT\Portfolio\Controller\Adminhtml\Index;

class NewAction extends abAction {
    
    protected $forwardFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $forwardfactory
    )
    {
        $this->forwardFactory= $forwardfactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultForward = $this->forwardFactory->create();
        return $resultForward->forward('edit');

    }
}