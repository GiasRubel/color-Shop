<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\admin\Brand;
use App\admin\Catagory;
use App\admin\Product;
use File;
use Illuminate\Http\Request;
use Illuminate\support\Facades\storage;

class productController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $products = Product::orderby('id', 'desc')->get();
        return view('admin.product.productlist', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories = Catagory::all();
        $brands = Brand::all();
        return view('admin.product.createproduct', compact('catagories', 'brands'));
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

        $this->validate($request, [
            'name'     => 'required|min:2',
            'price'    => 'required|numeric',
            'vat'      => 'required|numeric',
            'shipping' => 'required|numeric',
            'brand'    => 'required|numeric',
            'detail'   => 'required|min:10',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product;

        if ($request->hasFile('image')) {

          $imagName = $request->image->store('/public');
          $name = explode('/', $imagName);

        }

        $product->name        = $request->name;
        $product->details     = $request->detail;
        $product->image       = $name[1];
        $product->price       = $request->price;
        $product->vat         = $request->vat;
        $product->shippingcost= $request->shipping;
        $product->brand_id    = $request->brand;
        $product->save();


        $product->catagory()->sync($request->catagory,false);
        session()->flash('massage','Data saved in Database');

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
       return view('admin.product.singleproduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        // $product = Product::with('catagory')->where('id', $id)->first();
        $catagories = Catagory::all();
        $brands = Brand::all();

        return view('admin.product.editproduct', compact('product', 'catagories', 'brands'));
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
        $product = Product::find($id);

        $this->validate($request, [
            'name'        => 'required|min:2',
            'price'       => 'required|numeric',
            'vat'         => 'required|numeric',
            'shipping'    => 'required|numeric',
            'brand'       => 'required|numeric',
            'detail'      => 'required|min:10',
            'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('image')) {

          File::delete(public_path('storage/'.$product->image));
          
          $imagName = $request->image->store('/public');
          $name = explode('/', $imagName);
          $product->image       = $name[1];
        }

        $product->name        = $request->name;
        $product->details     = $request->detail;
        
        $product->price       = $request->price;
        $product->vat         = $request->vat;
        $product->shippingcost= $request->shipping;
        $product->brand_id    = $request->brand;

        $product->save();

        $product->catagory()->sync($request->catagory);

        session()->flash('massage','Data Updated in Database');

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->catagory()->detach();

        $product->delete();

        session()->flash('massage','Data Deleted from Database');

        return redirect(route('product.index'));
    }
}
