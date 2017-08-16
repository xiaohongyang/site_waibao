<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShowTypeColumnToArticleTypeTable extends Migration
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
            $blueprint->tinyInteger('show_type')
                ->nullable(false)
                ->default(1)
                ->comment('展示类别  1:文章 2:图片 3:文件下载 4:单页 5:留言');
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
            $blueprint->dropColumn('show_type');
        });
    }
}
