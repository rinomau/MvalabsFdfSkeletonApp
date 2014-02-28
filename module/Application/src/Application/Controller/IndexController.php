<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    private $I_fdfService;
    
    public function __construct($I_fdfService) {
        $this->I_fdfService = $I_fdfService;
    }
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function fdfTestAction(){
        $messages[] = $this->I_fdfService->test();
        
        $this->I_fdfService->setFdfFilePath('/cippalippa');
        $messages[] = $this->I_fdfService->test();
        
        $this->I_fdfService->setPdfFilePath('/antani');
        $messages[] = $this->I_fdfService->test();
        
        return new ViewModel(array('as_messages' => $messages));
    }
    
    public function fdfAction(){
        $dati = array(
            'nome' => 'MvLabs',
            'country' => 'Italy',
            'mail' => 'info@mvlabs.it',
            'team' => array(
                'Stefano Maraspin','Stefano Valle','Diego Drigani','David Contavalli','Mauro Rainis'
            )
        );
        $this->I_fdfService->writeFdf($dati);
        return new ViewModel(array(
            'fdf_filename' => $this->I_fdfService->getFdfFilename(),
            'pdf_filename' => $this->I_fdfService->getPdfFilename(),
            'contenuto' => $dati,
            )
        );
    }
}