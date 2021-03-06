<?php

class Admin_Page_Abstract extends CM_Page_Abstract {

    /** @var  Denkmal_Params */
    protected $_params;
    
    public function checkAccessible(CM_Frontend_Environment $environment) {
        if (!$environment->getViewer(true)->getRoles()->contains(Denkmal_Role::ADMIN)) {
            throw new CM_Exception_AuthRequired();
        }
    }
}
