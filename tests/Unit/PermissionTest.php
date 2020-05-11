<?php

namespace Tests\Unit;

use App\Permission;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\ModelTestCase;
use Tests\Utils\Model\TestsModelCast;
use Tests\Utils\Model\TestsModelTimestamp;

class PermissionTest extends ModelTestCase
{
    use TestsModelTimestamp;

    protected function requiredColumns(): array
    {
        return [
            'id',
            'role_id',
            'collection_name',
            'create',
            'read',
            'update',
            'delete',
        ];
    }

    protected function shouldBeTimestamped(): bool
    {
        return false;
    }

    public function testRole_Relationship()
    {
        $this->assertInstanceOf(BelongsTo::class, (new Permission)->role());
    }
}
