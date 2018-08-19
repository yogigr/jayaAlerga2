<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    //relation
    public function products()
    {
    	return $this->hasMany('App\Product');
    }
}
