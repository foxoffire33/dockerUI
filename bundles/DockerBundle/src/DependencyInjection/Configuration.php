<?php

namespace DeLaParra\DockerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('docker_bundle');

        $treeBuilder
            ->getRootNode()
            ->children()
            ->scalarNode('driver')->defaultValue('http')->end()
                ->arrayNode('http_connection')->children()
                        ->scalarNode('hostname')->end()
                        ->integerNode('port')->max(65000)->end()
                        ->scalarNode('publicKeyFile')->end()
                        ->scalarNode('privateKeyFile')->end()
                ->end()->end()
                ->arrayNode('socket_connection')->children()
                ->scalarNode('socket')->end()
                ->end()->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}