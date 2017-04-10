@extends('layouts.main')

@section('title', 'Payees List')

@section('content')

<div class="panel panel-default">
	<div class="nav navbar-right navbar-btn">
		<a href="{{ route('payees.create') }}" class="btn btn-default">
			<i class="glyphicon glyphicon-plus"></i>
			Add Payee
		</a>
	</div>
	<h3>Payees List</h3>
	<table class="table">
		@foreach($payees as $payee)
		<tr>
			<td class="middle">
				<div class="media">
					<div class="media-body">
						<h4 class="media-heading">{{ $payee->name }}</h4>
						<address>
							<strong>Acc#:{{ $payee->account_number ? $payee->account_number : '[None]' }}</strong>
							<span class="pad-left-10">Day of Month Due: {{ $payee->day_of_month }}</span>
							<span class="pad-left-10">Default Amount: ${{ $payee->default_amount }}</span>
						</address>
					</div>
				</div>
			</td>
			<td width="100" class="middle">
				<div>
					{!! Form::open(['method' => 'DELETE', 'route' => ['payees.destroy', $payee->id ]]) !!}
					<a href="{{ route('payees.edit', ['id' => $payee->id]) }}" class="btn btn-circle btn-default btn-xs" title="Edit">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
					<button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-circle btn-danger btn-xs" title="Delete">
						<i class="glyphicon glyphicon-remove"></i>
						</a>
						{!! Form::close() !!}
				</div>
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection