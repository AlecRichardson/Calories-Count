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
            Username::fromString('Username'),
            Comment::fromString('Test comment.')

        );
    }

    public function testCannotBeCreatedFromInvalidFormFields()
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
        Username::fromString('invalid');
        Comment::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
        $this->assertEquals(
            'Username',
            Username::fromString('Username')
        );
        $this->assertEquals(
            'Test Comment.',
            Comment::fromString('Test Comment.')
        );
    }
}
