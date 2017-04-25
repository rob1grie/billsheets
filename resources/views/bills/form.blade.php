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
					{!! Form::label('payee_name', 'Payee Name', ['class' => 'control-label col-md-3']) !!}
					<div class="col-md-8" id='name-div'>
						{!! Form::text('payee_name', null, 
						['class' => 'form-control', 
						'id' => 'payee_name', 
						'placeholder' => 'Enter the Payee\'s name',
						'onBlur' => 'nameTextValidate()'
						]) !!}

						{!! Form::select('name_select', 
						$payees_select, null, 
						['class' => 'form-control', 
						'id' => 'name_select', 
						'placeholder' => 'or select a previously saved Payee'
						]) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('day_of_month', 'Day of Month', ['class' => 'control-label col-md-3']) !!}
					<div class="col-md-8">
						{!! Form::text('day_of_month', null, ['class' => 'form-control', 'size' => 5]) !!}
						{!! Form::date('date_due', \Carbon\Carbon::now(), ['class' => 'form-control', 'size' => 5]) !!}
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
						{!! Form::text('account_number', null, ['class' => 'form-control', 'placeholder' => '(Optional)']) !!}
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
					<button type="submit" class="btn btn-primary">{{ $mode === 'edit' ? 'Update' : 'Save' }}</button>
					<a href="{{ route('bills.index') }}" class="btn btn-default">Cancel</a>
				</div>
			</div>
		</div>
	</div>
</div>

@section('script')
<script type="text/javascript">
	// Define payees_list to store values in name_select
	var payees_list;

	// Execute when the document finishes loading
	$(document).ready(function () {
		// Set radio buttons onChange
		$("input:radio[name=repeating]").change(isRepeating);

		// If select control changes, set the payee_name field to the selected value
		$('#name_select').change(function () {
			$('#payee_name').val($('#name_select option:selected').html());
		});
		
		payees_list = getNameSelectOptions();

		// Set One-Time to default
		$('input:radio[name=repeating]').filter('[value="No"]').attr('checked', true);
		// Hide Day of Month and show Date Due field
		$('#day_of_month').hide();
		$('input[name=date_due]').show();
		// Set label to Date Due
		$("label[for=day_of_month]").text("Date Due");
		isRepeating();
	});

	function getNameSelectOptions() {
		// Returns the collection of Payee names and IDs from name_select
		let coll = [];

		var select = document.getElementById('name_select');
		// Skip first element that is placeholder
		for (var i = 1; i < select.length; i++) {
			var option = select.options[i];
			coll.push({id:option.value, name:option.text});
		}
		console.log(coll);
		return coll;
	}

	function isRepeating() {
		if ($('input[name=repeating]:checked').val() === 'Yes') {
			// Repeating 
			$('input[name=date_due]').hide();
			$('#day_of_month').show();
			$("label[for=day_of_month]").text("Day of Month");
		} else {
			// One-Time
			$('#day_of_month').hide();
			$('input[name=date_due]').show();
			$("label[for=day_of_month]").text("Date Due");
		}
	}

	function nameTextValidate() {
		// Validate that payee_name entry doesn't already exist in Payees
		var val = document.getElementById('payee_name').value.toUpperCase();
		alert('val = ' + val);
		for (index in payees_list) {
			let payee = payees_list[index].name.toUpperCase();
			if (payee === val) {
				if (confirm("Payee " + payee + " already exists. Reuse this Payee?")) {
					$('#name_select').value = payees_list[index].id;
					$('#payee_name').val(payees_list[index].name);
				} else {
					alert("The Payee Name field must be unique.\nMake some change in your entry so that it is unique");
					$(document).ready(function () {
						$('input[name=payee_name]').focus();
					});
				}
			}
		}
	}

</script>
@stop