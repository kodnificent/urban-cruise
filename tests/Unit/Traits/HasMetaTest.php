<?php

namespace Tests\Unit\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Tests\Models\MetaableModel;
use Tests\TestCase;

class HasMetaTest extends TestCase
{
    public function testShouldLoadWithMeta_WithFalse()
    {
        $metaable = $this->createPartialMock(MetaableModel::class, ['getLoadsWithMeta']);
        $metaable->method('getLoadsWithMeta')
            ->willReturn(false);

        $this->assertSame(false, $metaable->shouldLoadWithMeta());
    }

    public function testShouldLoadWithMeta_WithTrue()
    {
        $metaable = $this->createPartialMock(MetaableModel::class, ['getLoadsWithMeta']);
        $metaable->method('getLoadsWithMeta')
            ->willReturn(true);

        $this->assertSame(true, $metaable->shouldLoadWithMeta());
    }

    public function testMeta_ShouldReturn_InstanceOf_MorphOne()
    {
        $this->assertInstanceOf(MorphOne::class, (new MetaableModel)->meta());
    }
}
