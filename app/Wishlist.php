<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    	protected $table = 'wishlists';

        public function products()
        {
            return $this->belongsTo('App\admin\Product', 'product_id');
        }

         public function users()
        {
            return $this->belongsTo('App\User', 'user_id');
        }
}
