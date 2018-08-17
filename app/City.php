<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
    	'name', 'province_id', 'type', 'postal_code'
    ];

    //realtion
    public function province()
    {
    	return $this->belongsTo('App\Province');
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
