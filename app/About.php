<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
    	'company_name', 'company_desc', 'address', 'city_id', 'province_id', 'postal_code', 
        'phone1', 'phone2', 'email', 'instagram', 'facebook', 'twitter', 'google', 'logo'
    ];

    public function isNullLogo()
    {
        return is_null($this->logo);
    }

    public function shortDesc()
    {
        return substr($this->company_desc, 0, 150);
    }

    //relation
    public function city()
    {
    	return $this->belongsTo('App\City');
    }

    public function province()
    {
    	return $this->belongsTo('App\Province');
    }
}
