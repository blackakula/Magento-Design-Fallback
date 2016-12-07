<?php
class SKyrychenko_Design_Block_Adminhtml_System_Config_Form_Field_Fallback extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
    public function __construct()
    {
        $this->addColumn('package', array(
            'label' => Mage::helper('skyrychenko_design')->__('Package'),
            'style' => 'width:120px',
        ));
        $this->addColumn('theme', array(
            'label' => Mage::helper('skyrychenko_design')->__('Theme'),
            'style' => 'width:120px',
        ));
        $this->addColumn('fallback', array(
            'label' => Mage::helper('skyrychenko_design')->__('Fallback Theme'),
            'style' => 'width:120px',
        ));
        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('adminhtml')->__('Add Fallback');
        parent::__construct();
    }
}
