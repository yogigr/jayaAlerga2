<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role_id', 'address',
        'city_id', 'province_id', 'postal_code', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->role_id == 1;
    }

    public function isOperator()
    {
        return $this->role_id == 2;
    }

    public function isNulledAddress()
    {
        return is_null($this->address) || is_null($this->city_id) 
        || is_null($this->province_id) || is_null($this->postal_code) || is_null($this->phone);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    //relation
    public function role()
    {
        return $this->belongsTo('App\Role');
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
