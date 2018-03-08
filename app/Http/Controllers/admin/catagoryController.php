<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\admin\Catagory;
use Illuminate\Http\Request;

class catagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = Catagory::orderby('id', 'desc')->get();
        return view('admin.catagory.catagorylist', compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catagory.createcatagory');
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
            'name' => 'required|min:2|unique:catagories',
        ]);

        $catagory = new Catagory;

        $catagory->name = $request->name;

        $catagory->save();

        session()->flash('massage','Data saved in Database');

        return redirect()->route('catagory.index');
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
        $catagory = Catagory::find($id);
        return view('admin.catagory.editcatagory', compact('catagory'));
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
        // return $request->all();
        $catagory = Catagory::find($id);

         $this->validate($request, [
            // 'name' => 'required|min:3|unique:catagories'.$catagory->id
            'name' => 'required|min:3|unique:catagories,id',
        ]);

        $catagory->name = $request->name;

        $catagory->save();

        session()->flash('massage','Data Updated in Database');

        return redirect()->route('catagory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catagory = Catagory::find($id);

        $catagory->delete();

        session()->flash('massage', 'Data Deleted');

        return redirect()->route('catagory.index');
    }
}
