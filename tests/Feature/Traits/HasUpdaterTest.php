<?php

namespace Tests\Feature\Traits;

use App\Traits\HasUpdater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class HasUpdaterTest extends TestCase
{
    public function testUpdater_ShouldReturn_BelongsToInstance()
    {
        $stub = new Class extends Model
        {
            use HasUpdater;
        };

        $expected = BelongsTo::class;

        $actual = $stub->updater();

        $this->assertInstanceOf($expected, $actual);
    }
}
