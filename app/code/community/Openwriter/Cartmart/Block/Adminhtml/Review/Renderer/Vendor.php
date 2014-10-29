<?php
/**
 * OpenWriter Cartmart
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Team
 * that is bundled with this package of OpenWriter.
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This package designed for Magento COMMUNITY edition
 * Contact us Support does not guarantee correct work of this package
 * on any other Magento edition except Magento COMMUNITY edition.
 * =================================================================
 * 
 * @category    OpenWriter
 * @package     OpenWriter_Cartmart
**/
class OpenWriter_Cartmart_Block_Adminhtml_Review_Renderer_Vendor extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return $this->_getValue($row);
    }

    protected function _getValue(Varien_Object $row)
    {      
        $value = $row->getData($this->getColumn()->getIndex());
		$invoiceItemModel = Mage::getModel('sales/order_invoice_item')->load($value);       
        $productModel = Mage::getModel('catalog/product')->load($invoiceItemModel->getProductId());      
        $userModel = Mage::getModel('admin/user')->load($productModel->getVendor());
        return $userModel->getName();
    }
}
?>
