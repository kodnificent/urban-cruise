<?php

namespace Tests\Unit;

use Tests\ModelTestCase;
use Tests\Utils\Model\TestsModelTimestamp;

class SeoMetaTest extends ModelTestCase
{
    use
        TestsModelTimestamp;

    protected function requiredColumns(): array
    {
        return [
            'metaable_id', 'metaable_type', 'title', 'description',
            'canonical', 'noindex', 'nofollow', 'type',
        ];
    }

    protected function shouldBeTimestamped()
    {
        return false;
    }
}
