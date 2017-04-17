@extends('layouts.main')

$mode = 'edit';

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Edit Payee</strong>
	</div>
	{!! Form::model($payee, ['route' => ['payees.update', $payee->id], 'method' => 'PATCH']) !!}

	@include('payees.form')

	{!! Form::close() !!}
</div>

@endsection