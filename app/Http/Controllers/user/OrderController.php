<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Http\Controllers\Controller;
use App\admin\City;
use App\admin\Country;
use App\admin\Order;
use App\admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['adminorderlist', 'adminstatusupdate','adminOrderDestroy','adminordershow']);
		$this->middleware('auth:admin')->only(['adminorderlist','adminordershow']);
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

		$countries = Country::all();

    	return view('user.order', compact('carts', 'sum', 'countries'));
    }

    public function getcity($id)
    {
    	$city = City::where("country_id",$id)->pluck("name","id");
    	// return json_encode($city);
    	return $city;
    }


    public function store(Request $request)
    {
    	$this->validate($request, [
    			'name'      =>'required|min:2',
    			'email'     =>'required',
    			'phone'     =>'required',
    			'adress'    =>'required',
    			'zip'       =>'required',
    			'country'   =>'required|numeric',
    			'city'      =>'required|numeric',
    		]);
    	
    	$uid = Auth::user()->id;

    	$carts = Cart::where('user_id', $uid)->get();

    	foreach ($carts as $cart) {

    		$order = new Order;

    		$order->product_id = $cart['product_id'];
    		$order->quantity = $cart['quantity'];
    		$order->user_id = $uid;
    		$order->name = $request->name;
    		$order->email = $request->email;
    		$order->phone = $request->phone;
    		$order->adress = $request->adress;
    		$order->zip = $request->zip;
    		$order->country_id = $request->country;
    		$order->city_id = $request->city;
    		$order->message = $request->message;

    		$order->save();

    	}

    		$delcarts = Cart::where('user_id', $uid)->delete();

    		return redirect()->route('order.list');
    }

    public function list()
    {
    	$uid = Auth::user()->id;

    	$orders = Order::where('user_id', $uid)->get();

    	$sum = 0;

    	foreach ($orders as $order ) {
    		$total = (( $order->products['price'] + ($order->products['price'] * $order->products['vat']/100)) + $order->products['shippingcost'] ) * $order['quantity'];

    		$sum = $sum + $total;
    	}
    	return view('user.orderlist', compact('orders', 'sum'));
    }

    public function adminorderlist()
    {
    	$orders = Order::all();
    	return view('admin.order.orderlist', compact('orders'));
    }

    public function adminstatusupdate($id)
    {
    	$order = Order::find($id);

    	// return $order;

    	$order->status = 1;

    	$order->save();

    	return redirect()->route('admin.orderlist');
    }

    public function adminOrderDestroy( $id )
    {
    	$order = Order::find($id);

    	$order->delete();

    	return redirect()->route('admin.orderlist');
    }

    public function adminordershow($id)
    {
    	$order = Order::find($id);
    	return view('admin.order.singleorder', compact('order'));
    }


}
