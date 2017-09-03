<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Header;

use ModuleAbstract\Factory\Base;
use TemplateManager\Helper\Position;

return [

    \TemplateManager\Module::CONFIG_NAME => [
        'config_module' => [
            'Header' => [
                'name'     => Service\Header::class,
                'position' => Position::HEADER,
                'priority' => 1,
                'params'   => [],
            ],
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'module/header' => __DIR__ . '/../view/header.twig',
        ],
    ],

    'service_manager' => [
        'factories' => [
            Service\Header::class => Base::class,
        ],
    ],
];
