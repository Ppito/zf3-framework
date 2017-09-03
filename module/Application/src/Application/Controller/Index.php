<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceManager;

class Index extends AbstractActionController
{
    /**
     * Page d'accueil
     *
     * @return \Zend\View\Model\ViewModel|array
     */
    public function indexAction()
    {
        $app = $this->getEvent()->getApplication();
        /** @var ServiceManager $serviceManager */
        $serviceManager = $app->getServiceManager();



        return [];
    }
}
