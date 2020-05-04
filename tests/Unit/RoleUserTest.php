<?php

namespace Tests\Unit;

use Tests\ModelTestCase;

class RoleUserTest extends ModelTestCase
{
    protected function requiredColumns(): array
    {
        return [
            'id',
            'role_id',
            'user_id',
            'created_at',
            'updated_at'
        ];
    }
}
