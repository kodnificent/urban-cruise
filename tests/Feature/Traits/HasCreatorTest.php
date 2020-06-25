<?php

namespace Tests\Feature\Traits;

use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class HasCreatorTest extends TestCase
{
    public function testCreator_ShouldReturn_BelongsToInstance()
    {
        $stub = new Class extends Model
        {
            use HasCreator;
        };

        $expected = BelongsTo::class;

        $actual = $stub->creator();

        $this->assertInstanceOf($expected, $actual);
    }
}
