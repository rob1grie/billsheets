@extends('layouts.main')

@section('title', 'Add Payee')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Add Payee</strong>
	</div>
	{!! Form::open(['route' => 'payees.store']) !!}

	@include('payees.form')
	
	{!! Form::close() !!}
</div>

@endsection