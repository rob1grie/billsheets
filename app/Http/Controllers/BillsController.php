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
		$payees = Bill::select('payee_name')->get();
		
		return view('bills.create', compact('payees'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		Bill::create($request->all());

		return redirect('bills')->with('message', 'Payday saved');
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
