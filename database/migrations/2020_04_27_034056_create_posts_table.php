<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('slug')->unique();
            $table->string('title');
            $table->text('summary')->nullable();
            $table->longText('content')->nullable();
            $table->char('status');
            $table->boolean('featured');
            $table->boolean('allow_comments');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->char('type');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('updater_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
