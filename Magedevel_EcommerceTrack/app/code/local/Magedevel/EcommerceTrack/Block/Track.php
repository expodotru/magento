<?php
class Magedevel_EcommerceTrack_Block_Track extends Mage_Core_Block_Template{
    private $_order=null;
    public function getOrder(){
        if(!$this->_order){
            $this->_orderInit();
        }
        return $this->_order;
    }
    public function doTest(){
        return "test";
    }
    public function getShippingAddress(){
        if(!$this->_order){
            $this->_orderInit();
        }

        return $this->_order->getShippingAddress();
    }
    private function _orderInit(){
        $order_id=Mage::getSingleton('checkout/session')->getLastOrderId();
        $this->_order=Mage::getModel('sales/order')->load($order_id);
        // this is for loading the order items name
        foreach($this->_order->getAllItems() as $items) {
            $items->getName();
        }
    }
    public function getAnalyticsAccount(){
        return Mage::getStoreConfig('ecommercetrack/configuration/accountid');
    }
    public function getStoreName(){
        return Mage::getStoreConfig('ecommercetrack/configuration/storename');
    }
}