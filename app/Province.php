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
}
