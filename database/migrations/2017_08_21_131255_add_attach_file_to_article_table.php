<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttachFileToArticleTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//
		Schema::table('articles', function (Blueprint $blueprint) {
			$blueprint->string('attach_file')
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
	public function down() {
		//
		Schema::table('articles', function (Blueprint $blueprint) {
			$blueprint->dropColumn('attach_file');
		});
	}
}
