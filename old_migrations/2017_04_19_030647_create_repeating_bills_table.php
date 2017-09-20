<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepeatingBillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('repeating_bills', function (Blueprint $table) {
			$table->increments('id');
			$table->string('payee_name');
			$table->integer('day_of_month');
			$table->boolean('repeating')->default(TRUE);
			$table->integer('repeat_interval')->nullable()->default(1); // Number of months
			$table->decimal('budgeted_amount', 7, 2)->nullable();
			$table->string('account_number')->nullable();
			$table->enum('payment_method', ['Manual', 'Auto']);
			$table->boolean('deleted')->default(FALSE);
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
		Schema::drop('repeating_bills');
	}

}
