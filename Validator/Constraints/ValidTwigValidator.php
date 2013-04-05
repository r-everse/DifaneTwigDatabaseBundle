<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ftassi
 * Date: 05/04/13
 * Time: 10:00
 * To change this template use File | Settings | File Templates.
 */

namespace Difane\Bundle\TwigDatabaseBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ValidTwigValidator extends ConstraintValidator
{
    /**
     * @var \Twig_Environment
     */
    protected $twig;

    function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function validate($value, Constraint $constraint)
    {
        try {
            $this->twig->parse($this->twig->tokenize($value));

        } catch (\Twig_Error $e) {
            $this->context->addViolation($constraint->message, array('%line%' => $e->getTemplateLine()));
        }
    }
}