<?php

/**
 * This file is part of the pd-admin pd-activity package.
 *
 * @package     pd-activity
 * @license     LICENSE
 * @author      Ramazan APAYDIN <apaydin541@gmail.com>
 * @link        https://github.com/appaydin/pd-activity
 */

namespace Pd\ActivityBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('pd_activity');
        $rootNode = $treeBuilder->getRootNode();

        // Set Configuration
        $rootNode
            ->children()
                ->booleanNode('log_mailer')->defaultTrue()->end()
                ->booleanNode('log_request')->defaultTrue()->end()
                ->arrayNode('request_exclude_methods')->scalarPrototype()->end()->defaultValue([])->end()
                ->scalarNode('request_match_uri')->defaultValue('')->end()
            ->end();

        return $treeBuilder;
    }
}
