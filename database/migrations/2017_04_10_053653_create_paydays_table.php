<?php

/*
 * paydays table structure:
 * 
 *	id
 *	start_date	date		Date to begin the repeating
 *	frequency	int			Number of weeks to repeat
 *	amount		decimal		Decimal amount of payday
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaydaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paydays', function (Blueprint $table) {
            $table->increments('id');
			$table->date('start_date');
			$table->integer('frequency');
			$table->decimal('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paydays');
    }
}
