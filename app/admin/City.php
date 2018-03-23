<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $table = 'cities';

	public function country()
	{
        return $this->belongsTo('App\admin\Country', 'country_id');
	}

	public function setNameAttribute($value)
	{
	 $this->attributes['name'] = ucfirst($value);
	}
}
