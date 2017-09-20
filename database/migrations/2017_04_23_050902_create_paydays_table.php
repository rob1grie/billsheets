<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaydaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('paydays', function (Blueprint $table) {
			$table->increments('id');
			$table->date('start_date');
			$table->integer('frequency');
			$table->decimal('amount');
			$table->boolean('repeating')->default(TRUE);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('paydays');
	}

}
