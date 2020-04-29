<?php

namespace Tests\Unit\Traits;

use App\Traits\HasSlug;
use LogicException;
use Tests\TestCase;

class HasSlugTest extends TestCase
{

    public function testSlugColumn_With_Null_ShouldFail()
    {
        $this->expectException(LogicException::class);

        $stub = $this->getMockForTrait(HasSlug::class);
        $stub->expects($this->any())
            ->method('slugColumn')
            ->willReturn(null);

        $stub->verifySlugColumn();
    }

    public function testSlugMirror_With_Null_ShouldFail()
    {
        $this->expectException(LogicException::class);

        $stub = $this->getMockForTrait(HasSlug::class);
        $stub->expects($this->any())
            ->method('slugMirror')
            ->willReturn(null);

        $stub->verifySlugMirror();
    }

    public function testSlugify()
    {
        $slug = HasSlug::slugify('My string');
        $this->assertSame('my-string', $slug, 'without prefix');

        $slug = HasSlug::slugify('My string', 5);
        $this->assertSame('my-string-5', $slug, 'with prefix');
    }
}
