<?php

namespace Tests\Unit;

use App\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\ModelTestCase;
use Tests\Utils\Model\TestsModelTimestamp;

class RoleTest extends ModelTestCase
{
    use TestsModelTimestamp;

    protected function requiredColumns(): array
    {
        return [
            'id',
            'title',
            'description',
        ];
    }

    protected function shouldBeTimestamped(): bool
    {
        return false;
    }

    public function testPermissions_Relationship()
    {
        $this->assertInstanceOf(HasMany::class, (new Role)->permissions());
    }

    public function testUsers_Relationship()
    {
        $this->assertInstanceOf(BelongsToMany::class, (new Role)->users());
    }
}
