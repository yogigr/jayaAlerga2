<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['session_id', 'product_id', 'qty'];

    public function total()
    {
        return $this->qty * $this->product->price;
    }

    public function totalStringFormatted()
    {
        return 'Rp '.number_format($this->total(), 0, '', '.');
    }

    //relation
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function session()
    {
    	return $this->belongsTo('App\SessionData');
    }
}
