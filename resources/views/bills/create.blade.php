@extends('layouts.main')

@section('title', 'Add Bill')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Add Bill</strong>
	</div>
	{!! Form::open(['route' => 'bills.store']) !!}

	@include('bills.form')
	
	{!! Form::close() !!}
</div>

@endsection