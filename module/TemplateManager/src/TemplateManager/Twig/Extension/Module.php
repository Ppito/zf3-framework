<?php
/**
 * Created by PhpStorm.
 * User: Ppito
 * Date: 2/6/2017
 * Time: 4:34 PM
 */

namespace TemplateManager\Twig\Extension;

use TemplateManager\Service\TemplateManager;
use ZendTwig\Extension\Extension;

class Module extends Extension {
    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return \Twig_SimpleFunction[]|array
     */
    public function getFunctions(): array {
        return [
            new \Twig_SimpleFunction('tm_hasModule', [$this, 'hasModule']),
            new \Twig_SimpleFunction('tm_getModule', [$this, 'getModule']),
        ];
    }

    /**
     * Verify if module loaded
     *
     * @param mixed   $moduleName
     * @param boolean $failOnMissing
     * @return boolean
     */
    public function hasModule($moduleName, bool $failOnMissing = false): bool {
        foreach ((array) $moduleName as $name) {
            if (TemplateManager::hasModuleByName($name) !== $failOnMissing) {
                return !$failOnMissing;
            }
        }
        return $failOnMissing;
    }

    /**
     * Returns configured module
     *
     * @param string $moduleName
     * @return array
     */
    public function getModule(string $moduleName): array {
        return TemplateManager::getModuleByName($moduleName);
    }
}
