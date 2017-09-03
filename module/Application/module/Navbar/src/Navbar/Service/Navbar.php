<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 2/3/17
 * Time: 5:33 PM
 */

namespace Navbar\Service;

use TemplateManager\Service\{ModuleAbstract, ModuleInterface};

class Navbar extends ModuleAbstract implements ModuleInterface {

    /** @var array */
    protected $menu   = [];
    protected $templateParams = [
        'isVisible' => true
    ];

    /**
     * Configure de la navbar
     *
     * @param array $params
     */
    public function configure(array $params = []): void {
        parent::configure($params);
        $container    = $this->getContainer();
        $config       = $container->has('navbar') ?
            $container->get('navbar') :
            [];

        if ($config && array_key_exists('menu', $config)) {
            $this->menu = $config['menu'];
        }
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function render(): string {
        return $this->renderModule('module/navbar', $this->templateParams);
    }
}