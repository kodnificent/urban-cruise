<?php

namespace Tests\Unit;

use App\Post;
use App\Traits\HasAuthor;
use App\Traits\HasMeta;
use App\Traits\HasSlug;
use App\Traits\HasUpdater;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tests\ModelTestCase;
use Tests\Utils\Model\TestsModelCast;
use Tests\Utils\Model\TestsModelSlug;
use Tests\Utils\Model\TestsModelTrait;

class PostTest extends ModelTestCase
{
    use TestsModelTrait, TestsModelCast, TestsModelSlug;

    protected function requiredCasts(): array
    {
        return [
            ['options', 'array'],
        ];
    }

    protected function requiredTraits(): array
    {
        return [
            HasMeta::class,
            SoftDeletes::class,
            HasAuthor::class,
            HasUpdater::class,
        ];
    }

    protected function requiredColumns(): array
    {
        return [
            'id', 'slug', 'title', 'summary', 'content', 'options', 'status',
            'file_id', 'category_id', 'author_id', 'updater_id', 'created_at',
            'updated_at', 'deleted_at'
        ];
    }

    protected function slugColumnShouldReturn()
    {
        return 'slug';
    }

    protected function slugMirrorShouldReturn()
    {
        return 'title';
    }
}
