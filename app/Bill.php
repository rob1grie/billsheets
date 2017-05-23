<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;
	
	protected $fillable = ['payee_name', 'due_date', 'budgeted_amount', 'amount_paid', 'account_number', 'payment_method'];
	protected $dates = ['deleted_at'];
	
}
