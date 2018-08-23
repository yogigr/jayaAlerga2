<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
    	'order_id', 'product_id', 'product_price', 'qty'
    ];

    public function priceStringFormatted()
    {
        return 'Rp '.number_format($this->product_price, 0, '', '.');
    }

    public function total()
    {
        return $this->qty * $this->product_price;
    }

    public function totalStringFormatted()
    {
        return 'Rp '.number_format($this->total(), 0, '', '.');
    }

    //relation
    public function order()
    {
    	return $this->belongsTo('App\Order');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
