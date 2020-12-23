<?php 

namespace AHT\Portfolio\Model; 

use Magento\Framework\App\ObjectManager;
use AHT\Portfolio\Model\FileInfo;
use Magento\Store\Model\StoreManagerInterface;

class Test extends \Magento\Framework\Model\AbstractModel  {

    protected $_storeManager;
    public function _construct(){
        $this->_init('AHT\Portfolio\Model\ResourceModel\Test');
    }
    public function getImageUrl($imageName = null)
    {
        $url = '';
        $image = $imageName;
        if (!$image) {
            $image = $this->getData('image');
        }
        if ($image) {
            if (is_string($image)) {
                $url = $this->_getStoreManager()->getStore()->getBaseUrl(
                    \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
                ).FileInfo::ENTITY_MEDIA_PATH .'/'. $image;
            } else {
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('Something went wrong while getting the image url.')
                );
            }
        }
        return $url;
    }

    private function _getStoreManager()
    {
        if ($this->_storeManager === null) {
            $this->_storeManager = ObjectManager::getInstance()->get(StoreManagerInterface::class);
        }
        return $this->_storeManager;
    }
}