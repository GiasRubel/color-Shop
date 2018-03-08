<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\admin\Brand;
use App\admin\Catagory;
use App\admin\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	$products   = Product::orderby('id', 'desc')->take(6)->get();

    	 
    	// return $products;

    	$brands     = Brand::orderby('id', 'desc')->take(10)->get();
    	$catagories = Catagory::orderby('id', 'desc')->take(10)->get();
    	return view('user.home', compact('products','brands', 'catagories'));
    }
}
