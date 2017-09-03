<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TemplateManager;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    Module::CONFIG_NAME => [
        'position' => [
            Helper\Position::NAVBAR,
            Helper\Position::NAVBAR_TOP,
            Helper\Position::NAVBAR_MIDDLE,
            Helper\Position::NAVBAR_BOTTOM,
            Helper\Position::HEADER,
            Helper\Position::HEADER_TOP,
            Helper\Position::HEADER_MIDDLE,
            Helper\Position::HEADER_BOTTOM,
            Helper\Position::LEFT_ASIDE_TOP,
            Helper\Position::LEFT_ASIDE_MIDDLE,
            Helper\Position::LEFT_ASIDE_BOTTOM,
            Helper\Position::CONTENT_TOP,
            Helper\Position::CONTENT,
            Helper\Position::CONTENT_BOTTOM,
            Helper\Position::RIGHT_ASIDE_TOP,
            Helper\Position::RIGHT_ASIDE_MIDDLE,
            Helper\Position::RIGHT_ASIDE_BOTTOM,
            Helper\Position::BOTTOM,
            Helper\Position::BOTTOM_TOP,
            Helper\Position::BOTTOM_MIDDLE,
            Helper\Position::BOTTOM_BOTTOM,
            Helper\Position::FOOTER,
            Helper\Position::FOOTER_TOP,
            Helper\Position::FOOTER_MIDDLE,
            Helper\Position::FOOTER_BOTTOM,
            Helper\Position::CUSTOM_TOP,
            Helper\Position::CUSTOM_BOTTOM,
        ],
        Module::CONFIG_MODULE => [

        ],
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             => [
            'error/404'          => __DIR__ . '/../view/layout/error_404.html.twig',
            'error/index'        => __DIR__ . '/../view/layout/error.html.twig',
            'layout/layout'      => __DIR__ . '/../view/layout/default.html.twig',

            // Template composition
            'template/navbar'        => __DIR__ . '/../view/defaultTemplate/navbar.html.twig',
            'template/header'        => __DIR__ . '/../view/defaultTemplate/header.html.twig',
            'template/container'     => __DIR__ . '/../view/defaultTemplate/container.html.twig',
            'template/bottom'        => __DIR__ . '/../view/defaultTemplate/bottom.html.twig',
            'template/footer'        => __DIR__ . '/../view/defaultTemplate/footer.html.twig',
            'template/custom_top'    => __DIR__ . '/../view/defaultTemplate/custom_top.html.twig',
            'template/custom_bottom' => __DIR__ . '/../view/defaultTemplate/custom_bottom.html.twig',
        ],
        'template_path_stack'      => [
            __DIR__ . '/../view',
        ],
    ],

    'zend_twig' => [
        'extensions' => [
            Twig\Extension\Asset::class,
            Twig\Extension\ClassName::class,
            Twig\Extension\Module::class,
        ],
        'assets' => [
            __DIR__ . '/../../../public/build/manifest.json'
        ]
    ],

    'service_manager' => [
        'factories' => [
            Service\TemplateManager::class  => Factory\Base::class,
        ],
    ],

    'view_helpers' => [
        'aliases'   => [
            'footerScript'       => View\Helper\FooterScript::class,
            'FooterScript'       => View\Helper\FooterScript::class,
            'footerscript'       => View\Helper\FooterScript::class,
            'footerInlineScript' => View\Helper\FooterInlineScript::class,
            'FooterInlineScript' => View\Helper\FooterInlineScript::class,
            'footerinlinescript' => View\Helper\FooterInlineScript::class,
        ],
        'factories' => [
            View\Helper\FooterScript::class       => InvokableFactory::class,
            View\Helper\FooterInlineScript::class => InvokableFactory::class,
        ],
    ],
];
