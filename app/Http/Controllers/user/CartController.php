<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Request $request, $id)
    {
		// return $request->all();
		// echo $id;

		$this->validate($request, [
			'qty' => 'required',
		]);

		$cart = new Cart;

		$cart->quantity = $request->qty;
		$cart->user_id = $request->userId;
		$cart->product_id = $id;
		// $request->qty = $cart->quantity;
		// $request->userId = $cart->user_id;
		// $id = $cart->product_id;

		$cart->save();

		return redirect('/');
    }
}
