<?php


namespace George\QuickCart\Helper;


use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
    * @var StoreManagerInterface
    */
    protected $_storeManager;

    /**
     * @var array
     */
    protected $_quickCartOptions;

    /**
     * Data constructor
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager)
    {
        parent::__construct($context);
        $this->_storeManager    = $storeManager;
        $this->_quickCartOptions    =   $this->scopeConfig->getValue('george_quick_cart', ScopeInterface::SCOPE_STORE);
    }

    /**
     * Check Quick cart is enabled
     * @return array
     */
    public function quickCartIsEnabled()
    {
        return  $this->scopeConfig->getValue('george_quick_cart/general/enable', ScopeInterface::SCOPE_STORE);
    }

    /**
     * Check mini cart open
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function openMiniCart()
    {
        if($this->quickCartIsEnabled())
        {
            return $this->scopeConfig->getValue('george_quick_cart/general/open_minicart', ScopeInterface::SCOPE_STORE, $this->getStoreId());
        }
    }

    /**
     * @return int
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getStoreId()
    {
        return $this->_storeManager->getStore()->getId();
    }

    /**
     * @param int $storeId
     * @return mixed
     */
    public function getHeaderHeight($storeId = 0)
    {
        if($storeId)
        {
            return $this->scopeConfig->getValue('george_quick_cart/header/header_height', ScopeInterface::SCOPE_STORE, $storeId);
        }
        else{
            return $this->_quickCartOptions['header']['header_height'];
        }
    }

    /**
     * @param int $storeId
     * @return mixed
     */

    public function getHeaderBackground($storeId = 0 )
    {
        if($storeId){
            return$this->scopeConfig->getValue('george_quick_cart/header/header_background', ScopeInterface::SCOPE_STORE, $storeId);
        }
        else{
            return $this->_quickcartOptions['header']['header_background'];
        }
    }

    /**
     * @param int $storeId
     * @return mixed
     */

    public function getHeaderTextColor($storeId = 0)
    {
        if($storeId){
            return $this->scopeConfig->getValue('george_quick_cart/header/header_text_color', ScopeInterface::SCOPE_STORE, $storeId);
        }
        else{

            return $this->_quickcartOptions['header']['header_text_color'];
        }
    }

    /**
     * @param int $storeId
     * @return mixed
     */

    public function getSubtotalBackground($storeId = 0 )
    {
        if($storeId){
            return $this->scopeConfig->getValue('george_quick_cart/footer/subtotal_background', ScopeInterface::SCOPE_STORE, $storeId);
        }
        else{
            return $this->_quickcartOptions['footer']['subtotal_background'];
        }
    }
    /**
     * @param int $storeId
     * @return mixed
     */

    public function getSubtotalTextColor($storeId = 0 )
    {
        if($storeId){
            return $this->scopeConfig->getValue('george_quick_cart/footer/subtotal_text_color', ScopeInterface::SCOPE_STORE, $storeId);
        }
        else{
            return $this->_quickcartOptions['footer']['subtotal_text_color'];
        }
    }
}