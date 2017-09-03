<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TemplateManager;

use Interop\Container\ContainerInterface;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\{ConfigProviderInterface, BootstrapListenerInterface};
use Zend\Mvc\MvcEvent;

class Module extends \ModuleAbstract\Module implements ConfigProviderInterface, BootstrapListenerInterface {
    const MODULE_PATH   = __DIR__;
    const MODULE_NAME   = __NAMESPACE__;
    const CONFIG_NAME   = 'template_manager';
    const CONFIG_MODULE = 'config_module';

    /**
     * Listen to the bootstrap event
     *
     * @param \Zend\Mvc\MvcEvent|EventInterface $e
     * @return void
     */
    public function onBootstrap(EventInterface $e) {

        $application = $e->getApplication();
        /** @var ContainerInterface $serviceManager */
        $container = $application->getServiceManager();

        /** @var Service\TemplateManager $service */
        $service = $container->has(Service\TemplateManager::class) ?
            $container->get(Service\TemplateManager::class) :
            null;


        $eventManager = $application->getEventManager();
        $eventManager->attach(MvcEvent::EVENT_RENDER, [
            $service,
            'prepareModule',
        ]);
    }
}
