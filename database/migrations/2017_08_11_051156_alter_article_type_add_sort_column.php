<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterArticleTypeAddSortColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('article_type', function (Blueprint $blueprint) {

            $blueprint->smallInteger('sort')
                ->nullable(false)
                ->default(0)
                ->comment('排序');
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
            $blueprint->dropColumn('sort');
        });
    }
}
