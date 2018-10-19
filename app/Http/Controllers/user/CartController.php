<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use session;

class CartController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function show()
	{
		// $sid = session()->getId();

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
			// return $sum;
		return view('new_view.cart', compact('carts', 'sum'));
	}


    public function addCart(Request $request, $id)
    {
  		// return $id;
		// return $request->all();

		$sid = session()->getId();
	    
    	$uid = $request->userId;

    	// return $uid;

		$chkCart = Cart::where('product_id','=',$id)
					   ->where('user_id', $uid)
					   ->count();

					   // return count($chkCart);

		if ($chkCart>0) {
			session()->flash('massage','**Already Added in cart**');
			return redirect()->back();
		}
		else
		{

			$this->validate($request, [
				'qty' => 'required',
			]);

			$cart = new Cart;



			$cart->quantity = $request->qty;
			$cart->user_id = $request->userId;
			$cart->product_id = $id;
			$cart->sid = $sid;

			$cart->save();

			// return redirect()->route('user.cart');
			return redirect()->back();
		}
		
    	
    }

    public function update(Request $request, $id)
    {
    	// return $request->all();
    	$this->validate($request, [
				'quantity' => 'required|max:4',
			]);

    	$cId = $request->cId;

    	$cart = Cart::find($cId);
    	// return $cart;
    	$cart->quantity = $request->quantity;

    	$cart->save();

    	// return redirect()->route('user.cart');

    	return 'done';
    }

    public function destroy(Request $request)
    {
    	$id = $request->id;

    	$cart = Cart::find($id);

    	$cart->delete();

    	return 'done';

    	// return redirect()->route('user.cart');
    }


}
