<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('settings'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
			$table->string('last_view')->nullable();	// Store the view that was last used
            $table->timestamps();
        });
    }
}
