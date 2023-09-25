<?php


namespace George\QuickCart\Block;


use Magento\Store\Model\ScopeInterface;

class Template extends \Magento\Framework\View\Element\Template
{
    public function getConfigValues($group, $field)
    {
        return $this->_scopeConfig->getValue('george_quick_cart/' . $group . '/' . $field, ScopeInterface::SCOPE_STORE);
    }
}