@extends('layouts.main')

<?php 
	$currentDate = date_create($currentYear . '-' . $currentMonth . '-01');	// date_create needs format yyyy-mm-dd
?>

<?php $title = 'Bills List for ' . date_format($currentDate, 'F Y'); ?>
@section('title', $title)

@section('content')
<div class="panel panel-default">
	<div class="nav navbar-right navbar-btn">
		<a href="{{ route('bills.create') }}" class="btn btn-default">
			<i class="glyphicon glyphicon-plus"></i>
			Add Bill
		</a>
	</div>
	<div class="form-group">
		<div>
			<h3>Bills for Month of: {{ date_format($currentDate, 'F Y') }}</h3>
		</div>
	</div>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<td class="column-payee">Payee</td>
				<td class="column-date">Date Due</td>
				<td class="column-date">Date Paid</td>
				<td class="column-pmnt">Amt Due</td>
				<td class="column-pmnt">Amt Paid</td>
				<td class="column-chk">Cleared</td>
				<td class="column-comments">Comments</td>
			</tr>
		</thead>
			<tr>
				<td>Cell 1</td>
				<td>Cell 2</td>
				<td>Cell 2</td>
				<td>Cell 2</td>
				<td>Cell 2</td>
				<td>Cell 2</td>
				<td>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
					</p>
				</td>
			</tr>
	</table>

</div>

@endsection