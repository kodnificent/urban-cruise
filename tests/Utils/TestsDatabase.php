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

    public function testDatabaseTable_Exists()
    {
        $this->assertTrue(Schema::hasTable($this->databaseTableName()));
    }

    public function testDatabaseTable_Has_RequiredColumns()
    {
        $columns = $this->requiredColumns();
        $table = $this->databaseTableName();

        foreach ($columns as $column_name) {
            $this->assertTrue(Schema::hasColumn($table, $column_name), "$column_name column does not exist");
        }
    }
}
