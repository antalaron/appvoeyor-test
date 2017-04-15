<?php

/*
 * (c) Antal Áron <antalaron@antalaron.hu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Antalaron\Component\AppVeyorTest;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Uppercase validation.
 *
 * @author Antal Áron <antalaron@antalaron.hu>
 */
class UppercaseValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }

        if (mb_strtoupper($value) === $value) {
            return;
        }

        // If we reached this point, it is invalid
        $this->context->buildViolation($constraint->message)
            ->addViolation();
    }
}
