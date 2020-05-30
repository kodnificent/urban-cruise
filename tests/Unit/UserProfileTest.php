<?php

namespace Tests\Unit;

use Tests\ModelTestCase;
use Tests\Utils\Model\TestsModelTimestamp;

class UserProfileTest extends ModelTestCase
{
    use TestsModelTimestamp;

    protected function requiredColumns(): array
    {
        return [
            'id',
            'user_id',
            'job_title',
            'company',
            'about',
            'facebook',
            'linkedin',
            'twitter',
            'website',
            'photo',
        ];
    }

    protected function shouldBeTimestamped(): bool
    {
        return false;
    }
}
