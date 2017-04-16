<?php

namespace Difane\Bundle\TwigDatabaseBundle;

use Difane\Bundle\TwigDatabaseBundle\DependencyInjection\Compiler\TwigPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DifaneTwigDatabaseBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new TwigPass());
    }
}
