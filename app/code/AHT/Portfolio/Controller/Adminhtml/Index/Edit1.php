<?php 

namespace AHT\Portfolio\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class Edit extends abAction {
    
    protected $pageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }
  
    public function execute()
    {
        // $id = $this->getRequest()->getParam('id');
        // $model = $this->_objectManager->create(\AHT\Portfolio\Model\Test::class);

        // if($id) {
        //     $model->load($id);
        //     if(!$model->getId()) {
        //         $this->messageManager->addErrorMessage(__('Không tồn tại'));
        //         $resultRedirect = $this->resultRedirectFactory->create();
        //         return $resultRedirect->setPath('*/*/');
        //     }

            $resultPage = $this->pageFactory->create();
            // $this->initPage($resultPage)->addBreadcrumb(
            //     $id ? __('Edit Portfolio') : __('New Portfolio'),
            //     $id ? __('Edit Portfolio') : __('New Portfolio')
            // );
            $resultPage->getConfig()->getTitle()->prepend(__('Portfolio'));
            // $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getTitle() : __('New Portfolio'));
            return $resultPage;
        }
    }
