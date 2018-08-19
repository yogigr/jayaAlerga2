<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionData extends Model
{
    protected $table = 'sessions';
    protected $fillable = [
    	'id', 'user_id', 'ip_address', 'user_agent', 'payload', 'last_activity'
    ];

    //relation
    public function carts()
    {
    	return $this->hasMany('App\Cart');
    }
}
