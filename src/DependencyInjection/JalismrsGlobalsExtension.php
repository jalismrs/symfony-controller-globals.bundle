<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use function preg_match;

/**
 * Class JalismrsGlobalsExtension
 *
 * @package Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\DependencyInjection
 */
class JalismrsGlobalsExtension extends
    ConfigurableExtension
{
    /**
     * loadInternal
     *
     * @param array $mergedConfig
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     *
     * @throws \Exception
     */
    protected function loadInternal(
        array $mergedConfig,
        ContainerBuilder $container
    ) : void {
        $fileLocator = new FileLocator(
            __DIR__ . '/../Resources/config'
        );
        $yamlFileLoader = new YamlFileLoader(
            $container,
            $fileLocator
        );
        $yamlFileLoader->load('services.yaml');
        
        $definition = $container->getDefinition(Configuration::CONFIG_ROOT . '.globals_service');
        $definition->replaceArgument(
            '$parameters',
            $mergedConfig['parameters']
        );
    }
}
