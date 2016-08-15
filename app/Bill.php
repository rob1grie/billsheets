<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function payee() {
		return $this->belongsTo('App\Payee');
	}
}
