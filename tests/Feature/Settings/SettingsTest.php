<?php

namespace Tests\Feature\Settings;

use App\Facades\Settings;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('app:make:settings');
    }

    public function testShould_GetValue_WithFacade()
    {
        $value = Settings::get('id');

        $this->assertEquals(1, $value);
    }

    public function testShould_GetValue_WithHelper()
    {
        $value = settings('id');

        $this->assertEquals(1, $value);
    }
}
