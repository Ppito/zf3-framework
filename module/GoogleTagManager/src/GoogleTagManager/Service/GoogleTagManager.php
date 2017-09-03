<?php
/**
 * Created by PhpStorm.
 * User: ppito
 * Date: 8/27/17
 * Time: 12:12 PM
 */


namespace GoogleTagManager\Service;

use TemplateManager\Service\{ModuleAbstract, ModuleInterface};
use Zend\View\Helper\HeadScript;
use ZendTwig\Renderer\TwigRenderer;

class GoogleTagManager extends ModuleAbstract implements ModuleInterface {
    /** @var array */
    protected $templateParams = [];
    /** @var boolean */
    private $_isInit = false;

    public function init(): void {
        if (!$this->_isInit) {
            $this->_isInit = true;

            $container            = $this->getContainer();
            $this->templateParams = ['gtmId' => $this->getOption('gtmId')];

            $script = $this->renderModule('module/gtmHeader', $this->templateParams);

            /** @var TwigRenderer $renderer */
            $renderer = $container->has(TwigRenderer::class) ?
                $container->get(TwigRenderer::class) :
                null;

            $pluginManager = $renderer->getHelperPluginManager();
            /** @var HeadScript $headScript */
            $headScript = $pluginManager->get(HeadScript::class);
            $headScript->appendScript($script);
        }
    }

    /**
     * Configure TextSEO Modules
     *
     * @param array $params
     */
    public function configure(array $params = []): void {
        parent::configure($params);
        $this->init();
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function render(): string {
        return $this->renderModule('module/gtmBody', $this->templateParams);
    }

}
