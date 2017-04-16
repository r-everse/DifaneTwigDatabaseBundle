<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ftassi
 * Date: 03/04/13
 * Time: 17:10
 * To change this template use File | Settings | File Templates.
 */

namespace Difane\Bundle\TwigDatabaseBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TwigPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $chainLoader = $container->getDefinition('difane.bundle.twigdatabase.twig.loader.chain');
        $loaders = $this->getPrioritizedLoaders($container);

        foreach ($loaders as $chainedLoader) {
            $chainLoader->addMethodCall('addLoader', array($container->findDefinition($chainedLoader)));
        }

        $container->setAlias('twig.loader', 'difane.bundle.twigdatabase.twig.loader.chain');
    }

    protected function getPrioritizedLoaders(ContainerBuilder $container)
    {
        $loaders = $container->getParameter('difane.bundle.loaders_priority');

        if (empty($loaders)) {
            $loaders = array($container->getDefinition('twig.loader'));
        }

        return $loaders;
    }
}
