<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
			$table->string('payee_name');
			$table->date('due_date')->nullable();
			$table->decimal('budgeted_amount', 7, 2)->nullable();
			$table->decimal('amount_paid', 7, 2)->nullable();
			$table->string('account_number')->nullable();
			
			// Fields for repeating Bills
			$table->boolean('repeating')->default(FALSE);
			$table->integer('repeat_interval')->nullable()->default(1);	// Number of months
			$table->integer('day_of_month')->nullable();
			
			// Fields for edited or manual Bills
			$table->boolean('is_auto')->default(FALSE);
			$table->boolean('edited')->default(FALSE);

			$table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bills');
    }
}
