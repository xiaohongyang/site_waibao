<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnParentIdToArticleType extends Migration
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

            $blueprint->text('content')
                ->comment('详情');

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
            $blueprint->dropColumn('content');
        });
    }
}
