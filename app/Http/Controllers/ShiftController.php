<?php

namespace App\Http\Controllers;

use App\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShiftController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $shifts = Shift::all();
        return view('admin.attendance.setting',compact('shifts'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'start' => 'required',
            'end' => 'required',
            'grace' => 'required',
            'late_fee' => 'required',
            'absent_fee' => 'required',
        ]);
        Shift::query()->create($request->all());
        Session::flash('success','Shift add successfully');
        return redirect('attendance/setting');
    }

    public function destroy($id)
    {
        $shift = Shift::query()->findOrFail($id);
        $shift->delete();
        Session::flash('success','Shift deleted successfully!');
        return redirect()->back();
    }
}
