<?php
/**
 * Created by PhpStorm.
 * User: Ppito
 * Date: 2/6/2017
 * Time: 9:06 PM
 */

namespace TemplateManager\Service;

use ModuleAbstract\Service\AbstractBase;
use Interop\Container\ContainerInterface;
use TemplateManager\Exception\Runtime;
use Zend\EventManager\EventManager;
use Zend\View\{View, Renderer\PhpRenderer};
use ZendTwig\Renderer\TwigRenderer;

abstract class ModuleAbstract extends AbstractBase implements ModuleInterface {

    /** @var \Zend\EventManager\EventManager|null */
    protected $viewEventManager = null;
    /** @var array */
    protected $params = [];

    /**
     * HandlerAbstract constructor.
     *
     * @param ContainerInterface $container
     * @param array              $options
     * @return self
     */
    public function __construct(ContainerInterface $container, array $options = []) {
        parent::__construct($container, $options);
        /** @var View $views */
        $views = $container->has(View::class) ?
            $container->get(View::class) :
            null;

        $this->viewEventManager = $views ?
            $views->getEventManager() :
            null;
        return $this;
    }

    /**
     * Prepare module before render
     *
     * @param array $params
     */
    public function configure(array $params = []): void {
        $this->params = $params;
    }


    /**
     * @return null|EventManager
     */
    public function getViewEventManager(): ?EventManager {
        return $this->viewEventManager;
    }

    /**
     * Render module
     *
     * @param string $viewName
     * @param array  $param
     * @return string
     */
    protected function renderModule(string $viewName, array $param = null): string {
        $container = $this->getContainer();
        /** @var TwigRenderer $renderer */
        $renderer = $container->has(TwigRenderer::class) ?
            $container->get(TwigRenderer::class) :
            ($container->has(PhpRenderer::class) ?
                $container->get(PhpRenderer::class) :
                null);

        if (!$renderer) {
            throw new Runtime('Renderer not found.');
        }

        return $renderer->render($viewName, $param);
    }

    /**
     * Retourne tous les paramètres du module
     *
     * @return array
     */
    public function getParams(): array {
        return $this->params;
    }

    /**
     * Retourne un paramètre de configuration du module
     *
     * @param string $key
     * @return mixed
     */
    public function getParam(string $key) {
        $params = $this->getParams();
        return $params[$key] ?? null;
    }
}