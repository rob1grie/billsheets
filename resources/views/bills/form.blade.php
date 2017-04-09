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
						<div class="col-md-8">
							<span style="vertical-align: middle; padding-right: 15px;">
								Repeating {!! Form::radio('repeating', 'Yes', true) !!}
							</span>
							<span>One-time {!! Form::radio('repeating', 'No') !!}</span>
						</div>
                    </div>

                   <div class="form-group">
						<label for="name" class="control-label col-md-3">Payee Name</label>
						<div class="col-md-8">
							{!! Form::text('name', null, ['class' => 'form-control']) !!}
						</div>
                    </div>

                    <div class="form-group">
						<label for="company" class="control-label col-md-3">Day of Month</label>
						<div class="col-md-8">
							{!! Form::text('day_of_month', null, ['class' => 'form-control', 'size' => 5]) !!}
						</div>
                    </div>

 					<div class="form-group">
						<label for="name" class="control-label col-md-3">Budgeted Amount</label>
						<div class="col-md-8">
							{!! Form::text('default_amount', null, ['class' => 'form-control']) !!}
						</div>
                    </div>

                    <div class="form-group">
						<label for="group" class="control-label col-md-3">Account Number</label>
						<div class="col-md-5">
							{!! Form::text('account_number', null, ['class' => 'form-control']) !!}
						</div>
                    </div>

                    <div class="form-group">
						<label for="group" class="control-label col-md-3">Payment Method</label>
						<div class="col-md-5">
							<span style="vertical-align: middle; padding-right: 15px;">
								Manual {!! Form::radio('payment_method', 'Manual', true) !!}
							</span>
							<span>Auto {!! Form::radio('payment_method', 'Auto') !!}</span>
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
						<button type="submit" class="btn btn-primary">{{ !empty($payee->id) ? 'Update' : 'Save' }}</button>
						<a href="{{ route('bills.index') }}" class="btn btn-default">Cancel</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
