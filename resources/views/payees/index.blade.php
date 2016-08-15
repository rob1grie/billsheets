@extends('layouts.main')

@section('content')

<div class="panel panel-default">
	<h3>Payees List</h3>
	<table class="table">
		@foreach($payees as $payee)
		<tr>
			<td class="middle">
				<div class="media">
					<div class="media-body">
						<h4 class="media-heading">{{ $payee->name }}</h4>
						<address>
							<strong>Acc#:{{ $payee->account_number }}</strong>
							<span class="pad-left-10">Day of Month Due: {{ $payee->day_of_month }}</span>
							<span class="pad-left-10">Default Amount: ${{ $payee->default_amount }}</span>
						</address>
					</div>
				</div>
			</td>
			<td width="100" class="middle">
				<div>
					<a href="#" class="btn btn-circle btn-default btn-xs" title="Edit">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
					<a href="#" class="btn btn-circle btn-danger btn-xs" title="Edit">
						<i class="glyphicon glyphicon-remove"></i>
					</a>
				</div>
			</td>
		</tr>
		@endforeach
	</table>
</div>

<div class="text-center">
	<nav>
		{!! $payees->links() !!}
	</nav>
</div>
@endsection