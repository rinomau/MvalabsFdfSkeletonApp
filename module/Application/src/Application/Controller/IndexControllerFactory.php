<?php

namespace Application\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface {

    /**
     * Default method to be used in a Factory Class
     * 
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
	    // dependency is fetched from Service Manager
	    $I_fdfService = $serviceLocator->getServiceLocator()->get('fdf');
                
	    // Controller is constructed, dependencies are injected (IoC in action)
	    return new IndexController($I_fdfService); 
		
	}

}