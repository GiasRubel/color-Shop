<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function show()
    {
    	$uid = Auth::user()->id;

		$carts = Cart::orderby('id','desc')
					->where('user_id', $uid)
					->get();
					// return $carts;
		$sum = 0;

		foreach ($carts as $cart ) {
			$total = (( $cart->products['price'] + ($cart->products['price'] * $cart->products['vat']/100)) + $cart->products['shippingcost'] ) * $cart['quantity'];

			$sum = $sum + $total;
		}
    	return view('user.orderlist', compact('carts', 'sum'));
    }
}
