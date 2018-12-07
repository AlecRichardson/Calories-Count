<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ContactTest extends TestCase
{
    public function testCanBeCreatedFromValidFormFields()
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com'),
            Password::fromString('Password'),
            Password2::fromString('Password2.')

        );
    }

    public function testCannotBeCreatedFromInvalidFormFields()
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
        Password::fromString('invalid');
        Password2::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
        $this->assertEquals(
            'Password',
            Password::fromString('Password')
        );
        $this->assertEquals(
            'Password2.',
            Password2::fromString('Test Password2.')
        );
    }
}
