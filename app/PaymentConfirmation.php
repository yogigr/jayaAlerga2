<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PaymentConfirmation extends Model
{
    protected $table = 'payment_confirmations';
    protected $fillable = [
    	'order_id', 'transfer_date', 'admin_bank_id', 'user_bank_name',
    	'bank_account', 'under_the_name', 'amount', 'image' 
    ];

    public function amountStringFormatted()
    {
    	return 'Rp ' . number_format($this->amount, 0, ',', '.');
    }

    public function dateFormatted()
    {
    	return Carbon::parse($this->transfer_date)->format('d/m/Y');
    }

    //relation
    public function order()
    {
    	return $this->belongsTo('App\Order');
    }

    public function admin_bank()
    {
        return $this->belongsTo('App\AdminBank');
    }
}
