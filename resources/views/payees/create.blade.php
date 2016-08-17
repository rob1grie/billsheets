@extends('layouts.main')

@section('content')
    <div class="panel panel-default">
            <div class="panel-heading">
              <strong>Add Payee</strong>
            </div>
            {!! Form::open(['route' => 'payees.store']) !!}

            <div class="panel-body">
              <div class="form-horizontal">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="name" class="control-label col-md-3">Payee Name</label>
                      <div class="col-md-8">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="company" class="control-label col-md-3">Day of Month</label>
                      <div class="col-md-8">
                        {!! Form::text('day_of_month', null, ['class' => 'form-control']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="email" class="control-label col-md-3">Repeats?</label>
                      <div class="col-md-8">
                        {!! Form::text('repeating', null, ['class' => 'form-control']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="phone" class="control-label col-md-3">Repeat Interval (months)</label>
                      <div class="col-md-8">
                        {!! Form::text('repeat_interval', null, ['class' => 'form-control']) !!}
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
                        {!! Form::text('payment_method', null, ['class' => 'form-control']) !!}
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
                      <button type="submit" class="btn btn-primary">Save</button>
                      <a href="#" class="btn btn-default">Cancel</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {!! Form::close() !!}
          </div>

@endsection