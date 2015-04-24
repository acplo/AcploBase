<?php
/**
 * Module definition
 *
 * @package   AcploBase
 * @author    Abel Lopes <abel@abellpes.eti.br>
 * @link      http://www.abellpes.eti.br Development Blog
 * @link      http://github.com/LansoWeb/AcploBase for the canonical source repository
 * @copyright Copyright (c) 2015-2020 Abel Lopes (http://www.abellpes.eti.br)
 * @license   http://www.abellpes.eti.br/licenca-bsd New BSD license
 */
namespace AcploBase;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\LocatorRegisteredInterface;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Console\Adapter\AdapterInterface as Console;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\EventManager\EventInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Module definition
 *
 * @package AcploBase
 * @author Abel Lopes <abel@abellpes.eti.br>
 * @link http://leandrosilva.info Development Blog
 * @link http://github.com/LansoWeb/AcploBase for the canonical source repository
 * @copyright Copyright (c) 2015-2020 Abel Lopes (http://www.abellpes.eti.br)
 * @license http://leandrosilva.info/licenca-bsd New BSD license
 * @codeCoverageIgnore
 */
class Module implements AutoloaderProviderInterface,
        LocatorRegisteredInterface, ConsoleUsageProviderInterface
{
    private $sm;
    public function onBootstrap(EventInterface $e)
    {
        $this->sm = $e->getApplication()->getServiceManager();
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'app_cache' => function (ServiceLocatorInterface $sm) {
                    $cache = \Zend\Cache\StorageFactory::factory([
                        'adapter' => 'filesystem',
                        'plugins' => [
                            'exception_handler' => [
                                'throw_exceptions' => false,
                            ],
                            'serializer',
                        ],
                    ]);

                    $cache->setOptions([
                        'cache_dir' => 'data/cache',
                    ]);

                    return $cache;
                },
                'DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity' => function (ServiceLocatorInterface $sm) {
                    $em = $sm->get('doctrine.entitymanager.orm_default');

                    return new DoctrineEntity($em);
                },
            ],
        ];
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__.'/../../autoload_classmap.php',
            ],
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }

    public function getConfig()
    {
        return include __DIR__.'/../../config/module.config.php';
    }

    public function getConsoleUsage(Console $console)
    {
        $config = $this->sm->get('config');
        if (!\array_key_exists('losbase', $config) || !\array_key_exists('enable_console', $config['losbase']) || !$config['losbase']['enable_console']) {
            return;
        }

        return [
            'los create crud <name> [<path>]' => 'Creates a new CRUD module',
        ];
    }
}
