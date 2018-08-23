<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
    	'name'
    ];

    //relation
    public function cities()
    {
    	return $this->hasMany('App\City');
    }

    public function about()
    {
    	return $this->hasOne('App\About');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function checkouts()
    {
        return $this->hasMany('App\Checkout');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
