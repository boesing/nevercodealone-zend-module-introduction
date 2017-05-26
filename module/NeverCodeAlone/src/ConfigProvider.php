<?php
/**
 * @link      http://github.com/zendframework/NeverCodeAlone for the canonical source repository
 * @copyright Copyright (c) 2005-2017 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace NeverCodeAlone;

use NeverCodeAlone\Controller\SkeletonController;
use Zend\ServiceManager\Factory\InvokableFactory;

class ConfigProvider
{

    /**
     * Return general-purpose module configuration for use with zend-expressive.
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencyConfig(),
            'router' => $this->getRouterConfig(),
            'controllers' => $this->getControllerConfig(),
            'view_manager' => $this->getViewManagerConfig(),
        ];
    }

    /**
     * Return service-manager specific configuration.
     * @return array
     */
    public function getDependencyConfig()
    {
        return [
            'abstract_factories' => [],
            'aliases' => [],
            'delegators' => [],
            'factories' => [],
            'initializers' => [],
            'invokables' => [],
            'lazy_services' => [],
            'services' => [],
            'shared' => [],
        ];
    }

    /**
     * Return router configuration.
     * @return array
     */
    public function getRouterConfig()
    {
        return [
            'routes' => [
                'never-code-alone' => [
                    'type' => 'Literal',
                    'options' => [
                        // Change this to something specific to your module
                        'route' => '/nca',
                        'defaults' => [
                            'controller' => Controller\SkeletonController::class,
                        ],
                    ],
                    'may_terminate' => false,
                    'child_routes' => [
                        'submit' => [
                            'type' => 'Method',
                            'options' => [
                                'verb' => 'post',
                                'defaults' => [
                                    'action' => 'submit',
                                ],
                            ],
                        ],
                        'form' => [
                            'type' => 'Method',
                            'options' => [
                                'verb' => 'get',
                                'defaults' => [
                                    'action' => 'index',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Return ControllerManager configuration.
     * @return array
     */
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\SkeletonController::class => Controller\SkeletonController\Factory::class,
            ],
        ];
    }

    /**
     * Return ViewManager configuration.
     * @return array
     */
    public function getViewManagerConfig()
    {
        return [
            'template_path_stack' => [
                'NeverCodeAlone' => __DIR__ . '/../view',
            ],
        ];
    }
}
