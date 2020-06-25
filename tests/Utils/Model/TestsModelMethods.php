<?php

namespace Tests\Utils\Model;

trait TestsModelMethods
{
    use TestsModel;

    /**
     * Methods that should be required by this model
     *
     * @return array
     */
    public abstract function requiredMethods(): array;

    /**
     * @dataProvider requiredMethods
     */
    public function testRequiredMethods($method_name, $should_return = null)
    {
        $actual = method_exists($this->modelInstance(), $method_name);

        $this->assertTrue($actual, "{$this->model()} does not have $method_name method");

        if(! is_null($should_return)) $this->assertSame($should_return, $this->modelInstance()->{$method_name});
    }
}
