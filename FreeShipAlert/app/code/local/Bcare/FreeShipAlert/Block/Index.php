<?php   
class Bcare_FreeShipAlert_Block_Index extends Mage_Core_Block_Template{
    private $min_val=60;
    public function _construct()
    {
        if(Mage::getStoreConfig('free_ship_alert/configurazioni/importo'))
        {
            $this->min_val=Mage::getStoreConfig('free_ship_alert/configurazioni/importo');
        }
        parent::_construct();
    }
    public function hasFreeShipping()
    {
        return (Mage::helper('checkout/cart')->getQuote()->getGrandTotal()>$this->getMinVal());
    }
    public function getAmountForFreeShipping()
    {
        return $this->getMinVal()-Mage::helper('checkout/cart')->getQuote()->getGrandTotal();
    }
    private function getMinVal()
    {
        return $this->min_val;
    }
}