<?php

namespace Tests;

use Tests\TestCase;
use Tests\Utils\Model\TestsModel;
use Tests\Utils\TestsDatabase;

abstract class ModelTestCase extends TestCase
{
    use TestsDatabase, TestsModel;

    /**
     * Get the model class namespace
     *
     * @return string
     */
    protected function model(): string
    {
        $model = $this->loadsModelFrom().$this->extractModelNameFromTest();

        return $model;
    }

    /**
     * Get where models are being loaded from
     *
     * @return string
     */
    protected function loadsModelFrom(): string
    {
        return 'App\\';
    }

    /**
     * Extract the model name from the model test
     *
     * @return null|string
     */
    protected function extractModelNameFromTest()
    {
        $base_name = class_basename($this);

        $pos = strripos($base_name, 'test');

        if(! $pos) return $base_name;

        return implode('', array_slice( str_split($base_name), 0, $pos ) );
    }

    protected function databaseTableName(): string
    {
        return $this->modelInstance()->getTable();
    }

    protected function requiredColumns(): array
    {
        return [];
    }
}
