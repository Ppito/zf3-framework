<?php
/**
 * Created by PhpStorm.
 * User: Ppito
 * Date: 8/8/2017
 * Time: 17:10 PM
 *
 * @link      https://github.com/Ppito/zf3-whoops for the canonical source repository
 * @copyright Copyright (c) 2016 Mickael TONNELIER.
 * @license   https://github.com/Ppito/zf3-whoops/blob/master/LICENSE.md The MIT License
 */

namespace ModuleAbstract\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class Base implements FactoryInterface {

    /** @var string */
    const CONFIG_NAME = '';

    /**
     * Invoke Handler
     *
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     * @return mixed
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        $config = $container->has('config') ? $container->get('config') : [];
        $name   = static::CONFIG_NAME;
        $config = !empty($name) && array_key_exists($name, $config) ? $config[$name] : [];

        return new $requestedName($container, $config);
    }
}