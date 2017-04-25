@extends('layouts.main')
<?php 
$payees_select = array();	// Used as array for the select control
$mode = 'create';

foreach ($payees as $payee) {
	$payees_select[] = $payee->payee_name;
}
?>

@section('title', 'Add Bill')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Add Bill</strong>
	</div>
	
	{!! Form::open(['route' => 'bills.store', 'id' => 'form']) !!}
	
	@include('bills.form')
	
	{!! Form::close() !!}
</div>

@endsection