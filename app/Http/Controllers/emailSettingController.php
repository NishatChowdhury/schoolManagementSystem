<?php

namespace App\Http\Controllers;

use App\EmailSetting;
use Illuminate\Http\Request;

class emailSettingController extends Controller
{

    public function index()
    {
        $allData = EmailSetting::query()->get();
//        dd($allData);
        return view('admin.settings.email_setting',compact('allData'));
    }

    public function store(Request $request)
    {
        EmailSetting::query()->create($request->all());
        return redirect()->back();
    }

    public function edit(Request $request)
    {
//        dd(EmailSetting::query()->findOrFail($request->id));
        return EmailSetting::query()->findOrFail($request->id);
    }

    public function update(Request $request)
    {
        $data = EmailSetting::query()->findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('setting.email');
    }

    public function destroy($id)
    {
        $data = EmailSetting::findOrFail($id);
        $data->delete();
        return redirect()->route('setting.email');
    }
}
