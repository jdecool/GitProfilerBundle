<?php

namespace JDecool\Bundle\GitProfilerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('j_decool_git_branch_profiler');
        $rootNode
            ->children()
            ->scalarNode('git_binary_path')->end()
            ->end();

        return $treeBuilder;
    }
}
