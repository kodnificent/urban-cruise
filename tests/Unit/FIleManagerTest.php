<?php

namespace Tests\Unit;

use App\Traits\HasCreator;
use App\Traits\HasUpdater;
use Tests\ModelTestCase;
use Tests\Utils\Model\TestsModelCast;
use Tests\Utils\Model\TestsModelTrait;

class FileManagerTest extends ModelTestCase
{
    use TestsModelTrait, TestsModelCast;

    protected function requiredColumns(): array
    {

        return [
            'id',
            'name',
            'path',
            'disk',
            'description',
            'alt',
            'size',
            'mimetype',
            'type',
            'width',
            'height',
            'duration',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by'
        ];
    }

    protected function requiredTraits(): array
    {
        return [
            HasCreator::class,
            HasUpdater::class
        ];
    }

    protected function requiredCasts(): array
    {
        return [
            ['created_at', 'datetime'],
            ['updated_at', 'datetime']
        ];
    }
}
