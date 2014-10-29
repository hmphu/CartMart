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

$roleCollection = Mage::getModel('admin/roles')
        ->getCollection()
        ->addFieldToFilter('role_name', OpenWriter_Cartmart_Model_Vendor::ROLE);

if ($roleCollection->count() == 0) {
    $role = Mage::getModel('admin/roles')
            ->setName(OpenWriter_Cartmart_Model_Vendor::ROLE)
            ->setRoleType(OpenWriter_Cartmart_Model_Vendor::ROLE_TYPE)
            ->save();

    Mage::getModel('admin/rules')
            ->setRoleId($role->getId())
            ->setResources(array('admin/catalog', 'admin/catalog/products', 'admin/system', 'admin/system/myaccount', 'admin/vendor', 'admin/vendor/orders', 'admin/vendor/transaction', 'admin/vendor/review'))
            ->saveRel();
}

?>
