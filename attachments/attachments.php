<?php
 class Attachments extends Module
 {

    public function __construct()
    {
        $this->name = 'attachments';
        $this->author  = 'Bay20';
        $this->version = '1.0.0';
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('PDFAttachments');
        $this->description = $this->l('This is part of Prestashop module development');
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' =>'1.7.9.9');
    }

    public function install()
    {
        return parent::install()
        && $this->registerHook('displayAdminProductsExtra')
        && $this->registerHook('displayAfterProductThumb')
        && $this->registerHook('displayAfterDescription')
        ;
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayAdminProductsExtra() {
        $this->context->smarty->assign(array(

        ));
        return $this->display(__FILE__, 'views/templates/admin/attachments.tpl');
    }

    public function hookDisplayAfterProductThumbs()
    {
    
        return 'hello';
    }

    public function hookDisplayAfterDescription()
    {
        return 'Good';
    }

}
