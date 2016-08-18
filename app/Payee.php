<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payee extends Model
{
    protected $fillable = ['name', 'day_of_month', 'repeating', 'default_amount', 'account_number', 'payment_method'];
}
