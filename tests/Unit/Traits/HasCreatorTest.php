<?php

namespace Tests\Unit\Traits;

use App\Traits\HasCreator;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Mockery;
use Tests\Models\HasCreatorModel;
use Tests\TestCase;

class HasCreatorTest extends TestCase
{
    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    private $creator_model;

    protected function setUp(): void
    {
        parent::setUp();

        $this->creator_model = new HasCreatorModel;
    }

    protected function tearDown(): void
    {
        unset($this->creator_model);

        parent::tearDown();
    }

    public function testGetHasCreatorRelatedClass_ShouldReturn_UserModel()
    {
        $expected = User::class;

        $actual = $this->creator_model->getHasCreatorRelatedClass();

        $this->assertEquals($expected, $actual);
    }

    public function testGetHasCreatorForeign_WithUserId_ShouldReturn_UserId()
    {
        $stub = new class extends HasCreatorModel
        {
            const HAS_CREATOR_FOREIGN = 'user_id';
        };

        $expected = 'user_id';

        $actual = $stub->getHasCreatorForeign();

        $this->assertEquals($expected, $actual);
    }

    public function testGetHasCreatorForeign_WithUnDefined_ShouldReturn_CreatedBy()
    {
        $expected = 'created_by';

        $actual = $this->creator_model->getHasCreatorForeign();

        $this->assertEquals($expected, $actual);
    }

    public function testLoadsWithCreator_ShouldReturn_DefaultValue_False()
    {
        $this->assertFalse((new HasCreatorModel)->loadsWithCreator());
    }
}
