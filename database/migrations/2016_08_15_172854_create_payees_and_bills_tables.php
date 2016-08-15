<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayeesAndBillsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('payees', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('day_of_month');
			$table->boolean('repeating');
			$table->integer('repeat_interval')->nullable()->default(1);	// Number of months
			$table->decimal('default_amount', 7, 2)->nullable();
			$table->string('account_number')->nullable();
			$table->enum('payment_method', ['Manual', 'Auto']);
			$table->timestamps();
		});

		/*
		 * Payee_ID (foreign key to Payees)
		  Date_Due
		  Amount_Due
		 */
		Schema::create('bills', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('payee_id')->unsigned()->default(0);
			$table->foreign('payee_id')->references('id')->on('payees')->onDelete('cascade');	// foreign key
			$table->date('date_due');								// Default to current month and day_of_month of payee
			$table->decimal('amount_due', 7, 2);					// Default to default_amount of payee
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('bills');
		Schema::drop('payees');
	}

}
