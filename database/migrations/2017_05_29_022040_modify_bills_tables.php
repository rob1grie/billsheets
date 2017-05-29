<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyBillsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function(Blueprint $table) {
			// Fields for repeating Bills
			$table->boolean('repeating')->default(FALSE);
			$table->integer('repeat_interval')->nullable()->default(1);	// Number of months
			$table->integer('day_of_month')->nullable();
			
			// Fields for edited or manual Bills
			$table->boolean('edited')->default(FALSE);
			$table->date('due_date')->nullable()->change();
		});
		
		Schema::drop('repeating_bills');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
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

		Schema::table('bills', function($table) {
			$table->dropColumn('repeating');
			$table->dropColumn('repeat_interval');
			$table->dropColumn('day_of_month');
			$table->dropColumn('edited');
			
			$table->date('due_date')->change();
		});
    }
}
