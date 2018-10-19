<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Rating;
use App\Wishlist;
use App\Http\Controllers\Controller;
use App\admin\Brand;
use App\admin\Catagory;
use App\admin\Product;
use App\admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

    	$products   = Product::orderby('id', 'desc')->take(6)->get();
    	$brands     = Brand::orderby('id', 'desc')->take(10)->get();
    	$catagories = Catagory::orderby('id', 'desc')->take(10)->get();
        // $slider     = Slider::latest()->first();
        $slider     = Slider::orderby('id', 'desc')->take(1)->get();


    	return view('new_view.index', compact('products','brands', 'catagories', 'slider'));
    }

    public function show($id)
    {
        if (Auth::check()) {
            $uId = Auth::user()->id;
       }
       else{
        $uId = 0;
       }
        
        
    	$product = Product::find($id);

    	$catagories = Catagory::orderby('id', 'desc')->take(10)->get();
    	$brands     = Brand::orderby('id', 'desc')->take(10)->get();
        $ratings     = Rating::orderby('id', 'desc')->take(20)->get();

        $rating_avg = Rating::orderby('id', 'desc')
                                ->where('product_id', $id)
                                ->avg('rate');
                                
        $rating_check = Rating::orderby('id', 'desc')
                                ->where('product_id', $id)
                                ->where('user_id', $uId)
                                ->get();
                                // return count($rating_check);

        $wish_check = Wishlist::where('product_id', $id)->where('user_id', $uId)->get();
        // return $wish_check;

    	return view('new_view.singleProduct')->with(compact('product','catagories','brands','ratings','rating_avg','rating_check','wish_check'));
    }
}
