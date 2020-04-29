<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_metas', function (Blueprint $table) {
            $table->unsignedBigInteger('metaable_id')->primary();
            $table->string('metaable_type');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('canonical')->nullable();
            $table->boolean('noindex')->default(true);
            $table->boolean('nofollow')->default(false);
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_metas');
    }
}
