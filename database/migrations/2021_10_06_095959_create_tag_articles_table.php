<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTagArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_articles', function (Blueprint $table) {
            $table->id();
            $table->integer('tag_id');
            $table->integer('article_id');
        });

        $sql_dump = File::get('database/sql/tags.sql');
        DB::connection()->getPdo()->exec($sql_dump);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_article');
    }
}
