<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function products()
    {
        return $this->belongsTo('App\admin\Product', 'product_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function country()
	{
        return $this->belongsTo('App\admin\Country', 'country_id');
	}

	public function city()
	{
        return $this->belongsTo('App\admin\City', 'city_id');
	}
}
