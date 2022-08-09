<?php

namespace DeLaParra\DockerBundle\DependencyInjection;

use DeLaParra\DockerBundle\Connect\HttpConnector;
use DeLaParra\DockerBundle\Connect\SocketConnector;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use \Symfony\Component\HttpKernel\DependencyInjection\Extension;

class DockerExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $fileLocator = new FileLocator(__DIR__ . '/../Resources/config');
        $loader = new YamlFileLoader($container, $fileLocator);
        $loader->load('services.yaml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        foreach ($config as $key => $value) {
            $container->setParameter('docker.' . $key, $value);
        }
    }
}