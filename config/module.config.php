<?php
/**
 * Configuration file for Módulo AcploBase
 *
 * @package   AcploBase
 * @author    Abel Lopes <abel@abellpes.eti.br>
 * @link      http://www.abellpes.eti.br Development Blog
 * @link      http://github.com/abelclopes/acploBase for the canonical source repository
 * @copyright Copyright (c) 2015-2020 Abel Lopes (http://www.abellpes.eti.br)
 * @license   http://www.abellpes.eti.br/licenca-bsd New BSD license
 */
namespace AcploBase;

return [
    'acplobase' => [
        'enable_console' => false,
    ],
    'view_helpers' => [
        'invokables' => [
            'losversion' => 'AcploBase\View\Helper\Version',
            'losformelementerrors' => 'AcploBase\Form\View\Helper\FormElementErrors',
        ],
    ],
    'view_manager' => [
        'helper_map' => [
            'LosVersion' => 'AcploBase\View\Helper\Version',
        ],
    ],
    'doctrine' => [
        'driver' => [
            'AcploBase_entity' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__.'/../src/AcploBase/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'AcploBase\Entity' => 'AcploBase_entity',
                ],
            ],
        ],
        'configuration' => [
            'orm_default' => [
                'types' => [
                    'utcdatetime' => 'AcploBase\DBAL\Types\UtcDateTimeType',
                    'brdatetime' => 'AcploBase\DBAL\Types\BrDateTimeType',
                    'brprice' => 'AcploBase\DBAL\Types\BrPriceType',
                ],
            ],
        ],
    ],
    'controllers' => array(
        'invokables' => array(
            'AcploBase\Controller\Create' => 'AcploBase\Controller\CreateController',
        ),
    ),
    'console' => [
        'router' => [
            'routes' => [
                'acplobase-create-module' => [
                    'options' => [
                        'route' => 'create crud <name> [<path>]',
                        'defaults' => [
                            'controller' => 'AcploBase\Controller\Create',
                            'action' => 'crud',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
