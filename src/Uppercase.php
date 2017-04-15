<?php

namespace Antalaron\Component\AppVeyorTest;

use Symfony\Component\Validator\Constraint;

/**
 * Uppercase validation.
 *
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Antal Áron <antalaron@antalaron.hu>
 */
class Uppercase extends Constraint
{
    const MESSAGE = 'Not uppercase.';

    public $message = self::MESSAGE;
}
