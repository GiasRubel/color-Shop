<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function setNameAttribute($value)
     {
         $this->attributes['name'] = ucfirst($value);
     }
}
