<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsIndexColumnToArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('articles', function (Blueprint $blueprint){
            $blueprint->tinyInteger('is_index')
                ->nullable(false)
                ->default(0)
                ->comment('是否推荐到首页');
            $blueprint->string('file')
                ->nullable(false)
                ->default('')
                ->comment('附件');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('articles', function (Blueprint $blueprint){
            $blueprint->dropColumn('is_index');
            $blueprint->dropColumn('file');
        });
    }
}
