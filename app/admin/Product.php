<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function catagory()
    {
        return $this->belongsToMany('App\admin\Catagory', 'catagory_product')->withTimestamps();
    }


    public function brand()
    {
        return $this->belongsTo('App\admin\Brand');
    }

    //  public function carts()
    // {
    // 	return $this->hasMany('App\Cart');
    // }
}
