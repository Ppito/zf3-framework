<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 2/3/17
 * Time: 5:33 PM
 */

namespace Header\Service;

use TemplateManager\Service\{ModuleAbstract, ModuleInterface};

class Header extends ModuleAbstract implements ModuleInterface {
    /** @var array */
    protected $templateParams = [];

    /**
     * Configure TextSEO Modules
     *
     * @param array $params
     */
    public function configure(array $params = []): void {
        parent::configure($params);
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function render(): string {
        return $this->renderModule('module/header', $this->templateParams);
    }
}