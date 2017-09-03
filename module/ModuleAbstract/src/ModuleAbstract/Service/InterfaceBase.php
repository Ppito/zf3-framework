<?php
/**
 * Created by PhpStorm.
 * User: Ppito
 * Date: 8/8/2017
 * Time: 17:10 PM
 */

namespace ModuleAbstract\Service;

use Interop\Container\ContainerInterface;
use Zend\EventManager\EventManager;

interface InterfaceBase {
    /**
     * @return array
     */
    public function getOptions(): array;

    /**
     * @param string $name
     * @return mixed|null
     */
    public function getOption(string $name);

    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface;

    /**
     * @return null|EventManager
     */
    public function getEventManager(): ?EventManager;
}
