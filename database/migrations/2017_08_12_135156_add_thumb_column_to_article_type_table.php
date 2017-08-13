<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumbColumnToArticleTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('article_type', function (Blueprint $blueprint){
            $blueprint->string('thumb')
                ->nullable(false)
                ->default("");
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
        Schema::table('article_type', function (Blueprint $blueprint){
            $blueprint->dropColumn('thumb');
        });
    }
}
