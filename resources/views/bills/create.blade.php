@extends('layouts.main')
<?php 
$payees_select = array();

foreach ($payees as $payee) {
	$payees_select[$payee->id] = $payee->name;
}
?>


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