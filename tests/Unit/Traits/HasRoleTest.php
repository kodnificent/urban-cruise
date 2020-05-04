<?php

namespace Tests\Unit\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\Models\HasRoleModel;
use Tests\TestCase;

class HasRoleTest extends TestCase
{

    public function testRoles_Relationship()
    {
        $this->assertInstanceOf(BelongsToMany::class, (new HasRoleModel)->roles());
    }
}
