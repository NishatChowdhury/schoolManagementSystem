<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $features = Feature::query()->paginate(20);
        return view('admin.feature.index',compact('features'));
    }

    public function create()
    {
        $pages = Menu::query()
            ->where('menu_id',null)
            ->get();
        return view('admin.feature.create',compact('pages'));
    }

    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $image = date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/assets/img/features/', $image);
            $data = $request->except('image');
            $data['image'] = $image;
            try{
                Feature::query()->create($data);
            }catch (Exception $e){
                dd($e);
            }
        }else{
            try{
                Feature::query()->create($request->all());
            }catch (Exception $e){
                dd($e);
            }
        }

        Session::flash('success','Item added to feature!');

        return redirect('admin/features');
    }

    public function edit($id)
    {
        $feature = Feature::query()->findOrFail($id);
        $pages = Menu::query()
            ->where('menu_id',null)
            ->get();
        return view('admin.feature.edit',compact('feature','pages'));
    }

    public function update($id, Request $request)
    {
        $feature = Feature::query()->findOrFail($id);

        if($request->hasFile('image')){
            $image = date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/assets/img/features/', $image);
            $data = $request->except('image');
            $data['image'] = $image;
            try{
                $feature->update($data);
            }catch (Exception $e){
                dd($e);
            }
        }else{
            try{
                $feature->update($request->except('image'));
            }catch (Exception $e){
                dd($e);
            }
        }

        Session::flash('success','Feature has been updated!');

        return redirect('admin/features');
    }

    public function destroy($id)
    {
        $feature = Feature::query()->findOrFail($id);
        $feature->delete();
        Session::flash('success','Feature has been removed from home page.');
        return redirect('admin/features');
    }
}
