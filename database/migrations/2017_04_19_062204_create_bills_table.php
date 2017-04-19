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
			$table->date('due_date');
			$table->decimal('budgeted_amount', 7, 2)->nullable();
			$table->decimal('amount_paid', 7, 2)->nullable();
			$table->string('account_number')->nullable();
			$table->enum('payment_method', ['Manual', 'Auto']);
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
