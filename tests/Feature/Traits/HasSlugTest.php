<?php

namespace Tests\Feature\Traits;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\Models\SluggableModel;
use Tests\TestCase;

class HasSlugTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('sluggable_models', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->char('slug')->unique();

            $table->string('title')->nullable();

            $table->timestamps();
        });
    }

    protected function tearDown(): void
    {
        Schema::dropIfExists('sluggable_models');

        parent::tearDown();
    }

    public function testSlugger_ShouldSlug_OneModel()
    {
        $model = new SluggableModel();
        $model->title = 'My title';
        $model->save();

        $this->assertEquals('my-title', $model->slug);
    }

    public function testSlugger_ShouldSlug_MoreThanOne_Model()
    {
        $model = new SluggableModel();
        $model->title = 'My title';
        $model->save();

        $model2 = new SluggableModel();
        $model2->title = 'My title';
        $model2->save();

        $this->assertEquals('my-title-1', $model2->slug);
    }

    public function testSlugger_ShouldSlug_AnUpdatedModel()
    {

        $model = new SluggableModel();
        $model->title = 'My title';
        $model->save();

        $model->title = 'My new title';
        $model->update();

        $this->assertEquals('my-new-title', $model->slug);
    }

    public function testSlugger_ShouldSlug_IrrespectiveOf_FieldCase()
    {
        SluggableModel::create([
            'title' =>  'My title'
        ]);

        $model = SluggableModel::create([
            'title' => 'MY TITLE'
        ]);

        $this->assertEquals('my-title-1', $model->slug);
    }
}
