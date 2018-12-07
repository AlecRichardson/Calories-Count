<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ContactTest extends TestCase
{
    public function testCanBeCreatedFromValidFormFields()
    {
        $this->assertInstanceOf(
            Date::fromString('date'),
            Breakfast::fromString('Breakfast'),
            Lunch::fromString('Lunch'),
            Dinner::fromString('Dinner'),
            Other::fromString('Other'),

        );
    }

    public function testCannotBeCreatedFromInvalidFormFields()
    {
        $this->expectException(InvalidArgumentException::class);

        Date::fromString('invalid');
        Breakfast::fromString('invalid');
        Lunch::fromString('invalid');
        Dinner::fromString('invalid');
        Other::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
       
        $this->assertEquals(
            'Date',
            Date::fromString('Date')
        );
        $this->assertEquals(
            'Breakfast',
            Breakfast::fromString('Breakfast')
        );
        $this->assertEquals(
            'Lunch',
            Lunch::fromString('Lunch')
        );
        $this->assertEquals(
            'Dinner',
            Dinner::fromString('Dinner')
        );
        $this->assertEquals(
            'Other',
            Other::fromString('Other')
        );
    }
}
