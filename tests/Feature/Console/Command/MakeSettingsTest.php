<?php

namespace Tests\Feature\Console\Command;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MakeSettingsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCommand_CreatesSettings()
    {
        $this->artisan('app:make:settings')
            ->expectsOutput('App setting created successfully!')
            ->assertExitCode(0);

        $this->assertDatabaseHas('app_settings', [
            'id'    =>  1
        ]);
    }
}
