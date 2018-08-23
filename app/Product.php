<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name', 'slug', 'description', 'weight', 'price', 'category_id'
    ];

    public function weightInKilo()
    {
    	return ($this->weight / 1000) . 'Kg';
    }

    public function priceStringFormatted()
    {
    	return 'Rp '. number_format($this->price, 0, '', '.');
    }

    //relation
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function cart()
    {
        return $this->hasOne('App\Cart');
    }

    public function order_details()
    {
        return $this->hasMany('App\Order');
    }
}
