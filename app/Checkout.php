<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
    	'session_id', 'first_name', 'last_name', 'address', 'city_id', 'province_id',
    	'postal_code', 'phone', 'delivery_service', 'shipping_cost', 'subtotal', 'payment_method',
    ];

    public function subtotalStringFormatted()
    {
        return 'Rp '.number_format($this->subtotal, 0, '', '.');
    }

    public function shippingCostStringFormatted()
    {
        return 'Rp '.number_format($this->shipping_cost, 0, '', '.');
    }

    public function totalAmount()
    {
        return $this->shipping_cost + $this->subtotal;
    }

    public function totalAmountStringFormatted()
    {
       return 'Rp '.number_format($this->totalAmount(), 0, '', '.');
    }

    //relation
    public function session()
    {
    	return $this->belongsTo('App\SessionData');
    }

    public function city()
    {
    	return $this->belongsTo('App\City');
    }

    public function province()
    {
    	return $this->belongsTo('App\Province');
    }


}
