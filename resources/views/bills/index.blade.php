@extends('layouts.main')

@section('content')
<div class="panel panel-default">
	<div class="nav navbar-right navbar-btn">
		<a href="{{ route('bills.create') }}" class="btn btn-default">
			<i class="glyphicon glyphicon-plus"></i>
			Add Bill
		</a>
	</div>
	<div class="form-group">
		<label for="month" class="control-label col-md-2">Bills for Month of: </label>
		<div>
			{!! Form::select('month', $months, $currentMonth ) !!} 
			{!! Form::number('year', $currentYear) !!}
		</div>
	</div>

</div>

@endsection