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

abstract class AbstractBase implements InterfaceBase {

    /** @var array */
    protected $options = [];
    /** @var ContainerInterface */
    protected $container;
    /** @var EventManager|null */
    protected $eventManager = null;

    /**
     * HandlerAbstract constructor.
     *
     * @param ContainerInterface $container
     * @param array              $options
     * @return self
     */
    public function __construct(ContainerInterface $container, array $options = []) {
        $this->options      = $options;
        $this->container    = $container;
        $this->eventManager = $container->has('EventManager') ?
            $container->get('EventManager') :
            null;
        return $this;
    }

    /**
     * Retourne toutes les options
     *
     * @return array
     */
    public function getOptions(): array {
        return $this->options;
    }

    /**
     * Retourne une option
     *
     * @param string $name
     * @return mixed|null
     */
    public function getOption(string $name) {
        $options = $this->getOptions();
        return $options[$name] ?? null;
    }

    /**
     * Set les options de configuration
     *
     * @param array $options
     * @return self
     */
    public function setOptions(array $options) {
        $this->options = $options;
        return $this;
    }

    /**
     * Ajoute une options
     *
     * @param string $key
     * @param mixed  $values
     * @return self
     */
    public function setOption(string $key, $values) {
        $this->options[$key] = $values;
        return $this;
    }

    /**
     * Retourne le container de l'application
     *
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface {
        return $this->container;
    }

    /**
     * Retourne le gestionnaire d'évènement
     *
     * @return EventManager|null
     */
    public function getEventManager(): ?EventManager {
        return $this->eventManager;
    }
}
