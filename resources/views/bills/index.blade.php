@extends('layouts.main')

@section('content')

<div class="panel panel-default">
	<div class="nav navbar-right navbar-btn">
		<a href="{{ route('bills.create') }}" class="btn btn-default">
			<i class="glyphicon glyphicon-plus"></i>
			Add Bill
		</a>
	</div>

</div>


@endsection