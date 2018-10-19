<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
// use App\Http\Requests\MultiImageRequest;
use App\Http\Controllers\Controller;
use App\admin\MultiImage;

class MultiImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

       if($request->hasfile('file'))
         {
            $files = $request->file('file');

           
                foreach( $files as $image ){
                $name= time()."_".$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);   
                MultiImage::create([
                    'product_id' => $id,
                    'file' => $name
                 ]);
                }

        }
           
         

         return redirect()->back();
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
        $multi = MultiImage::find($id);

        // $multi->products()->delete();

        $multi->delete();

        return redirect()->back();
    }
}
