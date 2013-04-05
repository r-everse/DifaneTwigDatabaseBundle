<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ftassi
 * Date: 05/04/13
 * Time: 09:55
 * To change this template use File | Settings | File Templates.
 */

namespace Difane\Bundle\TwigDatabaseBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ValidTwig extends Constraint
{
    public $message = "This template is not valid, there is an error at line %line%";

    public function validatedBy()
    {
        return 'difane.twig.valid';
    }
}