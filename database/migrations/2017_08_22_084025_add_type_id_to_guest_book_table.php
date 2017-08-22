<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeIdToGuestBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('guest_book', function(Blueprint $blueprint){
            $blueprint->smallInteger('type_id')
                ->nullable(false)
                ->default(1)
                ->comment('类别  1:留言本  2:调查表');
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
        Schema::table('guest_book', function(Blueprint $blueprint){
            $blueprint->dropColumn('type_id');
        });
    }
}
