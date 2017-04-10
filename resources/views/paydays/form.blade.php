	<div class="panel-body">
		<div class="form-horizontal">
			<div class="row">
				<div class="col-md-8">
					@if (count($errors))
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
                    <div class="form-group">
						<label for="name" class="control-label col-md-3">Payday Start Date</label>
						<div class="col-md-8">
							{!! Form::date('start_date', \Carbon\Carbon::now()) !!}
						</div>
                    </div>

                    <div class="form-group">
						<label for="company" class="control-label col-md-3">How Often? (weeks)</label>
						<div class="col-md-8">
							{!! Form::number('frequency', 2, ['class' => 'form-control', 'size' => 5]) !!}
						</div>
                    </div>

					<div class="form-group">
						<label for="name" class="control-label col-md-3">Amount</label>
						<div class="col-md-8">
							{!! Form::text('amount', null, ['class' => 'form-control']) !!}
						</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
                    <div class="col-md-offset-3 col-md-6">
						<button type="submit" class="btn btn-primary">{{ !empty($payday->id) ? 'Update' : 'Save' }}</button>
						<a href="{{ route('paydays.index') }}" class="btn btn-default">Cancel</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
