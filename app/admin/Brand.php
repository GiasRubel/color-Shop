<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
   
    protected $table = 'brands'; 

    public function products()
    {
    	return $this->hasMany('App\admin\Product');
    }

     public function setNameAttribute($value)
     {
         $this->attributes['name'] = ucfirst($value);
     }
}
