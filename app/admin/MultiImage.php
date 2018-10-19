<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class MultiImage extends Model
{
   protected $guarded = [ ];

   public function products()
   {
   	return $this->belongsTo(Product::class);
   }
}
