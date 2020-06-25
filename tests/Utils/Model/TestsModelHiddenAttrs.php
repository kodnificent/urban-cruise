<?php

namespace Tests\Utils\Model;

trait TestsModelHiddenAttrs
{
    use TestsModel;

    /**
     * Attributes that should be hidden by this model
     *
     * @return array
     */
    public abstract function requiredHiddenAttributes(): array;

    /**
     * @dataProvider requiredHiddenAttributes
     */
    public function testRequiredHiddenAttributes($attr_name)
    {
        $this->assertTrue( in_array( $attr_name, $this->modelInstance()->getHidden() ) );
    }
}
