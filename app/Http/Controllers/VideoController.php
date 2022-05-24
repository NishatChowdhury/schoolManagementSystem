<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        Video::query()->create($request->all());
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $vid = Video::query()->findOrFail($request->get('id'));
        return view('admin.playlist._edit',compact('vid'));
    }

    public function update(Request $request, $id)
    {
        $vid = Video::query()->findOrFail($id);
        $vid->update($request->all());
        Session::flash('success','Video has been updated!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $video = Video::query()->findOrFail($id);
        $video->delete();
        return redirect()->back();
    }
}
