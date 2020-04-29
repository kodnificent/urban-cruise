<?php

namespace Tests\Utils\Model;

trait TestsModelTimestamp
{
    use TestsModel;

    /**
     * Set if the model is expected to be timestamped
     *
     * @return bool
     */
    protected abstract function shouldBeTimestamped(): bool;

    public function testModel_ShouldOrShouldNot_BeTimeStamped()
    {
        $model = $this->model();

        $message = $this->shouldBeTimestamped() ?
            "$model should be timestamped. Set the public \$timestamps property to true" :
            "$model should not be timestamped. Set the public \$timestamps property to false";

        $this->assertEquals($this->shouldBeTimeStamped(), $this->modelInstance()->timestamps, $message);
    }
}
