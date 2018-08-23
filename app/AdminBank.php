<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminBank extends Model
{
	protected $table = 'admin_banks';
    protected $fillable = [
    	'bank_name', 'bank_account', 'under_the_name', 'logo'
    ];

    //relation
    public function payment_confirmations()
    {
    	return $this->hasMany('App\PaymentConfirmation');
    }
}
