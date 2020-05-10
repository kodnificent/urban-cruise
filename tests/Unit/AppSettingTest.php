<?php

namespace Tests\Unit;

use Tests\ModelTestCase;
use Tests\Utils\Model\TestsModelTimestamp;

class AppSettingTest extends ModelTestCase
{
    use TestsModelTimestamp;

    protected function requiredColumns(): array
    {
        return [
            'id',
            'site_name',
            'site_description',
            'site_logo',
            'site_logo_on_black',
            'socials'
        ];
    }

    protected function shouldBeTimestamped(): bool
    {
        return false;
    }
}
