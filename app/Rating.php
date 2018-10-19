<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

     public function products()
    {
        return $this->belongsTo('App\admin\Product', 'product_id');
    }
}
