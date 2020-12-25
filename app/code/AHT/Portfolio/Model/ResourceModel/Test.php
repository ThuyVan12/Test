<?php 

namespace AHT\Portfolio\Model\ResourceModel;

use Magento\Framework\Model\AbstractModel;
use Magento\Store\Model\Store;


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
    
    protected function _getLoadSelect($field, $value, $object)
    {

        $field = $this->getConnection()->quoteIdentifier(sprintf('%s.%s', $this->getMainTable(), $field));
        $select = $this->getConnection()
            ->select()
            ->from($this->getMainTable())
            ->where($field. '=?', $value)
            ->join('portfolio_store',
            'portfolio.id = portfolio_store.id',
            [
                'store_id'
            ]);
        return $select;
    }
    
    protected function _afterSave(\Magento\Framework\Model\AbstractModel $object)
    {   
        $oldStores = $this->lookupStoreIds($object->getId());
        $newStores = (array)$object->getStores();
        if (empty($newStores)) {
            $newStores = (array)$object->getStoreId();
        }
        $table = $this->getTable('portfolio_store');
        $insert = array_diff($newStores, $oldStores);
        $delete = array_diff($oldStores, $newStores);
        if ($delete) {
            $where = ['id = ?' => (int)$object->getId(), 'store_id IN (?)' => $delete];
            $this->getConnection()->delete($table, $where);
        }
        if ($insert) {
            $data = [];
            foreach ($insert as $storeId) {
                $data[] = ['id' => (int)$object->getId(), 'store_id' => (int)$storeId];
            }
            $this->getConnection()->insertMultiple($table, $data);
        }
        return parent::_afterSave($object);
    }
    public function lookupStoreIds($postId)
    {
        $connection = $this->getConnection();
        $select = $connection->select()->from(
            $this->getTable('portfolio_store'),
            'store_id'
        )->where(
            'id = ?',
            (int)$postId
        );
        return $connection->fetchCol($select);
    }


}