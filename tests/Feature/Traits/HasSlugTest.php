<?php

namespace Tests\Feature\Traits;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\SluggableModel;
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

    public function testSluggableModel_Should_Save_SlugFromTitle()
    {
        $model = new SluggableModel();
        $model->title = 'My title';
        $model->save();

        $this->assertSame('my-title', $model->slug);
    }
}
