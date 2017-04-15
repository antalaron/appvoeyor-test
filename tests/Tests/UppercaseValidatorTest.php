<?php

/*
 * (c) Antal Áron <antalaron@antalaron.hu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Antalaron\Component\AppVeyorTest\Tests;

use Antalaron\Component\AppVeyorTest\Uppercase;
use Antalaron\Component\AppVeyorTest\UppercaseValidator;

class UppercaseValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new UppercaseValidator();
    }

    public function testNullIsValid()
    {
        $this->validator->validate(null, new Uppercase());

        $this->assertNoViolation();
    }

    /**
     * @dataProvider stringProvider
     */
    public function testUppercases($string, $valid)
    {
        $this->validator->validate($string, new Uppercase());

        if ($valid) {
            $this->assertNoViolation();
        } else {
            $this->buildViolation(Uppercase::MESSAGE)
                ->assertRaised();
        }
    }

    public function stringProvider()
    {
        return [
            ['APP', true],
            ['ÁRON', true],
            ['ÁRVÍZTŰRŐ TÜKÖRFÚRÓGÉP', true],
            ['app', false],
            ['áron', false],
            ['árvíztűrő tükörfúrógép', false],
        ];
    }
}
