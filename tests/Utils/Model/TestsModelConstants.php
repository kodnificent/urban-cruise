<?php

namespace Tests\Utils\Model;

trait TestsModelConstants
{
    use TestsModel;

    /**
     * Constants that should be required by this model
     *
     * @return array
     */
    public abstract function requiredConstants(): array;

    /**
     * @dataProvider requiredConstants
     */
    public function testRequiredConstants($constant_name, $should_return)
    {
        $constant = "{$this->model()}::$constant_name";

        $this->assertTrue(defined($constant), "$constant is not defined");

        $this->assertSame($should_return, constant($constant), "constant value does not match the expected value");
    }
}
