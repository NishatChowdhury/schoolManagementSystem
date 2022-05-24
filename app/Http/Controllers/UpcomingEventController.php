<?php

namespace App\Http\Controllers;

use App\UpcomingEvent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UpcomingEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = UpcomingEvent::query()->paginate(25);
        return view('admin.event.index',compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'date' => 'required|date',
            'time' => 'required',
            'thumbnail' => 'required|mimetypes:image/png,image/jpeg',
        ]);

        if($request->hasFile('thumbnail')){
            $image = date('Ymdhis').'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move(public_path().'/assets/img/events/', $image);
            $data = $request->except('thumbnail');
            $data['image'] = $image;
            try{
                UpcomingEvent::query()->create($data);
            }catch (Exception $e){
                dd($e);
            }
        }else{
            try{
                UpcomingEvent::query()->create($request->all());
            }catch (Exception $e){
                dd($e);
            }
        }

        return redirect('admin/events');
    }

    public function edit($id)
    {
        $event = UpcomingEvent::query()->findOrFail($id);
        return view('admin.event.edit',compact('event'));
    }

    public function update($id, Request $request)
    {
        $event = UpcomingEvent::query()->findOrFail($id);

        $this->validate($request,[
            'date' => 'required|date',
            'time' => 'required',
        ]);

        if($request->hasFile('thumbnail')){
            $image = date('Ymdhis').'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move(public_path().'/assets/img/events/', $image);
            $data = $request->except('thumbnail');
            $data['image'] = $image;
            try{
                $event->update($data);
            }catch (Exception $e){
                dd($e);
            }
        }else{
            try{
                $event->update($request->all());
            }catch (Exception $e){
                dd($e);
            }
        }

        return redirect('admin/events');
    }

    public function destroy($id)
    {
        $event = UpcomingEvent::query()->findOrFail($id);
        if(File::exists(public_path('assets/img/events/'.$event->image))){
            File::delete(public_path('assets/img/events/'.$event->image));
        }
        $event->delete();
        return redirect('admin/events');
    }
}
