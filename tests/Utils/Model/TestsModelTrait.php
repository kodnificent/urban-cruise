<?php

namespace Tests\Utils\Model;

trait TestsModelTrait
{
    use TestsModel;

    /**
     * An array of required traits
     *
     * @return array
     */
    protected abstract function requiredTraits(): array;

    /**
     * Test a model for required traits
     *
     * @return void
     */
    public function testModel_ShouldHave_RequiredTraits()
    {
        $traits = $this->requiredTraits();

        $model = $this->modelInstance();

        $hasTrait = function($trait) use($model)
        {
            $this->assertArrayHasKey($trait, class_uses($model));
        };

        array_walk($traits, $hasTrait);
    }
}
