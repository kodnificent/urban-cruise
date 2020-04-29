<?php

namespace Tests\Utils\Model;

trait TestsModelCast
{
    use TestsModel;

    /**
     * An associative array of required casts
     *
     * @return array
     */
    protected abstract function requiredCasts(): array;

    public function testModel_ShouldHave_RequiredCasts()
    {
        $hasCast = function($cast)
        {
            $casts = $this->modelInstance()->getCasts();

            $this->assertArrayHasKey($cast[0], $casts);

            $this->assertEquals($cast[1], $casts[$cast[0]], "$cast[0] has incorrect cast type");
        };

        $casts = $this->requiredCasts();

        array_walk($casts, $hasCast);
    }
}
