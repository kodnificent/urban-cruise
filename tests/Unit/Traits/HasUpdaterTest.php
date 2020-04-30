<?php

namespace Tests\Unit\Traits;

use App\User;
use Tests\Models\HasUpdaterModel;
use Tests\TestCase;

class HasUpdaterTest extends TestCase
{
    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    private $updater_model;

    protected function setUp(): void
    {
        parent::setUp();

        $this->updater_model = new HasUpdaterModel;
    }

    protected function tearDown(): void
    {
        unset($this->updater_model);

        parent::tearDown();
    }

    public function testGetHasUpdaterRelatedClass_ShouldReturn_UserModel()
    {
        $expected = User::class;

        $actual = $this->updater_model->getHasUpdaterRelatedClass();

        $this->assertEquals($expected, $actual);
    }

    public function testGetHasUpdaterForeign_WithUserId_ShouldReturn_UserId()
    {
        $stub = new class extends HasUpdaterModel
        {
            const HAS_UPDATER_FOREIGN = 'user_id';
        };

        $expected = 'user_id';

        $actual = $stub->getHasUpdaterForeign();

        $this->assertEquals($expected, $actual);
    }

    public function testGetHasUpdaterForeign_WithUnDefined_ShouldReturn_CreatedBy()
    {
        $expected = 'updated_by';

        $actual = $this->updater_model->getHasUpdaterForeign();

        $this->assertEquals($expected, $actual);
    }

    public function testLoadsWithUpdater_ShouldReturn_DefaultValue_False()
    {
        $this->assertFalse((new HasUpdaterModel)->loadsWithUpdater());
    }
}
