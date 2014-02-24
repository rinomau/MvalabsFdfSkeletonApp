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
    
    public function fdfAction(){
        echo 'Creo un file fdf in /tmp';
        $this->I_fdfService->get();
        return false;
    }
}
