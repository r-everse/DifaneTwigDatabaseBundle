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
        $loader = $container->getDefinition('twig.loader');

        $customLoader = $container->getDefinition('difane.bundle.twigdatabase.twig.loader.chain');
        $customLoader->addMethodCall('addLoader', array($loader));
        $container->setDefinition('twig.loader', $customLoader);
    }
}