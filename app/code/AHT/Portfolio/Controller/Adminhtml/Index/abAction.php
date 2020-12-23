<?php
namespace AHT\Portfolio\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

abstract class abAction extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'AHT_Portfolio::list';

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('AHT_Portfolio::menu')
            ->addBreadcrumb(__('Portfolio'), __('Portfolio'));
        return $resultPage;
    }
}