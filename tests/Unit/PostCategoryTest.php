<?php

namespace Tests\Feature;

use App\Traits\HasMeta;
use Tests\ModelTestCase;
use Tests\Utils\Model\TestsModelSlug;
use Tests\Utils\Model\TestsModelTimestamp;
use Tests\Utils\Model\TestsModelTrait;

class PostCategoryTest extends ModelTestCase
{
    use TestsModelTrait,
        TestsModelSlug,
        TestsModelTimestamp;

    protected function requiredColumns(): array
    {
        return [
            'id', 'slug', 'title', 'description', 'file_id'
        ];
    }

    protected function requiredTraits(): array
    {
        return [
            HasMeta::class,
        ];
    }

    protected function shouldBeTimestamped()
    {
        return false;
    }

    public function slugColumnShouldReturn()
    {
        return 'slug';
    }

    public function slugMirrorShouldReturn()
    {
        return 'title';
    }
}
