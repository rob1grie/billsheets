@extends('layouts.main')

@section('title', 'Paydays List')

@section('content')

<div class="panel panel-default">
	<div class="nav navbar-right navbar-btn">
		<a href="{{ route('paydays.create') }}" class="btn btn-default">
			<i class="glyphicon glyphicon-plus"></i>
			Add Payday
		</a>
	</div>
	<h3>Paydays List</h3>
	<table class="table">
		<tr>
			<td>Start Date</td>
			<td>Amount</td>
			<td>Frequency (weeks)</td>
			<td>Edit/Delete</td>
		</tr>
		@foreach($paydays as $payday)
		<tr>
			<td class="middle">
				<div class="media">
					<div class="media-body">
						{{ $payday->start_date }}
					</div>
				</div>
			</td>
			<td class="middle">
				<div class="media">
					<div class="media-body">
						{{ $payday->amount }}
					</div>
				</div>
			</td>
			<td class="middle">
				<div class="media">
					<div class="media-body">
						{{ $payday->frequency }}
					</div>
				</div>
			</td>
				<td width="100" class="middle">
						<div>
							{!! Form::open(['method' => 'DELETE', 'route' => ['paydays.destroy', $payday->id ]]) !!}
							<a href="{{ route('paydays.edit', ['id' => $payday->id]) }}" class="btn btn-circle btn-default btn-xs" title="Edit">
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