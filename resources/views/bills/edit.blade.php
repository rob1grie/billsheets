@extends('layouts.main')

$mode = 'edit';

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Edit Bill</strong>
	</div>
	{!! Form::model($bill, ['route' => ['bills.update', $bill->id], 'method' => 'PATCH']) !!}

	@include('bills.form')

	{!! Form::close() !!}
</div>

@endsection