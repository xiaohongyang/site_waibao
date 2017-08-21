<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('guest_book', function(Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->string('column01')->nullable(false)->default('');
            $blueprint->string('column02')->nullable(false)->default('');
            $blueprint->string('column03')->nullable(false)->default('');
            $blueprint->string('column04')->nullable(false)->default('');
            $blueprint->string('column05')->nullable(false)->default('');
            $blueprint->string('column06')->nullable(false)->default('');
            $blueprint->string('column07')->nullable(false)->default('');
            $blueprint->string('column08')->nullable(false)->default('');
            $blueprint->string('column09')->nullable(false)->default('');
            $blueprint->string('column10')->nullable(false)->default('');
            $blueprint->text('column11');
            $blueprint->text('column12');

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
        Schema::drop('guest_book');
    }
}
