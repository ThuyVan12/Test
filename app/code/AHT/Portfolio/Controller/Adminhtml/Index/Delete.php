<?php
namespace AHT\Portfolio\Controller\Adminhtml\Index;

class Delete extends \Magento\Backend\App\Action
{
  
    const ADMIN_RESOURCE = 'AHT_Portfolio::list_delete';

   
    public function execute()
    {
        
        $portfolioId = (int)$this->getRequest()->getParam('id');

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($portfolioId && (int) $portfolioId > 0) {
            try {
                $model = $this->_objectManager->create('AHT\Portfolio\Model\Test');
                $model->load($portfolioId);
                $model->delete();
                $this->messageManager->addSuccess(__('The Portfolio has been deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/index');
            }
        } 
        $this->messageManager->addError(__('Portfolio doesn\'t exist any longer.'));
        return $resultRedirect->setPath('*/*/index');
    }
}