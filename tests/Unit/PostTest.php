<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_database_has_expected_columns()
    {
        $table = 'posts';

        $this->assertTrue(Schema::hasTable($table));
        $this->assertTrue(Schema::hasColumn($table, 'id'), 'id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'slug'), 'slug column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'title'), 'title column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'summary'), 'summary column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'content'), 'content column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'options'), 'options column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'status'), 'status column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'image_id'), 'image_id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'category_id'), 'category_id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'author_id'), 'author_id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'updater_id'), 'updater_id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'meta_id'), 'meta_id column does not exist');
    }
}
