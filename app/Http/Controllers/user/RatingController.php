<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rating;
// use App\admin\Brand;
// use App\admin\Catagory;
// use App\admin\Product;
// use App\admin\Slider;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products   = Product::orderby('id', 'desc')->take(6)->get();
        // $brands     = Brand::orderby('id', 'desc')->take(10)->get();
        // $catagories = Catagory::orderby('id', 'desc')->take(10)->get();
        // // $slider     = Slider::latest()->first();
        // $slider     = Slider::orderby('id', 'desc')->take(1)->get();

        // return view('new_view.index', compact('products','brands', 'catagories', 'slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $rating = new Rating;

        // $uId = $request->user_id;
        // $hello = $request->product_id;
        // $comment = $request->comment;
        // $rate = $request->rate;
        // $uId = Auth::user()->id;
        $rating->product_id = $request->product_id;
        $rating->user_id = $request->user_id;
        $rating->rate = $request->rate;
        $rating->comment = $request->comment;
        $rating->save();

        return 'done';
        // return $uId." ".$hello." ".$comment." ". $rate;
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
