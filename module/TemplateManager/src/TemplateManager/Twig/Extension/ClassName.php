<?php

namespace TemplateManager\Twig\Extension;

use ZendTwig\Extension\Extension;

class ClassName extends Extension {
    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return \Twig_SimpleFunction[]|array
     */
    public function getFunctions(): array {
        return [
            new \Twig_SimpleFunction('getClassName', [$this, 'getClass']),
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName(): string {
        return 'twig-extension-class-name';
    }

    /**
     * Returns the name of the class of an object
     *
     * @param mixed $object
     * @return string
     */
    public function getClass($object): string {
        return (new \ReflectionClass($object))->getShortName();
    }
}