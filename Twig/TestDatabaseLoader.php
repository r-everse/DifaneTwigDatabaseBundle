<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ftassi
 * Date: 09/04/13
 * Time: 10:28
 * To change this template use File | Settings | File Templates.
 */

namespace Difane\Bundle\TwigDatabaseBundle\Twig;

use Difane\Bundle\TwigDatabaseBundle\Twig\DatabaseLoader;

/**
 * Class TestDatabaseLoader
 *
 * Used for testing purpose, return a different
 * cache key when the template content change.
 *
 * @package Difane\Bundle\TwigDatabaseBundle\Twig
 */
class TestDatabaseLoader extends DatabaseLoader
{
    public function getCacheKey($name)
    {
        $template = $this->getSource($name);
        return "twig:db:".md5($template);
    }
}