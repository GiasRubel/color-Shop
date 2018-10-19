<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\Slider;
use Image;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function sliderlist()
    {
    	$slider = Slider::all();
    	return view('admin.slider.list', compact('slider'));
    }

	public function create()
	{
		return view('admin.slider.create');
	}

    public function store( Request $request)
    { 
    	// if ($request->hasFile('image')) {
    	// 	return $request->all();
    	// }
    	
    	$this->validate($request, [
    		'caption1' => 'required',
    		'caption2' => 'required',
    		'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	]);

    	$slider = new Slider;

    	$slider->caption1 = $request->caption1;
    	$slider->caption2 = $request->caption2;

    	if ($request->hasFile('image')) {
    		$image = $request->file('image');
    		$filename = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path('images/'. $filename);
    		Image::make($image)->save($location);

    		$slider->image = $filename;
    	}

    	$slider->save();

    	session()->flash('message', 'Data stored');
    	return redirect()->route('slide.create');
    }

    public function edit($id)
    {
    	$slider = Slider::find($id);
    	return view('admin.slider.edit', compact('slider'));
    }

    public function update($id, Request $request)
    {
    	$slider = Slider::find($id);
    	// return $slider->image;
    	// return $request->all();
    	$this->validate($request, [
    		'caption1' => 'required',
    		'caption2' => 'required',
    		'image'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	]);

    	$slider->caption1 = $request->caption1;
    	$slider->caption2 = $request->caption2;

    	if ($request->hasFile('image')) {
    		$image = $request->file('image');
    		$filename = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path('images/'. $filename);
    		Image::make($image)->save($location);

    		$slider->image = $filename;
    	}
    	else{
    		$slider->image = $slider->image;
    	}

    	$slider->save();

    	session()->flash('message', 'Data Updated');
    	return redirect()->route('slide.list');
    }

    public function destroy($id)
    {
    	$slider = Slider::find($id);
    	$slider->delete();
    	session()->flash('message', 'Data Deleted');
    	return redirect()->route('slide.list');

    }
}
