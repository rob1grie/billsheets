@extends('layouts.main')

@section('title', 'Add Payday')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Add Payday</strong>
	</div>
	{!! Form::open(['route' => 'paydays.store']) !!}

	@include('paydays.form')
	
	{!! Form::close() !!}
</div>

@endsection