<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PayeesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('payees')->truncate();
		
		$faker = Faker::create();

		$payees = [];
		/*
		 * Name
		  Day_Of_Month
		  Repeating (Y/N)
		  Repeat_Interval (optional, default to monthly)
		  Default_amount (optional)
		  Account_number (optional)
		  Payment_method (enum Manual or Auto)
		 */

		$methods = ['Manual', 'Auto'];
		
		foreach (range(1, 10) as $index) {
			$i = rand(0, 1);
			$payees[] = [
				'name' => $faker->company,
				'day_of_month' => rand(1, 30),
				'repeating' => rand(0, 1),
				'default_amount' => $faker->randomFloat(2, 100.00, 500.00),
				'account_number' => $faker->creditCardNumber,
				'payment_method' => $methods[$i]
			];
		}
		
		DB::table('payees')->insert($payees);
	}

}
