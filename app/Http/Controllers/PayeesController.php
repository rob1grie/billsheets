<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Payee;

class PayeesController extends Controller {

	private $rules = [
		'name' => ['required', 'min:5'],
		'day_of_month' => ['required', 'numeric', 'min:1', 'max:31'],
	];

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$payees = Payee::orderBy('name')->paginate(10);

		return view('payees.index', compact('payees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('payees.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
		$this->validate($request, $this->rules);

		Payee::create($request->all());

		return redirect('payees')->with('message', 'Payee Saved');
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
		$payee = Payee::find($id);
		return view('payees.edit', compact('payee'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		$this->validate($request, $this->rules);

		$payee = Payee::find($id);
		
		$payee->update($request->all());

		return redirect('payees')->with('message', 'Payee Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$payee = Payee::find($id);
		
		$payee->delete();
		
		return redirect('payees')->with('message', 'Payee Deleted');
	}

}
