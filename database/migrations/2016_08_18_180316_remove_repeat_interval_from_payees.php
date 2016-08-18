<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveRepeatIntervalFromPayees extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('payees', function ($table) {
			$table->dropColumn('repeat_interval');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('payees', function ($table) {
			$table->integer('repeat_interval')->nullable()->default(1); // Number of months
		});
	}

}
