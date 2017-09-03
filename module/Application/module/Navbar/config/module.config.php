<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Navbar;

use ModuleAbstract\Factory\Base;
use TemplateManager\Helper\Position;

return [

    \TemplateManager\Module::CONFIG_NAME => [
        'config_module' => [
            'Navbar' => [
                'name'     => Service\Navbar::class,
                'position' => Position::NAVBAR,
                'priority' => 1000,
                'params'   => [],
            ],
        ],
    ],

    Module::CONFIG_NAME => [
        'menu' => [
        ],
    ],

    'view_manager' => [
        'template_map' => [
            'module/navbar' => __DIR__ . '/../view/navbar.html.twig',
        ],
    ],


    'service_manager' => [
        'factories' => [
            Service\Navbar::class => Base::class,
        ],
    ],
];
