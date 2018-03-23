<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\admin\City;
use App\admin\Country;
use Illuminate\Http\Request;

class CityController extends Controller
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
        $countries = Country::orderby('id', 'desc')->get();

        $cities = City::orderby('id', 'desc')->get();


        return view('admin.city.citylist', compact('countries', 'cities'));
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
         $this->validate($request, [
            'name' => 'required|unique:cities',
            'country' => 'required|numeric',
        ]);

        $city = new City;

        $city->name = $request->name;

        $city->country_id = $request->country;

        $city->save();

        session()->flash('massage','Data saved in Database');

        return redirect()->route('city.index');
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
        $city = City::find($id);
        $countries = Country::all();
        return view('admin.city.updatecity', compact('city', 'countries'));
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
        $this->validate($request, [
            'name' => 'required|unique:cities,id',
            'country' => 'required|numeric',
        ]);

         $city = City::find($id);

        $city->name = $request->name;

        $city->country_id = $request->country;

        $city->save();

        session()->flash('massage','Data updated in Database');

        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);

        $city->delete();

        session()->flash('massage','Data Deleted in Database');

        return redirect()->route('city.index');
    }
}
