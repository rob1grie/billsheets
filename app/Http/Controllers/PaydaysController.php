<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payday;
use App\Http\Requests;

class PaydaysController extends Controller
{
	private $rules = [
		'start_date' => ['required'],
		'frequency' => ['required', 'numeric', 'min:1'],
		'amount' => ['required', 'numeric']
	];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paydays = Payday::orderBy('start_date')->paginate(10);

		return view('paydays.index', compact('paydays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paydays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, $this->rules);

		Payday::create($request->all());

		return redirect('paydays')->with('message', 'Payday saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$payday = Payday::find($id);
		return view('paydays.edit', compact('payday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

		$this->validate($request, $this->rules);

		$payday = Payday::find($id);
		
		$payday->update($request->all());

		return redirect('paydays')->with('message', 'Payday Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$payday = Payday::find($id);
		
		$payday->delete();
		
		return redirect('paydays')->with('message', 'Payday Deleted');
    }
}
