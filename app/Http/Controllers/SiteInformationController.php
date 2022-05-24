<?php

namespace App\Http\Controllers;

use App\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiteInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $info = SiteInformation::query()->first();
        return view('admin.settings.basicInfo',compact('info'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'institute_code' => 'sometimes|numeric',
            'eiin' => 'required|max:11',
            'phone' => 'required|max:15',
            'email' => 'required|email|max:255'
        ]);
        $info = SiteInformation::query()->first();
        $info->update($request->all());
        Session::flash('success','Information Saved Successfully!');
        return redirect('admin/siteinfo');
    }

    public function update_google_map(Request $request) {
        $data = SiteInformation::query()->first();
        $data->update($request->only('map'));
        return redirect('admin/siteinfo');
    }

    public function logo(Request $request)
    {
        $this->validate($request,[
            'logo' => 'required|mimetypes:image/png,image/jpeg'
        ]);
        if($request->hasFile('logo')){
            $name = time().$request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path().'/assets/img/logos/', $name);
            //$data = $request->only('logo');
            $data['logo'] = $name;
            SiteInformation::query()->update($data);
        }

        Session::flash('success','Image has been uploaded!');

        return redirect('admin/siteinfo');
    }
}
