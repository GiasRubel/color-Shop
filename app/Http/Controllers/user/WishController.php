<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Wishlist;
use App\admin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	
	public function index()
	{ 
		$uid = Auth::user()->id;

		$wishes = Wishlist::where('user_id', $uid)->get();
		$orders = Order::all();
		return view('user.wishlist', compact('orders','wishes'));
	}


    public function wishUpdate($id)
    {
    	$uid = Auth::user()->id;

    	$chkwish = Wishlist::where('product_id', $id)->count();

    	if ($chkwish>0) {
    		session()->flash('massage','**Already Added in Wish**');
    		return redirect()->back();
    	}
    	else{

	    	$wish = new Wishlist;

	    	$wish->product_id = $id;

	    	$wish->user_id = $uid;

	    	$wish->save();

	    	return redirect()->route('wish.index');
    	}

    	
    }

    public function destroy($id)
    {
    	$wish = Wishlist::find($id);

    	$wish->delete();

    	return redirect()->route('wish.index');

    }


}
