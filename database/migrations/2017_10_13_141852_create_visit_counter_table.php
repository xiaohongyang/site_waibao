<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitCounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('visit_counter', function(Blueprint $table){
        	$table->increments('id');
        	$table->string('ip')->nullAble(false)->default('')->comments('访问者ip');
        	$table->smallInteger('type')->nullAble(false)->default(0)->comments('计数器类别 0网站访问者计数,  1文章访问计数,  2文章下载计数');
        	$table->integer('article_id')->nullAble(false)->default(0)->comments('文章id');
        	$table->timestamps();
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
        Schema::dropIfExists('visit_counter');
    }
}
