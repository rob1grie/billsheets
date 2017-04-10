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
							Repeating {!! Form::radio('repeating', 'Yes') !!}
						</span>
						<span>
							One-time {!! Form::radio('repeating', 'No', true) !!}
						</span>
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('name', 'Payee Name', ['class' => 'control-label col-md-3']) !!}
					<div class="col-md-8" id='name-div'>
						{!! Form::text('name_text', null, ['class' => 'form-control', 'id' => 'name_text', "placeholder" => "Enter the Payee's name"]) !!}
						{!! Form::select('name_select', [], null, ['class' => 'form-control', 'id' => 'name_select', "placeholder" => "Select the Payee"]) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('day_of_month', 'Day of Month', ['class' => 'control-label col-md-3']) !!}
					<div class="col-md-8">
						{!! Form::text('day_of_month', null, ['class' => 'form-control', 'size' => 5]) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('default_amount', 'Budgeted Amount', ['class' => 'control-label col-md-3']) !!}
					<div class="col-md-8">
						{!! Form::text('default_amount', null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('account_number', 'Account Number', ['class' => 'control-label col-md-3']) !!}
					<div class="col-md-5">
						{!! Form::text('account_number', null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('group', 'Payment Method', ['class' => 'control-label col-md-3']) !!}
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

@section('script')
<script type="text/javascript">
	$(document).ready(function () {
		$("input:radio[name=repeating]").change(isRepeating);
		$('input:radio[name=repeating]').filter('[value="No"]').attr('checked', true);
		$('#name_select').hide();
		$('#name_text').show();
		isRepeating();
	});

	function isRepeating() {
		if ($('input[name=repeating]:checked').val() === 'Yes') {
			$('#name_text').hide();
			$('#name_select').show();
		} else {
			$('#name_select').hide();
			$('#name_text').show();
		}
	}

</script>
@stop