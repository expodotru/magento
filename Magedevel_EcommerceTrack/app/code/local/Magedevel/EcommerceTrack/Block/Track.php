<?php
class Magedevel_EcommerceTrack_Block_Track extends Mage_Core_Block_Template{
    private $_order=null;
    public function getOrder(){
        if(!$this->_order){
            $this->_orderInit();
        }
        return $this->_order;
    }

    public function getShippingAddress(){
        if(!$this->_order){
            $this->_orderInit();
        }
        $this->_order->getShippingAddress();
    }
    private function _orderInit(){
        $order_id=Mage::getSingleton('checkout/session')->getLastOrderId();
        $order=Mage::getModel('sales/order')->load($order_id);
        // this is for loading the order items name
        foreach($order->getAllItems() as $items) {
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