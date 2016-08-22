<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Http\Requests;

class BillsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$currentDate = getdate();
		$currentMonth = $currentDate['mon'];
		$currentYear = $currentDate['year'];
		$months = BillsController::getMonths();
		$bills = Bill::all();
		return view('bills.index', compact('bills', 'months', 'currentMonth', 'currentYear'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

	public function getMonths() {
		// Returns array of months
		$months[1] = 'January';
		$months[2] = 'February';
		$months[3] = 'March';
		$months[4] = 'April';
		$months[5] = 'May';
		$months[6] = 'June';
		$months[7] = 'July';
		$months[8] = 'August';
		$months[9] = 'September';
		$months[10] = 'October';
		$months[11] = 'November';
		$months[12] = 'December';

		return $months;
	}

}
