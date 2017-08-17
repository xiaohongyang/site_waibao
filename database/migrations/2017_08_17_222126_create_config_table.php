<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('config', function (Blueprint $blueprint){
            $blueprint->increments('id');
            $blueprint->string('name')
                ->nullable(false)
                ->default('')
                ->comment('配置名称');
            $blueprint->text('value')
                ->comment('配置值');
            $blueprint->tinyInteger('is_use')
                ->nullable(false)
                ->default(1)
                ->comment('是否启用 1:启用  2:关闭');
            $blueprint->timestamps();
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

        Schema::drop('config');
    }
}
