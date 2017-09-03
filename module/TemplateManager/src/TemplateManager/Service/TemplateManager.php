<?php
/**
 * Created by PhpStorm.
 * User: Ppito
 * Date: 11/20/2016
 * Time: 1:14 PM
 *
 * @link      https://github.com/Ppito/zf3-whoops for the canonical source repository
 * @copyright Copyright (c) 2016 Mickael TONNELIER.
 * @license   https://github.com/Ppito/zf3-whoops/blob/master/LICENSE.md The MIT License
 */

namespace TemplateManager\Service;

use ModuleAbstract\Service\AbstractBase;
use TemplateManager\Exception\{InvalidModule, InvalidLoadedModule};
use TemplateManager\Module;
use Zend\Mvc\{Application, MvcEvent};

class TemplateManager extends AbstractBase {

    /** @var array|string[] */
    static public $loadedModule = [];

    /**
     * Listen to the bootstrap event
     *
     * @param MvcEvent $evt
     * @return void
     */
    public function prepareModule(MvcEvent $evt): void {
        $container = $this->getContainer();
        /** @var TemplateManager $service */
        $service = $container->has(TemplateManager::class) ?
            $container->get(TemplateManager::class) :
            null;

        $config = $service->getOption(Module::CONFIG_MODULE);
        usort($config, [$this, 'sortPriorityModule']);

        // Configure all module before render
        foreach ($config as $module) {
            $moduleName = $module['name'];
            /** @var ModuleInterface $moduleService */
            $moduleService = $container->has($moduleName) ?
                $container->get($moduleName) :
                null;

            if (!$moduleService instanceof ModuleInterface) {
                $this->triggerErrorEvent($evt,
                    new InvalidModule(sprintf('The `%s` module does not implement TemplateManager\Service\ModuleInterface', $moduleName))
                );
                return;
            }

            $moduleService->configure($module['params'] ?? []);

            $position = $module['position'];
            if (!array_key_exists($position, self::$loadedModule)) {
                self::$loadedModule[$position] = [];
            }
            self::$loadedModule[$position][] = $moduleService->render();
        }
    }

    /**
     * Retourne le module chargé
     *
     * @param string $name
     * @return array
     */
    public static function getModuleByName(string $name): array {
        if (!array_key_exists($name, self::$loadedModule)) {
            throw new InvalidLoadedModule(sprintf('The `%s` module does not loaded.', $name));
        }
        return self::$loadedModule[$name];
    }

    /**
     * Vérifie si le module est chargé
     *
     * @param string $name
     * @return bool
     */
    public static function hasModuleByName(string $name): bool {
        return array_key_exists($name, self::$loadedModule) && !empty(self::$loadedModule[$name]);
    }

    /**
     * Trigger Event error
     *
     * @param MvcEvent      $evt
     * @param InvalidModule $ex
     */
    private function triggerErrorEvent(MvcEvent $evt, InvalidModule $ex): void {
        $events = $evt->getApplication()->getEventManager();
        $evt->setError(Application::ERROR_EXCEPTION);
        $evt->setParam('exception', $ex);
        $evt->setName(MvcEvent::EVENT_RENDER_ERROR);
        $events->triggerEvent($evt);
    }

    /**
     * Tri les modules en fonction de sa priorité
     *
     * @param array $a
     * @param array $b
     * @return integer
     */
    public function sortPriorityModule($a, $b): int {
        if ($a['priority'] == $b['priority']) {
            return 0;
        }
        return ($a['priority'] > $b['priority']) ? -1 : 1;
    }
}
