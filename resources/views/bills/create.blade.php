@extends('layouts.main')
<?php 
$payees_select = array();	// Used as array for the select control
$payees_array = array();	// Used in json_encode
$mode = 'create';

foreach ($payees as $payee) {
	$payees_select[$payee->id] = $payee->name;
	$payees_array[] = ["id" => "$payee->id", "name" => $payee->name];
}

$payees_list = json_encode($payees_array);
?>

<script type="text/javascript">
	var payees_list = {!! $payees_list !!};
</script>


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