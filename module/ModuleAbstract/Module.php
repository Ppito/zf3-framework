<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ModuleAbstract;

use Zend\Loader\{AutoloaderFactory, StandardAutoloader};
use Zend\ModuleManager\Feature\{AutoloaderProviderInterface, ConfigProviderInterface};

class Module implements ConfigProviderInterface, AutoloaderProviderInterface {
    const MODULE_PATH = __DIR__;
    const MODULE_NAME = __NAMESPACE__;

    /**
     * {@inheritDoc}
     */
    public function getConfig() {
        return include static::MODULE_PATH. '/config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return [
            AutoloaderFactory::STANDARD_AUTOLOADER => [
                StandardAutoloader::LOAD_NS => [
                    static::MODULE_NAME => static::MODULE_PATH . '/src/' . static::MODULE_NAME,
                ],
            ],
        ];
    }
}

