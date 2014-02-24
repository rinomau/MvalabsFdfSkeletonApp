<?php

namespace Fdf\Service;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

class FdfServiceFactory implements FactoryInterface {

	public function createService(ServiceLocatorInterface $serviceLocator) {
        
        // Dependencies are fetched from Service Manager

        return new FdfService();
		
	}
        

}