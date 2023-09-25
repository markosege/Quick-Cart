<?php


namespace George\QuickCart\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Store\Model\ScopeInterface;

class AddUpdateHandlesObserver implements ObserverInterface
{
    const XML_PATH_QUICKCART_ENABLED    = 'george_quick_cart/general/enable';

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->_scopeConfig =   $scopeConfig;
    }

    public function execute(Observer $observer)
    {
        $layout =   $observer->getData('layout');

        $currentHandles =   $layout->getUpdate()->getHandles();
        if(!in_array('default', $currentHandles)){
            return $this;
        }

        $isEnabled  =   $this->_scopeConfig->getValue(self::XML_PATH_QUICKCART_ENABLED, ScopeInterface::SCOPE_STORE);
        if($isEnabled){
            $layout->getUpdate()->addHandle('george_quickcart_sidebar');
        }
        return $this;
    }
}