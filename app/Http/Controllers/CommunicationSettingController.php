<?php

namespace App\Http\Controllers;

use App\CommunicationSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CommunicationSettingController extends Controller
{

//    public function index()
//    {
//        return view('admin.communication.apiSetting.apiSetting');
//    }
//
//    public function store(Request $request)
//    {
//        CommunicationSetting::query()->create($request->all());
//        return redirect('admin/communication/apiSetting');
//    }

    public function index()
    {
        $apiData = CommunicationSetting::query()->first();
        return view('admin.communication.api-settings',compact('apiData'));
    }

    public function update(Request $request)
    {
        $data = CommunicationSetting::query()->first();
        $data->update($request->all());
        return redirect('admin/communication/apiSetting')->with('success','Updated successfully');

    }

//    public function destroy($id)
//    {
//        $data = CommunicationSetting::query()->findOrFail($id);
//        $data->delete();
//        return redirect('admin/communication/apiSetting');
//    }
}
