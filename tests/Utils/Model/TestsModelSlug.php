<?php

namespace Tests\Utils\Model;

use App\Traits\HasSlug;

trait TestsModelSlug
{
    use TestsModel;

    /**
     * The expected slugColumn value
     *
     * @return string
     */
    protected abstract function slugColumnShouldReturn(): string;

    /**
     * The expected slugMirror value
     */
    protected abstract function slugMirrorShouldReturn(): string;

    public function testModel_HasSlug_Implementation()
    {
        $this->assertArrayHasKey( HasSlug::class, class_uses($this->modelInstance()) );

        $methods = get_class_methods( $this->model() );

        $this->assertContains('slugColumn', $methods);
        $this->assertContains('slugMirror', $methods);

        if( method_exists($this, 'slugColumnShouldReturn') ){
            $expected = $this->slugColumnShouldReturn();

            $this->assertEquals($expected, $this->modelInstance()->slugColumn(), "model slugColumn method should return '$expected'");
        }

        if( method_exists($this, 'slugMirrorShouldReturn') ){
            $expected = $this->slugMirrorShouldReturn();

            $this->assertEquals($expected, $this->modelInstance()->slugMirror(), "model slugMirror method should return '$expected'");
        }
    }
}
