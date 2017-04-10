@extends('layouts.main')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Edit Payday</strong>
	</div>
	{!! Form::model($payday, ['route' => ['paydays.update', payday->id], 'method' => 'PATCH']) !!}

	@include('paydays.form')

	{!! Form::close() !!}
</div>

@endsection