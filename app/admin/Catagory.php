<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    // public function getNameAttribute($value)
    // {
    //     return ucfirst($value);
    // }

    protected $table = 'catagories';

    public function products()
    {
        return $this->belongsToMany('App\admin\Product', 'catagory_product')->withTimestamps();
    }


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
