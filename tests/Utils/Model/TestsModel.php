<?php

namespace Tests\Utils\Model;

use Illuminate\Database\Eloquent\Model;

trait TestsModel
{
    /**
     * Model to test
     *
     * @return string
     */
    protected abstract function model(): string;

    /**
     * An instance of the testing model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function modelInstance(): Model
    {
        $model = $this->model();

        return new $model;
    }
}
