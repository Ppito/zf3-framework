<?php
/**
 * Created by PhpStorm.
 * User: Ppito
 * Date: 27/08/2017
 * Time: 10:08:37
 */

namespace GoogleTagManager;

use TemplateManager\Helper\Position;

return [

    \TemplateManager\Module::CONFIG_NAME => [
        'config_module' => [
            'gtm' => [
                'name'     => Service\GoogleTagManager::class,
                'position' => Position::CUSTOM_TOP,
                'priority' => 1,
                'params'   => [],
            ],
        ],
    ],

    'view_manager' => [
        'template_map' => [
            'module/gtmHeader' => __DIR__ . '/../view/gtmHeader.html.twig',
            'module/gtmBody'   => __DIR__ . '/../view/gtmBody.html.twig',
        ],
    ],

    'service_manager' => [
        'factories' => [
            Service\GoogleTagManager::class => Factory\Base::class,
        ],
    ],

    Module::CONFIG_NAME => [
        'gtmId' => 'GTM-XXXXXX',
    ],
];
