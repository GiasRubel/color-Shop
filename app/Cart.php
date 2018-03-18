<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table = 'carts';

    public function products()
    {
        return $this->belongsTo('App\admin\Product', 'product_id');
    }

     public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
