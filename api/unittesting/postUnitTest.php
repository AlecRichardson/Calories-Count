<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ContactTest extends TestCase
{
    public function testCanBeCreatedFromValidFormFields()
    {
        $this->assertInstanceOf(
            Title::fromString('Title'),
            Post::fromString('Post.')

        );
    }

    public function testCannotBeCreatedFromInvalidFormFields()
    {
        $this->expectException(InvalidArgumentException::class);

        Ttile::fromString('invalid');
        Post::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
       
        $this->assertEquals(
            'Title',
            Title::fromString('Title')
        );
        $this->assertEquals(
            'Post.',
            Post::fromString('Post.')
        );
    }
}
