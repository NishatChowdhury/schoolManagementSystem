<?php

namespace App\Http\Controllers;

use App\LeavePurpose;
use Illuminate\Http\Request;

class LeavePurposeController extends Controller
{

    public function index()
    {
        $leave_purposes = leavePurpose::all();
        return view('admin.leavePurpose.add-purpose',compact('leave_purposes'));
    }


    public function store(Request $request)
    {
        LeavePurpose::query()->create($request->all());
        return redirect('admin/attendance/leavePurpose');
    }

    public function edit($id)
    {
        $leave_purposes = leavePurpose::all();
        $purpose=leavePurpose::query()->findOrFail($id);
        return view('admin.leavePurpose.edit-purpose',compact('purpose','leave_purposes'));
    }

    public function update($id, Request $request)
    {
        $data=leavePurpose::query()->find($id);
        $data->update($request->all());
        return redirect('admin/attendance/leavePurpose')->with('success','Updated successfully');

    }


    public function destroy($id)
    {
        $leave_purpose = leavePurpose::query()->findOrFail($id);
        $leave_purpose->delete();
        return redirect('admin/attendance/leavePurpose');
    }
}
