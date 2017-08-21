<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyGuestBookTableSetNullableTrue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('guest_book', function(Blueprint $blueprint) {

            $blueprint->string('column01')->nullable(true)->change();
            $blueprint->string('column02')->nullable(true)->change();
            $blueprint->string('column03')->nullable(true)->change();
            $blueprint->string('column04')->nullable(true)->change();
            $blueprint->string('column05')->nullable(true)->change();
            $blueprint->string('column06')->nullable(true)->change();
            $blueprint->string('column07')->nullable(true)->change();
            $blueprint->string('column08')->nullable(true)->change();
            $blueprint->string('column09')->nullable(true)->change();
            $blueprint->string('column10')->nullable(true)->change();
            $blueprint->text('column11')->nullable(true)->change();
            $blueprint->text('column12')->nullable(true)->change();

            $blueprint->softDeletes(); 
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
        Schema::table('guest_book', function(Blueprint $blueprint) {

            $blueprint->string('column01')->nullable(false)->change();
            $blueprint->string('column02')->nullable(false)->change();
            $blueprint->string('column03')->nullable(false)->change();
            $blueprint->string('column04')->nullable(false)->change();
            $blueprint->string('column05')->nullable(false)->change();
            $blueprint->string('column06')->nullable(false)->change();
            $blueprint->string('column07')->nullable(false)->change();
            $blueprint->string('column08')->nullable(false)->change();
            $blueprint->string('column09')->nullable(false)->change();
            $blueprint->string('column10')->nullable(false)->change();
            $blueprint->text('column11')->change();
            $blueprint->text('column12')->change();

            $blueprint->dropSoftDeletes();
        });
    }
}
