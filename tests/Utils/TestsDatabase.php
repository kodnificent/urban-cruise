<?php

namespace Tests\Utils;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

trait TestsDatabase
{
    use RefreshDatabase;

    /**
     * Get the table name of the database
     *
     * @return string
     */
    protected abstract function databaseTableName(): string;

    /**
     * Get the required columns that should exists
     *
     * @return array
     */
    protected abstract function requiredColumns(): array;

    public function testDatabase_Exists()
    {
        $this->assertTrue(Schema::hasTable($this->databaseTableName()));
    }

    public function testDatabase_Has_RequiredColumns()
    {
        $columns = $this->requiredColumns();

        $table = $this->databaseTableName();

        $hasColumn = function($column) use($table){
            $this->assertTrue(Schema::hasColumn($table, $column), "$column column does not exist");
        };

        array_walk($columns, $hasColumn);
    }
}
