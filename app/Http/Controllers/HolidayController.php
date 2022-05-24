<?php

namespace App\Http\Controllers;

use App\Holiday;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::query()->paginate(25);
        return view('admin.attendance.holiday',compact('holidays'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'sometimes|nullable|date'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $start = $request->get('start');
        $end = $request->get('end');

        if(!$end){
            $end = $start;
        }

        $period = CarbonPeriod::create($start,$end);

        $holiday = Holiday::query()->create($request->only('name'));

        // Iterate over the period
        foreach ($period as $date) {
            $d = $date->format('Y-m-d');
            DB::table('holiday_durations')->insert(
                [
                    'holiday_id' => $holiday->id,
                    'date' => $d,
                ]
            );
        }

        Session::flash('success',$request->name.' has been added successfully!');

        return redirect('admin/holidays');
    }

    public function edit($id)
    {
        $holiday = Holiday::query()->findOrFail($id);
        $holidays = Holiday::query()->paginate(25);
        return view('admin.attendance.holiday-edit',compact('holiday','holidays'));
    }

    public function update($id, Request $request)
    {
        $holiday = Holiday::query()->findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'sometimes|nullable|date|after_or_equal:start'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $start = $request->get('start');
        $end = $request->get('end');

        if(!$end){
            $end = $start;
        }

        $period = CarbonPeriod::create($start,$end);

        $holiday->duration()->delete();
        $holiday->update($request->only('name'));

        $holiday->duration;

        // Iterate over the period
        foreach ($period as $date) {
            $d = $date->format('Y-m-d');
            DB::table('holiday_durations')->insert(
                [
                    'holiday_id' => $holiday->id,
                    'date' => $d,
                ]
            );
        }

        Session::flash('success','Holiday has been updated!');

        return redirect('admin/holidays');
    }

    public function destroy($id)
    {
        $holiday = Holiday::query()->findOrFail($id);
        $holiday->delete();
        Session::flash('success',$holiday->name.' is deleted successfully!');
        return redirect('admin/holidays');
    }
}
