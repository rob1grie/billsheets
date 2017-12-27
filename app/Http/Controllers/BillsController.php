<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Http\Requests;

class BillsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($currentDate = null) {
		if (!$currentDate) {
			$currentDate = getdate();
		}
		$currentMonth = $currentDate['mon'];
		$currentYear = $currentDate['year'];
		$bills = Bill::all();
		return view('bills.index', compact('bills', 'currentMonth', 'currentYear'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$payees = Bill::select('payee_name')->distinct()->orderBy('payee_name')->get();

		return view('bills.create', compact('payees'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$inputs = $request->all();

		$bill = new Bill();
		$bill->payee_name = $inputs['payee_name'];
		$bill->account_number = $inputs['account_number'];
		$bill->budgeted_amount = $inputs['budgeted_amount'];
		$bill->repeating = $inputs['repeating'] == 'Yes' ? true : false;
		$bill->is_auto = $inputs['is_auto'] == '' ? true : false;

		if ($bill->repeating) {
			$bill->due_date = '';
			$bill->day_of_month = $inputs['day_of_month'];
		}
		else {
			$bill->due_date = $inputs['due_date'];
			$bill->day_of_month = 0;
		}

		$bill->save();

		return redirect('bills')->with('message', 'New Bill saved');
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

}
