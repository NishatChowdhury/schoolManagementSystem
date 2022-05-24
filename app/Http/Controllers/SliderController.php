<?php

namespace App\Http\Controllers;

use App\Session;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            //'description' => 'required',
            //'start' => 'sometimes|date',
            //'end' => 'sometimes|date',
            'image' => 'required|max:2000'
        ]);

        if($request->hasFile('image')){
            $name = time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/assets/img/sliders/', $name);
            $data = $request->except('image');
            $data['image'] = $name;
            $data['active'] = 1;
            try{
                Slider::query()->create($data);
            }catch(\Exception $e){
                dd($e);
            }
        }

        return redirect('admin/sliders');

    }

    public function destroy($id)
    {
        $slider = Slider::query()->findOrFail($id);
        File::delete(public_path().'/assets/img/sliders/'.$slider->image);
        $slider->delete();
        \Illuminate\Support\Facades\Session::flash('Slider removed successfully!');
        return redirect('admin/sliders');
    }
}
